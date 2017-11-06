<?php session_start();
if(empty($_POST))
{
	exit;
}

if(empty($_POST['unm'])||empty($_POST['pwd'])||empty($_POST['cat']))
{
	$message ="Enter username and password";
}
if($_POST['cat']=='Employee')
{


	$link = mysql_connect("localhost","root","") or die("Cannot Connect");
	mysql_select_db("ehire",$link) or die("Cant select db");
	
	$q = "select * from employees where ee_fnm = '".$_POST['unm']."'";
	
	$res = mysql_query($q,$link) or die("wrong query");
	
	$row = mysql_fetch_assoc($res);
	
	
	if(!empty($row))
	{
		if($_POST['pwd']==$row['ee_pwd'])
		{
			//login
			$_SESSION = array();
			
			$_SESSION['unm']=$row['ee_fnm'];
			$_SESSION['eeid']=$row['ee_id'];
			$_SESSION['cat']='employee';
			$_SESSION['status']=1;
			$_SESSION['employee']=1;
			
			header("location:index.php");
		}
		else
		{
			$message ="Invalid user name and password";
		}
	}
	else
	{
		$message= "No such user";
	}
	
}	
	
if($_POST['cat']=='Employer')
{


	$link = mysql_connect("localhost","root","") or die("Cannot Connect");
	mysql_select_db("ehire",$link) or die("Cant select db");
	
	$q = "select * from employers where er_fnm = '".$_POST['unm']."'";
	
	$res = mysql_query($q,$link) or die("wrong query");
	
	$row = mysql_fetch_assoc($res);
	
	
	if(!empty($row))
	{
		if($_POST['pwd']==$row['er_pwd'])
		{
			//login
			$_SESSION = array();
			
			$_SESSION['unm']=$row['er_fnm'];
			$_SESSION['eid']=$row['er_id'];
			$_SESSION['cat']='employer';
			$_SESSION['status']=1;
			$_SESSION['employer']=1;
			header("location:index.php");
		}
		else
		{
			$message ="Enter user name or password";
                      
		}
	}
	else
	{
		$message ="No such user";
        	
	}
        
	
	
}
echo $msg;
header("location:index.php");
?>