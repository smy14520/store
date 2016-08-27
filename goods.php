<?php 




   define('ACC', true);
   require('./include/init.php');
  $goods_id=isset($_GET['goods_id'])?$_GET['goods_id']+0:0;
  $cat=new CatModel();
  
  
  $goods=new GoodsModel();
  $gods=$goods->find($goods_id);
  
  if(empty($gods))
  {
  	header('location:index.php');
	exit;
  }
  $nav=$cat->getTree($gods['cat_id']);
   require('./view/front/shangpin.html');
  