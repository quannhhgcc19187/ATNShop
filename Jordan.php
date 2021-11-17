<?php
include_once("connection.php");
?>

    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Spinning toys</h2>
                        <div class="product-carousel">

                        <!--Load san pham tu DB -->
                           <?php
						  // 	include_once("database.php")
		  				   	$result = pg_query($conn, "SELECT * FROM product WHERE cat_id='C004'" );
			
			                if (!$result) { //add this check.
                                die('Invalid query: ' . pg_error($conn));
                            }
		
			            
			                while($row = pg_fetch_array($result,Null, PGSQL_ASSOC)){
				            ?>
				            <!--Một sản phẩm -->
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="product-imgs/<?php echo $row['pro_image']?>" width="150" height="150">
                                </div>
                                
                                <h2><a href="?page=quanly_chitietsanpham&ma=<?php echo  $row['product_id']?>"><?php echo $row['product_name']?></a></h2>
                                
                                <div class="product-carousel-price">
                                    <ins><?php echo  $row['price']?></ins>
                                </div> 
                            </div>
                <?php
				}
				?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>