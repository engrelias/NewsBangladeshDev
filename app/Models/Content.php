<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'content_title',
        'content_slug',
        'content_subtitle',
        'content_img',
        'content_desc',
        'content_url',
        'content_status',
        'parent_lang',
        'content_order',
        'lang_code',
        'meta_title',
        'meta_keyword',
        'meta_desc',
        'created_by',
        'updated_by',
    ];


    // Relationships


    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }


    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
