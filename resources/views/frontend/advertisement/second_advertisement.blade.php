@php
   $advertisement = App\Models\Advertisement::where('status',1)->where('box_size',1)->orderBy('id','ASC')->skip(2)->first();
@endphp
<div class="widget">
    <!-- Ad Widget Start -->
    <div class="ad--widget">
        <a href="#">
            <img src="{{ $advertisement->url??'null'}}" alt="">
        </a>
    </div>
    <!-- Ad Widget End Ad Widget-->
</div>
