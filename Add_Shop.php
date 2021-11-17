<?php
		include_once("connection.php");
		if(isset($_POST['btnAdd']))
		{
			$id = $_POST['txtID'];
			$name = $_POST['txtName'];
			$Address = $_POST['txtAddress'];
			$phone = $_POST['txtPhone'];
			$email = $_POST['txtEmail'];
			$err = "";
			if($id=="")
			{
				$err .= "Enter category ID</br>";
			}
			if($name=="")
			{
				$err .= "Enter category name</br>";
			}
			if($Address=="")
			{
				$err .= "Enter address/br>";
			}
			if(!iS_number($phone)="")
			{
				$err .= "Enter phone</br>";
			}
			if($email=="")
			{
				$err .= "Enter email</br>";
			}
			if($err != "")
			{
				echo $err;
			}
			else
			{
				$sql = "select * from shop where shop_id ='$id' and shop_name = '$name'";
				$result = pg_query($conn, $sql);
				if(pg_num_rows($result)=="0")
				{
					pg_query($conn, "insert into shop (shop_id, shop_name, address, phone, email) values ('$id', '$name','$Address','$phone','$email')");
					echo '<meta http-equiv="refresh" content="0;URL =?page=shop_management"';
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
						    <label for="txtTen" class="col-sm-2 control-label">Shop ID(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Category ID" value='<?php echo isset($_POST["txtID"])?($_POST["txtID"]):"";?>'>
							</div>
					</div>	
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Shop Name(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Category Name" value='<?php echo isset($_POST["txtName"])?($_POST["txtName"]):"";?>'>
							</div>
					</div>
					<div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Address(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtAddress" id="txtAddress" class="form-control" placeholder="Address" value='<?php echo isset($_POST["txtAddress"])?($_POST["txtAddress"]):"";?>'>
							</div>
					</div>
                    <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Phone(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtPhone" id="txtPhone" class="form-control" placeholder="Phone" value='<?php echo isset($_POST["txtPhone"])?($_POST["txtPhone"]):"";?>'>
							</div>
					</div>
					<div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Email(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtEmail" id="txtEmail" class="form-control" placeholder="Email" value='<?php echo isset($_POST["txtEmail"])?($_POST["txtEmail"]):"";?>'>
							</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="site-btn" name="btnAdd" id="btnAdd" value="Add new"/>
                              <input type="button" class="site-btn" name="btnIgnore"  id="btnIgnore" value="Ignore" onclick="window.location='?page=shop_management'" />
                              	
						</div>
					</div>
				</form>
	</div>