<?php 
//  http://buffernow.com/backup-and-restore-class-mysql-database-using-php-script/

require_once('backup_restore.class.php');
include_once("../php/config.php");


if(isset($_REQUEST['backup'])){
    $newImport = new backup_restore($dbhost,$dbname,$dbuser,$dbpass);
    
    $fileName = $dbname . "_" . date("Y-m-d_H-i-s") . ".sql";    
    // Header description Taken from http://stackoverflow.com/a/10766725
    header("Content-disposition: attachment; filename=".$fileName);
    header("Content-Type: application/force-download");
    //header("Content-Transfer-Encoding: application/zip;\n");
    header("Pragma: no-cache");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0, public");
    header("Expires: 0");

    //call of backup function
    echo $newImport -> backup(); die();
    
}

if(isset($_REQUEST['restore'])){
    $newImport = new backup_restore($dbhost,$dbname,$dbuser,$dbpass);
    $filetype = $_FILES['rfile']['type'];
    $filename = $_FILES['rfile']['tmp_name'];
    $error = ($_FILES['rfile']['tmp_name'] == 0)? false:true ;
    if ($filetype == "application/octetstream" && !$error) {
        //call of restore function
        $message = $newImport -> restore ($filename);
        echo $message;
    }
}

?>
