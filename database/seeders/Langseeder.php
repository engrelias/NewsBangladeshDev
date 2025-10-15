<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Langseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lang = [

                [ 
                      'lang_title' => 'English',
                      'lang_code' => 'eng',
                      'lang_logo' => 'path/to/english/flag.png',
                      'lang_status' => 1,
                 ],
                 [
                      'lang_title' => 'Bangla',
                      'lang_code' => 'bn',
                      'lang_logo' => 'path/to/bangla/flag.png',
                      'lang_status' => 1,
                 ]
    
                ] ;



                foreach ($lang as $data) {
                    \App\Models\Language::create($data);
                }

  
    }
}
