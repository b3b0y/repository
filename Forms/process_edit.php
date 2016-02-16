<?php session_start();
include_once("../php/config.php");

	if(!isset($_SESSION['login'])) 
	{
		header("Location: ../login.php");
	} 

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
				$result = mysql_query("SELECT * FROM fr_user WHERE id = '".$_POST['id'] ."' AND username = '".$uname."' ");
				if(mysql_num_rows($result) == 0)
				{
					$stop = 1;
					$_SESSION['lname'] = $Lname;
					$_SESSION['fname'] = $Fname;
					$_SESSION['mname'] = $mname;
					$_SESSION['ulvl'] = $ulvl;
					$_SESSION['pass'] = $pass;
					$_SESSION['UFail'] = "User Name is already used";
					
					unset($_SESSION['uname']);
					unset($_SESSION['pFail']);

					header("Location: ../user.php?user=edit_faculty&&id=".$_POST['id']);
				}

				if($stop == 0)
				{	
					mysql_query("UPDATE fr_user SET username= '".$uname."',password= '".$pass."',UserLvl = '".$ulvl."' WHERE id = '".$_POST['id'] ."'");

					mysql_query("UPDATE fr_staff SET FirstN= '".$Fname."',LastN = '".$Lname."', midN= '".$mname."' WHERE user_id = '".$_POST['id'] ."'");

				
					unset($_SESSION['uname']);
					unset($_SESSION['lname']);
					unset($_SESSION['fname']);
					unset($_SESSION['mname']);
					unset($_SESSION['ulvl']);
					unset($_SESSION['UFail']);
					unset($_SESSION['pFail']);
					unset($_SESSION['pass']);

					echo '<script> alert("Successfully Update"); window.location.href="../user.php?faculty=true"; </script>';
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
				$_SESSION['pFail'] = "Password did not match";

				unset($_SESSION['UFail']);
				unset($_SESSION['pass']);

				header("Location: ../user.php?user=edit_faculty&&id=".$_POST['id']);

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

		if(isset($_POST['uname']) || !trim($_POST['uname']) == "" || isset($stop)) 
		{
			$uname = mysql_escape_string(trim($_POST['uname']));
			$stop == 0;
		}

		if(isset($_POST['pass'])) 
		{
			$pass = mysql_escape_string(trim($_POST['pass']));
		}

			$result = mysql_query("SELECT * FROM fr_user WHERE id = '".$_POST['id'] ."' AND username = '".$uname."' ");
			if(mysql_num_rows($result) == 0)
			{
				$stop = 1;
				$_SESSION['lname'] = $Lname;
				$_SESSION['fname'] = $Fname;
				$_SESSION['mname'] = $Mname;
				$_SESSION['course'] = $course;
				$_SESSION['year'] = $year;
				$_SESSION['pass'] = $pass;
				$_SESSION['ControlNo'] = $Idnum;
				$_SESSION['UFail'] = "User Name is already used";
				
				unset($_SESSION['uname']);

				header("Location: ../user.php?user=edit_student&&id=".$_POST['id']);
			}

			$result = mysql_query("SELECT * FROM fr_stud WHERE user_id = '".$_POST['id'] ."' AND ControlNo = '".$Idnum."' ") or die("Student Search Query : " . mysql_error());
			if(mysql_num_rows($result) == 0)
			{
				$_SESSION['lname'] = $Lname;
				$_SESSION['fname'] = $Fname;
				$_SESSION['mname'] = $Mname;
				$_SESSION['course'] = $course;
				$_SESSION['year'] = $year;
				$_SESSION['cfail'] = "Control number is already used";

				$stop = 1;

				unset($_SESSION['ControlNo']);

				header("Location: ../user.php?user=edit_student&&id=".$_POST['id']);
			}

			if($stop == 0)
			{
				mysql_query("UPDATE fr_user SET username= '".$uname."', password= '".$pass."' WHERE id = '".$_POST['id'] ."'");

				mysql_query("UPDATE fr_stud SET ControlNo = '".$Idnum."', FName= '".$Fname."', LName = '".$Lname."', Mname= '".$mname."', Course= '".$course."', Year= '".$year."' WHERE user_id = '".$_POST['id'] ."'");

				unset($_SESSION['lname']);
				unset($_SESSION['fname']);
				unset($_SESSION['mname']);
				unset($_SESSION['course']);
				unset($_SESSION['year']);
				unset($_SESSION['cfail']);
				unset($_SESSION['ControlNo']);
				unset($_SESSION['UFail']);
				unset($_SESSION['uname']);

				echo '<script> alert("Successfully Update"); window.location.href="../user.php?student=true"; </script>';
			}

	}
?>