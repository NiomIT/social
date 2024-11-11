@php
   $advertisement = App\Models\Advertisement::where('status',1)->where('non_box_size',1)->orderBy('id','ASC')->skip(1)->first();
@endphp
<div class="ad--space pd--30-0">
    <a href="#">
        <img src="{{ $advertisement->url??'null'}}" alt="" class="center-block">
    </a>
</div>
