@php
$posts = App\Models\Post::where('status',1)->orderBy('id','DESC')->get();
$update = App\Models\Post::latest()->first();

@endphp
<div class="news--ticker">
    <div class="container">
        <div class="title">
            <h2>News Updates</h2>
            @if(session()->get('language') == 'bangla') 
            <span>সর্বশেষ</span>
            @else 
            <span>(Update {{ $update->created_at->diffForHumans()}})</span>
            @endif
        </div>

        <div class="news-updates--list" data-marquee="true">
            <ul class="nav">
                @foreach($posts as $post)
                <li>
                    <h3 class="h3">
                        <a href="{{ route('details.post', $post->post_slug) }}">
                  @if(session()->get('language') == 'bangla') 
                  {{$post->post_title_bn }}
                  @else 
                  {{ $post->post_title_en }} 
                  @endif
                        </a>
                    </h3>
                </li>
               @endforeach
            </ul>
        </div>
    </div>
</div>
