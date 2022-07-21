<?php include "inc/header.php"; ?>
	
	<!-- Start Page Title Area -->
	<div class="page-title-area item-bg2">
		<div class="d-table">
			<div class="d-table-cell">
				<div class="container">
					<div class="page-title-content">
						<h2>Blogs</h2>
						<ul>
							<li><a href="index.php">Home</a>
							</li>
							<li>Blogs</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Page Title Area -->
	
	<!-- Start Blog Section -->
	<section class="blog-section pt-100 pb-100">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="row">
						<?php
							$blog = new Btasks;
							$blog_res = $blog->show();
							foreach($blog_res as $item){
						?>
							<div class="col-lg-6 col-md-6">
								<div class="blog-item">
									<div class="blog-image">
										<a href="single-blog.php?id=<?php echo $item->id; ?>">
											<img src="admin/uploads/<?php echo $item->images; ?>" alt="image">
										</a>
									</div>
									<div class="single-blog-item">
										<ul class="blog-list">
											<li>
												<a href="#"> <i class="fa fa-user-alt"></i><?php echo $item->user; ?></a>
											</li>
											<li>
												<a href="#"> <i class="fas fa-calendar-week"></i>
												<?php
													$s = $item->created_at;
													$date = strtotime($s);
													echo date('d/M/Y', $date);
												?>
												</a>
											</li>
										</ul>
										<div class="blog-content">
											<h3>
												<a href="single-blog.php?id=<?php echo $item->id; ?>">
													<?php echo $item->title; ?>
												</a>
											</h3>
											<p><?php echo $item->description; ?></p>
											<div class="blog-btn"> <a href="single-blog.php?id=<?php echo $item->id; ?>" class="blog-btn-one">Read More</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php
							}
						?>
						<div class="col-lg-12 col-md-12">
							<div class="pagination-area"> <a href="#" class="prev page-numbers"><i class="fas fa-angle-double-left"></i></a>
								<a href="#" class="page-numbers">1</a>
								<span class="page-numbers current" aria-current="page">2</span>
								<a href="#" class="page-numbers">3</a>
								<a href="#" class="page-numbers">4</a>
								<a href="#" class="next page-numbers"><i class="fas fa-angle-double-right"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-12">
					<?php include "inc/blog-aside.php"; ?>
				</div>
			</div>
		</div>
	</section>
	<!-- End Blog Section -->
	
<?php include "inc/footer.php"; ?>