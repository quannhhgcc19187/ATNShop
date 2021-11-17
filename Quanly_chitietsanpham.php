<?php
if(isset($_GET["ma"]))
	{
		$id = $_GET["ma"]; 
		$result = pg_query($conn,"SELECT Product_Name, Price, DetailDesc, ProDate, Pro_image,Pro_qty, Cat_Name FROM product , category WHERE product.Cat_ID=category.Cat_ID and Product_ID='$id'"); 
		$row= pg_fetch_array($result, PGSQL_ASSOC);
    }
?>
<table>
<tr>
    <td rowspan='5'><img src='product-imgs/<?php echo $row['Pro_image']?>' width="1000px" height="1000px"/></td>
    <td><p style="font-size:20px" >Product Name: <?php echo $row["Product_Name"]; ?></p><td>
</tr>
<tr>
<td><p style="font-size:20px" >Price: $<?php echo $row["Price"]; ?></p><td>
</tr>
<tr>
<td><p style="font-size:20px" >Quantity: <?php echo $row["Pro_qty"]; ?></p><td>
</tr>
<tr>
<td><p style="font-size:20px" >Description:<p style="font-size:20px" ><?php echo $row["DetailDesc"]; ?></p><td>
</tr>
<tr>
<td><p style="font-size:20px" >Supplier: <?php echo $row["Cat_Name"]; ?></p><td>
</tr>
</table>