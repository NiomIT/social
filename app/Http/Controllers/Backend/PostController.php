<?php

namespace App\Http\Controllers\Backend;

use Image;
use Session;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('backend.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        $categories = Category::latest()->get();
        $activeVendor = User::where('status','active')->where('role','vendor')->latest()->get();
        return view('backend.post.create',compact('categories','activeVendor'));
    } // End Method


       public function getsubcategory($category_id){

        $subcat = Subcategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
        return json_encode($subcat);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if($request->hasfile('post_thambnail')){
            $image = $request->file('post_thambnail');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1020,1020)->save('upload/post/'.$name_gen);
            $post_thambnail = 'upload/post/'.$name_gen;
        }else{
            $post_thambnail = $request->post_thambnail;
        }

        $post = new Post;

        $post->post_title = $request->post_title;
        if($request->post_title_bn == ''){
            $post->post_title_bn = $request->post_title;
        }else{
            $post->post_title_bn = $request->post_title_bn;
        }
        $post->post_tag_en = $request->post_tag_en;
        if($request->post_tag_bn == ''){
            $post->post_tag_bn = $request->post_tag_en;
        }else{
            $post->post_tag_bn = $request->post_tag_bn;
        }
        $post->description_en = $request->description_en;
        if($request->description_bn == ''){
            $post->description_bn = $request->description_en;
        }else{
            $post->description_bn = $request->description_bn;
        }

        if($request->status == Null){
            $request->status = 1;
        }

        $str = $request->post_title;
        $post_slug = trim(preg_replace('/\s+/','-',$str));
        $post->status = $request->status;
        $post->post_slug = $post_slug;
        $post->map_url = $request->map_url;
        $post->advertisement_url = $request->advertisement_url;
        $post->post_thambnail = $post_thambnail;
        $post->hot_news = $request->hot_news;
        $post->featured_news = $request->featured_news;
        $post->trending_news = $request->trending_news;
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->category_id;
        $post->subcategory_id = $request->subcategory_id;
        $post->subsubcategory_id = $request->subsubcategory_id;
        $post->vendor_id = $request->vendor_id;
        $post->created_at = Carbon::now();
        $post->save();

        Session::flash('success','Post Inserted Successfully');
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $activeVendor = User::where('status','active')->where('role','vendor')->latest()->get();
        $categories = Category::latest()->get();
        $subcategory = Subcategory::latest()->get();
        $subsubcategory = Subsubcategory::latest()->get();
        $post = Post::find($id);
     return view('backend.post.edit', compact('post','activeVendor','categories','subcategory','subsubcategory'));

     } // End Edit Mathod

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if($request->hasfile('post_thambnail')){
            try {
                if(file_exists($post->post_thambnail)){
                    unlink($post->post_thambnail);
                }
            } catch (Exception $e) {

            }
            $image = $request->file('post_thambnail');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1020,1020)->save('upload/post/'.$name_gen);
            $post_thambnail = 'upload/post/'.$name_gen;
        }else{
            $post_thambnail = $post->post_thambnail;
        }



        $post->post_title = $request->post_title;
        if($request->post_title_bn == ''){
            $post->post_title_bn = $request->post_title;
        }else{
            $post->post_title_bn = $request->post_title_bn;
        }
        $post->post_tag_en = $request->post_tag_en;
        if($request->post_tag_bn == ''){
            $post->post_tag_bn = $request->post_tag_en;
        }else{
            $post->post_tag_bn = $request->post_tag_bn;
        }
        $post->description_en = $request->description_en;
        if($request->description_bn == ''){
            $post->description_bn = $request->description_en;
        }else{
            $post->description_bn = $request->description_bn;
        }

        if($request->status == Null){
            $request->status = 1;
        }

      $post->post_slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->post_title)));

        $post->status = $request->status;
        $post->map_url = $request->map_url;
        $post->advertisement_url = $request->advertisement_url;
        $post->post_thambnail = $post_thambnail;
        $post->hot_news = $request->hot_news;
        $post->featured_news = $request->featured_news;
        $post->trending_news = $request->trending_news;
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->category_id;
        $post->subcategory_id = $request->subcategory_id;
        $post->subsubcategory_id = $request->subsubcategory_id;
        $post->vendor_id = $request->vendor_id;
        $post->created_at = Carbon::now();
        $post->save();

        Session::flash('success','Post Updated Successfully');
        return redirect()->route('post.index');
    }


    public function copy($id)
    {
       $post = Post::find($id);
       $new_post = $post->replicate();
       $new_post->save();
       Session::flash('success', 'Post Copy Successfully');
       return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $post = Post::find ($id);
        $post->delete();
        Session::flash('success', 'Move To Trashed Successfully');
        return redirect()->back();

    }

    public function trash()
    {
        $post = Post::onlyTrashed()->get();
        return view('backend.post.trash',compact('post'));

    }
    public function restore($id)
    {
        $post = Post::withTrashed()->where('id',$id);
        $post->restore();
        Session::flash('success', 'Post Restore Successfully');
        return redirect()->back();

    }
    public function kill($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        $file_path = $post->post_thambnail;
        unlink($file_path);
        $post->forceDelete();

        Session::flash('success', 'Post Permanently Delete Successfully');
        return redirect()->back();

    }


    public function active($id){

        $post = Post::find($id);
        $post->status = 1;
        $post->save();

        Session::flash('success','Post Active Successfully.');
        return redirect()->back();
    }

    public function inactive($id){
        $post = Post::find($id);
        $post->status = 0;
        $post->save();

        Session::flash('success','Post Disabled Successfully.');
        return redirect()->back();
    }

    public function archive(){

        return view('backend.post.archive');
    }

    public function showDateWisePosts(Request $request)
    {
        $selectedDate = $request->input('calendar');
        $posts = Post::whereDate('created_at', $selectedDate)->get();
        return view('backend.post.archive_wise_post',compact('posts'));
    }

    public function addPost()
{

    return view('frontend.page.add_post');
}


public function userPostStore(Request $request)
{

    $id = Auth::user()->id;
    $userData = User::find($id);
    $category = Category::where('id', $userData->category_id)->first();
    $subcategory = Subcategory::where('id', $userData->subcategory_id ?? null)->first();

    $request->validate([
        'post_title' => 'required|string|max:255',
        'post_thambnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Handling the thumbnail image upload
    if ($request->hasFile('post_thambnail')) {
        $image = $request->file('post_thambnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('upload/post'), $name_gen);
        $post_thambnail = 'upload/post/' . $name_gen;
    } else {
        $post_thambnail = $request->post_thambnail;
    }

    // Creating new Post
    $post = new Post;
    $post->post_title = $request->post_title;

    // Creating the post slug
    $post_slug = strtolower(trim(preg_replace('/\s+/', '-', $request->post_title)));
    $post->post_slug = $post_slug;
    $post->status = 1;
    $post->post_thambnail = $post_thambnail;
    $post->user_id = $userData->id;
    $post->category_id = $category->id;


    if ($subcategory) {
        $post->subcategory_id = $subcategory->id;
    }

    $post->created_at = Carbon::now();
    $post->save();

    // Flash success message and redirect
    Session::flash('success', 'Post Inserted Successfully');
    return redirect()->back();
}


}
