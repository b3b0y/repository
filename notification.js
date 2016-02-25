	var auto_refresh = setInterval(
	function ()
	{
		
		 $.ajax({                                      
	      url: 'notification/notif_process.php',                         
	      data: "",                        
	      dataType: 'json',                  
	      success: function(data)         
	      {
			$("#notifcount").html(' <span class="label label-important">'+ data.new +'</span');
	      	 //$("#notifcount").html(data.notifications.length);
			 

			 var html = "";
			html += '<li class="dropdown-menu-title">';
			html +=	'<span>You have '+ data.new +' notifications</span>';
			html +=	'</li>';
			for (var i = 0; i < data.new; i++) 
			{

			    html += '<li>'+
	                        '<a href="'+ data.notifications[i].link +'&&notid='+ data.notifications[i].id +'">'+
	                        	'<span class="avatar"><img src="" alt=""></span>'+
	                        	'<span class="header">'+
									'<span class="from">&nbsp</span>'+
									'<span class="time">'+ data.notifications[i].Date +'</span>'+
								'</span>'+
								'<span class="message">'+ data.notifications[i].message +'</span>'+
	                        '</a>'+
	                    '</li>';
			}
			$('#msg').html(html);

			console.log(data);
	      } 
	    });
	}, 500); 



	var auto_refresh = setInterval(
	function ()
	{
		  $.ajax({                                      
	      url: 'notification/backup_data_notif.php',                         
	      data: "",                        
	      dataType: 'json',                  
	      success: function(data)         
	      {

	      	var inputDate = new Date(data.backupdata[0].backup_date);
			var todaysDate = new Date();

			if(inputDate.setHours(0,0,0,0) >= todaysDate.setHours(0,0,0,0))
			{
				if (confirm('Please backup your Files')) 
				{
				    window.location.href='backup/data_backup.php?auto=1';
				} 
			}

	      	
			var html = "";
			html +=  '<table class="table table-striped table-bordered bootstrap-datatable datatable">'+
					  '<thead>'+
						  '<tr>'+
						  	  '<th>Backup Data Date</th>'+
						  '</tr>'+
					  '</thead>'+   
				  	'<tbody>';

					 html += '<tr>'+
					 			'<td>'+ data.backupdata[0].backup_date +'</td>'+
					 		 '</tr>';

				html += '</tbody></table>';

			 $('#backupdata').html(html);
			
			console.log(data);
	      } 
	    });
	}, 5000); 

	var auto_refresh = setInterval(
	function ()
	{
		  $.ajax({                                      
	      url: 'notification/backup_db_notif.php',                         
	      data: "",                        
	      dataType: 'json',                  
	      success: function(data)         
	      {

	      	var inputDate = new Date(data.backupdb[0].Date);
			var todaysDate = new Date();

			if(inputDate.setHours(0,0,0,0) >= todaysDate.setHours(0,0,0,0))
			{
				if (confirm('Please backup your Datbase')) 
				{
				    window.location.href='backup/db_backup.php?auto=1';
				} 
			}

			console.log(data);
	      } 
	    });
	}, 10000); 


