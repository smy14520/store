<?php 
	class UpTool
	{
		protected $allowExt='jpg,jpeg,gif,bmp,png';
		protected $maxsize=5;  //5mb限制
		protected $errorno=0;
		protected $error=array(
		0=>'无错',
			1=>'上传文件超出系统限制',
			2=>'上传文件大小超出网页表单页面',
			3=>'文件只有部分上传',
			4=>'没有文件被上传',
			6=>'找不到临时文件',
			7=>'文件写入失败',
			8=>'文件目录创建失败',
			9=>'文件大小超出规定',
			10=>'文件后缀不正确',
			11=>'没有该文件域的文件',
			12=>"文件移动失败"
		);
		
		  public function up($key)
		  {
		  	
		  	if(!isset($_FILES[$key]))
			{
				
				return FALSE;
			}
			
			//获取上传文件
			$f=$_FILES[$key];
			
			
			//判断错误号
			if($f['error'])
			{
				$this->errorno=$f['error'];
			}
			
			
			//获取后缀名
			
			$Ext=$this->getExt($f['name']);
			
			if(!$this->isallowExt($Ext))
			{
				$this->errorno=10;
				return FALSE;
			}
			
		
			
			
			
			//检查大小
			if(!$this->maxsize($f['size']))
			{
					$this->errorno=9;
				return FALSE;
			}
			
			//获取随机文件名
			$randname=$this->randName().'.'.$Ext;
			
			//创建目录
			$dir=$this->mk_dir().'/'.$randname;
			if(!move_uploaded_file($f['tmp_name'], $dir))
			{
				$this->errorno=12;
				return false;
			}
			return str_replace(ROOT, "", $dir);
			
			
		  }
		  
		  	//动态改变允许的后缀名
			public function setExt($ext)
			{
				$this->allowExt=$ext;
			}
			
			//动态改变允许的文件大小
			public function setSize($size)
			{
				$this->maxsize=$size;
			}
			
			
		  //获取文件后缀名
		  public function getExt($file)
		  {
		  	 $tmp=explode('.', $file);
		      return end($tmp);
		  }
		
		protected function isallowExt($Ext)
		{
			$tmp=explode(',', $this->allowExt);
				if(in_array($Ext,$tmp))
			{
				return true;
			}
			else
				{
				return FALSE;
				}
		}
		   
		  public function maxsize($size)
		  {
		  	if($size<=$this->maxsize*1024*1024)
			{
				return true;
			}
			else
				{
				return FALSE;
				}
			
		  }
		  
		  protected function mk_dir()
		  {
		  	$dir=ROOT.'data/images/'.date('Ym/d');
			if(is_dir($dir)||mkdir($dir,0777,true))
			{
				return $dir;
			}
			else
				{
				$this->errorno=8;
				return FALSE;
				}
		  }
		
		
		  protected function randName($lenght=6)
		   {
		   	$str='qwertyuiopasdfghjklzxcvbnm123456789';
			return substr(str_shuffle($str),0,$lenght);
		   	
		   }
		
		//获取错误信息
		 public function geterr()
		 {
		 	return $this->error[$this->errorno];
		 }
		
		
		
	}
	
	?>