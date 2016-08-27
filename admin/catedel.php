<?php 
   define("ACC",true);
   require('../include/init.php');
   $cat_id=$_GET['cat_id']+0;
   $cat=new CatModel();
   $catelist=$cat->select();
   if($cat->delTree($catelist, $cat_id))
   {
   	 exit("删除成功");
   }
   else
   	{
   		exit("删除失败");
   	}
   
   
   
?>