<?php
	include("includes/header.php");

	include("includes/connection.php");

	$bid=$_GET['id'];

	$book_query="select * from book,category where b_cat=cat_id and b_id=$bid";

	$book_res=mysql_query($book_query,$link);

	$book_row=mysql_fetch_assoc($book_res);
?>

<div id="content">
	<div class="post">
		<h2 class="title"><a href="#"><?php echo $book_row['cat_nm']; ?></a></h2>
			<p class="meta"></p>
			<div class="entry">
				
				<table class="book_detail" width="100%" border="0px">
					<tr valign="top">
						<td width="48%"><img class="book_img" src="<?php echo $book_row['b_img']; ?>" width="280px" height="350px">
						</td>

						<td>
							<h1><?php echo $book_row['b_nm']; ?></h1>
							<p class="desc"><?php echo $book_row['b_desc']; ?></p>

							<p class="price">Rs. <?php echo $book_row['b_price']; ?></p>



							<?php

								$is_cart=0;

								if(isset($_SESSION['cart']))
								{
									foreach($_SESSION['cart'] as $id=>$val)
									{
										if($val['img'] == $book_row['b_img'])
										{	
											$is_cart=1;
											break;
										}
									}
								}

								if(isset($_SESSION['client']['status']))
								{
									if($is_cart==0)
									{
										echo '<a href="addtocart.php?bcid='.$book_row['b_id'].'" class="cart_btn">Add to Cart</a>';
									}
									else
									{
										echo "Already in Cart";
									}
								}
								else
								{
									echo '<a href="#" class="cart_btn">Add to Cart</a><a style="text-decoration: none" href="login.php"><h2>Click here Login..</h2></a>';
								}
							?>


						</td>
					</tr>
				</table>

			</div>
	</div>
</div><!-- end #content -->

<?php
	include("includes/footer.php");
?>