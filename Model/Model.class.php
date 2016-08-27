<?php

defined('ACC')||exit('ACC Denied');
class Model {
    protected $table = NULL; // 是model所控制的表
    protected $db = NULL; // 是引入的mysql对象
   protected $pk=0;
   
   protected $fields=array();
   protected $_auto=array();
    protected $_valid=array();
    protected $error;
   
    public function __construct() {
        $this->db = mysql::getIns();
    }

    public function table($table) {
        $this->table = $table;
    }
	
	//取出一行数据
		 public function find($id)
		 {
		 	$sql="select * from ".$this->table." where ".$this->pk."=".$id;
			return $this->db->getRow($sql);
		 }
	
	public function add($data)
		{
		
			return $this->db->autoExcute($data,$this->table);
		}
		
             public function select()
		 {
		 	$sql="select * from ".$this->table;
			return $this->db->getAll($sql);
		 }
	
	  // 更新数据
	  
	     public function Update($date,$id)
		   {
		   	  $this->db->autoExcute($date, $this->table,'update','where '.$this->pk.'='.$id);
			  return $this->db->affected_rows();
		   }
	
	
	  public function delete($cat_id=0)
		  {
		  	$sql='delete from '.$this->table." where cat_id=".$cat_id;
			$this->db->query($sql);
			return $this->db->affected_rows();
		  }
		 
		 
		 
		 
		 /*
		  * 负责把传来的数组清除掉不用的单元
		  * 留下与表字段对应的单元
		  *   
		  * */
		 public function _facade($array=array())
		 {
		 	$data=array();
			foreach($array as $k=>$v)
			{
				if(in_array($k,$this->fields))
				{
					$data[$k]=$v;
				}
			}
			return $data;
		 }
		  
		  
		  /*
		 自动填充
		   * 负责把表中需要值,而$_POST又没传的字段附上值
		   */
		  public function _autofill($data)
		  {
		  	 foreach($this->_auto as $k=>$v)
			 {
			 	if(!array_key_exists($v[0],$data))
				{
					switch($v[1])
					{
						case 'value':
						$data[$v[0]]=$v[2];
						break; 
						case 'function':
							$data[$v[0]]=call_user_func($v[2]);
							break;
					}
					
					
				}
			 }
			return $data;
		  }
		  
		  
		  /*
		   * 自动验证字段
		   * 格式 $this->_valid=array(
		   *   array('验证字段',
		   * 0/1/2(验证场景),  1:必检字段 0:有字段则检,无字段不检 2:如有内容不空则检查,
		   * '报错信息','
		   * require/in(某几种情况)'/报错提示/betwennt(范围)/length(某个范围))
		   * )
		   * 
		   * */
		   public function _validate($data)
		   {
		   	 if(empty($this->_valid))
			 {
			 	return FALSE;
			 }
			 
			 $this->error=array();
			
			 foreach($this->_valid as $k=>$v)
			 {
			 	
			 	switch($v[1])
				{
					case 1:
					
					     if(!isset($data[$v[0]]) || empty($data[$v[0]]))
						 {
						 	
						 	$this->error=$v[2];
						 	return false;
						 }
						if(!isset($v[4]))
						{
							$v[4]=' ';
						}
						 if(!$this->check($data[$v[0]],$v[3],$v[4]))
						 {
						 	
						 	$this->error=$v[2];
						 	return false;
						 }
						 break;
					case 0:
						  if(isset($data[$v[0]]))
						  {
						  	  if(!$this->check($data[$v[0]],$v[3],$v[4]))
							  {
							  	$this->error=$v[2];
							  	return false;
							  }
						  }
						
						  break;
					case 2:
						if(isset($data[$v[0]]) && !empty($data[$v[0]]))
						{
							if($this->check($data[$v[0]],$v[3],$v[4]))
							  {
							  	$this->error=$v[2];
							  	return false;
							  }
							
						}
						  
						  break;
				}
			 }
			 return true;
			 
		   }
		   
		   //验证字段
		   protected function check($value,$rule='',$parm='')
		   {
		   	    switch($rule)
				{
					case 'require':
						return !empty($value);
					case 'in':
						$tmp=explode(',',$parm);
						return in_array($value, $tmp);
					case 'between':
						list($min,$max)=explode(',',$parm);
						return $value>=$min && $value<=$max;
					case 'length':
						list($min,$max)=explode(',',$parm);
						return strlen($value)>=$min && strlen($value)<=$max;
					case 'number':
						return is_numeric($value);
					case 'email':
						return filter_var($value,FILTER_VALIDATE_EMAIL)!==FALSE;
					default:
						return false;
				}
		   }
		   
		   
		   //返回插入数据的ID值
		   public function insert_id()
		   {
		   	  return $this->db->insert_id();
		   }
		   
		   //返回错误信息
		   public function getErr()
		   {
		   	  return $this->error;
		   }
}

    ?>