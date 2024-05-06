<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'category_id'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
//    protected $table = 'subcategories';

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function posts():HasMany
    {
        return $this->hasMany(Post::class);
    }

}
