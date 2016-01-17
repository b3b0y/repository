<?PHP date_default_timezone_set("Asia/Hong_kong");
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

     $url = $row['SubPath'];

    $result = mysql_query("SELECT * FROM  fr_stud_subject WHERE subject = '".$mainfolder."'");
    if(mysql_num_rows($result) > 0)
    {

        $date = date ("y/m/d");
        $time = date ("H:i:s");

        $url .= '/'.$folder;
        while ($row3 = mysql_fetch_array($result)) 
        {
            $result2 = mysql_query("SELECT * FROM fr_share_folder WHERE shared_name = '".$mainfolder.'_'.$folder."' AND user_id = '".$row3['user_id']."'");
            if(mysql_num_rows($result2) > 0)
            {
                mysql_query("UPDATE fr_share_folder SET download =  '".$_POST['download']."', upload =  '".$_POST['upload']."'");
            }
            else
            {
                mysql_query("INSERT INTO fr_share_folder(owner_id,user_id,url,shared_name,download,upload,date_shared,time_shared) VALUES('".$_SESSION['user_id']."','".$row3['user_id']."','".$url."','".$mainfolder.'_'.$folder."','".$_POST['download']."','".$_POST['upload']."','".$date."','".$time."')") or die ("Error: ". mysql_error());
            }
        }
         $rename_action = TRUE;   
    }

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Folder Name: <?PHP echo basename(base64_decode($_GET['item_name'])); ?></title>

    <link href="../css/style.css" type="text/css" rel="stylesheet" />
    <link href="../css/jquery.simple-dtpicker.css" rel="stylesheet" type="text/css"  />

    <script type="text/javascript" src="../Javascript/jQuery v1.7.js"></script>
    <script type="text/javascript" src="../Javascript/jquery.simple-dtpicker.js"></script>


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
        <form id='Folder' action='share_form.php' method='post' accept-charset='UTF-8'>
           <input name="folder" type="hidden" id="folder" value="<?PHP echo $_GET['item_name']; ?>" />
            <input name="mainfolder" type="hidden" value="<?PHP echo $folder; ?>" />
            <fieldset>
                <legend>Select Permission </legend>
                <div class="wish_payment_type">
                    <input class="check_boxes required" id="wish_payment_type_1" type='checkbox' name='upload' value='1'/> Upload 
                    <br/>
                    <br/>
                    <input class="check_boxes required" id="wish_payment_type_2" type='checkbox' name='download' value='1'/> Download

                </div>
            </fieldset>        
            
            <br/>
            <input type='submit' name='Submit' value='Submit' />
            <a href="javascript:fg_hideform('fg_formshare','fg_backgroundpopup');"> <input type='button' name='Submit' value='Close' /> </a>
        </form>
<?PHP 

} 
?>
</body>
</html>

