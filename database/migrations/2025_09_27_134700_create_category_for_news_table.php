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
        Schema::create('category_for_news', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('news_id');
            $table->unsignedBigInteger('category_id');

            $table->timestamps();

            // Foreign Keys
            $table->foreign('news_id')
                ->references('id')->on('news')
                ->onDelete('cascade');

            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');
                });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_for_news');
    }
};
