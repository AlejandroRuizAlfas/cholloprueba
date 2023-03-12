<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ganga extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'url', 'category', 'likes', 'unlikes', 'price', 'price_sale',  'available', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categoryObj()
    {
        return $this->belongsTo(Category::class, 'category', 'id');
    }
}
