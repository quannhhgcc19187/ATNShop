<?php
		include_once("connection.php");
		if(isset($_POST['btnAdd']))
		{
			$id = $_POST['txtID'];
			$name = $_POST['txtName'];
			$err = "";
			if($id=="")
			{
				$err .= "Enter category ID</br>";
			}
			if($name=="")
			{
				$err .= "Enter category name</br>";
			}
			if($err != "")
			{
				echo $err;
			}
			else
			{
				$sql = "select * from category where cat_id ='$id' and cat_name = '$name'";
				$result = pg_query($conn, $sql);
				if(pg_num_rows($result)=="0")
				{
					pg_query($conn, "insert into category (cat_id, cat_name) values ('$id', '$name')");
					echo '<meta http-equiv="refresh" content="0;URL =?page=category_management"';
				}
				else
				{
					echo "Data duplicated";
				}
			}
		}
	?>

<div class="container">
	<h2>Adding Category</h2>
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Category ID(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Category ID" value='<?php echo isset($_POST["txtID"])?($_POST["txtID"]):"";?>'>
							</div>
					</div>	
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Category Name(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Category Name" value='<?php echo isset($_POST["txtName"])?($_POST["txtName"]):"";?>'>
							</div>
					</div>
                    
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="site-btn" name="btnAdd" id="btnAdd" value="Add new"/>
                              <input type="button" class="site-btn" name="btnIgnore"  id="btnIgnore" value="Ignore" onclick="window.location='?page=category_management'" />
                              	
						</div>
					</div>
				</form>
	</div>