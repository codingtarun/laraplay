<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Fillables 
     */
    protected $fillable  = [
        'title',
        'slug',
        'status',
    ];


    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }

    /**
     * Getter & setters
     */

    public function getStatusSwitchAttribute()
    {
        return $this->status === 'Published' ? "checked" : "";
    }
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }




    /**
     * Usng `slug` instead of `id` to get category
     */

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
