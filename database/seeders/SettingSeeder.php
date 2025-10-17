<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run()
    {
        Setting::create([
            'site_name' => 'My Laravel Site',
            'site_email' => 'info@example.com',
            'site_phone' => '+880123456789',
            'footer_text' => '© ' . date('Y') . ' My Laravel Site. All rights reserved.',
        ]);
    }
}
