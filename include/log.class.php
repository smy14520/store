<?php 

/*
   file log.class.php
   作用:记录信息到日志


*/
defined('ACC')||exit('ACC Denied');
 
    class Log{

        const LOGFILE='log';//建一个常量,代表日志文件的名称

    	//写日志
    	public static function write($cont)
    	{
    		$cont.="\r\n";
    		$log=self::isBak();
    		
    		$fh=fopen($log,'ab');
            fwrite($fh,$cont);
            fclose($fh);

    	}
    	//备份日志
        public static function bak()
         {

         	//把原来的日志文件改成年月日格式
         	//改成年-月-日.bak这种形式
             $log=ROOT.'data/log/'.self::LOGFILE.'.log';
             $bak=ROOT.'data/log/'.date('ymd').mt_rand(1000,99999).'.bak';
             return rename($log,$bak);
          }
         //读取并判断日志的大小
         public static function isBak()
         {
              $log=ROOT.'data/log/'.self::LOGFILE.'.log';
              if(!file_exists($log))
              {
              	touch($log);
              	return $log;
              }

              $size=filesize($log);
           
              if($size<=1024*1024)
              {
              	return $log;
              }
             
              if(!self::bak())
              {
                return $log;
              }
              else
              {
              	touch($log);
              	return $log;
              }
         }
    }
 ?>