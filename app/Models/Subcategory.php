<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\QueryBuilder\QueryBuilder;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'category_id'];


    public function scopeFilter(Builder $query, string |null $slug)
    {
        if (!$slug) {
            return QueryBuilder::for(Subcategory::class)
                ->allowedSorts(['title', 'updated_at'])
                ->with('category', 'posts')
                ->simplePaginate(10)
                ->withQueryString();
        } else {
            return QueryBuilder::for(Category::class)
                ->allowedFilters(['slug'])
                ->with('subcategories')
                ->latest()
                ->simplePaginate(10)
                ->withQueryString();
        }

        // dd($slug);
        // $query->when(
        //     $slug ?? false,
        //     fn() => QueryBuilder::for(Category::class)
        //         ->allowedFilters(['slug'])
        //         ->with('subcategories')
        //         ->latest()
        //         ->simplePaginate(10)
        //         ->withQueryString(),
        // fn() => QueryBuilder::for(Subcategory::class)
        //     ->allowedSorts(['title', 'updated_at'])
        //     ->with('category', 'posts')
        // ->simplePaginate(10)
        // ->withQueryString(),

        // fn() =>  $query->with('category', 'posts')->get()
        // );

        // $query->when(
        //     $slug === null ?? false,
        //     fn() => QueryBuilder::for(Subcategory::class)
        //         ->allowedSorts(['title', 'updated_at'])
        //         ->with('category', 'posts')
        //         ->simplePaginate(10)
        //         ->withQueryString()
        // );

        // $query->when(
        //     $sort['sort']  ?? false,
        //     fn($query) => $query->orderBy($sort['sort'], $sort['dir']),
        //     fn($query) => $query
        //         ->orderBy('title')
        // );
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
