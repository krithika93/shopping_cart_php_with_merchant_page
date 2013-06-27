<?php session_start(); ?>
<?php include('common/base.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Display Items </title>

</head>
</head>


<style>
#menu
{
background-color:#00FF00;
float:left;
text-align:left;
width:100%;

}
ul 
{
float:left;
list-style-type:none;
}

</style>





  <style>

ul { font-family: Arial, Verdana; font-size: 14px; margin: 0; padding: 0; list-style: none; } ul li { display: block; position: relative; float: left; } li ul { display: none; } ul li a { display: block; text-decoration: none; color: #ffffff; border-top: 1px solid #ffffff; padding: 5px 15px 5px 15px; background: #1e7c9a; margin-left: 1px; white-space: nowrap; } ul li a:hover { background: #3b3b3b; } li:hover ul { display: block; position: absolute; } li:hover li { float: none; font-size: 11px; } li:hover a { background: #3b3b3b; } li:hover li a:hover { background: #1e7c9a; }

ul {
    font-family: Arial, Verdana;
    font-size: 14px;
    margin: 0;
    padding: 0;
    list-style: none;
	b
}
ul li {
    display: block;
    position: relative;
    float: left;
}
li ul {
    display: none;
}
ul li a {
    display: block;
    text-decoration: none;
    color: #ffffff;
    border-top: 1px solid #ffffff;
    padding: 5px 15px 5px 15px;
    background: #1e7c9a;
    margin-left: 1px;
    white-space: nowrap;
}
ul li a:hover {
background: #3b3b3b;
}
li:hover ul {
    display: block;
    position: absolute;
}
li:hover li {
    float: none;
    font-size: 11px;
}
li:hover a { background: #3b3b3b; }
li:hover li a:hover {
    background: #1e7c9a;
}
 h1 { 
 /*
	background-color:#FF0000;
 left:-20px; */
 
 }
#list
{
float:left;
}






#ch
{
margin-right:5px;
background-color:#CCFF66;

}

#fix
{
background-color:#66FF99;
text-align:right;
border-left:10;
float:left;
display:block;
height:50px;
width:50px;
}
#category
{
background-color:#99FF33;

	
	
}	

 </style>
 
</head>

<body>  
  
<div id="container" style="height:1950px; width:620px; margin-left:200px; margin-right:100px; margin-top:100px; background-color:#663399;" > 

<h3 style="background-color:#FF0">Products</h3>
<a style="color:#FFFF00; text-decoration:none" href="cart.php?action=none" ><span style="margin-left:500px;">
<img src="images/cart.png">Cart <p style="font-size:14px;">You have currently (<?php if(isset($_SESSION['cart'])){ echo count($_SESSION['cart']); } else if(isset($_SESSION['pro'])) {  echo count($_SESSION['pro']); } else {echo "0"; } } ?>) in your cart </p></span></a>
</br>
<div id="top"  style="width:100%; height:150px; position:fixed;">
<div id="header" style="float:left;">
<h3>
KRITHIKA'S SHOPPING CART 
</h3>
</div> 
<div id="name" style="float:right;">
Welcome <a href="<?php if(isset($_SESSION['loggedin'])){ if(isset($_SESSION['cust'])){ echo "tt.php?id=$count&action=none"; } else { echo "merpage.php?id=$count&action=none"; } }?>" ><?php if(isset($_SESSION['loggedin'])){ $gg=$_SESSION['name']; echo $gg; } else { echo "Guest"; } ?> </a> 
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
</div>
 <div id='menu1'>
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

<div id="category">
<table border="1" cellpadding="10"  bgcolor="#663399" id="tab">
<?php 
if(isset($_POST['skills']))
{
	
	$skills=$_POST['skills'];
	echo $skills;
	$results=mysql_query("select * from products where cat='$skills'");
	 //$n=mysql_num_rows();
//$array=mysql_fetch_array($results);
	$count=0;?> 
<?php echo "<tr>" ?>	
<?php 
	while($array=mysql_fetch_array($results)) //echo "<br>";
	{
	?>
	<?php 
if(($count>0) and (($count%2)==0))
			{
			 
			echo "</tr><tr>";
			 
			} 

			
	//echo $skills; ?>
	<td id="fix"><img id='div11' src='<?php echo $array['picture']; ?>' /> </td>
	<td id="fix"> <?php echo $array['name']; echo "<br>";
	echo $array['description']; echo "<br>";
	echo $array['price']; echo "<br>";
	?>

</td> 
<?php echo $count; ?>
<?php	 


$count=$count+1; 
}
echo '</tr>';

}
?>
</table>
</div>

 <?php $item=array('bag','book'); $i=0;?> 
<div id="list">	
<?php include('common/db.php'); 
 $items=mysql_query("select * from products");
?>


<form action="" method="post" name="myform">


<select name="skills" onChange="this.form.submit();" >
		<option value="Categories" selected="selected">Categories</option>
		<?php $results=mysql_query("select * from products");
			while($array=mysql_fetch_array($results))
			{ ?>
		<option value= "<?php echo $array['cat'];?>"> <?php  echo $array['cat']; ?> </option>
		<?php } ?>


        
</select>

</form>


</div>
<div id='menu'>
                        <ul>
                                <li><a id='products'>Products available</a> 
                                      <ul>
									  <li><a href="#">Bag</a></li>
									  
									  </ul>
								</li>	  
                        	
                                <li><a id='categories'>Categories</a>
									<ul>
									<li><a href="#">Apparels</a></li>
									</ul>		
									
								</li>
																				
                               <li><a>WishList</a></li>
                               <li><a>Bargains</a></li>
                       </ul>
 </div>
<div id="prod"> 
<form action="#" method='post'>
<table border="1" cellpadding="10" id="tab">
<?php include('common/db.php'); 

 $items=mysql_query("select * from products");
 while($result=mysql_fetch_array($items))
{ ?>
<?php if(isset($_GET['count'])){$count=$_GET['count']; } ?>
<tr>
<td id="div11"> <img id="div1" src="<?php echo $result['picture']; ?>" /> </td> 
<td id="div11"><b><?php  $row['name']?></b><br />
       <?php $row['description']?><br />
       Price:<big style="color:#455E5B">
       $<?php $row['price']?></big><br /><br />
	  
		<?php if($row['stock']==0){ echo "<big style='#999999'><b>Out of Stock</b></big>"; }  //if isset in href possible? i have to decrease the  stocks on each purchase too ?>
   <?php if($row['stock']!=0) { ?>    <a  href="<cart.php?id=<?php echo $row['serial'];?>&action=add "><input type="button" name="b1"  value="ADD" /></a> <?php } ?>
</td>
</tr> 
<tr><td colspan="2"><hr size="1" /></td>
<?php } ?>

<?php } ?> 
</table>

 <?php 

 if($count==1)
{
    echo "<tr><td><p style='margin-left:332px';'margin-top:25px';'color:#FF0000';><pre>*Please fill all the quanities</pre></p></td></tr>"; 
 }

 //if(!isset($_POST['item'])) { echo 
 ?> 

<input type='submit' name='formSubmit' value='Submit' id='sub' />

</form>  

</div>
<style>
#sub
{
margin-left:470px;

}




#ch
{
margin-right:5px;
background-color:#CCFF66;

}

#div11
{
background-color:#66FF99;
text-align:right;
border-left:10;
}
#div1
{
padding:50px;
padding-left:20px;
}

</style>
</body>
</html>

