<?php
	include_once("connection.php");
	function bind_Category_List($conn) {
		$sqlstring = "SELECT cat_id, cat_name from category";
		$result = pg_query($conn, $sqlstring);
		echo "<SELECT name='CategoryList' class='form-control'>
			<option value='0'>Choose category</option>";
			while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
				echo "<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
			}
		echo "</select>";	
		}

		function bind_Shop_List($conn) {
			$sqlstring = "SELECT shop_id, shop_name from shop";
			$result = pg_query($conn, $sqlstring);
			echo "<SELECT name='StoreList' class='form-control'>
				<option value='0'>Choose shop</option>";
				while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
					echo "<option value='".$row['shop_id']."'>".$row['shop_name']."</option>";
				}
			echo "</select>";	
			}

		if(isset($_POST["btnAdd"]))
		{
			$id = $_POST["txtID"];
			$id = htmlspecialchars(pg_escape_string($conn, $id));
			$proname = $_POST['txtName'];
			$proname = htmlspecialchars(pg_escape_string($conn, $proname));
			$qty = $_POST['txtQty'];
			$qty = htmlspecialchars(pg_escape_string($conn, $qty));
			$price = $_POST['txtPrice'];
			$price = htmlspecialchars(pg_escape_string($conn, $price));
			$des = $_POST['txtDescription'];
			$des = htmlspecialchars(pg_escape_string($conn, $des));
			$category = $_POST['CategoryList'];
			$category = htmlspecialchars(pg_escape_string($conn, $category));
			$store = $_POST['StoreList'];
			$store = htmlspecialchars(pg_escape_string($conn, $store));
			$pic = $_FILES['txtImage'];
			$err="";

			if(trim($id)=="")
			{
				echo "<script>alert('Enter product ID please')</script>";
			}
			elseif(trim($proname)=="")
			{
				echo "<script>alert('Enter product name please')</script>";
			}
			elseif($category =="0")
			{
				echo "<script>alert('Choose category please')</script>";
			}
			elseif($store =="0")
			{
				echo "<script>alert('Choose shop please')</script>";
			}
			elseif(!is_numeric($qty))
			{
				echo "<script>alert('Product quantity must be a number')</script>";
			}
			elseif(!is_numeric($price)){
				echo "<script>alert('Product price must be a number')</script>";
			}
			
			else
			{
				if($pic['type']=="image/jpg" || $pic['type']=="image/jpeg" || $pic['type']=="image/png"|| $pic['type']=="image/gif")
				{
					if ($pic['size'] <= 614400)
					{
						$sq = "SELECT * FROM public.product WHERE product_id='$id' OR product_name='$proname'";
						$result = pg_query($conn, $sq);
						
						if(pg_num_rows($result)==0)
						{
							copy($pic['tmp_name'], "product_image/".$pic['name']);
							$filePic = $pic['name'];
							$sqlstring = "INSERT INTO product (product_id, product_name, pro_qty, price, pro_desc, cat_id, pro_image, shop_id)
							VALUES('$id', '$proname', $qty, $price, '$des', '$category', '$filePic', '$store')";
							pg_query($conn, $sqlstring);
							echo '<meta http-equiv="refresh" content="0;URL=index.php?page=management_product"/>';
						}
						else
						{
							echo "<script>alert('Duplicate product ID')</script>";
						}

					}
					else
					{
						echo "<script>alert('Size of the image too big')</script>";
						
					}

				}
				else{
					echo "<script>alert('Image format is not correct')</script>";
				}
			}
	}
?>
<div class="container">
  <h2 align="center">Add new product</h2>
  <form id="frmProduct" name="frmProduct" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
    <div class="form-group">
      <label>Product ID:</label>
      <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Enter product ID" value="" />
    </div>
    <div class="form-group">
      <label>Product name:</label>
      <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Enter product name" value="" />
    </div>
    <div class="form-group">
      <label>Quantity:</label>
      <input type="text" name="txtQty" id="txtQty" class="form-control" placeholder="Enter quantity">
    </div>
    <div class="form-group">
      <label>Price:</label>
      <input type="text" name="txtPrice" id="txtPrice" id="txtFullname" class="form-control" id="" placeholder="Enter price">
    </div>
    <div class="form-group">
      <label>Description:</label>
      <input type="text" name="txtDescription" class="form-control" id="" placeholder="Enter description">
	</div>
    <div class="form-group">
      <label>Product category:</label>
        <?php bind_Category_List($conn); ?>
    </div>

	<div class="form-group">
      <label>Shop:</label>
        <?php bind_Shop_List($conn); ?>
    </div>

    <div class="form-group">
      <label>Image:</label>
      <input type="file" name="txtImage" id="txtImage" class="form-control" value=""/>
    </div>
    <button type="submit" class="btn btn-primary"  name="btnAdd" id="btnAdd">Submit</button>
    <button type="button" class="btn btn-danger" name="" id="" onclick="window.location='index.php?page=management_product'">Cancel</button>
  </form>
</div>