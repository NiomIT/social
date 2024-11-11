<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Subsubcategory;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function singlePost($post_slug)
    {
        $single_post = Post::where('status',1)->where('post_slug', $post_slug)->first();

        if ($single_post->subsubcategory_id) {
            $related_posts = Post::where('status',1)->where('subsubcategory_id', $single_post->subsubcategory_id)->where('post_slug', '!=', $post_slug)->orderBy('id', 'DESC')->get();
        }elseif ($single_post->subcategory_id) {
            $related_posts = Post::where('status',1)->where('subcategory_id', $single_post->subcategory_id)->where('post_slug', '!=', $post_slug)->orderBy('id', 'DESC')->get();
        }
         else {
            $related_posts = Post::where('status',1)->where('category_id', $single_post->category_id)->where('post_slug', '!=', $post_slug)->orderBy('id', 'DESC')->get();
        }




        return view('frontend.page.post_details', compact('single_post', 'related_posts'));
    }



    public function categoryPost($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $posts = Post::where('status',1)->where('category_id', $category->id)->orderBy('id', 'DESC')->paginate(10);
        return view('frontend.page.category_post', compact('posts', 'category'));
    }

    public function subcategoryPost($slug)
    {
        $subcategory = Subcategory::where('slug', $slug)->first();
        $posts = Post::where('status',1)->where('subcategory_id', $subcategory->id)->orderBy('id', 'DESC')->paginate(10);
        return view('frontend.page.subcategory_post', compact('posts', 'subcategory'));
    }


    public function subsubcategoryPost($slug)
    {
        $subsubcategory = Subsubcategory::where('slug', $slug)->first();
        $posts = Post::where('status',1)->where('subsubcategory_id', $subsubcategory->id)->orderBy('id', 'DESC')->paginate(10);
        return view('frontend.page.subsubcategory_post', compact('posts', 'subsubcategory'));
    }

    public function userWisePost($id)
    {
        $user = User::find($id);

        $posts = Post::where('status',1)->where('user_id', $id)->orderBy('id', 'DESC')->paginate(10);
        return view('frontend.page.userwise_post', compact('posts', 'user' ));
    }

    public function searchPost(Request $request)
    {
        $item = $request->search_post;
        $posts = Post::where(function ($query) use ($item) {
            $query->where('post_title_bn', 'LIKE', "%{$item}%")
                ->orWhere('post_title_en', 'LIKE', "%{$item}%");
        })->paginate(10);

        return view('frontend.page.search_post', compact('posts', 'item'));


    }


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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function TagWisePost($tag){
        $posts = Post::where(function ($query) use ($tag) {
            $query->where('post_tag_en', 'LIKE', '%' . $tag . '%')
                ->orWhere('post_tag_bn', 'LIKE', '%' . $tag . '%');
        })->paginate(10);
        return view('frontend.page.tag_wise_post',compact('posts', 'tag'));

	}

    public function FeaturedNews(Request $request,){

        $featured_news = Post::where('status', 1)
        ->where('featured_news', 1)
        ->orderBy('id', 'DESC')
        ->paginate(10);

        return view('frontend.page.featured_news_show',compact('featured_news'));
    }
    public function HotNews(Request $request,){

        $hot_news = Post::where('status', 1)
        ->where('hot_news', 1)
        ->orderBy('id', 'DESC')
        ->paginate(10);

        return view('frontend.page.hot_news_show',compact('hot_news'));
    }
    public function TrendingNews(Request $request,){

        $trending_news = Post::where('status', 1)
        ->where('trending_news', 1)
        ->orderBy('id', 'DESC')
        ->paginate(10);

        return view('frontend.page.trending_news_show',compact('trending_news'));
    }



}
