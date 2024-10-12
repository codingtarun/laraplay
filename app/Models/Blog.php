<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Fillables
     */
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'published_at',
        'status',
        'user_id',
    ];



    /**
     * Eloquent Relationships
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function images()
    {
        return $this->belongsToMany(Image::class);
    }
    /**
     * Getter & Setter
     */
    public function getStatusSwitchAttribute()
    {
        return $this->status === 'Published' ? "checked" : "";
    }
}
