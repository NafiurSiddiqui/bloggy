<?php

namespace App\Helpers;

use App\Models\Category;
use App\Models\Post;
use Spatie\Sitemap\Sitemap;

class SiteMapGenerator
{
    public function build(): void
    {
        Sitemap::create()
            ->add($this->build_sitemap_index(Post::where('is_published', 1)->get(), '/sitemap_posts.xml'))
            ->add($this->build_sitemap_index(Category::get(), '/sitemap_categories.xml'))
            ->writeToFile(public_path('sitemap.xml'));
    }

    public function build_sitemap_index($model, $path): string
    {
        Sitemap::create()
            ->add($model)
            ->writeToFile(public_path($path));

        return $path;
    }
}
