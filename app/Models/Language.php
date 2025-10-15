<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        'lang_title',
        'lang_code',
        'lang_logo',
        'lang_status',
    ]; 
    
    
    public $timestamps = false;

    // relation with news
    public function news()
    {
        return $this->hasMany(News::class, 'lang_id');
    }


  
}
