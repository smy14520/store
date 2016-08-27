<?php 
define('ACC',true);
require('../include/init.php');
   
   
   
   $data=array();
   $cat_name=$_POST['cat_name'];
   $parent_id=$_POST['parent_id']+0;
   $intro=$_POST['intro'];
     if(empty($cat_name))
	 {
	 	exit('栏目名不能为空');
	 }
	 else if(empty($intro))
	 {
	 	exit('简介不能为空');
	 }
   $data['cat_name']=$cat_name;
   $data['parent_id']=$parent_id;
   $data['intro']=$intro;
   
   
   $cat=new CatModel();
   $cat->add($data);	
   echo "添加栏目成功";
 ?>