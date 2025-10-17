<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class HomePageController extends Controller
{


public function index()
{
    // return your homepage view
    return view('frontend.home'); 
}


//tranding news method start

public function trandingNews()
{
    $data['trandingNews'] = News::whereHas('section', function($query) {
        $query->where('section_order', 1)
              ->where('section_name', 'like', '%tranding%');
    })->orWhereHas('categories', function($query) {
        $query->where('category_status', Category::ACTIVE);
    })
    ->where('news_status', News::ACTIVE)
    ->orderBy('created_at', 'desc')
    ->orderBy('news_view_count', 'desc')
    ->take(10)
    ->get();


    $data['tabEntertainIct'] = News::whereHas('section', function($query) {
        $query->section(1,'tranding');
    })->orWhereHas('categories', function($query) {
    $query->active()
        ->category(['entertainment','technology', 'ict', 'বিনোদন','তথ্যপ্রযুক্তি','প্রযুক্তি' ,'এন্টারটেইনমেন্ট']);
    })
    ->active()
    ->orderBy('created_at', 'desc')
    ->orderBy('news_view_count', 'desc')
    ->take(10)
    ->get();


    $data['recentNews'] = News::active()->orderBy('created_at', 'desc')->take(10)->get();
    $data['topNews'] = News::active()->orderBy('news_view_count', 'desc')->take(10)->get();

    return view('frontend.components.tranding-news')->with($data);
}

//tranding news method end




// Saradesh News method start
public function saradeshNews(){
    $data['saradeshNews'] = News::whereHas('section', function($query){
        $query->where('section_order', 2)->where('section_name','like', '%saradesh%');
    })
    ->where('news_status', News::ACTIVE)
    ->orderBy('created_at', 'desc')
    ->take(8)
    ->get();
    return view('frontend.components.saradesh')->with($data);
}
// Saradesh News method end




// National News method start

    public function nationalNews(){

        $data['nationalNews'] = News::whereHas('section', function($query){
            $query->section(3,'national');
        })->orWhereHas('categories', function($q) {
            $q->active()->category(['national','জাতীয়']);
        })
        ->active()
        ->orderBy('created_at', 'desc')
        ->take(10)
        ->get();

        return view('frontend.components.national', compact('data'));


    }
// National News method end


//polities news method start

public function politiesNews(){

   $data['politiesNews'] = News::whereHas('section', function($query){
            $query->section(3,'polities');
        })->orWhereHas('categories', function($q) {
            $q->active()->category(['polities','রাজনীতি']);
        })
        ->active()
        ->orderBy('created_at', 'desc')
        ->take(10)
        ->get();

    return view('frontend.components.polities', compact('data'));

}
//polities news method end




// International News method start


    public function internationalNews(){
        $internationalNews = News::whereHas('section', function($query){
            $query->section(4,'international');
        })->orWhereHas('categories', function($query) {
            $query->active()
            ->category(['international','আন্তর্জাতিক']);
        })
        ->active()
        ->orderBy('created_at', 'desc')
        ->take(10)
        ->get();
        return view('frontend.components.international', compact('internationalNews'));
    }

// International News method end


// business News method start
public function businessNews(){
    $businessNews = News::whereHas('section', function($query){
        $query->section(4,'business');
    })->orWhereHas('categories', function($query) {
        $query->active()
        ->category(['business','বাণিজ্য']);
    })
    ->active()
    ->orderBy('created_at', 'desc')
    ->take(10)
    ->get();

    return view('frontend.components.business', compact('businessNews'));
}
// business News method end




//video News method start
    public function videoNews(){
        $videoNews = News::whereHas('section', function($query){
            $query->section(5,'video');
        })
        ->active()
        ->orderBy('created_at', 'desc')
        ->take(10)
        ->get();

        return view('frontend.components.video', compact('videoNews'));
    }

//video News method end



// job News method start

public function jobNews(){
    $jobNews = News::whereHas('section', function($query){
        $query->section(6,'job');
    })  
    ->active()
    ->orderBy('created_at', 'desc')
    ->take(10)
    ->get();
    return view('frontend.components.job', compact('jobNews'));
}

// job News method end




//education News method start
    public function educationNews(){
        $educationNews = News::whereHas('section', function($query){
            $query->section(6,'education');
        })
        ->orWhereHas('categories', function($query) {
            $query->active()
            ->category(['education','শিক্ষা']);
        })
        ->active()
        ->orderBy('created_at', 'desc')
        ->take(10)
        ->get();

        return view('frontend.components.education', compact('educationNews'));
    }
//education News method end



//pobash News method start
    public function pobashNews(){
        $pobashNews = News::whereHas('section', function($query){
            $query->section(7,'pobash');
        })
        ->orWhereHas('categories', function($query) {
            $query->active()
            ->category(['pobash chattagram','প্রবাসে চট্টগ্রাম','প্রবাসে বাংলাদেশ']);
        })
        ->active()
        ->orderBy('created_at', 'desc')
        ->take(10)
        ->get();
        return view('frontend.components.pobash', compact('pobashNews'));
    }
//pobash News method end



// sports News method start
    public function sportsNews(){
        $sportsNews = News::whereHas('section', function($query){
            $query->section(8,'sports');
        })
        ->orWhereHas('categories', function($query) {
            $query->active()
            ->category(['sports','খেলা']);
        })
        ->active()
        ->orderBy('created_at', 'desc')
        ->take(10)
        ->get();
        return view('frontend.components.sport', compact('sportsNews'));
    }
// sports News method end




//entertainment News method start
    public function entertainmentNews(){
        $entertainmentNews = News::whereHas('section', function($query){
            $query->section(9,'entertainment');
        })
        ->orWhereHas('categories', function($query) {
            $query->active()
            ->category(['entertainment','বিনোদন']);
        })
        ->active()
        ->orderBy('created_at', 'desc')
        ->take(10)
        ->get();
        return view('frontend.components.entertainment', compact('entertainmentNews'));
    }
//entertainment News method end



//lifestyle News method start
    public function lifestyleNews(){
        $lifestyleNews = News::whereHas('section', function($query){
            $query->section(10,'lifestyle');
        })
        ->orWhereHas('categories', function($query) {
            $query->active()
            ->category(['lifestyle','জীবনধারা','লাইফস্টাইল']);
        })
        ->active()
        ->orderBy('created_at', 'desc')
        ->take(10)
        ->get();
        return view('frontend.components.lifestyle', compact('lifestyleNews'));
    }
//lifestyle News method end



//ict News method start

    public function ictNews(){
        $ictNews = News::whereHas('section', function($query){
            $query->section(10,'technology');
        })
        ->orWhereHas('categories', function($query) {
            $query->active()
            ->category(['technology','প্রযুক্তি' , 'তথ্যপ্রযুক্তি', 'ict','IT','আইসিটি']);
        })
        ->active()
        ->orderBy('created_at', 'desc')
        ->take(10)
        ->get();
        return view('frontend.components.technology', compact('ictNews'));
    }

//ict News method end



//religion News method start
    public function religionNews(){
        $religionNews = News::whereHas('section', function($query){
            $query->section(10,'religion');
        })->orWhereHas('categories', function($query) {
            $query->active()
            ->category(['religion','ধর্ম']);
        })
        ->active()
        ->orderBy('created_at', 'desc')
        ->take(10)
        ->get();
        return view('frontend.components.religion', compact('religionNews'));
    }
//religion News method end



// bottom job News method start
    public function bottomJobs(){
        $bottomJobs = News::whereHas('section', function($query){
            $query->section(12,'bottomjob');
        })->orWhereHas('categories', function($query) {
            $query->active()
            ->category(['job','জবস' ,'চাকরি']);
        })
        ->active()
        ->orderBy('created_at', 'desc')
        ->take(10)
        ->get();
        return view('frontend.components.bottom-jobs', compact('bottomJobs'));
    }
// bottom job News method end



}