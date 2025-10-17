<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
      protected $fillable = [
        'site_name',
        'site_email',
        'site_phone',
        'site_logo',
        'site_address',
        'footer_text',
    ];
}
