<div class="grid">
  <row class="row  ">

    <div id="car_m_3" class="carousel " data-role="carousel" data-height="600" data-direction="right"     data-controls="true" data-markers="flase" data-auto="true"
    data-control-next="<span class='mif-chevron-right'></span>" data-control-prev="<span class='mif-chevron-left'></span>"   >

    <?php 
    $slide = DB::table('slides')->skip(0)->take(3)->get();
    $stt=1;
    ?> 
    @foreach($slide as $item)  
    <div class="slide"><img src="{!! asset('images/slide/'.$item->image )!!}"
     data-role="fitImage" data-format="fill"></div>  
     @endforeach 

     <div id="car_m_3_thumbs" class="padding30 align-center">
       @foreach($slide as $item)
       <div class="thumb" data-index="{!! $stt++ !!}">
       <img src="{!! asset('images/slide/'.$item->image)!!}" data-role="fitImage" data-format="fill"></div>
         @endforeach 
       </div>
       <script>
        $(function(){
          var car_m_3 = $('#car_m_3').data('carousel');
          var thumbs = $('#car_m_3_thumbs > .thumb');
          $.each(thumbs, function(){
            var thumb = $(this),  index = thumb.data('index') - 1;
            thumb.on('click', function(){
              car_m_3.slideTo(index);
            });
          });
        });
      </script>

    </div>
  </row>
</div>
