@extends('frontend.master')
@section('main')

    <!-- Main Breadcrumb Start -->
    <div class="main--breadcrumb">
        <div class="container">
            @if (session()->get('language') == 'bangla')
                <ul class="breadcrumb">
                    <li><a href="/" class="btn-link"><i class="fa fm fa-home"></i>হোম </a></li>
                    <li><a href="{{ route('trending.news') }}" class="btn-link"><i class="fa fm fa-home"></i>ট্রেন্ডিং নিউজ </a></li>

                </ul>
            @else
                <ul class="breadcrumb">
                    <li><a href="/" class="btn-link"><i class="fa fm fa-home"></i>Home</a></li>
                    <li><a href="{{ route('trending.news') }}" class="btn-link"><i class="fa fm fa-home"></i>Trending News</a></li>
                </ul>
            @endif
        </div>
    </div>
    <!-- Main Breadcrumb End -->


    <div class="container">
        <div class="row">
            <!-- Main Content Start -->
            <div class="main--content col-md-8" data-sticky-content="true">


                {{-- +++++++=======+++++++++ --}}
                <div class="sticky-content-inner">
                    <!-- Post Items Start -->
                    <div class="post--items post--items-2 pd--30-0">
                        <ul class="nav row AdjustRow">
                            @forelse ($trending_news as $post)
                                <li class="col-md-6 col-sm-12 col-xs-6 col-xss-12">
                                    <!-- Post Item Start -->
                                    <div class="post--item post--layout-1 post--title-large">
                                        <div class="post--img">
                                            <a href="" class="thumb"><img
                                                    src="{{ asset($post->post_thambnail) }}" alt=""></a>

                                                    @if(session()->get('language') == 'bangla')

                                                        @if ($post->subsubcategory_id)
                                                             <a href="{{ route('subsubcategory.post', $post->subsubcategory->slug) }}" class="cat">{{ $post->subsubcategory->sub_subcategory_name_bn }}</a>
                                                        @elseif($post->subcategory_id)
                                                            <a href="{{ route('subcategory.post', $post->subcategory->slug) }}" class="cat">{{ $post->subcategory->subcategory_name_bn }}</a>
                                                        @else
                                                            <a href="{{ route('category.post', $post->category->slug) }}" class="cat">{{ $post->category->category_name_bn }}</a>
                                                        @endif

                                                    @else

                                                        @if ($post->subsubcategory_id)
                                                             <a href="{{ route('subsubcategory.post', $post->subsubcategory->slug) }}" class="cat">{{ $post->subsubcategory->sub_subcategory_name_en }}</a>
                                                        @elseif($post->subcategory_id)
                                                            <a href="{{ route('subcategory.post', $post->subcategory->slug) }}" class="cat">{{ $post->subcategory->subcategory_name_en }}</a>
                                                        @else
                                                            <a href="{{ route('category.post', $post->category->slug) }}" class="cat">{{ $post->category->category_name_en }}</a>
                                                        @endif
                                                    @endif

                                            <div class="post--info">
                                                <ul class="nav meta">
                                                    <li><a href="{{ route('userWise.post', $post->user->id) }}">{{ $post->user->name }}</a></li>
                                                    <li><a href="#">{{ $post->created_at->format('d F Y') }}</a></li>
                                                </ul>

                                                <div class="title">


                                                    @if (session()->get('language') == 'bangla')
                                                        <h2 class="h4"><a
                                                                href="{{ route('details.post', $post->post_slug) }}"
                                                                class="btn-link">{{ $post->post_title_bn }}</a></h2>
                                                    @else
                                                        <h2 class="h4"><a
                                                                href="{{ route('details.post', $post->post_slug) }}"
                                                                class="btn-link">{{ $post->post_title_en }}</a></h2>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Divider Start -->
                                        <hr class="divider divider--25">
                                        <!-- Divider End -->


                                    </div>
                                    <!-- Post Item End -->
                                </li>

                            @empty
                                <p class="text-danger">No Category Post Yet</p>
                            @endforelse

                        </ul>
                    </div>
                    <!-- Post Items End -->




                    <!-- Pagination Start -->
                    <div class="pagination--wrapper clearfix bdtop--1 bd--color-2 ptop--60 pbottom--30">
                        <p class="pagination-hint float--left"></p>

                        <ul class="pagination float--right">
                            {{ $trending_news->links('pagination::bootstrap-4') }}

                        </ul>
                    </div>


                    <!-- Pagination End -->
                </div>
                {{-- +++++++=======+++++++++ --}}
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

                    <!-- Widget Start List Widgets trending news-->
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
