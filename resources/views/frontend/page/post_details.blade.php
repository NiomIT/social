@extends('frontend.master')
@section('main')

<!-- Main Breadcrumb Start -->
<div class="main--breadcrumb">
    <div class="container">
        @if(session()->get('language') == 'bangla')
            <ul class="breadcrumb">
                <li><a href="/" class="btn-link"><i class="fa fm fa-home"></i>হোম </a></li>

                @if ($single_post->category_id)
                    <li><a href="{{ route('category.post', $single_post->category->slug) }}" class="btn-link">{{ $single_post->category->category_name_bn }}</a></li>
                @endif

                @if ($single_post->subcategory_id)
                    <li><a href="{{ route('subcategory.post', $single_post->subcategory->slug) }}" class="btn-link">{{ $single_post->subcategory->subcategory_name_bn ?? '' }}</a></li>
                @endif

                @if ($single_post->subsubcategory_id)
                    <li><a href="{{ route('subsubcategory.post', $single_post->subsubcategory->slug) }}" class="btn-link">{{ $single_post->subsubcategory->sub_subcategory_name_bn ?? '' }}</a></li>
                @endif
            </ul>
        @else
            <ul class="breadcrumb">
                <li><a href="/" class="btn-link"><i class="fa fm fa-home"></i>Home</a></li>

                @if ($single_post->category_id)
                    <li><a href="{{ route('category.post', $single_post->category->slug) }}" class="btn-link">{{ $single_post->category->category_name_en }}</a></li>
                @endif

                @if ($single_post->subcategory_id)
                    <li><a href="{{ route('subcategory.post', $single_post->subcategory->slug) }}" class="btn-link">{{ $single_post->subcategory->subcategory_name_en ?? '' }}</a></li>
                @endif

                @if ($single_post->subsubcategory_id)
                    <li><a href="{{ route('subsubcategory.post', $single_post->subsubcategory->slug) }}" class="btn-link">{{ $single_post->subsubcategory->sub_subcategory_name_en ?? '' }}</a></li>
                @endif

            </ul>
        @endif
    </div>
</div>
<!-- Main Breadcrumb End -->


<div class="container">
    <div class="row">
        <!-- Main Content Start -->
        <div class="main--content col-md-8" data-sticky-content="true">
            <div class="sticky-content-inner">
                <!-- Post Item Start -->
                <div class="post--item post--single post--title-largest pd--30-0">
                    <div class="post--img">
                        <a href="#" class="thumb"><img src="{{ asset( $single_post->post_thambnail ) }}" alt=""></a>
                        <a href="#" class="icon"><i class="fa fa-star-o"></i></a>

                        <div class="post--map">
                            <p class="btn-link"><i class="fa fa-map-o"></i>Location in Google Map</p>

                            <div class="map--wrapper">
                                <div data-map-latitude="23.790546" data-map-longitude="90.375583" data-map-zoom="6" data-map-marker="[[23.790546, 90.375583]]"></div>
                            </div>
                        </div>
                    </div>

                    <div class="post--cats">

                        <ul class="nav">
                            <li><span><i class="fa fa-folder-open-o"></i></span></li>

                            @if(session()->get('language') == 'bangla')
                                @foreach (explode(',', $single_post->post_tag_bn) as $tag_bn)
                                <li><a href="{{ url('post/tag/'.$tag_bn) }}">{{ $tag_bn }}</a></li>
                                @endforeach

                            @else
                                @foreach (explode(',', $single_post->post_tag_en) as $tag_en)
                                <li><a href="{{ url('post/tag/'.$tag_en) }}">{{ $tag_en }}</a></li>
                                @endforeach
                            @endif

                        </ul>
                    </div>

                    <div class="post--info">
                        <ul class="nav meta">
                            <li><a href="{{ route('userWise.post', $single_post->user->id) }}">{{ $single_post->user->name }}</a></li>
                            <li><a href="#">{{ $single_post->created_at->format('d F Y') }}</a></li>
                            <li><span><i class="fa fm fa-eye"></i>45k</span></li>
                            <li><a href="#"><i class="fa fm fa-comments-o"></i>02</a></li>
                        </ul>

                        <div class="title">
                            @if(session()->get('language') == 'bangla')
                            <h2 class="h4">{{ $single_post->post_title_bn }}</h2>
                            @else
                            <h2 class="h4">{{ $single_post->post_title_en }}</h2>
                            @endif

                        </div>
                    </div>

                    {{-- Description start --}}
                    <div class="post--content">
                        @if(session()->get('language') == 'bangla')
                            <h2 class="h4">{!! $single_post->description_bn !!}</h2>
                            @else
                            <h2 class="h4">{!! $single_post->description_en !!}</h2>
                            @endif
                    </div>
                    {{-- Description end --}}
                </div>
                <!-- Post Item End -->

                <!-- Advertisement Start -->
                @include('frontend.advertisement.advertisement')
                <!-- Advertisement End -->

                <!-- Post Tags Start -->
                @include('frontend.common_page.all_post_tags')

                <!-- Post Tags End -->

                <!-- Post Social Start -->
                <div class="post--social pbottom--30">
                    <span class="title"><i class="fa fa-share-alt"></i></span>

                    <!-- Social Widget Start -->
                    <div class="social--widget style--4">
                        <ul class="nav">

                            <li><a href="{{ setting('site_facebook_link') }}"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{ setting('site_twitter_link') }}"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{ setting('site_google_link') }}"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="{{ setting('site_linkedin_link') }}"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="{{ setting('site_rss_link') }}"><i class="fa fa-rss"></i></a></li>
                            <li><a href="{{ setting('site_youtube_link') }}"><i class="fa fa-youtube-play"></i></a></li>


                        </ul>
                    </div>
                    <!-- Social Widget End -->
                </div>
                <!-- Post Social End -->


                <!-- Post Related Start -->
                <div class="post--related ptop--30">
                    <!-- Post Items Title Start -->
                    <div class="post--items-title" data-ajax="tab">
                        <h2 class="h4">You Might Also Like</h2>

                        <div class="nav">

                        </div>

                    </div>
                    <!-- Post Items Title End -->

                    <!-- Post Items Start -->
                    <div class="post--items post--items-2" data-ajax-content="outer">
                        <ul class="nav row" data-ajax-content="inner">

                            @forelse ($related_posts->take(2) as $related_post)
                            <li class="col-sm-6 pbottom--30">
                                <!-- Post Item Start -->
                                <div class="post--item post--layout-1">
                                    <div class="post--img">
                                        <a href="#" class="thumb"><img src="{{ asset($related_post->post_thambnail) }}" alt=""></a>
                                        <a href="#" class="cat">Fitness</a>
                                        <a href="{{ route('trending.news') }}" class="icon"><i class="fa fa-flash"></i></a>

                                        <div class="post--info">
                                            <ul class="nav meta">
                                                <li><a href="#">Astaroth</a></li>
                                                <li><a href="#">{{ $related_post->created_at->format('d F Y') }}</a></li>
                                            </ul>

                                            <div class="title">

                                                @if(session()->get('language') == 'bangla')
                                                    <h3 class="h4"><a href="{{ route('details.post', $related_post->post_slug) }}" class="btn-link">{{ $single_post->post_title_bn }}</a></h3>
                                                    @else
                                                    <h3 class="h4"><a href="{{ route('details.post', $related_post->post_slug) }}" class="btn-link">{{ $single_post->post_title_en }}</a></h3>
                                                    @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Post Item End -->
                            </li>
                            @empty
                                <p class="text-danger">No Related Post Yet</p>
                            @endforelse


                        </ul>

                        <!-- Preloader Start -->
                        <div class="preloader bg--color-0--b" data-preloader="1">
                            <div class="preloader--inner"></div>
                        </div>
                        <!-- Preloader End -->
                    </div>
                    <!-- Post Items End -->
                </div>
                <!-- Post Related End -->

                {{-- comment section --}}
                {{-- @include('frontend.common_page.comment') --}}
                @include('frontend.common_page.disqus_comment')

            </div>
        </div>
        <!-- Main Content End -->

        <!-- Main Sidebar Start -->
        <div class="main--sidebar col-md-4 ptop--30 pbottom--30" data-sticky-content="true">
            <div class="sticky-content-inner">

                <!-- Widget Start Ad Widget >>> second_advertisement <<< -->
                @include('frontend.advertisement.second_advertisement')

                <!-- Widget End -->

                <!-- Widget Start Social Widget -->
                @include('frontend.common_page.social_widget')
                <!-- Widget End Social Widget -->

                <!-- Widget Start Subscribe Widget -->
                @include('frontend.common_page.subscribe')
                <!-- Widget End Subscribe Widget -->

                <!-- Widget Start List Widgets featured news-->
                @include('frontend.common_page.featured_news')
                <!-- Widget End -->

                <!-- Widget Start -->
                {{-- >>> third_advertisement <<< --}}
                @include('frontend.advertisement.third_advertisement')
                <!-- Widget End -->

                <!-- Widget Start >>> voting_system <<< -->
                @include('frontend.common_page.voting_system')
                <!-- Widget End -->

                <!-- Widget Start >>> 4th_advertisement <<< -->
                @include('frontend.advertisement.4th_advertisement')
                <!-- Widget End -->

                <!-- Widget Start Choice Editor -->
                @include('frontend.common_page.choice_editor')
                <!-- Widget End -->
            </div>
        </div>
        <!-- Main Sidebar End -->
    </div>
</div>


@endsection
