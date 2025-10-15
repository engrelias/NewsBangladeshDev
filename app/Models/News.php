<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class News extends Model
{


    const ACTIVE    = 1;
    const INACTIVE  = 0;
    
    const STATUS = [
        self::ACTIVE    => 'Active',
        self::INACTIVE  => 'Inactive',
    ];


    protected $guarded = [];


    // Increment view count
    public function incrementViews()
    {
        return $this->increment('news_view_count');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function categories()
    {
         return $this->belongsToMany(Category::class, 'category_for_news', 'news_id', 'category_id');
    }


    public function section()
    {
        return $this->belongsTo(HomePageSection::class, 'section_id');
    }



    // loacl scrop 
    public function scopeActive($query)
    {
        return $query->where('news_status',  self::ACTIVE);
    } 


}



