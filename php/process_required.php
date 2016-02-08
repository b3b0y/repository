<?php date_default_timezone_set("Asia/Hong_Kong");
	session_start();
	include_once("config.php");
	$cont = "";


		$result = mysql_query("SELECT * FROM fr_user WHERE username = '".$_POST['uname']."'");

		if(mysql_num_rows($result) > 0)
		{
			while ($acct = mysql_fetch_array($result)) 
			{
				if($_POST['uname'] == $acct['username'])
				{
					echo '<script> alert("Username is already used");  window.location.href="../Required.php"; </script>';
				}
			}
		}
		else
		{
			if($_POST['Npass'] == $_POST['Conpass'])
			{
				
				$result = mysql_query("SELECT * FROM fr_stud WHERE ControlNo = '".$_SESSION['user']."'");

				$row = mysql_fetch_array($result);

				$result1 = mysql_query("SELECT * FROM fr_user WHERE id = '".$row['user_id']."'");
				$row1 = mysql_fetch_array($result1);

				$result2 = mysql_query("SELECT * FROM Position WHERE UserLvl = '".$row1['UserLvl']."'");
				$row2 = mysql_fetch_array($result2);

				//Create Folder
				$path  = './Data/'.$row2['Position']."/".$row['Course'].'/'.$row['LName'].'-'.$row['ControlNo']."";
				
				if(!file_exists("../Data/".$row2['Position'])) 
				{
				  mkdir("../Data/".$row2['Position'], 0700, true);
				}

				if(!file_exists("../Data/".$row2['Position']."/".$row['Course'])) 
				{
				    mkdir("../Data/".$row2['Position']."/".$row['Course'], 0700, true);
				}
					

				mysql_query("INSERT INTO fr_path (url,user_id) VALUES('".$path."','".$row['user_id']."')");
			    mkdir ('.'.$path, 0700);
					
				//update login status
				mysql_query("UPDATE fr_user SET status = 'offline' , username = '".$_POST['uname']."' , password = '".$_POST['Npass']."' WHERE username = '".$_SESSION['user']."'");

				mysql_query("INSERT INTO fr_user_permissions(user_id,upload,download,create_folders,rename_F,delete_F) VALUES('".$row['user_id']."','1','1','1','1','1')");

				$_SESSION['cUser'] = $_POST['uname'];
				$_SESSION['cpass'] = $_POST['Npass'];
				$_SESSION['cont'] = 1;
				echo '<script> alert("Your account is Successfully Activated Press ok to Login"); window.location.href="process_login.php"; </script>';
			}
			else
			{
				echo '<script> alert("Confirm password not match");  window.location.href="../required.php"; </script>';
				
			}
		}	

?>