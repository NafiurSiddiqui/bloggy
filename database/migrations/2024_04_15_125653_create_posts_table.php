<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->nullable();
            $table->foreignId('subcategory_id')->nullable();
            $table->string('title')->unique();
            $table->string('slug')->unique()->nullable();
            $table->text('description');
            $table->longText('body');
            $table->string('thumbnail');
            $table->string('thumbnail_alt_txt');
            //post state
            $table->boolean('is_published')->default(false);
            $table->boolean('is_draft')->default(false);
            $table->boolean('is_unpublished')->default(false);
            $table->string('is_featured')->default('off');
            $table->string('is_hot')->default('off');
            //meta stuff
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('og_thumbnail')->nullable();
            $table->string('og_title')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
