@php
   $advertisement = App\Models\Advertisement::where('status',1)->where('box_size',1)->orderBy('id','ASC')->skip(3)->first();
@endphp
<div class="widget">
    <div class="widget--title">
        <h2 class="h4">Advertisement</h2>
        <i class="icon fa fa-bullhorn"></i>
    </div>

    <!-- Ad Widget Start -->
    <div class="ad--widget">
        <a href="#">
            <img src="{{ $advertisement->url??'null'}}" alt="">
        </a>
    </div>
    <!-- Ad Widget End -->
</div>
