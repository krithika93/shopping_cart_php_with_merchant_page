<?php session_start(); ?> 
<?php include("common/base.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SELLER HOME PAGE</title>
</head>

<body>
<?php
//isset check in all pages 
if(isset($_SESSION['sell']))
{
 
?>
<div id="container" style="height:1950px; width:620px; margin-left:200px; margin-right:100px; margin-top:100px; background-color:#663399;" > 

<h3 style="background-color:#FF0">Deals</h3>
<a style="color:#FFFF00; text-decoration:none;" href="cart.php?action=none" ><span style="margin-left:500px;">
<img src="images/cart.png"><p style="font-size:14px;">You have currently( <?php  if(isset($_SESSION['pro'])) {  echo count($_SESSION['pro']); } else {echo "0"; }  ?>) in your cart</p></span></a>
</br>
<div id="top"  style="width:100%; height:500px; position:fixed;"  >

<div id="header" style="float:left;">
<h3>
KRITHIKA'S SHOPPING CART 
</h3>
</div> 
<div id="name" style="float:right;"> 
Welcome <a href="<?php if(isset($_SESSION['loggedin'])){ if(isset($_SESSION['cust'])){ echo "tt.php?id=$count&action=none"; } else { echo "merpage.php?id=$count&action=none"; }} ?>" ><?php if(isset($_SESSION['loggedin'])){  $gg=$_SESSION['name'];echo $gg; } else { echo "Guest";} }?> </a> 
</div>
<span  style="padding: 2px 2px; float:left; background-color:#990099;">											
                  <?php if(isset($_SESSION['loggedin']))
				  { //correct this { error of welcome in all pages?>
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
 
<div id="container">

<h4 align="center">SHOPPING CART PAGE</h4>
<table title="PROFILE">
<tr>
<th> Sl.No. </th>
<th> Name </th>
<th> Quantity </th>
<th> Amount </th>
<th> Status </th>
<th> Date of purchase </th>
</tr>
<?php $count1=1;
     
		   	$r=mysql_query("select mer_orders.serial,mer_orders.date from mer_orders WHERE mer_orders.mid='$_SESSION['sell'][$iden]' ");
			if(mysql_num_rows($r) > 0)
			{
			
			$arr=mysql_fetch_array($r);
			$serial=$arr['id'];//mysql fetch array is more than enough 
			$date=$arr['date'];
			foreach($serial as $index => $x)
			{						
			echo "<tr>";
			 echo "<td> $count1; </td>"; $count1++; 
			
		   	$result=mysql_query("select *,name from mer_order_detail,products WHERE mer_order_detail.oid='$x' AND mer_order.detail.pid=products.serial"); //remove the id... 
			$row=mysql_fetch_array($result);
			$qty=$row['qty']; 
			$pid=$row['pid'];
			$price=$row['price'];
			$name= $row['name'];
			//$resu=mysql_query("select name from products WHERE serial='$pid'");//for each product there must be an order... 
			//$array=mysql_fetch_array($resu);
			//$value=$array[0];
			$dt=$date[$index];
			echo "<td>$name</td> <td>$qty </td> <td>$price </td> <td> Processing </td><td>$date[$index]</td>";
     		echo "</tr>"; 
			}
			}
			else
			{
			echo "You don't have any items in your past history <br>";
			}
					
		
}
else
{
print "<script>";
print "self.location='products.php';";
print  "</script>";
}


 ?>


</table>
</div>
</div>
</body>
</html>
