<?php 

define('ACC',true);

require('./include/init.php');
$cat_id=isset($_GET['cat_id'])?$_GET['cat_id']+0:0;
$page=isset($_GET['page'])?$_GET['page']+0:0;
if($page<1)
{
	$page=1;
}

//每页取2条
$perpage=2;
$offset=($page-1)*$perpage;


$cat=new CatModel();
$catinfo=$cat->find($cat_id);
if(empty($catinfo))
{
	header('location:index.php');
	exit;
}

//取出树状导航

   $cats=$cat->select();//获取所有的栏目
   $sort=$cat->getCatTree($cats,0,1);

 	$goods=new GoodsModel();
    $nav=$cat->getTree($cat_id);
		$gcnt=$goods->catcntGoods($cat_id);
$num=isset($_GET['page']) ? $_GET['page'] : 1;
$page=new PageTool($gcnt,8,$num);
$pages=$page->getPage();

	
	

	$gods=$goods->catGoods($cat_id,($num-1)*8,8);
	
//	print_r($gods);
//	print_r($gcnt);
	
	
//	
require('./view/front/lanmu.html');

