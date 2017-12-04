<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Welcome to PointForward</title>

<!-- Bootstrap -->
<link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="<?php echo base_url();?>js/html5shiv.min.js"></script>
      <script src="<?php echo base_url();?>js/respond.min.js"></script>
    <![endif]-->

<!-- Custom styles for this template -->
<link href="<?php echo base_url();?>css/custom.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=PT+Sans+Caption:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="login-bg">
<div class="container">
  <form class="form-signin" name="login-form" id="login-form" method="post">
    <h2 class="form-signin-heading"><a href="<?php echo base_url();?>login"><img src="<?php echo base_url();?>images/logo-white.png"></a></h2>
	<?php if($this->session->flashdata('message')){ echo $this->session->flashdata('message'); }?>
    <div class="form-group">
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" name="email" class="form-control input-1" placeholder="Email address" autofocus>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="password" class="form-control input-1" placeholder="Password">
    </div>
    <div class="form-group bottom-button-1">
      <button class="btn btn-lg btn-primary btn-block btn-1" type="submit">SIGN IN</button>
    </div>
	<a href="<?php echo base_url();?>login/forgot_password" class="forgot-link">&nbsp;Forgot your password?</a>
    <div class="form-group bottom-button-1">
   <a href="<?php echo base_url();?>register/step1" class="forgot-link">Register&nbsp;</a>
      </div>
      <input type="hidden" name="page_url" id="page_url" value="">
  </form>
</div>
<!-- /container --> 
<div class="before-login">
<div class="copyright">
© 2015 - 2016 PointForward Software 
<div class="clearfix"></div>
<a href="http://www.pointforwardsoftware.com/terms-and-conditions/" target="_blank">Terms and Conditions</a>
</div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js --> 
<script src="<?php echo base_url();?>js/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	var validator = $("#login-form").validate({
									errorClass:'error-val',
									errorElement: "div",
									onkeyup: function(element) {
										   $(element).valid(); 
									},
									onblur: function(element) { 
										 $(element).valid(); 
									},
									rules:
									{
										email:
										{
											required: true,
											email:true,
											remote: {
												url: '<?php echo base_url();?>login/check_email/',
												type: 'POST'
											}											
										},
										password:
										{
											required: true																																				
										}
									},
									messages:
									{
										email:
										{
											required: "The email field is required",
											email: "Please enter a valid email address",
											remote: "Email doesn't exist"
										},
										password:
										{
											required: "The Password field is required."
										}
									},
									errorPlacement: function(error, element)
									{
										error.fadeIn(600).appendTo(element.parent());
									},
									success: function(label,element) {
										label.fadeOut(600).remove(); 
									},
									submitHandler: function()
									{
										document.login-form.submit();
									},
									wrapper: ""
							});	
							
	var url = parent.window.location.href.split('?url=');
   $("#page_url").val(url[1]);																																														
});
	
</script>
</body>
</html>
