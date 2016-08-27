<?php 


defined('ACC')||exit('ACC Deined');


class OrderModel extends Model{
	  protected $table='orderinfo';
	  protected $pk='order_id';
	  protected $fields=array(
	" order_id",
"order_sn",
"username",
"user_id",
"zone",
"address",
"zipcode",
"reciver",
"email",
"tel",
"mobile",
"building",
"best_time",
"add_time",
"order_amount",
"pay"
	  );
	  
	  
	  protected $_auto=array(
		           array('add_time','function','time'),
		
		);
		
		   protected $_valid=array(
		    array('reciver',1,'收货人不能为空','require'),
		      array('email',1,'email非法','email'),
		        array('pay',1,'必须选择支付方式','in','4,5')
		);
	  protected $error;
	  
	  public function orderSn()
	  {
	  	 $sn='OI'.date('Ymd') . mt_rand(10000,99999);
		   $sql='select count(*) from ' . $this->table.' where order_sn='.'"'.$sn.'"';
		   
		   return $this->db->getOne($sql)?$this->orderSn():$sn;
	  }
	  
	  //撤销订单
	  
	  public function invoke($order_id)
	  {
	  	$this->delete($order_id);
		$sql='delete from ordergoods where order_id ='.$order_id;
		$this->db-query($sql);
		
		
	  }
}