   @if ( count($errors) > 0)  
   <div class="row cells12">
   	<div class="alert cell colspan5 offset1"  id="error" style="padding: 15px 0px 0px 0px;color: red;text-decoration: none;
      margin-top: -35px ">

   	<ul class="simple-list  red-bullet" style="color: red" > 
   		@foreach ( $errors ->all() as $error)
   		<li >{!! $error   !!}</li>
   		@endforeach   
   	</ul>

   </div>
</div>

@endif
