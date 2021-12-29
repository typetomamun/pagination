<?php

	/* Pagination Start */


	$getData = "SELECT * FROM table_name";
	$result = $conn->query($getData);
	$num_rows = mysqli_num_rows($result);
	//echo $num_rows;

	$start = 0;
	$limit = 10;
	
	
	if (isset($_GET["page"])) {
		$page = intval($_GET["page"]);
		$start = ($page-1)*$limit;
	}else{
		$page = 1;
	}
	
	
	//$total_pages = 10;
	$total_pages = ceil($num_rows/$limit);
	
	/* Pagination End */
?>

















<!-- Previous 1F 1 2 3 4C 5 6 7 66L Next -->

<div class="row"><!-- Navigation Menu [Start] -->
	<div class="col-md-12">
		<nav aria-label="Your Page Navigation">
			<ul class="pagination justify-content-center m-0">

				<?php
					if($page > 1){
						// previous page 
						?>
						<li class="page-item"><a class="page-link" href="?page=<?php echo ($page-1); ?>">Previous</a></li>
						<?php
					}
					if($page > 4){
						// First page 
						?>
						<li class="page-item"><a class="page-link" href="?page=1">1</a></li>
						<?php
					}
					$i = 0;
					if($page<4){
						$i = 1;
						//echo $i;
					}
					else{$i = $page - 3; }
					for($i; $i < $page; $i++){
						// Print Previous 3 page

						if($i < 1){
							break;
						}
						?>
						<li class="page-item"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
						<?php
						if($i == $page - 1){
							break;
						}
					}
					if($total_pages > 1){
						// print Current page 
						// differnt color mark and link disable
						?>
						<li class="page-item"><a class="paginate_current_page"><?php echo $page; ?></a></li>
						<?php

					}

					for($i = $page + 1; $i <= $total_pages; $i++){
						// Print Next 3 page
						?>
						<li class="page-item"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
						<?php
						if($i == $page + 3){
							break;
						}
					}
					if($page < $total_pages && $page < $total_pages - 3){
						// Print Last Page 
						?>
						<li class="page-item"><a class="page-link" href="?page=<?php echo $total_pages; ?>"><?php echo $total_pages; ?></a></li>
						<?php
					}
					if ($page < $total_pages){
						// Next Page
						?>
						<li class="page-item"><a class="page-link" href="?page=<?php echo ($page+1); ?>">Next</a></li>
						<?php
					}
				?>

			</ul>
		</nav>
	</div>
</div><!-- Navigation Menu [END] -->
