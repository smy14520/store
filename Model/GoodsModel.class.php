<?php 
   defined('ACC')||exit('ACC Denied');
     class GoodsModel extends Model
     {
     	protected $table="goods";
		protected $pk='goods_id';
		public $fields=array(
		         ' goods_id',
'goods_sn',
'cat_id',
'brand_id',
'goods_name',
'shop_price',
'market_price',
'goods_number',
'click_count',
'goods_weight',
'goods_brief',
'goods_desc',
'thumb_img',
'goods_img',
'ori_img',
'is_on_sale',
'is_delete',
'is_best',
'is_new',
'is_hot',
'add_time',
'last_update',
'keywords',
'seller_note'
		);
		
		protected $_auto=array(
		     array('is_hot','value',0),
		       array('is_new','value',0),
		         array('is_best','value',0),
		          array('is_on_sale','value',0),
		           array('add_time','function','time'),
		
		);
		
		  /*
		   * parm int id
		   * return bool
		   * 
		   * 
		   * */
	    public function trash($id)
		{
			return $this->Update(array('is_delete'=>1),$id);
		}
		
		
		//只读取未被删除的商品
		
		public function getGoods()
		{
			$sql="select * from ".$this->table." where is_delete=0";
			return $this->db->getAll($sql);
		}
		
		//创建商品的货号
		public function createSn()
		{
			$sn='BL'.(date('Ymd').mt_rand(10000,99999));
			$sql='select count(*) from '.$this->table.' where goods_sn="'.$sn . '"';
			return $this->db->getOne($sql)?$this->createSn():$sn;
			
		}

        //取出指定的条数新商品
        
        public function getNew($n=5)
		{
			$sql='select goods_id,goods_name,shop_price,market_price,thumb_img from '.
			$this->table. ' where is_new=1 order by add_time limit '.$n;
			
			return $this->db->getAll($sql);
		}
		
		//取出指定栏目的商品,取出其下的子孙数
		public function catGoods($cat_id,$offset=0,$li=5)
		{
			$category=new CatModel();
			$cats=$category->select();
			$sons=$category->getCatTree($cats,$cat_id);
			
			$sub=array();
			if(!empty($sons))
			{
				foreach($sons as $v)
				{
					$sub[]=$v['cat_id'];
				}
				$in=implode(',', $sub);
				$sql='select goods_id,goods_name,shop_price,market_price,thumb_img from '.
			$this->table. ' where cat_id in('  . $in  .') order by add_time limit '.$offset.','.$li;
			}
			else
				{
					$sql='select goods_id,goods_name,shop_price,market_price,thumb_img from '.
			$this->table. ' where cat_id='.$cat_id . ' order by add_time limit '.$offset.','.$li;
				}
			
			
				
			
			return $this->db->getAll($sql);
		}
		
		
		//取出栏目id下商品的总数
		public function catcntGoods($cat_id)
		{
			$category=new CatModel();
			$cats=$category->select();
			$sons=$category->getCatTree($cats,$cat_id);
			
			$sub=array();
			if(!empty($sons))
			{
				foreach($sons as $v)
				{
					$sub[]=$v['cat_id'];
				}
				$in=implode(',', $sub);
				$sql='select goods_id,goods_name,shop_price,market_price,thumb_img from '.
			$this->table. ' where cat_id in('  . $in  .') order by add_time';
			}
			else
				{
					$sql='select goods_id,goods_name,shop_price,market_price,thumb_img from '.
			$this->table. ' where cat_id='.$cat_id . ' order by add_time';
				}
			
			
				
			
			return count($this->db->getAll($sql));
		}
		
		
       
	   //获取购物中商品的图片市场价等信息
	    
	    	    public function getCartGoods($items)
		{
			 foreach($items as $k=>$v)
			 {
			 	$sql='select goods_id,goods_name,thumb_img,shop_price,market_price from ' .
			 	$this->table. ' where goods_id='.$k;
				
				$row=$this->db->getRow($sql);
				
				$items[$k]['thumb_img']=$row['thumb_img'];
				$items[$k]['market_price']=$row['market_price'];
			 }
			 return $items;
		}
	   
     }
?>