<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia, Sitemapable
{
    use HasFactory, InteractsWithMedia;

    protected $with = ['category', 'subcategory', 'author'];

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'body',
        'thumbnail',
        'thumbnail_alt_txt',
        'category_id',
        'subcategory_id',
        'is_published',
        'is_unpublished',
        'is_draft',
        'is_featured',
        'is_hot',
        'meta_title',
        'meta_description',
        'og_thumbnail',
        'og_title'
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            fn($query, $search) =>
            $query->where(
                fn($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%')
            )
        );

        $query->when(
            $filters['category_filter'] ?? false,
            fn($query, $category_filter) =>
            $query->where('category_id', $category_filter)
                ->latest()
        );

        $query->when(
            $filters['status_filter'] ?? false,
            fn($query, $status_filter) =>
            $query->where($status_filter, 1)
                ->latest()
        );

        $query->when(
            $filters['admin_filter'] ?? false,
            fn($query, $admin_filter) =>
            $query->where('user_id', $admin_filter)
                ->latest()
        );
    }

    public function scopeSort($query, array $sort)
    {
        $query->when(
            $sort['sort']  ?? false,
            fn($query) => $query->orderBy($sort['sort'], $sort['dir']),
            fn($query) => $query->latest()

        );
    }



    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function toSitemapTag(): Url|string|array
    {
        // Return with fine-grained control:
        return Url::create(route('posts.all', $this))
            ->setLastModificationDate(Carbon::create($this->updated_at))
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
            ->setPriority(0.1);;
    }
}
