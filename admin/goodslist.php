<?php 
    
    
        define("ACC",true);
   require('../include/init.php');
   
   
   
        $cat=new CatModel();
  
  $catelist=$cat->select();
  
   $catelist=$cat->getCatTree($catelist,0,0);
   $gods=new GoodsModel();
   $godslist=$gods->getGoods();
   
   
   
     include(ROOT.'view/admin/templates/goodslist.html');
?>