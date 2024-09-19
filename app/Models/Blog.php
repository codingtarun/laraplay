<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

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

    /**
     * Getter & Setter
     */
    public function getStatusSwitchAttribute()
    {
        return $this->status === 'Published' ? "checked" : "";
    }
}
