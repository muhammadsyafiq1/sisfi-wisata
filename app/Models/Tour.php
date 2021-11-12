<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','slug','biaya_masuk','deskripsi','biaya_parkir','negera','kota','alamat','makanan_khas','featured','nomor_hp','user_id','status','is_open','category_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class, 'tour_id');
    }
}
