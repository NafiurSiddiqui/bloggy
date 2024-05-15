<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'slug'];

    public function scopeUncategorized(Builder $query)
    {
        $query->where('slug', 'uncategorized');
    }


    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    //Category has many sub categories
    public function subcategories(): HasMany
    {
        return $this->hasMany(Subcategory::class);
    }
}
