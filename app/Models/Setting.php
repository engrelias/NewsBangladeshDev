<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //  protected $fillable = [
    //      'site_name',
    //      'site_title',
    //      'site_url',
    //      'site_email',
    //      'site_phone',
    //      'site_logo',
    //      'site_favicon',
    //      'site_address',
    //      'footer_text',
    //      'site_meta_content',
    //      'site_meta_keyword',
    //      'header_script',
    //      'footer_script',
    //      'fb_access_token',
    //      'live_tv_link',
    //      'facebook',
    //      'youtube',
    //      'twitter',
    //      'instagram',
    //      'telegram',
    //      'whatsapp',
    //      'linkedin',
    //      'popup_ads_title',
    //      'popup_ads_img',
    //      'popup_ads_video_url',
    //      'popup_ads_status',
    //      'single_news_ad_unit_img',
    //      'single_news_ad_unit_url',
    //      'single_news_ad_unit_code',
    //      'single_news_ad_unit_status',
    //      'meta_ad_unit_img',
    //      'android_app_link',
    //      'iphone_app_link',
    //      'site_copyright',
    //      'feature_display',
    //      'video_id',
    //      'deleted_at',
    //   ];

      protected $guarded = [];

      protected $dates = ['deleted_at'];


      // Add any relationships or methods as needed

      // public function feature()
      // {
      //     return $this->belongsTo(Feature::class, 'feature_display');
      // }

      // public function video()
      // {
      //     return $this->belongsTo(Video::class, 'video_id');
      // }

    }
