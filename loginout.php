<?php 


define('ACC', true);
require('./include/init.php');



session_destroy();

$msg='退出成功';
		
header("location:msg.php?msg=".$msg);
