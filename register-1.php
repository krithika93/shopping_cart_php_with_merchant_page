<?php include ("common/base.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>User Registration</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>  
<body>  
<div id="main">

<?php 
if(!empty($_REQUEST['submit']))
{
 		$cname=$_REQUEST['name'];
		$email=$_REQUEST['email'];
		$address=$_REQUEST['address'];
		$phone=$_REQUEST['phone'];
		$type=$_REQUEST['type'];
		/*include("common/db.php");//from the users table*/
		
	
	
	$username = mysql_real_escape_string($cname);
    $password = md5(mysql_real_escape_string($password));
    $email = mysql_real_escape_string($email);
    $type=$_POST['type'];
	$checkusername = mysql_query("SELECT * FROM users WHERE username= '".$username."'AND password= '".$password."' AND type= '".$type."';");
    //$arr=mysql_fetch_array($checkusername);
     if(mysql_num_rows($checkusername) == 1)
     {
     	echo "<h1>Error</h1>";
        echo "<p>Sorry, that username is taken. Please go back and try again.</p>";
		
     }
     else
     {
	   	$registerquery = mysql_query("insert into users values(' ','$username','$password','$address','$phone','$email','$type')");
		 if($registerquery)
        {
        	echo "<h1>Success</h1>";
        	echo "<p>Your account was successfully created. Please <a href=\"index1.php\">click here to login</a>.</p>";
        }
        else
        {
     		echo "<h1>Error</h1>";
        	echo "<p>Sorry, your registration failed. Please go back and try again.</p>";    
        }    	
     }
}

?>

<label for="type">  Type: </label><select id="type" name="type"><option id="1" value="Type" selected="selected">Type</option><option id="1" value="merchant"> Seller </option><option id="2" value="customer">Customer</option> </select>
		 <br />
    <?php 
	/*if(empty($_SESSION['loggedin']))
	{
*/	if(empty($_REQUEST['submit'])){
?>
 <h1>Register</h1>
    
   <p>Please enter your details below to register.</p>

<div align="center">
<h1 style="color:#FF0">Register below</h1>
<table style="padding:20px;" bgcolor='F6F6F6' border="0">
  <tr>
  <?php if(isset($_GET['ct'])){$cc=$_GET['ct']; }?>
    <td>Name</td>
    <td><form id="form1" name="form1"  action="<?php if((!isset($_POST['username']))||(!isset($_POST['password']))||(!isset($_POST['type']))||(!isset($_POST['address']))||(!isset($_POST['phone']))||(!isset($_POST['email']))){echo 'register-1.php?ct=1'; } else { echo 'index-1.php?ct=0'; }  ?>" >
      <label for="name"> Name</label>
      <input type="text" name="name" id="name" />  <?php if(($cc==1)&&(!isset($_POST['name']))) { echo "<span style='color:#FF0000;'>*Compulsary</span>";}	?>
    </td>
  </tr>
  <tr>
    <td><label for="email">Email</label></td> 
    <td>
    <input type="text" name="email" id="email" /></td>  <?php if(($cc==1)&&(!isset($_POST['email']))) { echo "<span style='color:#FF0000;'>*Compulsary</span>";}	?>
  </tr>
  <tr>
    <td> <label for="address">Address</label></td>
    <td>
     
      <textarea name="address" id="address" cols="45" rows="5"></textarea><?php if(($cc==1)&&(!isset($_POST['address']))) { echo "<span style='color:#FF0000;'>*Compulsary</span>";}	?>
    </td>
  </tr>
  <tr>
    <td><label for="phone">Phone No</label></td>
    <td>
    <input type="text" name="phone" id="phone" /></td> <?php if(($cc==1)&&(!isset($_POST['phone']))) { echo "<span style='color:#FF0000;'>*Compulsary</span>";}	?>
  </tr>
  <tr>
  	
	
		<td><label for="type">  Type: </label></td><td><select id="type" name="type"><option id="1" value="Type" selected="selected">Type</option><option id="1" value="seller"> Seller </option><option id="2" value="customer">Customer</option> </select></td></tr><?php if(($cc=1)&&(!isset($_POST['type']))) { 
		"<span style='color:#FF0000;'>*Compulsary</span>";}	?>
		 <br />
		  

  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" id="submit" value="Submit" /> </form></td>
  </tr>
</table>
</div>



<?php } ?>



</div>
</body>
</html>