@extends('login.master')
@section('content')

<body onload="init();" class=" " dir="">
	<div id="user-body">

		<div class="login-form padding20 fg-white ">
			<form  action="" method="POST">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}">
				<h1 class="text-light text-shadow">Đăng nhập</h1>
				<hr class="bg-white"/>
				<br />
				<div class="input-control text full-size" data-role="input">
					<label for="user_login">Tên đăng nhập :</label>
					<input type="text" name="Username" id="user_login">
					<button class="button helper-button clear"><span class="mif-cross"></span></button>
				</div>
				<br />
				<br />
				<div class="input-control password full-size" data-role="input">
					<label for="user_password">Mật khẩu:</label>
					<input type="password" name="Password" id="user_password">
					<button class="button helper-button reveal"><span class="mif-looks"></span></button>
				</div>
				<br />
				<br />
				<div class="form-actions">

					<button type="submit" class="button primary">Đăng nhập</button>
					<a href="{!! URL::to('/')!!}">Hủy</a>
				</div>
				<div>
					<p>Chưa có tài khoản ?</p>
					<a href="{!! URL::to('register')!!}" tppabs="http://scriptunited.com/demo/metroskin/laravel/user/form/signup2" class="fg-white" type="fg-white "><span class="fa fa-sign-in"></span> <u>Đăng ký tại đây</u></a>
				</div>
			</form>
		</div>

		<div id="minicalendar">
			<h1 id="date"></h1>
			<h1 id="clock"></h1>
		</div>


		<style>

			#minicalendar {
				position: fixed;
				bottom: 3rem;
				left: 2rem;
				color: #fff;
			}

			#clock {
				font-size: 90px;
				position: relative;
				top: -1rem;
			}


			.login-form {
				width: 18rem;
				height: auto;
				position: fixed;
				top: 0;
				bottom: 0px;
				right: -18rem;
				margin-left: -12.5rem;
				background-color: rgba(0,0,0,0.45);
				opacity: 0;
				-webkit-transform: scale(.8);
				transform: scale(.8);

			}

			body {
				background-image:url({!!URL::to('images/login/1.jpg')!!}); 
				background-color: #1d1d1d;
				background-repeat: no-repeat;
				background-position: center;
				background-attachment: fixed;
				background-size: cover;

			}



		</style>

		<script language="javascript" type="text/javascript">

			var timer;

			jQuery(document).ready(function($){

				var form = $(".login-form");

				form.css({
					opacity: 1,
					right: 0,
					"-webkit-transform": "scale(1)",
					"transform": "scale(1)",
					"-webkit-transition": "1s",
					"transition": "1s"
				});

				var img_array = ['2.jpg','3.jpg','4.jpg','5.jpg','6.jpg'],
				newIndex = 0,
				index    = 0,
				interval = 10000;

				$(img_array).each(function(i,o){
					loadImage = '{!!URL::to("images/login")!!}\/'+o;
					$('<img src="'+loadImage+'" class="hide" >').appendTo('#user-body');
				})

				function changeBg() {

					index = (index % img_array.length)+1;
					bgImage = 'url({!!URL::to("images/login")!!}\/'+img_array[index-1]+')';
					$('body').css({
						'background-image': bgImage,
						'-webkit-transition':'all 2s ease', 
						'-moz-transition':'all 2s ease', 
						'-o-transition':'all 2s ease', 
						'transition':'all 2s ease' 
					}) ;

				};

				setInterval(changeBg, interval);


				function clock(){
					$('#clock').html(moment().format('H:mm'));
					$('#date').html(moment().format('dddd<br>D MMMM'));
				}

				setInterval(clock,1000);



			});

		</script>


	</div>			

	<script type='text/javascript' >
		jQuery(document).ready(function($){
			$.Notify({
				content: '',
				type: '',
				shadow: true
			})
		})
	</script>

</body>

@endsection