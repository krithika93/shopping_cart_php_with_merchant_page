<?php session_start(); ?>
<?php include("common/base.php");//doubt ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>Login Page</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>  
<body>  
<div id="main">




<!--<iframe src="register.php" height="500" width="500" scrolling="no"  frameborder="0" align="left" >-->

    <?php
if(isset($_POST['submit']))
{	
if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['type']))
{
	$username = mysql_real_escape_string($_POST['username']);
    $password = md5(mysql_real_escape_string($_POST['password']));
    $type=$_POST['type'];
	
	
	if($type="customer")
		{
	$check = mysql_query("SELECT * FROM users WHERE username = '".$username."' AND  password = '".$password."' AND type= '".$type."' ",$con);
	//$arr=mysql_fetch_array($check);
	if(mysql_num_rows($check) == 1)
	{
		
    	$row = mysql_fetch_array($check);
        $email = $row['emailadd'];
        $id= $row['serial']; 
		$address=$row['address'];
		$phone=$row['phone'];
		$views=$row['views'];
		$_SESSION['name']=$username;
		$_SESSION['cust'][$name]=$username;
		$_SESSION['cust'][$id]=$id;
        $_SESSION['cust'][$emailadd] = $email;
		$_SESSION['cust'][$address]= $address;
		$_SESSION['cust'][$phone]=$phone;
        $_SESSION['loggedin'] = 1;
		$_SESSION['views']++;
        
    	 echo "<h1>Success</h1>";
         echo "<p>We are now redirecting you to the member area.</p>";
		print "<script>";
		print "self.location='tt.php'";
		print "</script>";
	}
	else
    {
    	echo "<h1>Error</h1>";
        echo "<p>Sorry, your account could not be found. Please <a href=\"index1.php\">click here to try again</a>.</p>"; //echo a link using \"index.php\"  on click echo
    }
	}
	if($type="seller")
		{
	$check = mysql_query("SELECT * FROM merchant WHERE username = '".$username."' AND  password = '".$password."' AND type= '".$type."' ",$con);
	$arr=mysql_fetch_array($check);
    if(mysql_num_rows($arr) == 1)
	{	
    	$row = mysql_fetch_array($check);
        $email = $row['emailadd'];
        $id= $row['serial']; 
		$address=$row['address'];
		$phone=$row['phone'];

		$views=$row['views'];
		$_SESSION['name']=$username;
		$_SESSION['sell'][$name]=$username;
		$_SESSION['sell'][$id]=$id;
        $_SESSION['sell'][$email] = $email;		//can i print it separately $ email  variable alone?
		$_SESSION['sell'][$address]= $address;
		$_SESSION['sell'][$phone]=$phone;
        $_SESSION['loggedin'] = 1;
		$_SESSION['views']++;
        
    	 echo "<h1>Success</h1>";
         echo "<p>We are now redirecting you to the member area.</p>";
	
		print "<script>";
		print "self.location='merpage.php'";
		print "</script>";
	}
	else
    {
    	echo "<h1>Error</h1>";
        echo "<p>Sorry, your account could not be found. Please <a href=\"index1.php\">click here to try again</a>.</p>"; //echo a link using \"index.php\"  on click echo
    }
	}	
		/* print "<script>";
		 print "self.location='index1.php'";//compare prices
		 print "</script>";	*/
        //echo "<meta http-equiv='refresh' content='=2;index1.php' />";
    } 


}

    

else
{
	?>
    
   <h1>Member Login</h1>
    
   <p>Thanks for visiting! Please either login below, or <a href="register.php">click here to register</a>.</p>
    <div align="center">
	<form method="post" action="<?php if((!isset($_POST['username']))||(!isset($_POST['password']))||(!isset($_POST['type']))){echo 'index1.php?ct=1'; } else {'index1.php?ct=0'; } ?>" name="loginform" id="loginform">
	
	<fieldset>
	<table>
	<tr>
	<?php $cc=$_GET['ct']; ?>
	<td><label for="username">Username:</label></td><td><input type="text" name="username" id="username" /></td><br /></tr><?php if(($cc=1)&&(!isset($_POST['username']))) { echo "<span style='color:#FF0000;'>*Compulsary</span>";}	?>
	<tr><td><label for="password">Password:</label></td><td><input type="password" name="password" id="password" /></td><br /></tr><?php if(($cc=1)&&(!isset($_POST['password']))) { echo "<span style='color:#FF0000;'>*Compulsary</span>";}	?>
	<tr>
    <td><label for="type">  Type: </label></td><td><select id="type" name="type"><option id="1" value="Type" selected="selected">Type</option><option id="1" value="seller"> Seller </option><option id="2" value="customer">Customer</option> </select></td></tr> <?php if(($cc=1)&&(!isset($_POST['type']))) { echo "<span style='color:#FF0000;'>*Compulsary</span>";}	?>
		 <br />
		  <tr>
	<td></td> <td><input type="submit" name="login" id="login" value="Login" /></td></tr>
	</table>
	</fieldset>
	</form>
    </div>
  

</div>
</body>
</html>


