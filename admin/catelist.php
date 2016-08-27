<?php 
   
   define("ACC",true);
   require('../include/init.php');
 
  $cat=new CatModel();
  
  $catelist=$cat->select();
  
   $catelist=$cat->getCatTree($catelist,0,0);
  
   include(ROOT.'view/admin/templates/catelist.html');

 ?>