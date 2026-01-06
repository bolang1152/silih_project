<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Barangpinjam extends Model
{
    use HasFactory;

    protected $table = 'barangpinjams';

    protected $fillable = [
        'id',
        'barangs_id',
        'users_id',
        'tanggal_pinjam',
        'tanggal_pengembalian',
        'kategori_pinjam',
        'tujuan_pinjam',
        'keterangan_pinjam',
        'dokumen_pendukung',
        'status_pinjam',
    ];

    protected $casts = [
        'tanggal_pinjam' => 'date',
        'tanggal_pengembalian' => 'date',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function barangs()
    {
        return $this->belongsTo(Barang::class, 'barangs_id');
    }

    public $incrementing = false;
    protected $keyType = 'string';

    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }
}
