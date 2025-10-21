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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->default('News Site');
            $table->string('site_title')->nullable();
            $table->string('site_url')->nullable();
            $table->string('site_email')->nullable();
            $table->string('site_phone')->nullable();
            $table->string('site_logo')->nullable();
            $table->string('site_favicon')->nullable();
            $table->text('site_address')->nullable();
            $table->text('footer_text')->nullable();
            $table->string('site_meta_content')->nullable();
            $table->string('site_meta_keyword')->nullable();
            $table->string('header_script')->nullable();
            $table->string('footer_script')->nullable();
            $table->string('fb_access_token')->nullable();

            //social media links
            $table->string('live_tv_link')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('telegram')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('linkedin')->nullable();

            //ads positions
            $table->string('popup_ads_title')->nullable();
            $table->string('popup_ads_img')->nullable();
            $table->string('popup_ads_video_url')->nullable();
            $table->integer('popup_ads_status')->nullable();
            $table->string('single_news_ad_unit_img')->nullable();
            $table->string('single_news_ad_unit_url')->nullable();
            $table->text('single_news_ad_unit_code')->nullable();
            $table->integer('single_news_ad_unit_status')->nullable();
            $table->string('meta_ad_unit_img')->nullable();
            $table->string('android_app_link')->nullable();
            $table->string('iphone_app_link')->nullable();
            $table->string('site_copyright')->nullable();


            $table->unsignedBigInteger('feature_display')->nullable();
            $table->unsignedBigInteger('video_id')->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
