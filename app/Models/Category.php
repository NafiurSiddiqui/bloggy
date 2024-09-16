<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Category extends Model implements Sitemapable
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

    public function scopeSort($query, array $sort)
    {
        $query->when(
            $sort['sort']  ?? false,
            fn($query) => $query->orderBy($sort['sort'], $sort['dir']),
            fn($query) => $query
                ->orderBy('title')
        );
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

    public function toSitemapTag(): Url|string|array
    {
        // Return with fine-grained control:
        return Url::create(route('categories.all', $this))
            ->setLastModificationDate(Carbon::create($this->updated_at))
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
            ->setPriority(0.1);
    }
}
