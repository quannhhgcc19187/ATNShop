    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <script language="javascript">
        function deleteConfirm(){
            if(confirm("Are you sure to delete!")){
                return true;
            }
            else{
                return false;
            }
        }
    </script>
        <?php
        include_once("connection.php");
            if(isset($_GET["function"])=="del"){
                if(isset($_GET["id"])){
                    $id = $_GET["id"];
                    pg_query($conn, "DELETE FROM shop WHERE shop_id='$id'");
                }
            }
            ?>
        <form name="frm" method="post" action="">
        <h1>Shop</h1>
        <table id="tableshop" class="table table-striped table-bordered" cellspacing="0" width="100%">
            
            <thead>
                <tr>
                    <th><strong>No.</strong></th>
                    <th><strong>Shop ID</strong></th>
                    <th><strong>Shop Name</strong></th>
                    <th><strong>Address</strong></th>
                    <th><strong>Phone</strong></th>
                    <th><strong>Email</strong></th>
                </tr>
             </thead>

			<tbody>
            <?php
              include_once("connection.php");
              $No=1;
              $result = pg_query($conn, "SELECT * FROM shop");
              while($row=pg_fetch_array($result,Null, PGSQL_ASSOC))
              {
            ?>
            <?php
            if(isset($_GET["function"])=="del"){
                if(isset($_GET["id"])){
                    $id = $_GET["id"];
                    pg_query($conn, "DELETE FROM shop WHERE shop_id='$id'");
                }
            }
            ?>
			<tr>
              <td class="cotCheckBox"><?php echo $No; ?></td>
              <td><?php echo $row["shop_id"]; ?></td>
              <td><?php echo $row["shop_name"]; ?></td>
              <td><?php echo $row["address"]; ?></td>
              <td><?php echo $row["phone"]; ?></td>
              <td><?php echo $row["email"]; ?></td>
            </tr>
            <?php
               $No++;
              }
              ?>
			</tbody>
        </table>  
        
        
        <!--Nút Thêm mới , xóa tất cả-->
        <div class="row" style="background-color:#FFF"><!--Nút chức nang-->
            <div class="col-md-12">
            	
            </div>
        </div><!--Nút chức nang-->
 </form>
</table>