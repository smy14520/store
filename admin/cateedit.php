<?php 
     define("ACC",true);
   require('../include/init.php');
   $cat_id=$_GET['cat_id']+0;
    
	
	$cat=new CatModel();
	$cateinfo=$cat->find($cat_id);
	
     
	   $catelist=$cat->select();
  
   $catelist=$cat->getCatTree($catelist,0,0);
	 require(ROOT."view/admin/templates/cateedit.html");
?>