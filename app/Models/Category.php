<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\News;

class Category extends Model
{

    const ACTIVE    = 1;
    const INACTIVE  = 0;
    
    const STATUS = [
        self::ACTIVE    => 'Active',
        self::INACTIVE  => 'Inactive',
    ];


    protected $fillable = [
        'category_name',
        'category_slug',
        'category_status',
        'category_parent',
        'category_order',
        'lang_code',
        'parent_lang',
        'category_img',
        'category_icon',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'is_menu',
        'is_mobile_menu',
        'user_id',
        'deleted_at',
    ];

    // relation with news
    public function news()
    {
        return $this->belongsToMany(News::class, 'category_for_news', 'category_id', 'news_id');
    }


    // relation with user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    // relation with language
    public function lang()
    {
        return $this->belongsTo(Language::class, 'lang_code', 'id');
    }


    // booted method
    protected static function booted() : void
    {
        //model event
        static::deleted(function ($category) {
            $category->news()->detach();
        });
    }


    // loacl scrop 
    public function scopeActive($query)
    {
        return $query->where('category_status',  self::ACTIVE);
    }
    
    // loacl scrop
    public function scopeCategory($query, array $categoryNames = [])
    {
        if (!empty($categoryNames)) {
            $query->whereHas('categories', function ($q) use ($categoryNames) {
                foreach ($categoryNames as $name) {
                    $q->orWhere('category_name', 'like', '%' . $name . '%');
                }
            });
        }

        return $query;
    }

}


