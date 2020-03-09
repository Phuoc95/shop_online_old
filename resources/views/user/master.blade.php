<!DOCTYPE html>
<html  lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Online Stores</title>
	<link rel="icon" href="{!! url('images/icon2.jpg')!!}" />

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

	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

	{{-- load anh fancybox --}}
	@yield('fanc')
	<script type="text/javascript" src="{{ url('fancybox/jquery.mousewheel-3.0.2.pack.js') }}"></script>
	<script type="text/javascript" src="{{ url('fancybox/jquery.fancybox-1.3.1.js') }}"></script>
	<link rel="stylesheet" type="text/css" href="{{ url('fancybox/jquery.fancybox-1.3.1.css') }}" media="screen" />
	{{--   <link rel="stylesheet" href="{{ url('fancybox/stylefan.css') }}" /> --}}

	<script>
  // kéo xuống khoảng cách 500px thì xuất hiện nút Top-up
  var offset = 500;
  // thời gian di trượt 
  var duration =500;
  $(function(){
  	$(window).scroll(function () {
  		if ($(this).scrollTop() > offset)
  			$('#top-up').fadeIn(duration);else
  		$('#top-up').fadeOut(duration);
  	});
  	$('#top-up').click(function () {
  		$('body,html').animate({scrollTop: 0}, duration);
  	});
  });
</script>

<script type="text/javascript">
	$(document).ready(function() {
      /*
      *   Examples - images
      */

      $("a#example1").fancybox({
      	'titleShow'   : false
      });

      $("a#example2").fancybox({
      	'titleShow'   : false,
      	'transitionIn'  : 'elastic',
      	'transitionOut' : 'elastic'
      });

      $("a#example3").fancybox({
      	'titleShow'   : false,
      	'transitionIn'  : 'none',
      	'transitionOut' : 'none'
      });

      $("a#example4").fancybox();

      $("a#example5").fancybox({
      	'titlePosition' : 'inside'
      });

      $("a#example6").fancybox({
      	'titlePosition' : 'over'
      });

      $("a[rel=example_group]").fancybox({
      	'transitionIn'    : 'none',
      	'transitionOut'   : 'none',
      	'titlePosition'   : 'over',
      	'titleFormat'   : function(title, currentArray, currentIndex, currentOpts) {
      		return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
      	}
      });

      /*
      *   Examples - various
      */

      $("#various1").fancybox({
      	'titlePosition'   : 'inside',
      	'transitionIn'    : 'none',
      	'transitionOut'   : 'none'
      });

      $("#various2").fancybox();

      $("#various3").fancybox({
      	'width'       : '50%',
      	'height'      : '50%',
      	'autoScale'     : false,
      	'transitionIn'    : 'none',
      	'transitionOut'   : 'none',
      	'type'        : 'iframe'
      });

      $("#various4").fancybox({
      	'padding'     : 0,
      	'autoScale'     : false,
      	'transitionIn'    : 'none',
      	'transitionOut'   : 'none'
      });
  });
</script>

<style type="text/css" media="screen">
	#fancybox-wrap{   
		box-sizing: content-box;
	}
	div #fancybox-title-over{
		display: none;
	}
</style>

</script>
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
      // parse the results into the format expected by Select2
      // since we are using custom formatting functions we do not need to
      // alter the remote JSON data, except to indicate that infinite
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

{{-- Nhung facebook --}}
<div id="fb-root"></div>
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

{{-- Cuon len --}}
<div title="Về đầu trang" onmouseover="this.style.color='#590059'" 
id="top-up"          onmouseout="this.style.color='#004993'">
<span class="mif-file-upload"></span> 
</div>
<style>
	#top-up {
		background:none;
		font-size: 3em;   
		cursor: pointer;
		position: fixed;
		z-index: 9999;
		color:#004993;
		bottom: 10px;
		right: 15px;
		display: none;
	}
</style>



<style type="text/css" media="screen">
	.lblInfo{
		font-weight: bold;
	}
</style>


</head>
<body>
	<!-- Header Start -->
	<div id="header"> 

		@include('user.blocks.nav')
		<div id="slider">    
			@yield('slider')
		</div> 
		<div id="otherdetail" style="margin-bottom: -8px">  
			@yield('otherdetail')
		</div> 
		
	</div>
	<!-- Header End -->

	<div id="content">

		@yield('content')

	</div>  <!--content End -->

	<div id="footer">
		@include('user.blocks.footer')
	</div>  <!--footer End -->

	<script src="{!!url('user/js/myscript.js') !!}"></script> {{-- Moi them vao de xac nhan xoa SP 21h 13/3 --}}
</body>
</html>