<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
     protected $table = 'reviews';
    protected $fillable = ['produk_id', 'nama', 'review'];

    public function produk()
{
    return $this->belongsTo(Produk::class, 'produk_id');
}
}
