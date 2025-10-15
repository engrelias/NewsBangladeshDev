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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_name')->unique();
            $table->string('category_slug')->unique();
            $table->enum('category_status', ['1', '0'])
                ->default('1')
                ->comment('1 = active, 0 = inactive');
            $table->unsignedBigInteger('category_parent')->nullable();
            $table->integer('category_order')->nullable();
            $table->unsignedBigInteger('lang_code')->nullable();
            $table->string('parent_lang')->nullable();
            $table->string('category_img')->nullable();
            $table->string('category_icon')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->boolean('is_menu')->default(false);
            $table->boolean('is_mobile_menu')->default(false);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
