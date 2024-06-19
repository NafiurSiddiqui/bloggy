<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    //    protected $guarded = [];

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

    public function scopeFilter($query, array $filters): void //
    {
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query->where(
                fn ($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%')
            )
        );

        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query->orWhereHas('author', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
        );


        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query->orWhereHas('category', function ($query) use ($search) {
                $query->where('title', $search);
            })
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
}
