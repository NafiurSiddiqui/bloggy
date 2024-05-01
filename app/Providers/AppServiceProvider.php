<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {


        if(Schema::hasTable('categories')){
            View::share('categories_are_empty',!Category::exists());
        }else{

            View::share('categories_are_empty', 'Category database is not migrated yet!');
        }

        if(Schema::hasTable('subcategories')){
            View::share('subcategories_are_empty',!Subcategory::exists());
        }else{
            View::share('subcategories_are_empty', 'Category database is not migrated yet!');
        }


    }
}
