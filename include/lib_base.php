<?php 
   /*
参数转义

   */
defined('ACC')||exit('ACC Denied');
 function _addslashes($arr){
        foreach ($arr as $k => $v) {
        	if(is_string($v))
        	{
        		$arr[$k]=addslashes($v);
        	}
        	else if(is_array($v))
        	{
        		_addslashes($v);
        	}

        }
        return $arr;
 }

 ?>