<?php

use App\Models\Author;
use App\Models\Category;
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
        Schema::create('ebooks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->foreignIdFor(Author::class, 'author_id');
            $table->string('publisher');
            $table->foreignIdFor(Category::class, 'category_id');
            $table->text('description');
            $table->string('image');
            $table->double('price');
        });

        Schema::table('ebooks', function (Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('authors');
        });

        Schema::table('ebooks', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ebooks');
    }
};
