<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Post extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'title',
        'content',
        'is_active',
    ];
    public function category()
    {
        // $this->hasOne(Category::class,'category_id'); // one to one
        // $this->hasMany(Post::class);// one to many
        return $this->belongsTo(Category::class);// one to many
        // $this->belongsToMany(Role::class);// many to many
        
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
