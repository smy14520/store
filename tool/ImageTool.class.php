<?php

    class ImageTool{
    	public static function imageInfo($image)
	          {
	          	if(!file_exists($image))
				{
					echo '没有文件';
					return false;
				}
				$info=getimagesize($image);
				if($info==FALSE)
			     {
			     	echo "没有获取文件";
			     	return false;
			     }
				 
				 $img['width']=$info[0];
				 $img['height']=$info[1];
				 $img['ext']=substr($info['mime'],strpos($info['mime'],'/')+1);
				return $img;
	          }
		

	 /*
	  * 加水印功能
	  * Parm string $dst 操作图片
	  * Parm string $water 水印小图
	  * Parm string $save 不填则默认替换原始图
	  * Parm int       $pos  水印的位置  0 1 2 3
	  * */
	 public static function water($dst,$water,$save,$alpha=50,$pos=5)
	 {
	 	if(!file_exists($dst)|| !file_exists($water))
		{
			echo "文件不存在";
			return FALSE;
		}
		
		
	 	$dinfo=self::imageinfo($dst);
		$winfo=self::imageinfo($water);
		
		if($winfo["height"]>$dinfo['height'] || $winfo["width"]>$dinfo['width'])
		{
			echo "宽度不对";
			return false;
		}
		
		$dfunc='imagecreatefrom'.$dinfo['ext'];
		$wfunc='imagecreatefrom'.$winfo['ext'];
		if(!function_exists($dfunc)||!function_exists($wfunc))
		{
			echo "后缀名函数失败";
			return false;
			
		}
		$dim=$dfunc($dst);
		$wim=$wfunc($water);
		
		switch($pos)
		{
			case 0://左上角
			$posx=0;
			$posy=0;
			break;
			
			case 1://右上角
			$posx=$dinfo['width']-$winfo['width'];
			$posy=0;
			break;
			
			case 3://左下角
			$posx=0;
			$posy=$dinfo['height']-$winfo['height'];
			break;
			
			case 3://左下角
			$posx=0;
			$posy=$dinfo['height']-$winfo['height'];
			break;
			
			default:
				$posx=$dinfo['width']-$winfo['width'];
				$posy=$dinfo['height']-$winfo['height'];
		}
		
		
		imagecopymerge($dim, $wim, $posx, $posy, 0, 0, $winfo["width"], $winfo["height"], $alpha);
		
		if(!$save)
		{
			$save=$dst;
			unlink($dst);
		}
		$createfunc='image'.$dinfo['ext'];
		$createfunc($dim,$save);
		imagedestroy($dim);
		imagedestroy($wim);
		return true;
	 }
	  public static function thumb($dst,$save=NULL,$width=200,$height=200)
	  {
	  	$dinfo=self::imageInfo($dst);
	  	if($dinfo==false)
		{
			echo "文件不存在";
			return FALSE;
		}
		
		//计算缩放比例
		$calc=min($width/$dinfo['width'],$height/$dinfo['height']);
		$dfunc='imagecreatefrom'.$dinfo['ext'];
		$dim=$dfunc($dst);
		
		//创建缩略画布
		$tim=imagecreatetruecolor($width,$height);
		
		$white=imagecolorallocate($tim, 255, 255, 255);
		
		//填充缩略画布
		imagefill($tim,0,0,$white);
		
		$dwidth=(int)$dinfo['width']*$calc;
		$dheight=(int)$dinfo['height']*$calc;
		
		$paddingx=($width-$dwidth)/2;
		$paddingy=($height-$dheight)/2;
		
		imagecopyresampled($tim, $dim, $paddingx, $paddingy, 0, 0, $dwidth, $dheight, $dinfo['width'], $dinfo['height']);
		
		//保存图片
		if(!$save)
		{
			$save=$dst;
			unlink($dst);
			
		}
		$createfunc='image'.$dinfo['ext'];
		$createfunc($tim,$save);
		
		imagedestroy($dim);
		
		return TRUE;
		
	  }
	   }
	 
//	ImageTool::thumb('..\data\images\201603\04\0.jpg','..\data\images\1.jpg',200,200);
  
  ?>