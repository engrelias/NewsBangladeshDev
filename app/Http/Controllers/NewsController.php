<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use App\Models\HomePageSection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{

    // Function to extract YouTube video code from URL
    private function get_youtube_video_code($video_url)
    {
        preg_match(
            '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',
            $video_url,
            $value
        );

        return $value[1] ?? null;
    }



    // Function to calculate read time based on content length
    private function calculateReadTime($content)
    {
        // Assuming average reading speed of 200 words per minute
        $wordCount = str_word_count(strip_tags($content));
        $minutes = ceil($wordCount / 200);
        return max(1, $minutes); // Minimum 1 minute
    }




    // Display a listing of the resource.
    public function index()
    {
       $newsItems = News::latest()->get(); // Fetch all news items
       return view('admin.news.index', compact('newsItems')); // Return a view with the
    }



    // Show the form for creating a new resource.
    public function create()
    {
        $sections = HomePageSection::select('id', 'section_name')->get();
        $categories = Category::all(); 
       return view('admin.news.create', compact('categories', 'sections')); 
    }


    


    // Store a newly created resource in storage.
    public function store(Request $request)
    {

        $request->validate([
            'news_title' => 'required|string|max:255',
            'news_subtitle' => 'required|string|max:255',
            'news_order' => 'required|integer',
            'news_status' => 'required|boolean',
            'lang_code' => 'required|string|max:10',
            'news_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'news_video' => 'nullable|file|mimes:mp4,avi,mov,wmv|max:10240',
            'video_url' => 'nullable|url',
            'video_url_from' => 'nullable|string|max:255',
            'news_tag' => 'nullable|string|max:255',
            'news_desk' => 'nullable|string|max:255',
            'news_ticker' => 'nullable|integer|max:255',
            'news_parent' => 'nullable|integer',
            'is_video_page' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_desc' => 'nullable|string|max:500',
            'meta_keyword' => 'nullable|string|max:255',
            'meta_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            'news_summary' => 'required|string',
            'news_desc' => 'required|string',
            'section_id' => 'nullable|exists:home_page_sections,id',
        ]);

        // Handle file uploads
        $imagePath = null;
        $videoPath = null;
        $imagePathMeta = null;

        // Handle news image upload
        if ($request->hasFile('news_img')) {
            $imagePath = $request->file('news_img')->store('news', 'public');
        }

        // Handle meta image upload
        if ($request->hasFile('meta_img')) {
            $imagePathMeta = $request->file('meta_img')->store('news', 'public');
        }

        // Handle news video upload
        if ($request->hasFile('news_video')) {
            $videoPath = $request->file('news_video')->store('news', 'public');
        }

        // Process YouTube video code if video_url exists
        $youtubeCode = null;
        if ($request->video_url) {
            $youtubeCode = $this->get_youtube_video_code($request->video_url);
        }

        // Create new news item
        $news = News::create([
            'news_title' => $request->news_title,
            'news_slug' => $request->news_slug,
            'news_subtitle' => $request->news_subtitle,
            'news_summary' => $request->news_summary,
            'news_desc' => $request->news_desc,
            'news_status' => $request->news_status,
            'news_order' => $request->news_order,
            'lang_code' => $request->lang_code,
            'news_img' => $imagePath,
            'news_video' => $videoPath,
            'video_url' => $youtubeCode,
            'video_url_from' => $request->video_url_from,
            'news_tag' => $request->news_tag,
            'news_desk' => $request->news_desk,
            'news_ticker' => $request->news_ticker,
            'meta_title' => $request->meta_title,
            'meta_desc' => $request->meta_desc,
            'meta_keyword' => $request->meta_keyword,
            'meta_img' => $imagePathMeta,
            'is_video_page' => $request->has('is_video_page') ? 1 : 0,
            'user_id' => Auth::id(),
            'news_parent' => $request->news_parent ?? 0,
            'read_time' => $this->calculateReadTime($request->news_desc), 
            'section_id' => $request->section_id,
        ]);

        // Attach categories
        if ($request->has('categories')) {
            $news->categories()->attach($request->categories);
        }

        return redirect()->route('news.index')->with('success', 'News created successfully.');
    }



    // Display the specified resource.

   public function show($id)
    {
        $news = News::findOrFail($id);

        $news->incrementViews();

        return view('admin.news.show', compact('news'));
    }




    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $updateNews = News::findOrFail($id);
        $categories = Category::all(); 
        $selectedCategories = $updateNews->categories->pluck('id')->toArray();
        $sections = HomePageSection::select('id', 'section_name')->get();

        return view('admin.news.create', compact('updateNews', 'categories', 'selectedCategories', 'sections'));
    }

  

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);
        
        $request->validate([
            'news_title' => 'required|string|max:255',
            'news_subtitle' => 'required|string|max:255',
            'news_order' => 'required|integer',
            'news_status' => 'required|boolean',
            'lang_code' => 'required|string|max:10',
            'news_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'news_video' => 'nullable|file|mimes:mp4,avi,mov,wmv|max:10240',
            'video_url' => 'nullable|url',
            'video_url_from' => 'nullable|string|max:255',
            'news_tag' => 'nullable|string|max:255',
            'news_desk' => 'nullable|string|max:255',
            'news_ticker' => 'nullable|integer|max:255',
            'is_video_page' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_desc' => 'nullable|string|max:500',
            'meta_keyword' => 'nullable|string|max:255',
            'meta_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            'news_summary' => 'required|string',
            'news_desc' => 'required|string',
            'section_id' => 'nullable|exists:home_page_sections,id',
        ]);

        // Handle news image upload
        if ($request->hasFile('news_img')) {
            // Delete old image if exists
            if ($news->news_img && Storage::disk('public')->exists($news->news_img)) {
                Storage::disk('public')->delete($news->news_img);
            }
            $imagePath = $request->file('news_img')->store('news', 'public');
            $news->news_img = $imagePath;
        }

        // Handle meta image upload
        if ($request->hasFile('meta_img')) {
            // Delete old meta image if exists
            if ($news->meta_img && Storage::disk('public')->exists($news->meta_img)) {
                Storage::disk('public')->delete($news->meta_img);
            }
            $imagePathMeta = $request->file('meta_img')->store('news', 'public');
            $news->meta_img = $imagePathMeta;
        }

        // Handle news video upload/removal
        if ($request->hasFile('news_video')) {
            // Delete old video if exists
            if ($news->news_video && Storage::disk('public')->exists($news->news_video)) {
                Storage::disk('public')->delete($news->news_video);
            }
            $videoPath = $request->file('news_video')->store('news', 'public');
            $news->news_video = $videoPath;
        } elseif ($request->input('remove_video') == '1') {
            // Video was removed by user
            if ($news->news_video && Storage::disk('public')->exists($news->news_video)) {
                Storage::disk('public')->delete($news->news_video);
            }
            $news->news_video = null;
        }

        // Process YouTube video code if video_url exists
        if ($request->video_url) {
            $news->video_url = $this->get_youtube_video_code($request->video_url);
        } else {
            $news->video_url = null;
        }

        // Update other fields
        $news->update([
            'news_title' => $request->news_title,
            'news_slug' => $request->news_slug,
            'news_subtitle' => $request->news_subtitle,
            'news_summary' => $request->news_summary,
            'news_desc' => $request->news_desc,
            'news_status' => $request->news_status,
            'news_order' => $request->news_order,
            'lang_code' => $request->lang_code,
            'video_url_from' => $request->video_url_from,
            'news_tag' => $request->news_tag,
            'news_desk' => $request->news_desk,
            'news_ticker' => $request->news_ticker,
            'meta_title' => $request->meta_title,
            'meta_desc' => $request->meta_desc,
            'meta_keyword' => $request->meta_keyword,
            'is_video_page' => $request->has('is_video_page') ? 1 : 0,
            'read_time' => $this->calculateReadTime($request->news_desc),
            'section_id' => $request->section_id,
        ]);

        // Sync categories
        if ($request->has('categories')) {
            $news->categories()->sync($request->categories);
        }

        return redirect()->route('news.index')->with('success', 'News updated successfully.');
    }




    // Remove the specified resource from storage.
    public function destroy($id)
    {
        try {
            $news = News::findOrFail($id);

            DB::beginTransaction();

            try {
                // Detach categories
                $news->categories()->detach();

                // Delete files with existence check
                $filesToDelete = [
                    $news->news_img,
                    $news->meta_img, 
                    $news->news_video
                ];

                foreach ($filesToDelete as $file) {
                    if ($file && Storage::disk('public')->exists($file)) {
                        Storage::disk('public')->delete($file);
                    }
                }

                // Delete the news record
                $news->delete();

                DB::commit();

                return redirect()->route('news.index')->with('success', 'News deleted successfully.');

            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('news.index')->with('error', 'News not found.');

        } catch (\Exception $e) {
            Log::error('News deletion failed - ID: ' . $id . ' - Error: ' . $e->getMessage());
            return redirect()->route('news.index')->with('error', 'Failed to delete news. Please try again.');
        }
    }


}
