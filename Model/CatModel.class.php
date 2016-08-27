<?php
defined('ACC')||exit('ACC Denied');
     class CatModel extends Model
     {
     	protected $table = 'category';
		protected $pk='cat_id';
		public function add($data)
		{
		
			 $this->db->autoExcute($data,$this->table);
		}
     
        //查询出所有数据
         public function select()
		 {
		 	$sql="select cat_id,cat_name,parent_id from ".$this->table;
			return $this->db->getAll($sql);
		 }
		 
		 //根据主键取出一行数据
	
		 
		 
		 
		 //遍历出子孙树
		 public function getCatTree($arr,$id = 0,$lev=0)
		 {
		 	$tree=array();
			foreach($arr as $v)
			{
				if($v['parent_id']==$id)
				{
					$v['lev']=$lev;
					$tree[]=$v;
					$tree=array_merge($tree,$this->getCatTree($arr,$v['cat_id'],$lev+1));
					
				}
			}
			 return $tree;
		 }
		 
		 //查找家谱树
		 public function getTree($cat_id)
		 {
		 	$tree=array();
			$cats=$this->select();
			
			while($cat_id>0)
			{
				foreach($cats as $v)
				{
					if($v['cat_id']==$cat_id)
					{
						$tree[]=$v;
						
						$cat_id=$v['parent_id'];
						
						break;
					}
				}
			}
			$tree=array_reverse($tree);
			return $tree;
		 }
		 
		 
		 //更新数据
		   public function Update($date,$cat_id)
		   {
		   	  $this->db->autoExcute($date, $this->table,'update','where cat_id ='.$cat_id);
			  return $this->db->affected_rows();
		   }
		 
		 //遍历子孙数删除
		 
		 public function delTree($arr,$cat_id)
		 {
		 	$id=$cat_id;
		 	 foreach($arr as $v)
			 {
			 	if($v['parent_id']==$cat_id)
				{
					$this->delTree($arr,$v['cat_id']);
					
				}
				
			 }
			 return $this->delete($id);
			 
		 }
		 
		 
		 
		 
		 
		 //删除栏目
		  public function delete($cat_id=0)
		  {
		  	$sql='delete from '.$this->table." where cat_id=".$cat_id;
			$this->db->query($sql);
			return $this->db->affected_rows();
		  }
		 
		 
		 
		 
		 
		 
		 
		 
		 
	 }


	?>