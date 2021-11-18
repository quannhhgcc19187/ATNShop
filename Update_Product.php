<link rel="stylesheet" type="text/css" href="asm2.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
    require('requirelogin.php');
	include_once("connection.php");
	function bind_Category_List($conn, $selectedValue){
		$sqlstring ="SELECT cat_id, cat_name from public.category";
		$result = pg_query($conn, $sqlstring);
		echo "<select name='CategoryList' class='form-control'>
				<optiom calue='0'>Choose category</option>";
				while ($row=pg_fetch_array($result, NULL, PGSQL_ASSOC)){
					if($row['cat_id']==$selectedValue){
						echo "<option value='".$row['cat_id']."'select>".$row['cat_name']."</option>";
					}
					else {
						echo "<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
					}
				}
echo "</select>";
	}
?>



<?php
    include_once("connection.php");
    if(isset($_GET["id"])){
        $id=$_GET["id"];
        $sqlstring ="SELECT product_name, product_qty, price, pro_desc, cat_id, image  FROM product where pro_id='$id'";

        $result=pg_query($conn, $sqlstring);
        $row=pg_fetch_array($result, NULL, PGSQL_ASSOC);

        $proname=$row["pro_name"];
        $qty=$row['pro_qty'];
        $price=$row['price'];
		$des=$row['pro_desc'];
		$category=$row['cat_id'];
        $pic=$row['image'];
    
?>


<?php
    if(isset($_POST["btnUpdate"]))
    {
        $id=$_POST["txtID"];
        $proname=$_POST["txtName"];
        $category=$_POST['CategoryList'];
		$price=$_POST['txtPrice'];
		$des=$_POST['txtDescription'];
        $qty=$_POST['txtQty'];
        $pic=$_FILES['txtImage'];

        
        if(trim($id)==""){
            echo "<script>alert('Enter product ID please')</script>";
        }
        if(trim($proname)==""){
            echo "<script>alert('Enter product name please')</script>";
        }
        if($category=="0"){
            echo "<script>alert('Choose category please')</script>";
        }
        if(!is_numeric($qty))
        {
            echo "<script>alert('Product quantity must be a number')</script>";
        }
        if(!is_numeric($price)){
            echo "<script>alert('Product price must be a number')</script>";
        }
        else {
            if($pic['name']!="")
            {
                if($pic['type']=="image/jpg"||$pic['type']=="image/jpeg"||$pic['type']=="image/png"||$pic['type']=="image/gif"){
                    if($pic['size']<=700000)
                    {
                        $sq="SELECT * FROM public.product WHERE product_id !='$id' and product_name='$proname'";
                        $result = pg_query($conn,$sq);
                        if(pg_num_rows($result)==0)
                        {
                            copy($pic['tmp_name'],"pro_image/".$pic['name']);
                            $filePic=$pic['name'];

                            $sqlstring="UPDATE product SET product_name='$proname', pro_qty=$qty, price=$price, 
							pro_desc='$des', cat_id = '$category',  image='$filePic' WHERE pro_id='$id'";
                            pg_query($conn,$sqlstring);
                            echo '<meta http-equiv="refresh" content="0; URL=index.php?page=product"/>';
                        }
                        else {
                            echo "<script>alert('Duplicate product Name')</script>";
                        }
                    }
                    else {
                        echo "<script>alert('Size of image too big')</script>";
                    }
                }else{
                    echo "<script>alert('Image format is not correct')</script>";
                }
            }
            else {
                $sq="SELECT * FROM public.product WHERE product_id !='$id' and product_name='$proname'";
                $result=pg_query($conn,$sq);
                if(pg_num_rows($result)==0)
                {
                    $sqlstring="UPDATE product SET product_name='$proname', pro_qty=$qty, price=$price, 
					pro_desc='$des', cat_id = '$category' WHERE pro_id='$id'";
                    pg_query($conn,$sqlstring);
                    echo '<meta http-equiv="refresh" content="0; URL=index.php?page=product"/>';
                }
            }
        }
    }
?>
<div class="container">
  <h2>UPDATE PRODUCT</h2>
  <form id="frmProduct" name="frmProduct" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
    <div class="form-group">
      <label>Product ID:</label>
      <input type="text" name="txtID" id="txtID" class="form-control" readonly value='<?php echo $id;?>' />
    </div>
    <div class="form-group">
      <label>Product name:</label>
      <input type="text" name="txtName" id="txtName" class="form-control" value='<?php echo $proname;?>'/>
    </div>
    <div class="form-group">
      <label>Quantity:</label>
      <input type="number" name="txtQty" id="txtQty" class="form-control" value='<?php echo $qty;?>'>
    </div>
    <div class="form-group">
      <label>Price:</label>
      <input type="text" name="txtPrice" id="txtPrice" class="form-control" value='<?php echo $price;?>'>
    </div>
    <div class="form-group">
      <label>Description:</label>
      <input type="text" name="txtDescription" class="form-control" value='<?php echo $des;?>'>
	</div>
    <div class="form-group">
      <label>Product category:</label>
        <?php bind_Category_List($conn, $category); ?>
    </div>
    <div class="form-group">
      <label>Image:</label>
      <img src='product_image/<?php echo $pic; ?>' border ='0' width="50" height="50" />
      <input type="file" name="txtImage" id="txtImage" class="form-control" value='<?php echo $pic;?>'/>
    </div>
    <button type="submit" class="btn btn-primary"  name="btnUpdate" id="btnUpdate">Submit</button>
    <button type="button" class="btn btn-danger" name="btnCancel" onclick="window.location='index.php?page=product'">Cancel</button>
  </form>
</div>
<?php	
	}
    else{
        echo '<meta http-equiv="refresh" content="0; URL=index.php?page=product"/>';
    }
?>