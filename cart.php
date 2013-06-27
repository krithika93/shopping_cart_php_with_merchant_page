<?php  session_start();?>
<?php include ("common/db.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Customer cart page</title>
<?php
if((!isset($_SESSION['loggedin'])) && (!isset($_SESSION['cust'])))
{
print "<script>";
print "self.location='table2.php';";
print "</script>"; //email id validation  is go variable necessary go variable
}
?>
<title>Shoping Cart </title>
</head>
<body bgcolor="#000000">
<h3 style="background-color:#FF0"align="center"> Shopping Cart</h3>

<?php 
//editing the customer page
if (isset($_GET['id']))
{
	$count=$_GET['id'];
 }
 else
 {
 	$count=1;
	}
if (isset($_GET['action']))
{
	$action=$_GET['action'];
 }
 else
{ 
 $action="empty";
}	

switch($action){

case "add":
{
if($_SESSION['cart'][$count])
	$_SESSION['cart'][$count]++;
	if($_SESSION['cart'][$count])
	{
	$_SESSION['cart'][$count]++;
	}
	else
	{
	$_SESSION['cart'][$count]=1;
	}
else
	$_SESSION['cart'][$count]=1;
	
	

break;	
}
case "remove":
{
if($_SESSION['cart'][$count])
{
		if($_SESSION['cart'][$count])
		{
		$_SESSION['cart'][$count]--;
		}
		
		if($_SESSION['cart'][$count]==0)
		$_SESSION['cart'][$count]=0;
		unset($_SESSION['cart'][$count]);
}

break;	
}
case "empty":
{
unset($_SESSION['cart']);

break;	
} ?>
<div id="container"  align="center" style="height:1950px;width:620px; margin-left:200px; margin-right:100px;margin-top:100px;background-color:#0000FF"> 
<h3 style="background-color:#FF0">Products</h3>
<a style="color:#FFFF00; text-decoration:none" href="cart.php?action=none" ><span style="margin-left:500px;">
<img src="online/images/cart.png">Cart <p style="font-size:14px;">You have currently( <?php if(isset($_SESSION['cart'][$count])){ echo count($_SESSION['cart'][$count]);} else {echo "0"; } ?>)in your cart</p></span></a>
<br />
<div id="top"  style="width:100%; height:150px; position:fixed;">

<div id="header" style="float:left;">
<h3>
KRITHIKA'S SHOPPING CART 
</h3>
</div> 
<div id="name" style="float:right;">
Welcome <a href="<?php if(isset($_SESSION['loggedin'])){ if(isset($_SESSION['cust'])){ echo "tt.php"; } else { echo "merpage.php"; } } ?>" ><?php if(isset($_SESSION['loggedin'])){ $gg=$_SESSION['name']; echo $gg;} else { echo "Guest"; } ?> </a> 
</div>
<span  style="padding: 2px 2px; float:left; background-color:#990099;">											
                  <?php if(isset($_SESSION['loggedin']))
				  {?>
							  <a href="logout.php">Logout</a> &nbsp; &nbsp;
				 <?php } ?>
				 <?php if(empty($_SESSION['loggedin'])
				 { ?>		  
							  <a href="index1.php"> Login</a> &nbsp; &nbsp;
							  <a href="register-1.php">Register</a>&nbsp; &nbsp;
				<?php } ?>			  
							  </span>
										 
<div id='menu'>
                        <table align="right" style="float:right;">
						<?php if(isset($_SESSION['sell']))
						{ ?>
                                <tr> <th width="112"><a id='seller'>SELLER</a></th> >>
                               
                                    
									  <td width="71"><a href='merr.php?id=<?php echo ".$count."; ?>&action=none'>Add an Item</a></td> |
									  <td width="114"><a href='merr.php?id=<?php echo ".$count."; ?>&action=none'>Modify the cart</a></td> |
									  <td width="83"><a href="#">Updade your profile</a></td> |
									  <td width="43"><a href='table2.php?id=<?php echo ".$count."; ?>&action=none'>Products Page</a></td> |
									  <td width="85"><a href='merpage.php?id=<?php echo ".$count."; ?>&action=none'>Home Page</a></td> 
								</tr> <br />
								<?php } ?>
								<?php if(isset($_SESSION['cust']))
								{ ?>
                        		
                                <tr><th><a id='customer'>CUSTOMER</a> </th>  >>
								
									<td><a href='tt.php?id=<?php echo ".$count."; ?>&action=none'> Home Page</a></td> |
									<td><a href='cart.php?id=<?php echo ".$count."; ?>&action=none'>Your Cart</a></td> |
									<td><a href='cart.php?id=<?php echo ".$count.";  ?>&action=none'>Add new item</a></td> |
									<td><a href='table2.php?id=<?php echo ".$count.";  ?>&action=none'>Products page</a></td> | 
									<td width="66"><a href="#">Update Profile</a></td>
											
									
								</tr>  <br />
								<?php } ?>
								
                       </table>
 </div>

</div>

<?php

// Display cart 

if(isset($_SESSION['cart']))
{
 
echo "<p style='margin-left:380px;' ><a style='color:#FFFF00; text-decoration:none'  href='table2.php?id=".$count."&action=none' >Continue shopping</a><a href='billing.php?id=$count&action=none'  style='color:#fff; text-decoration:none;margin-left:310px;' ><b>Place Order</b></a></p><table  style='padding:10px;'  align='center' border='0' bgcolor='F6F6F6' cellpadding='0' width='600'>";
$total=0; $q=0; 

foreach($_SESSION['cart'] as $count => $x)
{

include ("common/db.php");
$result=mysql_query("select name,price from products WHERE serial=$id");
$myrow=mysql_fetch_array($result);
$name=$myrow['name'];
$price=$myrow['price'];
$line_cost=$price*$x;
$total= $total+$line_cost;

	echo "<tr bgcolor='#f0f0f0'>";
	echo "<td align='left'>$name</td>";
	echo "<td align='left'>$x</td>";
	echo "<td align='left'>$price</td>";
	echo "<td align='left'>$line_cost</td>";
	echo "<td align='right'><a href='cart.php?id=".$count."&action=remove'><input type='button' value='remove' /></a></td>";
	echo "<td aligh='right'><a href='cart.php?id=".$count."&action=add' ><input type='button' value='add' /></a></td>";
	echo "</tr>";
} 
	echo"<tr >";
	echo "<td align='right'><br/><b> Total </b></td>";
	echo "<td align='right'><br/><b> $total </b></td>";
	echo "</tr>";
	echo "</table>";

}

else
{
	echo "cart is Empty";
}	



?>


</div>
</body>
</html>