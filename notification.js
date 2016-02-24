	var auto_refresh = setInterval(
	function ()
	{
	$('#notifcount').load('notification/notif_process.php').fadeIn("slow");
	}, 500); 

	


