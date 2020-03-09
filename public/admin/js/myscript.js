$(document).ready(function() {
	$('#dataTables-example').DataTable({
		responsive: true
	});
});


$("div.alert").delay(3500).slideUp();

function xacnhanxoa(msg){

	if(window.confirm(msg)){
		return true;
	}	
	return false;

}
$(document).ready(function(){

	$("#addImages").click(function(){ 

		$("#insert").append(' <div class="input-control file" data-role="input"><input type="file" name="fProductDetail[]"/> <button class="button"><span class="mif-folder"></span></button> </div>');
		/*ko dc xuong dong trong JS hoac Jquery */
	});

});
$(document).ready(function(){

	$("#addImagesG").click(function(){ 

		$("#insert").append(' <div class="input-control file" data-role="input"><input type="file" name="fGadgetDetail[]"/> <button class="button"><span class="mif-folder"></span></button> </div>');
		/*ko dc xuong dong trong JS hoac Jquery */
	});

});

$(document).ready(function(){

	$("#addImages").click(function(){ 

		$("#insert_slide").append(' <div class="input-control file" data-role="input"><input type="file" name="fSlide[]"/> <button class="button"><span class="mif-folder"></span></button> </div>');
		/*ko dc xuong dong trong JS hoac Jquery */
	});

});

$(document).ready(function(){
	$("a#del_img_demo").on('click',function(){

		var  url =  "http://localhost:8000/admin/product/delimg/";
		var _token = $("form[name='frmEditProduct']").find("input[name='_token']").val();

		var idHinh =$(this).parent().parent().find("img").attr("idHinh");
		var img =$(this).parent().parent().find("img").attr("src");/*alert(idHinh); */ /*ddanHinh*/
		var rid =$(this).parent().parent().find("img").attr("id");


		$.ajax({
			url:url + idHinh,
			type:'GET', 	
			cache:false,
			data:{"_token":_token,"idHinh":idHinh,"urlHinh":img},
			success:function(data){
				if (data == 1){
					$("#"+rid).remove();/*De Y Dong Nay CAP Dau ()*/
				}else{
					alert ('Có lỗi xảy ra')
				}
			}
		});
	})	
});

$(document).ready(function(){
	$("a#del_img_gadget").on('click',function(){

		var  url =  "http://localhost:8000/admin/gadget/delgimg/";
		var _token = $("form[name='frmEditGadget']").find("input[name='_token']").val();

		var idHinh =$(this).parent().parent().find("img").attr("idHinh");
		var img =$(this).parent().parent().find("img").attr("src");/*alert(idHinh); */ /*ddanHinh*/
		var rid =$(this).parent().parent().find("img").attr("id");
		//alert(url + idHinh)
		$.ajax({
			url:url + idHinh,
			type:'GET', 	
			cache:false,
			data:{"_token":_token,"idHinh":idHinh,"urlHinh":img},
			success:function(data){
				if (data == 1){
					$("#"+rid).remove();/*De Y Dong Nay CAP Dau ()*/
				}else{
					alert ('Có lỗi xảy ra')
				}
			}
		});
	})	
});

$(document).ready(function(){
	$("a#del_img_slide").on('click',function(){

		var  url =  "http://localhost:8000/admin/slide/delgimg/";
		var _token = $("form[name='frmEditSilde']").find("input[name='_token']").val();

		var idHinh =$(this).parent().parent().find("img").attr("idHinh");
		var img =$(this).parent().parent().find("img").attr("src");/*alert(idHinh); */ /*ddanHinh*/
		var rid =$(this).parent().parent().find("img").attr("id");
		//alert(url + idHinh)
		$.ajax({
			url:url + idHinh,
			type:'GET', 	
			cache:false,
			data:{"_token":_token,"idHinh":idHinh,"urlHinh":img},
			success:function(data){
				if (data == 1){
					$("#"+rid).remove();/*De Y Dong Nay CAP Dau ()*/
				}else{
					alert ('Có lỗi xảy ra')
				}
			}
		});
	})	
});




