<?php 
//  http://buffernow.com/backup-and-restore-class-mysql-database-using-php-script/
include_once("../php/config.php");

require_once('backup_restore.class.php');

/** config. php **/
$db_host = $dbhost;
$db_user = $dbuser;
$db_pass = $dbpass;
$db_name = $dbname ;
/****************/

if(isset($_REQUEST['backup'])){
    $newImport = new backup_restore($db_host,$db_name,$db_user,$db_pass);
    
    $fileName = $db_name . "_" . date("Y-m-d_H-i-s") . ".sql";    
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
    
    $path_parts = pathinfo($_FILES["rfile"]["name"]);
    $extension = $path_parts['extension'];

    if($extension == 'sql')
    {

        $filetype = $_FILES['rfile']['type'];
        $filename = $_FILES['rfile']['tmp_name'];

      
        // Name of the file
        $filename = $filename;
        // MySQL host
        $mysql_host = $db_host;
        // MySQL username
        $mysql_username = $db_user;
        // MySQL password
        $mysql_password = $db_pass;
        // Database name
        $mysql_database = $db_name;
         
        //////////////////////////////////////////////////////////////////////////////////////////////
         
        // Connect to MySQL server
        mysql_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysql_error());
        // Select database
        mysql_select_db($mysql_database) or die('Error selecting MySQL database: ' . mysql_error());
         
        // Temporary variable, used to store current query
        $templine = '';
        // Read in entire file
        $lines = file($filename);
        // Loop through each line
        foreach ($lines as $line)
        {
            // Skip it if it's a comment
            if (substr($line, 0, 2) == '--' || $line == '')
                continue;
         
            // Add this line to the current segment
            $templine .= $line;
            // If it has a semicolon at the end, it's the end of the query
            if (substr(trim($line), -1, 1) == ';')
            {
                // Perform the query
                mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
                // Reset temp variable to empty
                $templine = '';
            }
        }

         echo '<script> alert("Successfully Restored"); window.location.href="../dashboard.php"; </script>';
    }
    else
    {
        echo "<script> alert('Please Select Database file'); window.location.href='../dashboard.php' </script>";
    }
}

?>
