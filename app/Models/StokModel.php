<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StokModel extends Model
{
    use HasFactory;
    protected $table = 't_stok';
    protected $primaryKey = 'stock_id';

    protected $fillable = ['barang_id','user_id', 'stock_tanggal', 'stock_jumlah'];

    public function user(): BelongsTo{
        return $this->belongsTo(UserModel::class, 'user_id', 'user_id');
    }

    public function barang(): BelongsTo{
        return $this->belongsTo(BarangModel::class,'barang_id','barang_id');
    }
    
}