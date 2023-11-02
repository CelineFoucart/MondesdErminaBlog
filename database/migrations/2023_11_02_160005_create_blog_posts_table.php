<?php

use App\Models\BlogPost;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('description', 1000)->nullable();
            $table->longText('content');
            $table->timestamps();
            $table->foreignIdFor(User::class)->nullable()->constrained()->cascadeOnDelete();
        });

        Schema::create('blog_post_category', function (Blueprint $table) {
            $table->foreignIdFor(BlogPost::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Category::class)->constrained()->cascadeOnDelete();
            $table->primary(['blog_post_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
        Schema::dropIfExists('post_category');
    }
};
