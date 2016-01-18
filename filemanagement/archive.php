<?php date_default_timezone_set("Asia/Hong_kong");
session_start();
include_once("../php/config.php");
require('../dirLIST_files/config.php');
require('../dirLIST_files/functions.php');

$item_name = base64_decode($_GET['item_name']);
   
if($item_name == 'Archive')
{
   header("Location: ../index.php?folder=".$_POST['folder']."&err=".base64_encode("archive_error"));
    exit;
}
else
{
    if(!empty($_GET['folder']))
    {
        $item_path = '../'.$dir_to_browse;
    }
    else
    {
        $item_path = '../'.$dir_to_browse.base64_decode($_GET['folder']);
    }   
        $item_path .= (empty($_GET['folder'])) ? $item_name : $item_name;
    
    if(is_dir($item_path))
    {
          $result = mysql_query("SELECT * FROM fr_path WHERE user_id = '".$_SESSION['user_id']."'");
          $row = mysql_fetch_array($result);

          if(!is_dir('.'.$row['url'].'/Archive'))
          {
            mkdir('.'.$row['url'].'/Archive');
          }

        $source = $item_path."/";
        $destination = '.'.$row['url'].'/Archive'.'/'.$item_name.'/';

        $date = date ("y/m/d");
   
        $new = $row['url'].'/Archive'.'/'.$item_name;
        
        if(mysql_query("SELECT * FROM fr_path WHERE name != '".$item_name."'"))
        {
            mysql_query("INSERT INTO fr_archive(user_id,url,name,date) VALUES('".$_SESSION['user_id']."','".$new."','".$item_name."','".$date."') ") or die('error: '. mysql_error());
        }
           
        rcopy($source ,$destination);

        delete_directory($item_path.'/', 0);


        header("Location: ../index.php?folder=".$_GET['folder']);
        exit;
    }
    else
    {
        header("Location: ../index.php?folder=".$_POST['folder']."&err=".base64_encode("archive_file_error"));
        exit;
    }

}


  // Function to Copy folders and files       
function rcopy($src, $dst) {
    if (is_dir ( $src )) {
        if(!file_exists($dst))
            mkdir ( $dst );
        $files = scandir ( $src );
        foreach ( $files as $file )
            if ($file != "." && $file != "..")
                rcopy ( "$src/$file", "$dst/$file" );
    } else if (file_exists ( $src ))
        copy ( $src, $dst );
}

?>