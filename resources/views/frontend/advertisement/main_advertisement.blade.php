@php
   $advertisement = App\Models\Advertisement::where('status',1)->where('non_box_size',1)->orderBy('id','ASC')->first();
@endphp
<div class="col-md-12 ptop--30 pbottom--30">
    <!-- Advertisement Start -->
    <div class="ad--space">
       <a href="#">
       <img src{{ $advertisement->url??'null'}}" alt=""
          class="center-block">
       </a>
    </div>
    <!-- Advertisement End -->
 </div>