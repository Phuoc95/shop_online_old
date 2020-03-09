<!DOCTYPE html>
<html  lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ShopOnline</title>
  <link rel="stylesheet" href="">

  <link href="{{ url('user/metro/css/metro-responsive.css') }}" rel="stylesheet">
  <link href="{{ url('user/metro/css/clock.css') }}" rel="stylesheet">
  <link href="{{ url('user/metro/css/docs.css') }}" rel="stylesheet">
  <link href="{{ url('user/metro/css/metro.css') }}" rel="stylesheet">
  <link href="{{ url('user/metro/css/metro-colors.css') }}" rel="stylesheet">
  <link href="{{ url('user/metro/css/metro-icons.css') }}" rel="stylesheet">
  <link href="{{ url('user/metro/css/metro-responsive.css') }}" rel="stylesheet">
  <link href="{{ url('user/metro/css/metro-rtl.css') }}" rel="stylesheet">
  <link href="{{ url('user/metro/css/metro-schemes.css') }}" rel="stylesheet"> 
  <link href="{!!url('user/css/cloud-zoom.css') !!}" rel="stylesheet"> 

  <link href="{{ url('css/style.css') }}" rel="stylesheet">

  <script  src="{!! url('user/js/cloud-zoom.1.0.2.js')!!}"></script>

  <script src="{{ url('user/metro/js/docs.js') }}"></script>
  <script src="{{ url('user/metro/js/ga.js') }}"></script>
  <script src="{{ url('user/metro/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ url('user/metro/js/jquery-2.1.3.min.js') }}"></script>
  <script src="{{ url('user/metro/js/metro.js') }}"></script>
  <script src="{{ url('user/metro/js/select2.min.js') }}"></script>  
  <script src="{{ url('user/metro/js/prettify/run_prettify.js') }}"></script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

  <link  href=" {!!url('user/css/jquery-ui.css') !!}" rel="stylesheet">
  {{--  <script src="{!!url('user/js/jquery-1.12.0.min.js') !!}"></script> Tren da co VER  jquery-2.1.3.--}}
  <script src="{!!url('user/js/jquery-ui.js') !!}"></script> 
  
  <script src="{{ url('admin/metro/js/jquery.dataTables.min.js') }}"></script>

  <script type="text/javascript">
    $(document).ready(function($) {
      $('#search2').autocomplete({
        source:"{!!URL::to('autocomplete')!!}" , 
        autofocus:true,
        /*s select:function(event,ui){
         $("#tyle").val(ui.item.tyle);
         $("#tyle2").val(ui.item.tyle2);*/
       }
     });
    });
  </script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $(".js-example-basic-single").select2();
    });
  </script>


  
  <script type="text/javascript">
    $(".js-data-example-ajax").select2({
      ajax: {
        url: "https://api.github.com/search/repositories",
        dataType: 'json',
        delay: 250,
        data: function (params) {
          return {
        q: params.term, // search term
        page: params.page
      };
    },
    processResults: function (data, params) {

      // scrolling can be used
      params.page = params.page || 1;

      return {
        results: data.items,
        pagination: {
          more: (params.page * 30) < data.total_count
        }
      };
    },
    cache: true
  },
  escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
  minimumInputLength: 1,
  templateResult: formatRepo, // omitted for brevity, see the source of this page
  templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
});
</script>



<style type="text/css" media="screen">
  .lblInfo{
    font-weight: bold;
  }
</style>


</head>
<body>

 <div  class="row cells12" style="margin-bottom: 30px">
  <div class="cell colspan8 offset2">
    <div class="frame " id="frame_ed">        
      <div class="frame " id="frame_ed">        
        <div class="frame " id="frame_ed">        
          <div class="login-form padding20 block-shadow bg-white" style="margin:5px 35%;max-width: 700px">

           <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="Bduyphuoctk@gmail.com">
            <input type="hidden" name="lc" value="US">
            <input type="hidden" name="item_name" value="TestVIP">
            <input type="hidden" name="button_subtype" value="services">
            <input type="hidden" name="no_note" value="0">
            <input type="hidden" name="currency_code" value="USD">
            <input type="hidden" name="tax_rate" value="0.000">
            <input type="hidden" name="shipping" value="0.00">
            <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
            <div class="input-control text full-size" data-role="input" style="margin-bottom: -20px">
              <label style="font-weight: bold;font-size: 20px;margin:5px auto;position: relative;left: 25%">THANH TOÁN NGAY </label>                
            </div>
            
            <input type="hidden" name="currency_code" value="USD">     
            @if(Session::has('Tamount2')&& Session::has('transaction_id'))
            <?php 
            $Tamount2 = Session::get('Tamount2')/23000;

            $transaction_id  = Session::get('transaction_id');          
            ?> 
            @else 
            <?php 
            $Tamount2 =$Tamount2/23000; 
            $transaction_id  =$transaction_id; ?>


            @endif

            <input type="hidden" name="amount" value="{!! $Tamount2!!}">
            <input type="hidden" name="option_index" value="0">
            {{-- <input type="hidden" name="return" value="http://localhost:8000/paypal/success.php"> --}}
            <input type="hidden" name="return" value="http://localhost:8000/paid/{!! $transaction_id!!}">
            <input type="hidden" name="cancel_return" value="http://localhost:8000/fail/{!! $transaction_id!!}">
            <input type="hidden" name="page_style" value="TestLocal">

            <input type="image" src="{!!asset('images/PayPal.jpg')!!}" height="150px" width="95%" border="0" name="submit"
             alt="PayPal - The safer, easier way to pay online!"
            style="min-height: 60px">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">            
          </form>
        </div>

      </div>
    </div>

  </div>

</div>

</div>


<script src="{!!url('user/js/myscript.js') !!}"></script> 
</body>
</html>



































