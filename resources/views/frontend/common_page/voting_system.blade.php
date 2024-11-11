@php
    $poll = App\Models\Poll::first();
    
@endphp

<div class="widget">
    <div class="widget--title" data-ajax="tab">
        <h2 class="h4">Voting Poll (Checkbox)</h2>

       
    </div>

    <!-- Poll Widget Start -->
    <div class="poll-widget" data-ajax-content="outer">
        <ul class="nav" data-ajax-content="inner">
            <li class="title">
                <h3 class="h4">{{ $poll->title??''}}</h3>
            </li>       
            <li class="options">
            @auth
                @if(!$poll->votes->contains('user_id', auth()->id()))
                <form action="{{ route('polls.vote', $poll->id) }}" method="POST">
                    @csrf
        
                @foreach ($poll->options as $option)
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="option" id="option"  value="{{$option->id}}">
                        <span>{{$option->option_text}}</span>
                    </label>
                   <p>{{ $option->votes->count() }} <span style="width:{{ $option->votes->count() }}%;"></span></p> 
                </div>
                @endforeach
                <input type="submit" class="btn btn-primary" value="Vote" />
                  </form>
                  @else
                  @foreach ($poll->options as $option)
                  <div class="checkbox">
                      <label>
                          <input type="checkbox" name="option" id="option"  value="{{$option->id}}">
                          <span>{{$option->option_text}}</span>
                      </label>
                     <p>{{ $option->votes->count() }} <span style="width:{{ $option->votes->count() }}%;"></span></p> 
                  </div>
                  @endforeach

                  <p style="color:#FD6524;text-align:center;margin-top:25px;">You have already voted on this poll.</p>
                  @endif
          @endauth

          @if (auth()->check())
        
          @else
          @if(!$poll->votes->contains('user_id', auth()->id()))
          <form action="{{ route('polls.vote', $poll->id) }}" method="POST">
              @csrf
  
          @foreach ($poll->options as $option)
          <div class="checkbox">
              <label>
                  <input type="checkbox" name="option" id="option"  value="{{$option->id}}">
                  <span>{{$option->option_text}}</span>
              </label>
             <p>{{ $option->votes->count() }} <span style="width:{{ $option->votes->count() }}%;"></span></p> 
          </div>
          @endforeach
          <input type="submit" class="btn btn-primary" value="Vote" />
            </form>
            @else
            @foreach ($poll->options as $option)
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="option" id="option"  value="{{$option->id}}">
                    <span>{{$option->option_text}}</span>
                </label>
               <p>{{ $option->votes->count() }} <span style="width:{{ $option->votes->count() }}%;"></span></p> 
            </div>
            @endforeach

            <p style="color:#FD6524;text-align:center;margin-top:25px;">You have already voted on this poll.</p>
            @endif
          @endif
          
            </li>
          </ul>

   
    <!-- Poll Widget End -->
</div>
