<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reply extends Model
{
    use HasFactory;


    protected $fillable = ['body', 'comment_id', 'user_id'];
    protected $with = ['commentator'];

    public function comment(): BelongsTo
    {
        return $this->belongsTo(Comment::class);
    }

    public function commentator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
