@php
    $hot_news = App\Models\Post::where('status', 1)
        ->where('hot_news', 1)
        ->orderBy('id', 'DESC')
        ->limit(4)
        ->get();
    $hot_news_desc = App\Models\Post::where('status', 1)
        ->where('hot_news', 1)
        ->orderBy('id', 'ASC')
        ->limit(4)
        ->get();
    $trending_news = App\Models\Post::where('status', 1)
        ->where('trending_news', 1)
        ->orderBy('id', 'DESC')
        ->limit(4)
        ->get();
@endphp
<div class="widget">
    <div class="widget--title">
        <h2 class="#">Featured News</h2>
        <i class="icon fa fa-newspaper-o"></i>
    </div>
    <!-- List Widgets Start -->
    <div class="list--widget list--widget-1">
        <div class="list--widget-nav" data-ajax="tab">
            <ul class="nav nav-justified">
                <li class="active">
                    <a href="#option1" data-toggle="tab">Hot News</a>
                </li>
                <li>
                    <a href="#option2" data-toggle="tab">Trendy News</a>
                </li>
                <li>
                    <a href="#option3" data-toggle="tab">Most Watched</a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active post--items post--items-3" id="option1">
                <ul class="nav" data-ajax-content="inner">
                    @foreach ($hot_news as $post)
                        <li>
                            <!-- Post Item Start -->
                            <div class="post--item post--layout-3">
                                <div class="post--img">
                                    <a href="{{ route('details.post', $post->post_slug) }}" class="thumb"><img
                                            src="{{ asset($post->post_thambnail) }}" alt=""></a>
                                    <div class="post--info">
                                        <ul class="nav meta">

                                            <li>

                                                @if (session()->get('language') == 'bangla')
                                                    @if ($post->subsubcategory_id)
                                                        <a href="{{ route('subsubcategory.post', $post->subsubcategory->slug) }}"
                                                            >{{ $post->subsubcategory->sub_subcategory_name_bn }}</a>
                                                    @elseif($post->subcategory_id)
                                                        <a href="{{ route('subcategory.post', $post->subcategory->slug) }}"
                                                            >{{ $post->subcategory->subcategory_name_bn }}</a>
                                                    @else
                                                        <a href="{{ route('category.post', $post->category->slug) }}"
                                                            >{{ $post->category->category_name_bn }}</a>
                                                    @endif
                                                @else
                                                    @if ($post->subsubcategory_id)
                                                        <a href="{{ route('subsubcategory.post', $post->subsubcategory->slug) }}"
                                                            >{{ $post->subsubcategory->sub_subcategory_name_en }}</a>
                                                    @elseif($post->subcategory_id)
                                                        <a href="{{ route('subcategory.post', $post->subcategory->slug) }}"
                                                            >{{ $post->subcategory->subcategory_name_en }}</a>
                                                    @else
                                                        <a href="{{ route('category.post', $post->category->slug) }}"
                                                            >{{ $post->category->category_name_en }}</a>
                                                    @endif
                                                @endif

                                            </li>

                                            <li><a href="#">{{ $post->created_at->format('d F Y') }}</a></li>
                                        </ul>
                                        <div class="title">
                                            <h3 class="h4"><a href="{{ route('details.post', $post->post_slug) }}"
                                                    class="btn-link">
                                                    @if (session()->get('language') == 'bangla')
                                                        {{ $post->post_title_bn }}
                                                    @else
                                                        {{ $post->post_title_en }}
                                                    @endif
                                                </a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Post Item End -->
                        </li>
                    @endforeach

                </ul>
            </div>
            <div class="tab-pane post--items post--items-3" id="option2">
                <ul class="nav" data-ajax-content="inner">
                    @foreach ($trending_news as $post)
                        <li>
                            <!-- Post Item Start -->
                            <div class="post--item post--layout-3">
                                <div class="post--img">
                                    <a href="{{ route('details.post', $post->post_slug) }}" class="thumb"><img
                                            src="{{ asset($post->post_thambnail) }}" alt=""></a>
                                    <div class="post--info">
                                        <ul class="nav meta">

                                            <li>

                                                @if (session()->get('language') == 'bangla')
                                                    @if ($post->subsubcategory_id)
                                                        <a href="{{ route('subsubcategory.post', $post->subsubcategory->slug) }}"
                                                            >{{ $post->subsubcategory->sub_subcategory_name_bn }}</a>
                                                    @elseif($post->subcategory_id)
                                                        <a href="{{ route('subcategory.post', $post->subcategory->slug) }}"
                                                            >{{ $post->subcategory->subcategory_name_bn }}</a>
                                                    @else
                                                        <a href="{{ route('category.post', $post->category->slug) }}"
                                                            >{{ $post->category->category_name_bn }}</a>
                                                    @endif
                                                @else
                                                    @if ($post->subsubcategory_id)
                                                        <a href="{{ route('subsubcategory.post', $post->subsubcategory->slug) }}"
                                                            >{{ $post->subsubcategory->sub_subcategory_name_en }}</a>
                                                    @elseif($post->subcategory_id)
                                                        <a href="{{ route('subcategory.post', $post->subcategory->slug) }}"
                                                            >{{ $post->subcategory->subcategory_name_en }}</a>
                                                    @else
                                                        <a href="{{ route('category.post', $post->category->slug) }}"
                                                            >{{ $post->category->category_name_en }}</a>
                                                    @endif
                                                @endif

                                            </li>

                                            <li><a href="#">{{ $post->created_at->format('d F Y') }}</a></li>
                                        </ul>
                                        <div class="title">
                                            <h3 class="h4"><a href="{{ route('details.post', $post->post_slug) }}"
                                                    class="btn-link">
                                                    @if (session()->get('language') == 'bangla')
                                                        {{ $post->post_title_bn }}
                                                    @else
                                                        {{ $post->post_title_en }}
                                                    @endif
                                                </a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Post Item End -->
                        </li>
                    @endforeach

                </ul>
            </div>
            <div class="tab-pane post--items post--items-3" id="option3">
                <ul class="nav" data-ajax-content="inner">
                    @foreach ($hot_news_desc as $post)
                        <li>
                            <!-- Post Item Start -->
                            <div class="post--item post--layout-3">
                                <div class="post--img">
                                    <a href="{{ route('details.post', $post->post_slug) }}" class="thumb"><img
                                            src="{{ asset($post->post_thambnail) }}" alt=""></a>
                                    <div class="post--info">
                                        <ul class="nav meta">

                                            <li>

                                                @if (session()->get('language') == 'bangla')
                                                    @if ($post->subsubcategory_id)
                                                        <a href="{{ route('subsubcategory.post', $post->subsubcategory->slug) }}"
                                                            >{{ $post->subsubcategory->sub_subcategory_name_bn }}</a>
                                                    @elseif($post->subcategory_id)
                                                        <a href="{{ route('subcategory.post', $post->subcategory->slug) }}"
                                                            >{{ $post->subcategory->subcategory_name_bn }}</a>
                                                    @else
                                                        <a href="{{ route('category.post', $post->category->slug) }}"
                                                            >{{ $post->category->category_name_bn }}</a>
                                                    @endif
                                                @else
                                                    @if ($post->subsubcategory_id)
                                                        <a href="{{ route('subsubcategory.post', $post->subsubcategory->slug) }}"
                                                            >{{ $post->subsubcategory->sub_subcategory_name_en }}</a>
                                                    @elseif($post->subcategory_id)
                                                        <a href="{{ route('subcategory.post', $post->subcategory->slug) }}"
                                                            >{{ $post->subcategory->subcategory_name_en }}</a>
                                                    @else
                                                        <a href="{{ route('category.post', $post->category->slug) }}"
                                                            >{{ $post->category->category_name_en }}</a>
                                                    @endif
                                                @endif

                                            </li>

                                            <li><a href="#">{{ $post->created_at->format('d F Y') }}</a></li>
                                        </ul>
                                        <div class="title">
                                            <h3 class="h4"><a href="{{ route('details.post', $post->post_slug) }}"
                                                    class="btn-link">
                                                    @if (session()->get('language') == 'bangla')
                                                        {{ $post->post_title_bn }}
                                                    @else
                                                        {{ $post->post_title_en }}
                                                    @endif
                                                </a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Post Item End -->
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
    <!-- List Widgets End -->
</div>
