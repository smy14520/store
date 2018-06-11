<?php 
 
    define('ACC', true);
	require('./include/init.php');
	
	
	if(isset($_POST['act']))
	{
	    $name=$_POST['username'];
		$pass=$_POST["passwd"];
		
		$user=new UserModel();
	$row=$user->checkUserPas($name,$pass);
	
	
	
	if(count($row))
	{
		$msg='登录成功';
		$_SESSION['user']=$row;
		
		if($_POST['remember']==1)
		{
			setcookie('rememuser',$row['username'],time()+14*24*3600);
		}
		else
			{
				setcookie('rememuser',$row['username'],0);
			}
		header("location:msg.php?msg=".$msg);
	}
	else
	{
		$msg='登录失败';
		
		header("location:msg.php?msg=".$msg);
	}
	}
	else
		{
				require('./view/front/denglu.html');
		}
		

 
?>