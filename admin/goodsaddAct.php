<?php 
define('ACC',true);
require('../include/init.php');

//$data=array();
//
//$data['goods_name']=trim($_POST['goods_name']);
//if($data['goods_name']=='')
//{
//	echo "商品名不能为空";
//	exit;
//}
//$data['goods_sn']=trim($_POST['goods_sn']+" ");
//$data['cat_id']=$_POST['cat_id'];
//$data['shop_price']=$_POST['shop_price'];
//$data['market_price']=$_POST['market_price'];
//$data['goods_desc']=$_POST['goods_desc'];
//$data['goods_weight']=$_POST['goods_weight']*$_POST['weight_unit'];
//$data['is_best']=isset($_POST['is_best'])?1:0;
//$data['is_new']=isset($_POST['is_new'])?1:0;
//$data['is_hot']=isset($_POST['is_hot'])?1:0;
//$data['is_on_sale']=isset($_POST['is_on_sale'])?1:0;
//$data['keywords']=$_POST['keywords'];
//$data['goods_brief']=$_POST['goods_brief'];
//$data['shop_price']=$_POST['shop_price'];
//$data['seller_note']=$_POST['seller_note'];
//$data['add_time']=time();

$goods=new GoodsModel();
$data=array();

$_POST['goods_weight']*=$_POST['weight_unit'];


$data=$goods->_facade($_POST);

$data=$goods->_autofill($data);
if(empty($data['goods_sn']))
{
	echo $goods->createSn();
	$data['goods_sn']=$goods->createSn();
}


$imtool=new ImageTool();
$uptool=new UpTool();
$ori_img=$uptool->up('ori_img');
if($ori_img)
{
	$data['ori_img']=$ori_img;
	$ori_img=ROOT.$ori_img;
	$goods_img=dirname($ori_img).'/goods_'.basename($ori_img);
    $imtool->thumb($ori_img,$goods_img,300,400);
	$data['goods_img']=str_replace(ROOT, "", $goods_img);
	
	$thumb_img=dirname($ori_img).'/thumb_'.basename($ori_img);
    $imtool->thumb($ori_img,$thumb_img,160,220);
	$data['thumb_img']=str_replace(ROOT, "", $thumb_img);
	
}

if($goods->add($data))
{
	echo "商品发布成功";
}
else
	{
		echo "商品发布失败";
	}












?>