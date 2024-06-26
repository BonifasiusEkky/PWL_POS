<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class LevelController extends Controller
{
    // public function index()
    // {
    //     // DB::insert('insert into m_level (level_kode, level_nama, created_at) value(?,?,?) ', ['CUS', 'Pelanggal', now()]);
    //     // return 'Insert data baru berhasil';

    //     // $row = DB::update('Update m_level set level_nama = ? where level_kode = ?',['Customer','CUS']);
    //     // return 'Update data berhasil, jumlah data yang diupdate:' .$row.'baris';

    //     // $row = DB::delete('delete from m_level where level_kode = ?', ['CUS']);
    //     // return 'Delete data berhasil, jumlah data yang dihapus:' . $row . 'baris';
    //     $data = DB::select('select * from m_level');
    //     return view('level', ['data' => $data]);
    // }
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Level',
            'list' => ['Home', 'Level']
        ];

        $page = (object)[
            'title' => 'Daftar Level yang ada'
        ];

        $activeMenu = 'level'; // Set menu yang sedang aktif

        $level = LevelModel::all(); // ambil data level untuk filter level
        return view('level.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $levels = LevelModel::select('level_id', 'level_kode', 'level_nama');

        // 
        if ($request->level_id) {
            $levels->where('level_id', $request->level_id);
        }



        return DataTables::of($levels)
            ->addIndexColumn() // Menambahkan kolom index / no urut (default nmaa kolom: DT_RowINdex)
            ->addColumn('aksi', function ($level) {
                $btn = '<a href="' . url('/level/' . $level->level_id) . '" class="btn btn-info btn-sm">Detail</a>';
                $btn .= '<a href="' . url('/level/' . $level->level_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/level/' . $level->level_id) . '">' . csrf_field() . method_field('DELETE')
                    . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakit menghapus data 
                ini?\');">Hapus</button></form>';
                return $btn;
            })

            ->rawColumns(['aksi'])
            ->make(true);
    }



    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Tambah Level',
            'list' => ['Home', 'Level', 'Tambah']
        ];
        $page = (object)[
            'title' => 'Tambah Level baru'
        ];

        $level = LevelModel::all(); // ambil data level untuk ditampilkan di form
        $activeMenu = 'level'; //set menu yang sedang aktif

        return view('level.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'level_kode'   => 'required|string|min:3|unique:m_level,level_kode',
            'level_nama'   => 'required|string|max:100',

        ]);

        LevelModel::create([
            'level_kode'    => $request->level_kode,
            'level_nama'    => $request->level_nama,

        ]);

        return redirect('/level')->with('success', 'Data Level berhasil disimpan');
    }

    public function show(string $id)
    {
        $level = LevelModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Detail level',
            'list' => ['Home', 'level', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail Level'
        ];

        $activeMenu = 'level';
        return view('level.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }


    public function edit(string $id)
    {
        $level = LevelModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Edit Level',
            'list' => ['Home', 'Level', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit Level'
        ];

        $activeMenu = 'level';
        return view('level.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'level_kode'    => 'required|string|min:3|unique:m_level,level_kode,' . $id . ',level_id',
            'level_nama'    => 'required|string|max:100',

        ]);

        LevelModel::find($id)->update([
            'level_kode'    => $request->level_kode,
            'level_nama'    => $request->level_nama,

        ]);

        return redirect('/level')->with('success', 'Data level berhasil diubah');
    }

    public function destroy(string $id)
    {
        $check = LevelModel::find($id);
        if (!$check) {
            return redirect('/level')->with('error', 'Data Level tidak ditemukan');
        }

        try {
            LevelModel::destroy($id); // Hapus data level

            return redirect('/level')->with('success', 'Data Level berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            // Jika terjadi error ketika menghapus data , redirect kemabli ke halaman dengan membawa pesan error
            return redirect('/level')->with('errror', 'Data level gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
};