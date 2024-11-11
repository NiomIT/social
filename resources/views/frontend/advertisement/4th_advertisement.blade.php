@php
   $advertisement_first = App\Models\Advertisement::where('status',1)->where('box_size',1)->orderBy('id','ASC')->first();

   $advertisement_second = App\Models\Advertisement::where('status',1)->where('box_size',1)->orderBy('id','ASC')->skip(1)->first();
@endphp
<div class="widget">
    <!-- Ad Widget Start -->
    <div class="ad--widget">
        <div class="row">
            <div class="col-sm-6">
                <a href="#">
                    <img src="{{ $advertisement_first->url??'null'}}" alt="">
                </a>
            </div>

            <div class="col-sm-6">
                <a href="#">
                    <img src="{{ $advertisement_second->url??'null'}}" alt="">
                </a>
            </div>
        </div>
    </div>
    <!-- Ad Widget End -->
</div>
