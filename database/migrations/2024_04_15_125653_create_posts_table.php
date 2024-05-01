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
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('body');
            $table->string('thumbnail');
            $table->string('thumbnail_alt_txt');
            //post state
            $table->boolean('is_published')->default(false);
            $table->boolean('is_draft')->default(false);
            $table->tinyText('is_featured');
            $table->tinyText('is_hot');
            //meta stuff
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('og_thumbnail');
            $table->string('og_title');

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
