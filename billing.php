<?php  session_start();?>
<?php include("common/db.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Customer checkout</title>

<?php
if((!isset($_SESSION['loggedin'])) && (!isset($_SESSION['cust'])))
{
print "<script>";
print "self.location='table2.php';";
print "</script>"; 
}
?>
</head>
<body bgcolor="#000000">
<body bgcolor="#000000">
<div id="top"  style="width:100%; height:500px; position:fixed;">

<div id="header" style="float:left;">
<h3>
KRITHIKA'S SHOPPING CART 
</h3>
</div> 
<div id="name" style="float:right;">
Welcome <a href="<?php if(isset($_SESSION['loggedin'])){ if(isset($_SESSION['cust'])){ echo "tt.php"; } else { echo "merpage.php"; }} ?>" ><?php if(isset($_SESSION['loggedin'])){ $gg=$_SESSION['name']; echo $gg; } else { echo "Guest"; } ?> </a> 
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
                        <?php if(isset($_SESSION['sell']))
						{ ?>
                                <tr> <th width="112"><a id='seller'>SELLER</a></th> >>
                               
                                    
									  <td width="71"><a href='merr.php?id=<?php echo ".$count."; ?>&action=none'>Add an Item</a></td> |
									  <td width="114"><a href='merr.php?action=none'>Modify the cart</a></td> |
									  <td width="83"><a href="#">Updade your profile</a></td> |
									  <td width="43"><a href='table2.php?id=<?php echo ".$count."; ?>&action=none'>Products Page</a></td> |
									  <td width="85"><a href='merpage.php?id=<?php echo ".$count."; ?>&action=none'>Home Page</a></td> 
								</tr> <br />
								<?php } ?>
								<?php if(isset($_SESSION['cust']))
								{ ?>
                        		
                                <tr><th><a id='customer'>CUSTOMER</a> </th>  >>
								
									<td><a href='tt.php?id=<?php echo ".$count."; ?>&action=none'> Home Page</a></td> |
									<td><a href='cart.php?action=none'>Your Cart</a></td> |
									<td><a href='cart.php?id=<?php echo ".$count.";  ?>&action=none'>Add new item</a></td> |
									<td><a href='table2.php?id=<?php echo ".$count.";  ?>&action=none'>Products page</a></td> | 
									<td width="66"><a href="#">Update Profile</a></td>
											
									
								</tr>  <br />
								<?php } ?>
								
                       </table>
 </div>
 </div>
 
<div id="container">

<?php 
if(!isset($_SESSION['cart'])  )
{

		print "<script>";
		print " self.location='product.php';";
		print "</script>";
	}
	$name=$_SESSION['cust'][$name];
	$email=$_SESSION['cust'][$emailadd];
	$phone=$_SESSION['cust'][$phone];
	$address=$_SESSION['cust'][$address];
	$id=$_SESSION['cust'][$id];
		$result=mysql_query("insert into customers values('$id','$name','$email','$address','$phone')");  
		$date=date('Y-m-d');
		$customerid=$id;
		$result=mysql_query("insert into orders values('','$date','$customerid')");
		$orderid=mysql_insert_id();
		$total=0;
		foreach($_SESSION['cart'] as $id => $x)
			{
			include("common/db.php");
			$result=mysql_query("select qtyre,name,price from products WHERE serial=$id");
			$myrow=mysql_fetch_array($result);
			$name=$myrow['name'];
			$price=$myrow['price'];
			$qtyre=$myrow['qtyre'];
			$line_cost=$price*$x;
			$total= $total+$line_cost;
			$qtyre=$qtyre-$x;
			
			mysqli_query("UPDATE products SET qtyre='$qtyre' WHERE serial='$id'");
			if($qtyre == 0)
			{
			mysqli_query("UPDATE products SET stock=0 WHERE serial='$id'");
			}
			mysql_query("insert into order_detail values ($orderid,$id,$x,$price)"); 
			
			

}
		$na=$_SESSION['cust'][$name];
	echo"<span style='color:#fff'>Thank you ".$na." for placing an order</div>";
	unset($_SESSION['cart']);
		

?>

</body>
</html>