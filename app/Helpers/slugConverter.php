<?php

namespace App\Helpers;

use Illuminate\Support\Str;


function slugConverter(array $attributes)
{
    return request('slug') ? Str::slug(request('slug'), '-') : Str::slug($attributes['title'], '-');
}
