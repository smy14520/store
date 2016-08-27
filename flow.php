<?php 
	
define('ACC',true);

require('./include/init.php');


$act=isset($_GET['act'])?$_GET['act']:'buy';
$goods=new GoodsModel();

$cart=CartTool::getCart(); //获取购物车实例

if($act=='clear')
{
	$cart->clearItem();
	$msg='清空购物车成功.';
	include(ROOT.'view/front/msg.html');
}



if($act=='buy')   
{
	$goods_id=isset($_GET['goods_id'])?$_GET['goods_id']+0:0;
	
	$num=isset($_GET['num'])?$_GET['num']+0:1;
	
	

	

	
	
	if($goods_id)
	{
		$g=$goods->find($goods_id);
			
	   
		if(!empty($g))
		{
			//判断商品是否下架或删除
			
			if($g['is_delete']==1 || $g['is_on_sale']==0)
			{
				$msg='此商品不能购买';
				include(ROOT.'view/front/msg.html');
				exit;
			}
			

			//判断一下库存
			if(((isset($cartlist[$goods_id]['num'])?$cartlist[$goods_id]['num']:0)+$num)>$g['goods_number'])
			{
				$msg='此商品库存不足,不能购买';
				include(ROOT.'view/front/msg.html');
      
				exit;
			}
			
			$cart->addItem($goods_id,$g['goods_name'],$g['shop_price'],1);
			
		}	
}
	
	
	$cartlist=$cart->getAllGoods();
	$cartlist=$goods->getCartGoods($cartlist);

	

		if(empty($cartlist))
	{
	
		header('location:index.php');
		exit;
	}
		//获取本店价格
	$price=$cart->getPirce($cartlist);
	
	//获取市场价格
	$Mprice=$cart->getMPirce($cartlist);
	
	
	$rate=round(100*$price/$Mprice,2);

	include(ROOT.'view/front/jiesuan.html');
}



else if ($act=='submit')
{
	$cartlist=$cart->getAllGoods();
 	$cartlist=$goods->getCartGoods($cartlist);

	
	
	if(empty($cartlist))
	{
		header('location:index.php');
		exit;
	}

	
		//获取本店价格
	$price=$cart->getPirce($cartlist);
	
	//获取市场价格
	$Mprice=$cart->getMPirce($cartlist);
	
	
	$rate=round(100*$price/$Mprice,2);
	
	include(ROOT.'view/front/tijiao.html');
}
// 订单入库
else if($act=='done')
{
	
	

	if(!isset($_SESSION['user']))
{
	$msg='对不起请先登录再购物';
	include(ROOT.'view/front/msg.html');
	exit;
}

	$cartlist=$cart->getAllGoods();
	$cartlist=$goods->getCartGoods($cartlist);
//将goods转换为goods_id为键的数组

	if(empty($cartlist))
	{
		header('location:index.php');
		exit;
	}

	
		//获取本店总金额价格
	$price=$cart->getPirce($cartlist);
	
	//获取市场价格
	$Mprice=$cart->getMPirce($cartlist);
	
	$rate=round(100*$price/$Mprice,2);
	
	//获取订单价格
	 
	//验证字段
	 $OI=new OrderModel();
	 if(!$OI->_validate($_POST))
	 {
	 	$msg=$OI->getErr();
		include(ROOT.'view/front/msg.html');
		exit;
	 }
	 


	  $data=$OI->_facade($_POST);
	 $data=$OI->_autoFill($data);
	 	 
	 $data['order_amount']=$price;
$data['user_id']=$_SESSION['user']['user_id'];
$data['username']=$_SESSION['user']['username'];
 //订单号生成
 $order_sn=$data['order_sn']=$OI->orderSn();

	 if(!$OI->add($data))
	 {
	 	$msg='下订单失败';
		include(ROOT.'view/front/msg.html');
		exit;
	 }
	 //获取插入订单表的ID值
	 $order_id=$OI->insert_id();
	 
	 $items=$cart->getAllGoods();
	 //OrderGoods 操作表
	 $og=new OGModel();
	 //商品添加成功记录
	 $cnt=0;
	 foreach($items as $k=>$v)
	 {
	 	$data=array();
		
		$data['order_sn']=$order_sn;
		$data['order_id']=$order_id;
		$data['goods_id']=$k;
		$data['goods_name']=$v['name'];
		$data['goods_number']=$v['num'];
		$data['shop_price']=$v['price'];
		$data['subtotal']=$v['price']*$v['num'];
		
		if($og->addOG($data))
		{
			$cnt+=1;
		}
	 }
	 if(count($items)!==$cnt)
	 {
	 	$OI->invoke($order_id);
		$msg='下订单失败';
		include(ROOT.'view/front/msg.html');
		exit;
	 }
	 
	 
	 
	 
	 //清空购物车
	 $cart->clearItem();  
	 include(ROOT.'view/front/order.html');

}
