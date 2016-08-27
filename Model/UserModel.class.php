<?php
defined('ACC')||exit('ACC Deined');


class UserModel extends Model{
	  protected $table='user';
	  protected $pk='user_id';
	  protected $fields=array('user_id','username','email','passwd','regtime','lastlogin');
	  protected $_auto=array(
		           array('regtime','function','time'),
		
		);
		
		   protected $_valid=array(
		    array('username',1,'用户名不能为空','require'),
		     array('username',0,'用户名必须在4~16字符内','length','4,16'),
		      array('email',1,'email非法','email'),
		        array('passwd',1,'密码不能为空','require')
		);
	  protected $error;
	
	 //用户注册
	 
	 public function reg($data)
	 {
	 	$data['passwd']=$this->encPasswd($data['passwd']);
		return $this->add($data);
	 }
	//为密码加密
	protected function encPasswd($p)
	{
		return md5($p);
	}
	
	public function checkUser($username)
	{
		
			$sql='select count(*) from '. $this->table.' where username="'.$username.'"';
				return $this->db->getOne($sql);
		
	
			
		
			}
	
	 public function checkUserPas($username,$passwd)
	 {
	 	    if(empty($username) || empty($passwd))
			{
				return false;
			}
			$passwd=$this->encPasswd($passwd);
	 		$sql='select user_id,username,email,regtime from '. $this->table.' where username="'.$username.'" and passwd="'.$passwd.'"';
			$row=$this->db->getRow($sql);
			if(empty($row))
			{
				return false;
			}
			else
				{
					
					return $row;
				}
	 }
		
	
	}
	


 ?>