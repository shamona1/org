<?php
session_start(); //You must start session or declare this variable at the very top and first line of your website page
ob_start();

//if a user logs into the system and leave his or her account for 30 minutes of inactive, his or her session will expire and require new login
$inactive = 1800; // 30 minutes
if(isset($_SESSION['timeout'])) 
{
	$session_life = time() - $_SESSION['timeout'];
	if($session_life > $inactive)
	{
		session_unset();
		session_destroy(); 
	}
}
$_SESSION['timeout'] = time();


if(isset($_SESSION['validfullname']) && isset($_SESSION['validusername']) && isset($_SESSION['validemail']) && isset($_SESSION['validpassword']) && !empty($_SESSION['validfullname']) && !empty($_SESSION['validusername']) && !empty($_SESSION['validemail']) && !empty($_SESSION['validpassword'])) {
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>vasPLUS Programming Blog - Secured Sign-up and Login System without SQL Database using Ajax, Jquery and PHP</title>





<!-- Required header files -->
<script type="text/javascript" src="js/jquery_1.5.2.js"></script>
<script type="text/javascript" src="js/vpb_save_details.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css">






</head>
<body>
<br clear="all"><center><div style="font-family:Verdana, Geneva, sans-serif; font-size:24px;">Secured Sign-up and Login System without SQL Database using Ajax, Jquery and PHP</div><br clear="all" /><br clear="all" /><br clear="all">









<!-- Profile Page Code Begins -->

<div style=" width:800px; padding:10px;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px; font-size:13px;" id="vasplus_programming_blog_wrapper">

<div class="" align="left" style="width:730px; float:left;font-family:Verdana, Geneva, sans-serif; font-size:16px; font-weight:bold;">Welcome <?php echo $_SESSION['validfullname']; ?></div><div style="width:70px;float:left;" align="right"><span class="ccc"><a href="logout.php"><font color="#3300FF">Logout</font></a></span></div><br clear="all"><br clear="all"><br clear="all">

<div align="left"><b>Below are all your information</b></div><br clear="all">

<div class="vpb_lebels" style="padding:0px;" align="left">Your Fullname:</div>
<div class="vpb_lebels_fields" align="left"><?php echo $_SESSION['validfullname']; ?></div><br clear="all"><br clear="all">


<div class="vpb_lebels" style="padding:0px;" align="left">Your Username:</div>
<div class="vpb_lebels_fields" align="left"><?php echo $_SESSION['validusername']; ?></div><br clear="all"><br clear="all">

<div class="vpb_lebels" style="padding:0px;" align="left">Email Address:</div>
<div class="vpb_lebels_fields" align="left"><?php echo $_SESSION['validemail']; ?></div><br clear="all"><br clear="all">

<div class="vpb_lebels" style="padding:0px;" align="left">Your Password:</div>
<div class="vpb_lebels_fields" align="left"><?php echo $_SESSION['validpassword']; ?></div><br clear="all"><br clear="all"><br clear="all">


<div style="font-family:Verdana, Geneva, sans-serif; font-size:11px;" align="left">
All your above information were encrypted with Base64 Algorithm including your password which was first encrypted with an MD5 algorithm before saving them to a file.<br /><br />

Your above password is now the <b>MD5 Algorithm</b> password</div><br />

</div>

<!-- Profile Page Code Ends -->












<br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" />

<!-- The below code is for Password Reset upon login -->

<input type="hidden" id="hidden_username" value="<?php echo $_SESSION['validusername']; ?>" />
<div id="vasplus_programming_blog_wrapper" style="width:450px; padding-left:10px;">
<div class="" align="left" style="width:160px;font-family:Verdana, Geneva, sans-serif; font-size:16px; font-weight:bold;">Reset Password</div><br />
<div class="vpb_lebels_fields" align="left" style="padding-top:3px;">To change or reset your account current password, please enter your desired new password and verify it below to reset your password.</div><br clear="all"><br clear="all"><br />

<div class="vpb_lebels" align="left" style="width:150px;padding-top:8px;">Desired New Password:</div>
<div class="vpb_lebels_fields" align="left"><input type="password" id="new_password" class="vasplus_blog_form_opt" /></div><br clear="all"><br clear="all">

<div class="vpb_lebels" align="left" style="width:150px;padding-top:8px;">Verify New Password:</div>
<div class="vpb_lebels_fields" align="left"><input type="password" id="verify_new_password" class="vasplus_blog_form_opt" /></div><br clear="all"><br clear="all"><br clear="all">

<div class="vpb_lebels" align="left" style="width:150px;">&nbsp;</div>
<div style="width:300px;float:left;" align="left">
<a href="javascript:void(0);" onclick="vpb_reset_password();" class="vpb_general_button">Save Changes</a></div><br clear="all">
<div class="vpb_lebels" align="left" style="width:150px;">&nbsp;</div>
<div class="vpb_lebels_fields" align="left" id="reset_password_status"></div><br clear="all">

</div>



























<p style="margin-bottom:200px;">&nbsp;</p>
</center>
</body>
</html>

<?php
}
else
{
	header("location: login.php");
}
?>