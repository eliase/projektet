<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title;?></title>
	<link id="css1" href="<?php echo base_url();?>css/main.css" rel="stylesheet" type="text/css" media="screen"/>
	<script type="text/javascript" src="/jquery.js"></script>
	<script type="text/javascript">
	
	
	
		
	
		/*var validateUsername = $('#validateUsername');
		$('#username').keyup(function () {
			validateUsername.removeClass('error').html('<br><img src="/ajax-loader.gif" height="16" width="16" /> checking availability...');
		
			
		});*/
	$(document).ready(function () {
	
		$('#submit_account').click(function(){
			$("#submit_display").empty();
			$("#submit_display").append("<img id='theImg' src='/ajax-loader.gif'/>");
			
			var form_data = {
				name: $('#username').val(),
				pass: $('#password').val(),
				email: $('#email').val()
			};
			
			$.ajax({
               url: "<?php echo site_url('welcome/check_account_form');?>",
			   type: 'POST',
               data: form_data,
               
               success: function (msg) {
					var _text = "error";
					var _color = "red";
					if(msg!="fine"){
						_text = "Invalid form data";
						_color = "orange";
					}else{
						_text = "Account created";
						_color = "green";
						window.location = "http://localhost/";
					}
					$("#submit_display").empty();
					$("#submit_display").append("<div style='color: "+_color+";'>"+_text+"</div>");
					
					
               }
             });
			 
			return false;
		});
		//$('#username').change(function () {
		$('#username').keyup(function () {
			$("#username_display").empty();
			$("#username_display").append("<img id='theImg' src='/ajax-loader.gif'/>");
			
			var form_data = {
				name: $('#username').val()
				//email2: $('#email2').val()
			};
			
			$.ajax({
               url: "<?php echo site_url('welcome/check_username');?>",
			   type: 'POST',
               data: form_data,
               
               success: function (msg) {
					var _text = "error";
					var _color = "red";
					if(msg=="letter"){
						_text = "Invalid characters";
						_color = "orange";
					}else{
						_text = "Ok";
						_color = "green";
					}
					$("#username_display").empty();
					$("#username_display").append("<div style='color: "+_color+";'>"+_text+"</div>");
               }
             });
			 
			return false;
		});
		
		$('#password').keyup(function () {
			$("#password_display").empty();
			$("#password_display").append("<img id='theImg' src='/ajax-loader.gif'/>");
			
			var form_data = {
				pass: $('#password').val(),
			};
			
			$.ajax({
               url: "<?php echo site_url('welcome/check_password');?>",
			   type: 'POST',
               data: form_data,
               
               success: function (msg) {
					var _text = "error";
					var _color = "red";
					if(msg=="length"){
						_text = "Invalid length";
						_color = "orange";
					}else{
						_text = "Ok";
						_color = "green";
					}
					$("#password_display").empty();
					$("#password_display").append("<div style='color: "+_color+";'>"+_text+"</div>");
                  //$("#username_display").replaceWith("<div style='color: "+_color+";'>"+_text+"</div>");
               }
             });
			 
			return false;
		});
		
		$('#email').keyup(function () {
			$("#email_display").empty();
			$("#email_display").append("<img id='theImg' src='/ajax-loader.gif'/>");
			
			var form_data = {
				email: $('#email').val(),
			};
			
			$.ajax({
               url: "<?php echo site_url('welcome/check_email');?>",
			   type: 'POST',
               data: form_data,
               
               success: function (msg) {
					var _text = "error";
					var _color = "red";
					if(msg=="error"){
						_text = "Invalid emailaddress";
						_color = "orange";
					}else{
						_text = "Ok";
						_color = "green";
					}
					$("#email_display").empty();
					$("#email_display").append("<div style='color: "+_color+";'>"+_text+"</div>");
                  //$("#username_display").replaceWith("<div style='color: "+_color+";'>"+_text+"</div>");
               }
             });
			 
			return false;
		});
	
	});
	
	</script>  
</head>
<body>
<div id="main_menu">
	<div id="header">
		The Restaurant
	</div>
	
	<div id="buttons">
		<a href="<?php echo site_url("welcome/create_account");?>">Create a new account</a><br>
		<a href="<?php echo site_url("welcome/login");?>">Login</a><br>
		<a href="">gergergerg</a><br>
		<a href="">werhwerh</a><br>
		<a href="">rthrthrthhtr</a><br>
	</div>

	
	<div id="body_page">

