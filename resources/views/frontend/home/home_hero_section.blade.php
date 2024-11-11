@php
     $firtspost = App\Models\Post::orderBy('created_at','ASC')->where('status','=', 1)->take(1)->get();
     $secondpost = App\Models\Post::orderBy('created_at','ASC')->where('status','=', 1)->skip(1)->take(1)->get();
     $thirdpost = App\Models\Post::orderBy('created_at','ASC')->where('status','=', 1)->skip(2)->take(2)->get();
@endphp
<div class="main--content">
    <!-- Post Items Start -->
    <div class="post--items post--items-1 pd--30-0">
        <div class="row gutter--15">
            <div class="col-md-6">
                <!-- Post Item Start -->
                @foreach($firtspost as $post)
                <div class="post--item post--layout-1 post--title-larger">
                    <div class="post--img">
                        <a href="{{ route('details.post', $post->post_slug) }}" class="thumb"><img
                                src="{{ asset($post->post_thambnail) }}" alt=""></a>
                        <a href="#" class="cat">
                            @if(session()->get('language') == 'bangla')
                            {{$post->category->category_name_bn }}
                            @else
                            {{$post->category->category_name_en }}
                            @endif
                        </a>
                        <a href="{{ route('trending.news') }}" class="icon"><i class="fa fa-flash"></i></a>

                        <div class="post--map">
                            <p class="btn-link"><i class="fa fa-map-o"></i>Location in Google Map</p>

                            <div class="map--wrapper">
                                <div data-map-latitude="23.790546" data-map-longitude="90.375583"
                                    data-map-zoom="6" data-map-marker="[[23.790546, 90.375583]]">
                                </div>
                            </div>
                        </div>

                        <div class="post--info">
                            <ul class="nav meta">
                                <li><a href="#">Norma R. Hogan</a></li>
                                <li><a href="#">{{$post->created_at->format('d F Y')}}</a></li>
                            </ul>

                            <div class="title">
                                <h2 class="h4"><a href="{{ route('details.post', $post->post_slug) }}"
                                        class="btn-link">
                                        @if(session()->get('language') == 'bangla')
                                        {{$post->post_title_bn }}
                                        @else
                                        {{ $post->post_title_en }}
                                        @endif
                                    </a></h2>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Post Item End -->
            </div>

            <div class="col-md-6">
                <div class="row gutter--15">
                    <div class="col-sm-12 hidden-sm hidden-xs">
                        <!-- Post Item Start -->
                        <div class="post--item post--layout-1 post--title-larger">
                           @foreach($secondpost as $post)
                            <div class="post--img">
                                <a href="{{ route('details.post', $post->post_slug) }}" class="thumb"><img
                                        src="{{ asset($post->post_thambnail) }}" alt="" style="height:275px"></a>
                                <a href="#" class="cat">
                                    @if(session()->get('language') == 'bangla')
                                    {{$post->category->category_name_bn }}
                                    @else
                                    {{$post->category->category_name_en }}
                                    @endif
                                </a>
                                <a href="{{ route('hot.news')}}" class="icon"><i class="fa fa-fire"></i></a>

                                <div class="post--info">
                                    <ul class="nav meta">
                                        <li><a href="#">Balam</a></li>
                                        <li><a href="#">{{$post->created_at->format('d F Y')}}</a></li>
                                    </ul>

                                    <div class="title">
                                        <h2 class="h4">
                                            <a href="{{ route('details.post', $post->post_slug) }}"
                                                class="btn-link">
                                                @if(session()->get('language') == 'bangla')
                                        {{$post->post_title_bn }}
                                        @else
                                        {{ $post->post_title_en }}
                                        @endif
                                            </a></h2>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                        <!-- Post Item End -->
                    </div>
                    @foreach($thirdpost as $post)
                    <div class="col-xs-6 col-xss-12">
                        <!-- Post Item Start -->
                        <div class="post--item post--layout-1 post--title-large">
                            <div class="post--img">
                                <a href="{{ route('details.post', $post->post_slug) }}" class="thumb"><img
                                        src="{{ asset($post->post_thambnail) }}" alt=""></a>
                                <a href="#" class="cat">
                                    @if(session()->get('language') == 'bangla')
                                    {{$post->category->category_name_bn }}
                                    @else
                                    {{$post->category->category_name_en }}
                                    @endif
                                </a>
                                <a href="{{ route('trending.news') }}" class="icon"><i class="fa fa-flash"></i></a>

                                <div class="post--info">
                                    <ul class="nav meta">
                                        <li><a href="#">Corey I. Dean</a></li>
                                        <li><a href="#">{{$post->created_at->format('d F Y')}}</a></li>
                                    </ul>

                                    <div class="title">
                                        <h2 class="h4"><a href="{{ route('details.post', $post->post_slug) }}"
                                                class="btn-link">
                                                @if(session()->get('language') == 'bangla')
                                                {{$post->post_title_bn }}
                                                @else
                                                {{ $post->post_title_en }}
                                                @endif
                                            </a></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Post Item End -->
                    </div>

                    @endforeach


                </div>
            </div>
        </div>
    </div>
    <!-- Post Items End -->
</div>
