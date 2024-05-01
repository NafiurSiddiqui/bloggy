<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

//    protected $guarded = [];

    protected $fillable = [
        'title',
        'slug',
        'description',
        'body',
        'thumbnail',
        'thumbnail_alt_txt',
        'category_id',
        'subcategory_id',
        'is_published',
        'is_draft',
        'is_featured',
        'is_hot',
        'meta_title',
        'meta_description',
        'og_thumbnail',
        'og_title'
    ];

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

}
