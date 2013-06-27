<?php session_start(); ?>
<?php include("common/db.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Seller checkout</title>
<!-- The Billing page for shopping cart  container styling authenication email cheking user user /mer sort  --> 
</head>
<?php 
if(!isset($_SESSION['pro']))
{
print "<script>";
print "self.location='table2.php';";//echo script small correction 
print "</script>";
} 
?>
<body bgcolor="#000000">
<div id="top"  style="width:100%; height:500px; position:fixed;">

<div id="header" style="float:left;">
<h3>
KRITHIKA'S SHOPPING CART 
</h3>
</div> 
<div id="name" style="float:right;">
Welcome <a href="<?php if(isset($_SESSION['loggedin'])){ if(isset($_SESSION['cust'])){ echo "tt.php?id=$count&action=none"; } else { echo "merpage.php?id=$count&action=none"; } }?>" ><?php if(isset($_SESSION['loggedin'])){ $gg=$_SESSION['name']; echo $gg; } else { echo "Guest"; } }?> </a> 
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
 
<div id="container">

<?php 

if((isset($_SESSION['sell']) && (isset($_SESSION['pro']))))
{
$name=$_SESSION['sell'][$name];
	$email=$_SESSION['sell'][$emailadd];
	$phone=$_SESSION['sell'][$phone];
	$address=$_SESSION['sell'][$address];
	$id=$_SESSION['sell'][$id];
		$result=mysql_query("insert into merchants values('$id','$name','$email','$address','$phone')"); //users become customers.. but when login, can we make it fast access 
$tot=count($_SESSION['pro']);//total no. of items menu bar like user page another page
include("common/base.php");//session iden 
$mid=$_SESSION['sell'][$id];
$date=$_SESSION['date'];
$result=mysql_query("insert into mer_orders values('','$date','$mid')";
$oid=mysql_insert_id();

$total=0;//total no. of items 
$fn=$_SESSION['filename'];//picture name ?>
<?php $m=0; $n=0; $u=0;?> 
<?php foreach($_SESSION['qty'] as $count => $y[$m])
{
$m++;
}

foreach($_SESSION['price'] as $count => $z[$n])
{
$n++;

}
foreach($_SESSION['filename'] as $count => $v[$u])
{
$u++;

}
?>
<?php $d=0;$e=0;$h=0; ?>
<?php 

foreach($_SESSION['pro'] as $count=> $x)  //add new or  while foreach for both  insert into both products also mid and pid 
 { 
 include("common/base.php");
 $qty=$y[$d];
 $price=$z[$e];
 $fn=$v[$u];
 $result=mysql_query("insert into products (serial,name,price,qtyre,picture,mid) values('','$x','$price','$qty','$fn','$mid')";
$aid=mysql_insert_id();
 $d++;
 $e++;
 $u++;
$res=mysql_query("insert into mer_order_details (oid,pid,qty,price) values($oid,$aid,$qty,$price)");
}
$gg=$_SESSION['sell'][$name];
echo"<span style='color:#fff'>Thank you ".$gg ." for placing an order</span>";
unset($_SESSION['pro']);
unset($_SESSION['qty']);
unset($_SESSION['price']);
unset($_SESSION['filename']);

}
?>

</div>
</body>
</html>


 