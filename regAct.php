<?php
    define('ACC',true);
	require('./include/init.php');
	
	
	$user=new UserModel();
	$data=$user->_facade($_POST);
	$data=$user->_autofill($data);
	


	if(!$user->_validate($data))
	{
		
		echo $user->getErr();
		exit;
	}
	
		if($user->checkUser($data['username']))
	{
		echo "用户名已经存在";
		exit;
	}
	if($user->reg($data))
	{
		echo '用户注册成功';
	
//		require('./view/front/msg.html');
	}
	else 
		{
			echo '用户注册失败';
		}
    

 ?>