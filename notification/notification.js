	var auto_refresh = setInterval(
	function ()
	{
	$('#notifcount').load('notif_process.php').fadeIn("slow");
	}, 500); 

