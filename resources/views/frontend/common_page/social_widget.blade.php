@php
use Carbon\Carbon;
$item = App\Models\Event::first();
@endphp

<style>
.card__photo {
  width: 100%;
  height:200px;
  /* filter: grayscale(100%); */
}

.card__container {
  background: #c7bfbf;
  width: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 1em;
  box-sizing: border-box;
}

.card__title {
  font-family: "Poppins", sans-serif;
  font-weight: regular;
  font-size: 37px;
  color: #405CD2;
  letter-spacing: -1.06px;
  margin: 0 0.4em 0.4em 0;
}

.card__time,
.card__location {
  font-family: "IBM Plex Mono", sans-serif;
  font-weight: regular;
  font-size: 14px;
  color: #535353;
  margin: 0.18em;
}

.card__location {
  text-decoration-color: #EB0EC7;
  transition: all 250ms ease;
  max-width: 13.3em;
}

.card__location:hover {
  background-color: rgba(#EB0EC7, 0.2);
  text-decoration-color: rgba(#EB0EC7, 0.2);
}

.card__buttons {
  display: flex;
  align-items: center;
  width: 100%;
  margin: 1.5em 0 0.5em 0;
  flex-direction: row;
}

.card__btn {
  font-family: "IBM Plex Mono", sans-serif;
  font-weight: regular;
  font-size: 15px;
  text-transform: uppercase;
  text-decoration: none;
  letter-spacing: 1px;
  text-align: center;
  display: block;
  flex: 1 1 100%;
  color: #fff;
  padding: 1em;
}

.card__btn:hover {
  background-image: linear-gradient(to right, #1897E1, #3022AD);
  background-size: 150% 150%;
  transition: all 0.4s ease;
}



.card__buttons .btn {
  font-family: "IBM Plex Mono", sans-serif;
  font-weight: regular;
  font-size: 15px;
  text-transform: uppercase;
  text-decoration: none;
  letter-spacing: 1px;
  text-align: center;
  display: block;
  flex: 1 1 100%;
  color: #fff;
  padding: 1em;
  &:hover {
    -webkit-animation: gradient 1.3s ease infinite;
    -moz-animation: gradient 1.3s ease infinite;
    animation: gradient 1.3s ease infinite;
  }

  &:hover i{
    -webkit-animation: levitate 1.3s ease infinite;
    -moz-animation: levitate 1.3s ease infinite;
    animation: levitate 1.3s ease infinite;
  }
}
.card__buttons .btn.primary {
  position: relative;
  background-image: linear-gradient(to right, #1897E1, #3023AE);
  background-size: 150% 150%;
  transition: all 0.4s ease;
}
.card__buttons .btn.secondary {
  position: relative;
  background-image: linear-gradient(to right, #23A437, #1daf33);
  background-size: 150% 150%;
  transition: all 0.4s ease;
}

</style>

<div class="widget">
    <div class="widget--title">
        <h2 class="h4">Our Event Meeting</h2>
        <i class="icon fa fa-share-alt"></i>
    </div>

    <!-- Social Widget Start -->
    @if(Carbon::parse($item->start_time)->isFuture())
    <div class="social--widget style--1">
        <div class="card">
            <div class="card__filter">
              <img class="card__photo" src="{{ asset($item->photo) }}" alt="A man in colorful clothing with the sun behind him on a beach.">
            </div>
            <div class="card__container text-center">
                <h2 style="color:white">{{$item->event_topic}}</h2>
            
                <p style="color:rgb(153, 135, 135)">Present By : {{ $item->presenter_name}}</p>
                <time style="color:white" id="countdown"> 
                </time>
            </div>
          </div>
          
 </div>
    @else
    @if(Carbon::parse($item->end_time)->isFuture())
    <div class="social--widget style--1">
        <div class="card">
            <div class="card__filter">
              <img class="card__photo" src="{{ asset($item->photo) }}" alt="A man in colorful clothing with the sun behind him on a beach.">
            </div>
            <div class="card__container text-center" >
              <h2 style="color:white">{{$item->event_topic}}</h2>
             
              <p style="color:rgb(153, 135, 135)">Present By : {{ $item->presenter_name}}</p>
         
              <div >
                <a href="{{ $item->meeting_link}}" class="btn-sm btn-success">
                  Join Now
                  
                </a>
              </div>
         
            </div>
          </div>
          
 </div>
    @else
    <div class="social--widget style--1">
        <div class="card">
            <div class="card__filter">
              <img class="card__photo" src="{{ asset($item->photo) }}" alt="A man in colorful clothing with the sun behind him on a beach.">
            </div>
            <div class="card__container text-center" >
              <h2 style="color:white">{{$item->event_topic}}</h2>
             
              <p style="color:rgb(153, 135, 135)">Present By : {{ $item->presenter_name}}</p>
         
             <div>
                 
                <span class="badge rounded-pill bg-danger" style="background-color: red;">Meeting Expire </span>
             </div>
         
            </div>
          </div>
          
 </div>
    @endif
    @endif
    <!-- Social Widget End -->
</div>


