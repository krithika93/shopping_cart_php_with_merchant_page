<?php session_start();?>
<?php  include("common/base.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Seller Cart Page</title>
<?php 
if((!isset($_SESSION['loggedin'])) && (!isset($_SESSION['sell'])))
{
print "<script>";
print "self.location='table2.php';";
print "</script>"; 
}

?>
<?php if(empty($_SESSION['pro']){ $add=-1; $c=0;} ?>
<?php 
if($_POST['submit1']))
{
if(isset($_FILE["filename"]["name"]))
{


$allowedExts = array("gif", "jpeg" , "jpg" , "png");
$extension=end(explode(".", $_FILE["file"]["name"]));
if((($_FILES["filename"]["type"] == "image/gif")
|| ($_FILES["filename"]["type"] == "image/jpeg")
|| ($_FILES["filename"]["type"] == "image/jpg")
|| ($_FILES["filename"]["type"] == "image/png"))
&& ($_FILES["filename"]["size"] < 100000)
&& in_array($extension, $allowedExts))
{

	  if(file_exists("/cartshop/images/".$_FILE["filename"]["name"]))
	  {
		echo $mm . "already exists.";
	  }
	  else
	  {
		move_uploaded_file($_FILE["filename"]["name"],"final/images/".$_FILE["filename"]["name"];
		echo "Stored in:" , "images/".$_FILE["filename"]["name"];
		$_SESSION['filename'][++$add]="images/".$_FILE["filename"]["name"];
		}
		}
		else
		{
		echo "Invalid file";
		}
		
		
}	  


?>
<?php 

if($_POST['submit']))
{
if(isset($_FILE["filename"]["name"]))
{
foreach($_FILE["filename"]["type"] as $index =>$nn)
{

}

foreach($_FILE["filename"]["size"] as $index =>$oo)
{
}


$ll=0;
foreach($_FILE["filename"]["name"] as $index =>$mm)
{
$allowedExts = array("gif", "jpeg" , "jpg" , "png");
$extension=end(explode(".",$mm));
if((($nn[$index] == "image/gif")
|| ($nn[$index] == "image/jpeg")
|| ($nn[$index] == "image/jpg")
|| ($nn[$index] == "image/png"))
&& ($oo[$index] < 100000)
&& in_array($extension, $allowedExts))
{
	  if(file_exists("/final/images/" .$mm))
	  {
		echo $mm . "already exists.";
	  }
	  else
	  {
	move_uploaded_file($mm,"final/images".$mm);
		echo "Stored in:" , "final/images/".$mm;
		$_SESSION['filename'][$ll++]="images/".$mm;
		
		
		}
		else
		{
		echo "Invalid file";
		}
		
		}
	  
}

?>

</head>

<body>

		 
		 
		 
<div id="top" style="width:100%; height:150px; position:fixed;">
<div id="header" style="float:left;"> 
<h3>
KRITHIKA'S SHOPPING CART  
</h3>
</div> 
</div> 
<div id="container">
<?php 
 if(isset($_POST['submit']))
 {
 if(isset($_GET['id']))
 {
 $count=$_GET['id'];
 }
 else
 {
 $count=1;
 }
  if(isset($_GET['action']))
 {
 $action=$_GET['action'];
 }
 else
 {
 $action="empty";
 }
 switch($action)
 {
 case "addnew":
  { 
  
 // $add=$_GET[' '];
  if(isset($_POST['submit1']))
  {
  //$q=q+1;
  
  
  if(isset($_POST['name1']))
  {
 $pro=$_POST['name1'];
 }
 if(isset($_POST['qty1']))
 {
 $qty=$_POST['qty1'];
 }
 if(isset($_POST['price1']))
 {
 $price=$_POST['price1'];
}
 //inserting for the first time current orders only
 
 // mysql_query("insert into products (serial,name,qtyre,price,picture,mid) values(' ',$pro,$price,' ',    ");
 // $id=mysql_insert_id();
 //insertion can be done separetely.. 
 $_SESSION['pro'][++$add]= $pro;
 $_SESSION['qty'][++$add]= $qty;
 $_SESSION['price'][++$add]= $price;
 
 unset($_GET['action']);
 }
 
break;
}
 case "update":
 {
 
		if($_POST['submit'])
		{
		  $array=$_POST['name'];
		  $quans=$_POST['qty'];
		  $pric=$_POST['price'];
		  $mm=$_FILE['filename']['name'];
			$in=-1;
		  foreach($array as $ind => $b)
		  {
		   $_SESSION['pro'][++$in]=$b;
		   $_SESSION['qty'][++$in]=$quans[$ind];
		   $_SESSION['pric'][++$in]=$pric[$ind];
		  // $_SESSION['pic'][++$in]=$mm[$ind];
			if(isset($_SESSION['filename'][++$in]))
		{
			$var=$_SESSION['filename'][++$in]; //update the image folder too value of file name  to be displayed	
			echo "the picture u want to $var is uploaded to the folder you specified";// picture can be or need not be modified
		
		}
		   }	
		unset($_GET['action']);
		}
		
		
}
break;
}

	
	//count($_SESSION['cart'])
	  
	  
	      case "add":
		 {
		
		 
		 if($_SESSION['qty'][$count])
		 {
		   $_SESSION['qty'][$count]++;
		 }
		else
		{
			$_SESSION['qty'][$count]=1;
		}
			unset($_GET['action']);
		break;
		}
		 
		  
		 case "remove":
		 {
		 
		
		  $_SESSION['qty'][$count]--;	
			$t=count($_SESSION['pro']);//which is one greater than the qty now.. 
			if($_SESSION['qty'][$count]==0)
			{
			$k=$count;
				foreach($_SESSION['name'] as $l => $n)
				{
					if($l=$k)
					{
					for($i=$k;$i<=($t-1);$i++)
					{
					
					$_SESSION['pro'][$l]=$_SESSION['pro'][++$l];
					$_SESSION['qty'][$l]=$_SESSION['qty'][++$l];
					$_SESSION['price'][$l]=$_SESSION['price'][++$l];
					$_SESSION['filename'][$l]=$_SESSION['filename'][++$l];
					
				
					}
					}
					break 1;
					}
				}	
				$count=$l;
				unset($_SESSION['pro'][$count]);
				unset($_SESSION['qty'][$count]);
				unset($_SESSION['price'][$count]);
				unset($_SESSION['filename'][$count]);
			}
			unset($_GET['action']);
			break;
		  }
		  case "empty":
		  {
		  	  
		  //$count=0;
		  unset($_SESSION['qty'][$count]);
		  unset($_SESSION['pro'][$count]);
		  unset($_SESSION['price'][$count]);
		  unset($_SESSION['filename'][$count]);
		unset($_GET['action']);
			break;
		  }
		  }
		}		 
			
		
		?>
<div id="container"  align="center" style="height:1950px;width:620px; margin-left:200px; margin-right:100px;margin-top:100px;background-color:#0000FF"> 
		
<h3 style="background-color:#FF0">Products</h3>
<a style="color:#FFFF00; text-decoration:none" href="cart.php?action=none" ><span style="margin-left:500px;">
<img src="images/cart.png">Cart (<?php if(isset($_SESSION['pro'])){ echo count($_SESSION['pro']);} else {echo "0"; } ?>)</span></a>
<br />
<div id="top"  style="width:100%; height:500px; position:fixed;">

<div id="header" style="float:left;">
<h3>
KRITHIKA'S SHOPPING CART 
</h3>
</div> 
<div id="name" style="float:right;">
Welcome <a href="<?php if(isset($_SESSION['loggedin'])){ if(isset($_SESSION['cust'])){ echo "tt.php?id=$count&action=none"; } else { echo "merpage.php?id=$count&action=none"; } }?>" ><?php if(isset($_SESSION['loggedin'])){ $nam=$_SESSION['sell'][$name]; echo $nam; } else { echo "Guest"; } ?> </a> 
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
                                <tr> <th width="112"><a id='seller'>Customer</a></th> >>
                               
                                    
									  <td width="71"><a href='merr.php?id=<?php echo ".$count."; ?>&action=none'>Add an Item</a></td> |
									  <td width="114"><a href='merr.php?id=<?php echo ".$count."; ?>&action=none'>Modify the cart</a></td> |
									  <td width="83"><a href="#">Updade your profile</a></td> |
									  <td width="43"><a href='table2.php?id=<?php echo ".$count."; ?>&action=none'>Products Page</a></td> |
									  <td width="85"><a href='merpage.php?id=<?php echo ".$count."; ?>&action=none'>Home Page</a></td> 
								</tr> <br />
								<?php } ?>
								<?php if(isset($_SESSION['cust']))
								{ ?>
                        		
                                <tr><th><a id='customer'>Seller</a> </th>  >>
								
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
if(((isset($_GET['action']) ) &&(!isset($_POST['dis']))) || (empty($_SESSION['pro'])))
{ //isset action too 
 if(($_GET['action']=="addnew")||empty($_SESSION['pro']))
 {
		?>
		
		
		<div id="hello" align="center" >
		<form action="merr.php" method="post" enctype="multipart/form-data">
       	<td> <label for="name1">"Enter the product name to be added"</label> </td> 
		 <td> <input type="text" name= "name1" id="1" /> </td>
		 <td><label for="file">"Upload the picture of the product to be added"</label> 
		 <td><label for="file">Filename:</label> </td> </td>
		 <td><input type="file" name="filename" id="file"></td> <br/>
		 <td> <label for="qty1"> Quantity:</label> </td> <td><input type="text" name="qty1" id="2" /></td>
		 <td> <label for="price1">Price: </label></td><td><input type="text" name="price1" id="3" /></td>
		 <input type="hidden" name="dis" value="1" id="4" />
         <td><input type="submit" name="submit1" value="Submit"></td>
		 
         </form>
		 </div>
		<?php //onclick unset the get variable too  file upload script
		}  } ?>
		<?php if(!isset($_SESSSION['pro']))
		{
		
		echo "<b>Your cart is empty, you can add new items for selling</b><br>";
		}
		?>
		{

				
		<?php
if((isset($_GET['action'])) &&(!isset($_POST['dis'])))
{ //isset action too 
 if(($_GET['action']=="update"))
 {
		?>
		
		<?php $m=0; $n=0; $o=0;?> 
<?php foreach($_SESSION['qty'] as $count => $y[$m])
{
$m++;
}

foreach($_SESSION['price'] as $count => $z[$n])
{
$n++;

}
foreach($_SESSION['filename'] as $count =>$a[$o])
{
$o++;
}
?>
<?php $c=0;$d=0;$e=0; ?>
<?php 

foreach($_SESSION['pro'] as $count=> $x)  //add new or  while foreach for both  insert into both products also mid and pid 
 {  ?>
		<div id="hello" align="center" >
		<form action="merr.php" method="post" enctype="multipart/form-data">
       	<td> <label for="name1">"Name"</label> </td> 
		<?php $name=$x; $qty=$y[$d]; $price=$z[$e]; $pic=$a[$c]; $d++; $e++; $c++; ?>
		 <td> <input type="text" name= "name1[]" id="1" value= "<?php echo "$x"; ?> "/> </td>
		 <td><label for="file">"picture"</label> 
		 <td><input type="text" name="f1[]" readonly="true" value="<?php echo "$pic"; ?>" />
		 <td><label for="file">"name"</label> </td> </td>
		 <td><input type="file" name="filename[]" id="file"></td> <br/>
		 <td> <label for="qty1"> Quantity:</label> </td> <td><input type="text" name="qty1[]" id="2" value="<?php echo "$qty"; ?>"/></td>
		 <td> <label for="price1">Price: </label></td><td><input type="text" name="price1[]" id="3" value="<?php echo "$price"; ?>/></td>
		 <input type="hidden" name="dis" value="1" id="4" />
		 
         <td><input type="submit" name="submit" value="Submit"></td>
		 
         </form>
		 </div>
		<?php //onclick unset the get variable too  file upload script
		}  } ?>

<?php if((isset($_SESSION['pro'])) && (!isset($_GET['action'])) &&(isset($_POST['dis'])) )  
	{ 
//if($_GET['action']!="add")
 unset($_POST['dis']);
//{
?>
<table>
<tr> 
<th> <label id="merid">Id</label></th>
<th> <label id="product">Name</label> </th>
<th> <label id="qty"> Qty </label></th>
<th> <label id="date"> Date of retail</label>  </th>
</tr>

<?php $m=0; $n=0;?> 
<?php foreach($_SESSION['qty'] as $count => $y[$m])
{
$m++;
}

foreach($_SESSION['price'] as $count => $z[$n])
{
$n++;

}
foreach($_SESSION['filename'] as $count =>$a[$o])
{
$o++;
}
?>
<?php $c=0;$d=0;$e=0;$f=0; $q=0; $bb=0;?>
<?php foreach($_SESSION['pro'] as $count=> $x)  //while foreach for both  insert into both products also mid and pid 
 { ?>

<tr><td>Serial:</td><td><?php echo $c; $c++; ?></td>
<td> Name:</td><td><?php echo $x; ?> </td> 
<td> Quantity:</td><td> <?php $qty=$y[$d];  $d++; echo $price; ?> </td>
<td> Price:</td><td> <?php $price=$z[$e]; $e++; $line_cost=$price*$qty; echo $line_cost;  $total+=$line_cost; ?></td> 
<td> Date:</td><td><?php $date=date('Y-m-d');  echo $date;  $_SESSION['date'][$bb++]=$date;?> </td> 
<td> Picture:</td><td><?php $pic=$a[$f]; $f++; ?><img src="<?php echo $pic;  ?>" height="100" width="300" /> </td>
<td></td><td><a id="2" href='merr.php?id=<?php echo "$q"; ?>&action=add'><input type="button" name="b2" value="Add"></a></td><br />
<td></td><td><a id="3" href='merr.php?id=<?php echo "$q";  ?>&action=remove'><input type="button" name="b3" value="Remove"></a></td><br />
<td></td><td><a id="4" href='merr.php?id=<?php echo "$q"; ?>&action=empty'><input type="button" name="b4" value="Empty"></a></td><br />
<?php $q=q++; ?>
</tr>
<?php }
?>

<?php $q=$_SESSION['num']; ?>
 <?php //$result=mysql_query("select * from mer_orders where serial='$x'  ?></td> </tr><br/> 
<tr><td></td><td><a id="1" href='merr.php?id=<?php echo "$q"; ?>&action=update'><input type="button" name="b1" value="Edit and Update" /></a> </td><br />
         
		 <td><a id="4" href='merr.php?id=<?php echo "$q"; ?>&action=addnew'><input type="button" name="b4" value="Add New Item"></a></td><br />
		 </tr>
		 <tr>
		 <td align="center"><a href="bil.php"><input type="submit" name="final_submit" value="CONFIRM SUBMISSION"></a></td>
		 </tr>
		 </table>
<?php  
}
// while($_SESSION['sell'][$id] as $index => $x )
// {//display picture have that too as session//session somethin? onload display no items in the cart
?>

<?php /*  $array1['name'];*/ ?> 
	
	 <?php //echo $_SESSION['Pro']; ?>  
		<?php //echo $array1['qty']; ?>   
		<?php //echo $array1['price']; ?>  
	    <!--<td>&nbsp;</td>-->
		
		
		
		 </div>
		 </body>
		 </html>
		 
		
			