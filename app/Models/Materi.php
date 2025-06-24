<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug', // ✅ Tambahkan ini
        'description',
        'file_path',
        'kategori_id',
        'slug'
    ];

    /**
     * Relasi Materi -> Komentar
     */
    public function komentars()
    {
        return $this->hasMany(Komentar::class)->latest();
    }

    /**
     * Relasi Materi -> Kategori
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    /**
     * Gunakan slug untuk route binding
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Optional: Relasi Materi -> User (jika materi dibuat oleh user tertentu)
     */
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
