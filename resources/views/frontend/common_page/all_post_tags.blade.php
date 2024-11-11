@php
    $tags_en = App\Models\Post::groupBy('post_tag_en')->select('post_tag_en')->get();

    $tags_bn = App\Models\Post::groupBy('post_tag_bn')->select('post_tag_bn')->get();
@endphp

<div class="post--tags">
    <ul class="nav">
        <li><span><i class="fa fa-tags"></i></span></li>

        @if(session()->get('language') == 'bangla')
            @foreach ($tags_bn as $tag_bn)
                @php
                    $tagList_bn = explode(',', $tag_bn->post_tag_bn);
                @endphp
                @foreach ($tagList_bn as $tag)
                    <li><a href="{{ url('post/tag/'.$tag) }}">{{ $tag }}</a></li>
                @endforeach
            @endforeach
        @else
            @foreach ($tags_en as $tag_en)
                @php
                    $tagList_en = explode(',', $tag_en->post_tag_en);
                @endphp
                @foreach ($tagList_en as $tag)
                    <li><a href="{{ url('post/tag/'.$tag) }}">{{ $tag }}</a></li>
                @endforeach
            @endforeach
        @endif

    </ul>
</div>

        @if(session()->get('language') == 'bangla')
            bn
        @else
            en
        @endif



