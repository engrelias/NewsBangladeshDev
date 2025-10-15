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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
           
            // Content fields
            $table->string('news_title');
            $table->string('news_slug')->unique();
            $table->string('news_subtitle')->nullable();
            $table->text('news_summary')->nullable();
            $table->longText('news_desc')->nullable();

            // Media
            $table->string('news_img')->nullable();
            $table->string('news_img_caption')->nullable();
            $table->string('news_video')->nullable();
            $table->string('video_url')->nullable();
            $table->string('video_url_from')->nullable(); // e.g. YouTube, Vimeo
            $table->boolean('is_video_page')->default(false);

            // Tags & categorization
            $table->string('news_tag')->nullable();
            $table->string('news_desk')->nullable();
            $table->integer('read_time')->nullable()->comment('Estimated read time in minutes');
            $table->boolean('news_ticker')->default(false);
            $table->integer('news_order')->nullable();
            $table->unsignedBigInteger('news_parent')->nullable();
            $table->string('lang_code', 10)->default('bn');

            // Positioning
            $table->string('front_position')->nullable();
            $table->string('category_position')->nullable();

            // Stats
            $table->bigInteger('news_view_count')->default(0);

            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->text('meta_desc')->nullable();
            $table->string('meta_img')->nullable();

            // Status
            $table->enum('news_status', ['1','0'])
                ->default('1')
                ->comment('1 = active, 0 = inactive');

            // Relations
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('section_id')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
