<?php  session_start();
include_once("../php/config.php");

	if(!isset($_SESSION['login'])) 
	{
	      header("Location: ../login.php");
	} 

$bol = false;


if(isset($_GET['faculty']) && $_GET['faculty'] == "faculty")
{
	if(isset($_POST['uname']) || !trim($_POST['uname']) == "" || isset($stop)) 
	{
		$uname = mysql_escape_string(trim($_POST['uname']));
		$stop == 0;
	}
	if(isset($_POST['Ulevel']) || !trim($_POST['Ulevel']) == "" || isset($stop)) 
	{
		$ulvl = mysql_escape_string(trim($_POST['Ulevel']));
		$stop == 0;
	}

	if(isset($_POST['pass']) || !trim($_POST['pass']) == "" || isset($stop)) 
	{
		$pass = mysql_escape_string(trim($_POST['pass']));
		$stop == 0;
	}
	if(isset($_POST['repass']) || !trim($_POST['repass']) == "" || isset($stop)) 
	{
		$repass = mysql_escape_string(trim($_POST['repass']));
		$stop == 0;

	}

	if($ulvl > 1)
	{

		if(isset($_POST['Lname']) || !trim($_POST['Lname']) == "" || isset($stop)) 
		{
			$Lname = mysql_escape_string(trim($_POST['Lname']));
			$stop == 0;
		}

		if(isset($_POST['Fname']) || !trim($_POST['Fname']) == "" || isset($stop)) 
		{
			$Fname = mysql_escape_string(trim($_POST['Fname']));
			$stop == 0;
		}
		if(isset($_POST['Mname'])  || isset($stop)) 
		{
			$mname = mysql_escape_string(trim($_POST['Mname']));
			$stop == 0;

		}
	}
		if($pass == $repass)
		{
			
			$qry = mysql_query("SELECT username FROM fr_user") or die("Query : " . mysql_error());
			
			while ($row = mysql_fetch_array($qry)) 
			{
				unset($_SESSION['CFail']);
				unset($_SESSION['UFail']);
				
				if($uname == $row['username'])
				{
					$stop = 1;
					$_SESSION['lname'] = $Lname;
					$_SESSION['fname'] = $Fname;
					$_SESSION['mname'] = $mname;
					$_SESSION['ulvl'] = $ulvl;
					echo $_SESSION['UFail'] = "User Name is available";
					
					break;
				}
				
			}

			
			if($stop == 0)
			{	

				$result = mysql_query("SELECT * FROM fr_path WHERE user_id = 1");
				$row = mysql_fetch_array($result);
				$url = $row['url']."/";

				if($ulvl == 3)
				{
					$path = $url."Instructor/".$Lname.', '.$Fname."";	

					$Ulevel = "Instructor";

					if(!file_exists(".".$url."Instructor")) 
					{
					  mkdir(".".$url."Instructor", 0700, true);
					}
				}
				else if($ulvl == 4)
				{
					$path = $url."Dean/".$Lname.', '.$Fname."";		

					$Ulevel = "Dean";


					if(!file_exists(".".$url."Dean")) 
					{
					    mkdir(".".$url."Dean", 0700, true);
					}
				}
				
				$sql = "INSERT INTO fr_user (username,password,UserLvl) VALUES ('".$uname."','".$pass."','".$ulvl."')";
				$qry = mysql_query($sql) or die("Account Query  : "  . mysql_error());

				if($ulvl > 1)
				{
					$result = mysql_query("SELECT id FROM fr_user WHERE username ='".$uname."'");
					$row = mysql_fetch_array($result);

					mysql_query("INSERT INTO fr_staff (user_id,FirstN,LastN,midN) VALUES('".$row['id']."','".$Fname."','".$Lname."','".$mname."')") or die("Paths Query  : "  . mysql_error());
					
					mysql_query("UPDATE fr_user SET status = 'offline' WHERE username = '".$uname."'");
					
					$result2 = mysql_query("SELECT * FROM fr_user  WHERE username = '".$uname."'");
					$row2 = mysql_fetch_array($result2);
					
					mysql_query("INSERT INTO fr_path(url,user_id) VALUES('".$path."','".$row2['id']."')");
					
					mkdir (".".$path, 0700);
				
					mysql_query("INSERT INTO fr_user_permissions(user_id,upload,download,download_folders,create_folders,share,change_pass,rename_F,delete_F) VALUES('".$row['id']."','1','1','1','0','0','1','0','0')");
				}



				unset($_SESSION['uname']);
				unset($_SESSION['lname']);
				unset($_SESSION['fname']);
				unset($_SESSION['mname']);
				unset($_SESSION['ulvl']);
				unset($_SESSION['CFail']);
				unset($_SESSION['UFail']);
				
				echo '<script> alert("Successfully Added"); window.location.href="../user.php?faculty=true"; </script>';

			}
		}
		else
		{
			$_SESSION['uname'] = $uname;
			$_SESSION['lname'] = $Lname;
			$_SESSION['fname'] = $Fname;
			$_SESSION['mname'] = $mname;
			$_SESSION['ulvl'] = $ulvl;
			$stop = 1;
			echo '<script> alert("Password did not match"); window.location.href="../user.php?faculty=true"; </script>';
			
		}	
}
else if(isset($_GET['student']) && $_GET['student'] == "student")
{
	if(isset($_POST['Fname']))
	{
		$Fname = mysql_escape_string(trim($_POST['Fname']));
	}
	if(isset($_POST['Lname']))
	{
		$Lname = mysql_escape_string(trim($_POST['Lname']));
	}

	if(isset($_POST['Mname']))
	{
		$Mname = mysql_escape_string(trim($_POST['Mname']));
	}

	if(isset($_POST['course']))
	{
		$course = mysql_escape_string(trim($_POST['course']));
	}

	if(isset($_POST['year']))
	{
		$year = mysql_escape_string(trim($_POST['year']));
	}

	if(isset($_POST['Idnum']))
	{
		$Idnum = mysql_escape_string(trim($_POST['Idnum']));
		
	}

	if(isset($_POST['pass'])) 
	{
		$pass = mysql_escape_string(trim($_POST['pass']));
	}

	$result = mysql_query("SELECT * FROM fr_stud") or die("Student Search Query : " . mysql_error());

		if(mysql_num_rows($result) > 0)
		{
			while ($row = mysql_fetch_array($result)) 
			{
				if($Idnum == $row['ControlNo'])
				{
					$_SESSION['lname'] = $Lname;
					$_SESSION['fname'] = $Fname;
					$_SESSION['mname'] = $Mname;
					$_SESSION['course'] = $course;
					$_SESSION['year'] = $year;
					$_SESSION['cfail'] = "Control number is already used";

					$bol = true;

					echo '<script>  window.location.href="../user.php?user=student";</script>';
				}
			}
		}
		if($bol == false)
		{
			if(!isset($row['ControlNo']))
			{
				mysql_query("INSERT INTO fr_user (username,password,UserLvl,status) VALUES ('".$Idnum."','".$pass."','1','pending')") or die("User Query  : "  . mysql_error());
				
				$result = mysql_query("SELECT id FROM fr_user WHERE username ='".$Idnum."'");
				$row = mysql_fetch_array($result);

				mysql_query("INSERT INTO fr_stud(user_id,ControlNo,FName,LName,Mname,Course,Year) VALUES ('".$row['id']."','".$Idnum."','".$Fname."','".$Lname."','".$Mname."','".$course."','".$year."')") or die("Stud Query  : "  . mysql_error());

				unset($_SESSION['genpass']);

				unset($_SESSION['lname']);
				unset($_SESSION['fname']);
				unset($_SESSION['mname']);
				unset($_SESSION['course']);
				unset($_SESSION['year']);
				unset($_SESSION['cfail']);
				
				echo '<script> alert("Successfully Added"); window.location.href="../user.php?student=true"; </script>';
			}
		}
}
?>