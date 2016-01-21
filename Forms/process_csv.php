<?php 
include_once("../php/config.php");

	$Idnum = "";
	$Fname = "";
	$Mname = "";
	$Lname = "";
	$course = "";
	$year = "";
	$pass = "";

if (isset($_POST['Submit'])) {
  
    $path_parts = pathinfo($_FILES["csv"]["name"]);
    $extension = $path_parts['extension'];

    if($extension == 'csv' && $_FILES["csv"]["name"] == 'Student.csv')
    {
	    //get the csv file
	    $file = $_FILES['csv']['tmp_name'];
	    $handle = fopen($file,"r");
	    
		$firstline = true;
		while (($data = fgetcsv($handle, 10000, ",")) !== FALSE)
		{
			if (!$firstline) 
			{
				$Idnum = addslashes($data[0]);
				$Fname = addslashes($data[1]);
				$Mname = addslashes($data[2]);
				$Lname = addslashes($data[3]);
				$course = addslashes($data[4]);
				$year = addslashes($data[5]);
				$pass = addslashes($data[6]);


				$result = mysql_query("SELECT * FROM fr_stud WHERE ControlNo = '".$Idnum."'") or die("Student Search Query : " . mysql_error());

				if(mysql_num_rows($result) == 0)
				{	
					mysql_query("INSERT INTO fr_user (username,password,UserLvl,status) VALUES ('".$Idnum."','".$pass."','1','pending')") or die("User Query  : "  . mysql_error());

				}

				$result = mysql_query("SELECT id FROM fr_user WHERE username ='".$Idnum."'");

				$row = mysql_fetch_array($result);

				mysql_query("INSERT INTO fr_stud (user_id,ControlNo,FName,LName,Mname,Course,Year) VALUES ('".$row['id']."','".$Idnum."','".$Fname."','".$Lname."','".$Mname."','".$course."','".$year."') ON DUPLICATE KEY UPDATE ControlNo ='".$Idnum."', FName = '".$Fname."' , LName = '".$Lname."', Mname = '".$Mname."' , Course = '".$course."' , Year = '".$year."'") or die("Stud Query  : "  . mysql_error());
			}
			$firstline = false;
		}
		echo '<script> alert("Successfully Added"); window.location.href="../user.php?student=true"; </script>';
	}
	else
    {
        echo "<script> alert('Please Select Student.csv file'); window.location.href='../user.php?student=true'; </script>";
    }
}

	
?>

