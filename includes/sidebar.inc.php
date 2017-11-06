<ul>
					<li>
					<?php


				if(isset($_SESSION['status']))
				{
					echo '<h2 class="title">Hello '.$_SESSION['unm'].'!</h2>';
				}
				else
				{
					echo'
						<form action="process_login.php" method=POST>
						<b>Login:</b><br> <input type="text" name="unm" >
						<br>
						<br>
						<b>Password:</b><br><input type="password" name="pwd">
						<br>
						<br>
						<b>TYPE:<br><br><select name="cat">
										<option> Employee
										<option> Employer
										</select>
						<br>
						<br>
						<b><input type="submit" value="login">
                                                
						
                                         
						
						</form>
					';

					
				}
				?>
					</li>
					<li>
						<h2>Categories </h2>
						<ul>
					<?php
						$link=mysql_connect("localhost","root","")or die("can not connect");
						mysql_select_db ("ehire",$link) or die("can not select database");
						$q="select * from categories";
						$res=mysql_query($q,$link) or die("cant connect");
						while($row=mysql_fetch_assoc($res))
						{
							echo '<li><a href="jobs_by_category.php?cat='.$row['cat_nm'].'">'.$row['cat_nm'].'</a></li>';
						}
						mysql_close($link);
					?>
	
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
							



						</ul>
					</li>
					
				</ul>