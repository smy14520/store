<?php
	
	
	defined('ACC');


  class CartTool
  {
  	 private static $ins=null;
	 private $items=array();
  
	 final function __construct()
	 {
	  
	 }
	 
	 	 final function __clone()
	 {
	 	
	 }
	 
	 //获取购物车实例对象
	 protected static function getIns()
	 {
	 	if(!(self::$ins instanceof self))
		{
			
			self::$ins=new self();
		}
		return self::$ins;
	 }
	 
	  public static function getCart()
	  {
	  	
	  	 if( !isset($_SESSION['cart']) || !($_SESSION['cart'] instanceof self))
		 {
		 	
		  $_SESSION['cart']=self::getIns();	
		 }
		 return $_SESSION['cart'];
	  }
	 
	 
	 //添加商品
	 //parm int $id 商品主键
	 //parm string $name 商品价格
	 //parm  price  商品价格
	 //parm int $num 购物数量
	 public function addItem($id,$name,$price,$num=1)
	 {
	 	if($this->hasItem($id))
		{
			$this->incNum($id,$num);
			return ;
		}
	 	
		$itme=array();
	 	$itme['name']=$name;
		$itme['price']=$price;
		$itme['num']=$num;
		
	 	$this->items[$id]=$itme;
		
		
	 }
	 
	 //修改购物车中的商品数量
	 public function modNum($id,$num=1)
	 {
	 	if($this->hasItem($id))
		{
			return false;
		}
		$this->items[$id]['num']==$num;
		return true;
	 }
	 
	 
	 //商品添加
	 public function incNum($id,$num)
	 {
	 	if($this->hasItem($id))
		{
			$this->items[$id]['num']+=$num;
		}
	 }
	 
	 //商品减少
	 	 public function subNum($id,$num)
	 {
	 	if($this->hasItem($id))
		{
			$this->items[$id]['num']-=$num;
		}
		if($this->items[$id]['num']<1)
		{
			$this->delItem($id);
		}
	 }
	 
	 
	 //删除商品
	  public function delItem($id)
	  {
	  	unset($this->items['$id']);
	  	}
	 
	 
	 //铲鲟购物车中商品的种类
	 public function getCnt()
	 {
	    return count($this->items);
	 }
	 
	 //查询购物车中商品的个数
	 public function getNum()
	 {
	 	if($this->getCnt()==0)
		{
			return 0;
		}
		$sum=0;
	 	foreach($this->items as $v)
		{
			$sum+=$v['num'];
		}
		return $sum;
	 }


    //购物车中商品的总金额
    
     public function getPirce($items)
	 {
	 		if($this->getCnt()==0)
		{
			return 0;
		}
			$price=0.0;
	 	foreach($items as $v)
		{
			$price+=$v['num']*$v['price'];
		}
		return $price;
	 }
	 
	 
	 //查询市场价格
	      public function getMPirce($items)
	 {
	 		if($this->getCnt()==0)
		{
			return 0;
		}
			$marketP=0.0;
	 	foreach($items as $v)
		{
			$marketP+=$v['num']*$v['market_price'];
		}
		return $marketP;
	 }
	 
	 
	 
	 
	 
	 
	 //返回购物车中的所有商品
	 public function getAllGoods()
	 {
	 	return $this->items;
	 }
	 
	 //判断商品是否存在
	 public function hasItem($id)
	 {
	 	return array_key_exists($id,$this->items);
	 }
	 
	 //删除商品
	 public function clearItem()
	 {
	 	$this->items=array();
	 }
  }


