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
        Schema::create('home_page_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_name');
            $table->string('section_title')->nullable();
            $table->string('section_style')->nullable();
            $table->string('section_image')->nullable();
            $table->text('section_description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('section_order')->default(0);

            //ad sections
            $table->string('ad_type')->nullable();
            $table->string('ad_image')->nullable();
            $table->string('ad_url')->nullable();
            $table->string('ad_code')->nullable();


            $table->string('ad_type2')->nullable();
            $table->string('ad_image2')->nullable();
            $table->string('ad_url2')->nullable();
            $table->string('ad_code2')->nullable();

            $table->unsignedBigInteger('parent_section')->default(0);
            $table->unsignedBigInteger('lang_code')->nullable();
            $table->unsignedBigInteger('section_categories')->nullable();
            $table->unsignedBigInteger('display_by')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page_sections');
    }
};
