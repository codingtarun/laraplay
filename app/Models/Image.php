<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Fillables
     */
    protected $fillable = ['title'];

    /**
     * Eloquent Relationship
     */

    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }
}
