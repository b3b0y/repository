<?php date_default_timezone_set("Asia/Hong_kong");
session_start();
include_once("../php/config.php");
require('../dirLIST_files/config.php');
require('../dirLIST_files/functions.php');


if(!empty($_GET['folder'])) 
{ 
    $folder = basename($_GET['folder']);
} 
else 
{ 
    $folder = basename($_SESSION['folder1']); 
}

$rename_action = FALSE;
    
    if($_POST['Submit'] == 'Submit')
    {
             
        $mainfolder = $_POST['mainfolder'];
        $folder = basename(base64_decode($_POST['folder']));

        $result = mysql_query("SELECT * FROM  fr_ins_subject WHERE Subject = '".$mainfolder."' ");
        $row = mysql_fetch_array($result);

        $folder_id = $row['id'];

        $result = mysql_query("SELECT * FROM  fr_share_folder  WHERE shared_name = '".$mainfolder.'_'.$folder."'");
        if($Count = mysql_num_rows($result) > 0 )
        {

            $row2 = mysql_fetch_array($result);
            for ($i=0; $i < $Count ; $i++) { 
               mysql_query("UPDATE fr_share_folder SET status =  'set' WHERE shared_name = '".$mainfolder.'_'.$folder."'");
            }
          
            mysql_query("INSERT INTO fr_deadline(folder_id,date_deadline,time_deadline,status) VALUES('".$row2['folder_id']."','".$_POST['date']."','".$_POST['time']."','open')");    
        }  

            $result2 = mysql_query("SELECT * FROM  fr_share_folder  WHERE shared_name = '".$mainfolder.'_'.$folder."'");
            while ($row3 = mysql_fetch_array($result2))
            {
             
             $link = 'index.php?share='.$row3['id'];

              $message = $row3['shared_name'].' is set a Deadline on '.$_POST['date'].' '.$_POST['time'];          
                  
              $date = date ("y/m/d H:i:s");

              mysql_query("INSERT INTO fr_notification(user_id,link,message,status,Date) VALUES('".$row3['user_id']."','".$link."','".$message."','unread','".$date."')");
            }

         $rename_action = TRUE;
    }

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Folder Name: <?PHP echo basename(base64_decode($_GET['item_name'])); ?></title>

   
    <link href="../css/bootstrap-combined.min.css" rel="stylesheet">
    <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet" />

    


    <script type="text/javascript">
    function close_window()
    {
        window.opener.location.reload();
        window.close();
    }

    function onload_events()
    {
        <?PHP if($rename_action == TRUE) echo 'close_window();'; ?>
        document.getElementById('new_name').focus();    
        
    }
    </script>

</head>

<body onload="onload_events();">
<?PHP if(!$rename_action) { ?>
    <header>
        <h2> Set Date / Time Deadline</h2>
    </header> 

        <form  action="" method='post' accept-charset='UTF-8'> 
            <input name="folder" type="hidden" id="folder" value="<?PHP echo $_GET['item_name']; ?>" />
             <input name="mainfolder" type="hidden" value="<?PHP echo $folder; ?>" />
             <div class="well">
              <div id="datetimepicker4" class="input-append">
                <input name="date" data-format="yyyy-MM-dd" type="text"></input>
                <span class="add-on">
                  <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                  </i>
                </span>
              </div>
              <div id="datetimepicker3" class="input-append">
                <input  name="time" data-format="hh:mm:ss" type="text"></input>
                <span class="add-on">
                  <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                  </i>
                </span>
              </div>
            </div>
            <input class="buttom" type='submit' name='Submit' value='Submit' />
        </form>
<?PHP 
} 
?>

     <script type="text/javascript" src="../js/jquery-1.9.1.min.js">
    </script> 
    <script type="../js/bootstrap.min.js">
    </script>
    <script type="text/javascript" src="../js/bootstrap-datetimepicker.min.js"></script> 
    <script type="text/javascript" src="../js/bootstrap-datetimepicker.pt-BR.js">
    </script>

    <script type="text/javascript">
      $(function() {
        $('#datetimepicker4').datetimepicker({
          pickTime: false
        });
      });
    </script>
    <script type="text/javascript">
      $(function() {
        $('#datetimepicker3').datetimepicker({
          pickDate: false
        });
      });
    </script>
</body>
</html>

