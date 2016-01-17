<?php date_default_timezone_set("Asia/Hong_kong");
  session_start();

  include_once("../php/config.php");


    $result = mysql_query("SELECT * FROM fr_path WHERE user_id = '".$_POST['user_id']."'");
    $row = mysql_fetch_array($result);
    
  $ItemCnt = count($_POST['subject']);
  for($i=0; $i < $ItemCnt; $i++) 
  {
    $path = $row['url'];
    //$path = $row['pathName']."/".$row1['Position']."/".$row1['LastN'].", ".$row1['FirstN'];
    
    $date = date ("d/m/y");
    $time = date ("H:i:s");


    if(!file_exists(".".$path."/".$_POST['sy'][$i])) 
    {
        mkdir(".".$path."/".$_POST['sy'][$i], 0700, true);
       /* if(mkdir(".".$path."/".$_POST['sy'][$i], 0700, true))
        {

          //mysql_query("INSERT INTO fr_path (url,user_id) VALUES('".$path."/".$_POST['sy'][$i]."','".$_POST['sy'][$i]."','".$row2['pathID']."')");
        }*/
    } 
   
    if(!file_exists(".".$path."/".$_POST['sy'][$i]."/".$_POST['sem'][$i])) 
    {
        mkdir(".".$path."/".$_POST['sy'][$i]."/".$_POST['sem'][$i], 0700, true);
        /*if(mkdir(".".$path."/".$_POST['sy'][$i]."/".$_POST['sem'][$i], 0700, true))
        {
           //mysql_query("INSERT INTO fr_path (pathName,Folder_Name,Parent_F) VALUES('".$path."/".$_POST['sy'][$i]."/".$_POST['sem'][$i]."','".$_POST['sem'][$i]."','".$rowpathid['pathID']."')");
        } */ 
    }

   $path .= "/".$_POST['sy'][$i]."/".$_POST['sem'][$i]."/".$_POST['subject'][$i];

    if(!file_exists(".".$path))
    {
        mkdir(".".$path, 0700, true);
        if(mysql_query("INSERT INTO fr_ins_subject(user_id,Subject,SubPath,Date_Created,Time_Created) VALUES('".$_POST['user_id']."','".$_POST['subject'][$i]."','".$path."','".$date."','".$time."')") or die("Error:". mysql_error()))
        {
            mysql_query("UPDATE fr_subject SET status = 'ASSIGNED' WHERE SubCode = '".$_POST['subject'][$i]."'");
        }
    }
    else
    {
        echo '<script> alert("File is already exists!"); window.location.href="../subjectmanagement.php?faculty=add"; </script>';
    }
    
    
  }
  echo '<script> alert("Successfully Load"); window.location.href="../subjectmanagement.php?subject=faculty"; </script>';
  
?>