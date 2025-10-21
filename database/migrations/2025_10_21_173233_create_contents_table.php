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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('content_title')->nullable();
            $table->string('content_slug')->unique()->nullable();
            $table->string('content_subtitle')->nullable();
            $table->string('content_img')->nullable();
            $table->string('content_desc')->nullable();
            $table->string('content_url')->nullable();
            $table->integer('content_status')->default(0)->comment('0=inactive, 1=active');
            $table->integer('parent_lang')->default(0);
            $table->integer('content_order')->default(0);
            $table->string('lang_code')->default('en');


            //meta
            $table->string('meta_title')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->text('meta_desc')->nullable();

            //relations
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
