$(document).ready(function() {
	$('#dataTables-example').DataTable({
		responsive: true
	});
});


function xacnhanxoa(msg){

	if(window.confirm(msg)){
		return true;
	}	
	return false;
}
$("div.alert").delay(3500).slideUp();

function xacnhanxoa(msg){

  if(window.confirm(msg)){
    return true;
  } 
  return false;

}


$(document).ready(function(){
  $(".updatecart").click(function(){
    var id = $(this).attr('id');
    var qty = $(this).parent().parent().parent().find("#qty").val();
   // var qty =  $("input[name='quantity']").val();
   var token = $("input[name='_token']").val();
   //alert(id);
   $.ajax({
     url:"cap-nhat/"+id+"/"+qty,
     type:"GET",
     cache: false,
     data:{"_token":token,"id":id,"qty":qty},         
     success:function(data){
              // if(data == "ok")
              // {
              //   window.location = "gio-hang";
              // }
              
              if (data == 1){
                window.location = "gio-hang";
              }else{
                alert ('Có lỗi xảy ra');
              }
            }
          });
 });
});



