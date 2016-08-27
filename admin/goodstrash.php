<?php
      define("ACC",true);
   require('../include/init.php');
   
   $id=$_GET['id']+0;
   
   $gods=new GoodsModel();
   if($gods->trash($id))
   {
   	echo "成功删除";
   }
   else
   	{
   		echo "删除失败";
   	}


 ?>