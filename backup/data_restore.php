
<?php
include_once("../php/config.php");

if(isset($_REQUEST['restore']))
{
	$path_parts = pathinfo($_FILES["rzip"]["name"]);
    $extension = $path_parts['extension'];

    if($extension == 'zip')
    {

    	$filename = $_FILES['rzip']['tmp_name'];
    	
		$zip = new ZipArchive;
		if ($zip->open($filename) === TRUE) {
		    $zip->extractTo('../');
		    $zip->close();
		    echo '<script> alert("Successfully Restored"); window.location.href="../dashboard.php"; </script>';
		} else {
		    echo '<script> alert("Failed to Restore"); window.location.href="../dashboard.php"; </script>';
		}
	}
	else
    {
        echo "<script> alert('Please Select Correct zip file'); window.location.href='../dashboard.php' </script>";
    }
}
?>
