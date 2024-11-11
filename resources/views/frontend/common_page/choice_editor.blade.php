@php
$trending_news = App\Models\Post::where('status', 1)
->where('trending_news', 1)
->orderBy('id', 'DESC')
->limit(4)
->get();
@endphp

<div class="widget">
    <div class="widget--title" data-ajax="tab">
        <h2 class="h4">Editors Choice</h2>

       
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
</div>
