<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePageSection extends Model
{
    protected $fillable = [
        'section_name',
         'section_title',
         'section_style',
         'section_image',
         'section_description',
         'is_active',
         'section_order',
         'ad_type',
         'ad_image',
         'ad_url',
         'ad_code',
         'ad_type2',
         'ad_image2',
         'ad_url2',
         'ad_code2',
         'parent_section',
         'lang_code',
         'section_categories',
         'display_by'
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'section_categories');
    }

    public function lang()
    {
        return $this->belongsTo(Language::class, 'lang_code');
    }  
    
    public function user()
    {
        return $this->belongsTo(User::class, 'display_by');
    }

    public function parent()
    {
        return $this->belongsTo(HomePageSection::class, 'parent_section');
    }

    public function children()
    {
        return $this->hasMany(HomePageSection::class, 'parent_section');
    }


    public function scopeSection($query,  $sectionOrder , $sectionName)
    {
        return $query->where(function ($q) use ($sectionName, $sectionOrder) {
            $q->where('section_order', $sectionOrder)
            ->orWhere('section_name', 'like', '%' . $sectionName . '%');
        });
    }
 


}
