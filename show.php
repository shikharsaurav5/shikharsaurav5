<?php session_start();

	if(! isset($_SESSION['status']))
	{
		header("location:index.php");
	}
		$link=mysql_connect("localhost","root","")or die("can not connect");
		mysql_select_db("ehire",$link) or die("can not select database");
		
		$q="select * from employees where ee_id in(select a_uid from applicants where a_jid=".$_GET['id']." )";
	
		$res=mysql_query($q,$link) or die ("wrong query");
		
		
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php
include("includes/head.inc.php");
?>
</head>
<body>
<div id="header-wrapper">
	<div id="header">
	<div id="menu">
		<?php
		include("includes/menu.inc.php");
		?>
		</div>
		<!-- end #menu -->
		<div id="search">
		<?php
		
		include("includes/search.inc.php");
		?>
		</div>
		<!-- end #search -->
	</div>
</div>
<!-- end #header -->
<!-- end #header-wrapper -->
<div id="logo">
	<?php
	include("includes/logo.inc.php");
	?>
	</div>
<div id="wrapper">
	<div id="page">
		<div id="page-bgtop">
			<hr />
			<!-- end #logo -->
			<div id="content">
				<div class="post">
					
					<h2 class="title"><?php echo $_GET['nm']; ?></h2>
					<p class="meta"></p>
					<div class="entry">
				
					<table border="0" width="100%">
				
				<tr>
						<td width="10%">No
						<td width="50%">Name
						<td width="30%">Resume
						
					</tr>
				
					
				<?php
				$count=1;
					while($row=mysql_fetch_array($res))
					{
						
						echo '<tr> <td width="10%">'.$count.'
								<td width="50%">'.$row['ee_fnm'].'
								<td width="30%"><a href="'.$row['ee_resume'].'">resume</a>
								';
							$count++;
					}
				?>
				
					</table>
						
					</div>
				</div>
				
			</div>
			<!-- end #content -->
			<div id="sidebar">
			<?php
		include("includes/sidebar.inc.php");
		?>	
			</div>
			<!-- end #sidebar -->
			<div style="clear: both;">&nbsp;</div>
		</div>
	</div>
</div>
<!-- end #page -->
<div id="footer-bgcontent">
	<div id="footer">
		<?php
		include("includes/footer.inc.php");
		?>	
	</div>
</div>
<!-- end #footer -->
</body>
</html>
