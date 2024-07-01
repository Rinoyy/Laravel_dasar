<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'content',];

    public function comments(){
        return $this->hasMany(Comment::class, 'post_id');
        // return $this->hasMany(Comment::class);//dari codepolitan
    }

    public function total_comments() {
        return $this->comments()->count();
    }

    public function scopeActive($query){
        return $query->where('active', true);
    }
}
