
<?php
function stripUnicode($str){
  if(!$str) return false;
  $unicode = array(
   'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
   'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
   'd'=>'đ',
   'D'=>'Đ',
   'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
   'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
   'i'=>'í|ì|ỉ|ĩ|ị',	  
   'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
   'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
   'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ ',
   'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
   'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
   'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
   'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
   );
  foreach($unicode as $khongdau=>$codau) {
  	$arr=explode("|",$codau);
  	$str = str_replace($arr,$khongdau,$str);
  }
  return $str;
}
function changeTitle($str){
 $str=trim($str);
 if ($str=="") return "";
 $str =str_replace('"','',$str);
 $str =str_replace("'",'',$str);
 $str = stripUnicode($str);
 $str = mb_convert_case($str,MB_CASE_TITLE,'utf-8');

  	// MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
 $str = str_replace(' ','-',$str);
 return $str;
}

function cate_parent($data,$parent=0,$str="-",$select=0)
{
  /*   echo "<script type='text/javascript' charset='utf-8'>
        alert ($select);       
    
  */
        
        foreach ($data as $key => $value) {
         $id= $value['id'];
         $name = $value['name'];

         if($value['parent_id']==$parent){

           if($select != 0 && $select==$id ) 
            {   echo "<option value='$id' selected='selected'>$str $name</option>";}
          else{
          echo "<option value='$id'>$str $name</option>"; # code...
        }   

        cate_parent($data,$id,$str.'--',$select);
        /* //Chu y Phai noi chuoi bang Dau Cham . */
      }
    }

  }

  function cate($data,$select=0)
  {
  /*   echo "<script type='text/javascript' charset='utf-8'>
        alert ($select);       
    
  */    foreach ($data as $key => $value) {
         $id= $value['id'];
         $name = $value['name'];

         if($select != 0 && $select==$id ) 
          {   echo "<option value='$id' selected='selected'> $name</option>";}
        else{
          echo "<option value='$id'> $name</option>"; # code...
        } 
        
      }

    }

 function discount_percent($select=0)
  {
     $data =array('1'=>5,'2'=>7,'3'=>10,'4'=>15,'5'=>25,'6'=>50, '7'=>75);

     foreach ($data as $key => $value) {
             $id= $key;
             $name = $value;

             if($select != 0 && $select==$id ) 
              {   echo "<option value='$id' selected='selected'> $name % </option>";}
            else{
              echo "<option value='$id'> $name %</option>"; 
            } 
            
          }

    }

 function list_discount_percent($id_discount_percent=0)
  {
     $data =array('1'=>5,'2'=>7,'3'=>10,'4'=>15,'5'=>25,'6'=>50, '7'=>75);

     foreach ($data as $key => $value) { 

             if($id_discount_percent==$key ) 
              {   echo  $value." % ";}
            else{
              echo "";
            } 
            
          }

    }

function discount_percent_value($id_discount_percent=0)
  {
     $data =array('1'=>5,'2'=>7,'3'=>10,'4'=>15,'5'=>25,'6'=>50, '7'=>75);

     foreach ($data as $key => $value) { 

             if($id_discount_percent==$key ) 
             return $value ;
         
          }

    }


 ?>
































