<?php include "inc/header.php"; ?>
	
	<!-- Start Page Title Area -->
	<div class="page-title-area">
		<div class="d-table">
			<div class="d-table-cell">
				<div class="container">
					<div class="page-title-content">
						<h2>Projects</h2>
						<ul>
							<li><a href="index.php">Home</a>
							</li>
							<li>Projects</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Page Title Area -->
	
	<!-- Start Project Section -->
    <section class="project-area section-padding">
        <div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="section-title">
						<h6>Recent Works</h6>
						<h2>Our Portfolio</h2>
					</div>
				</div>
			</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="project-list">
                        <ul class="nav" id="project-flters">
                            <li class="filter filter-active" data-filter=".all">all</li>
                            <?php
                                $project_cat = new Procategory;
                                $project_cat_data = $project_cat->show();
                                foreach($project_cat_data as $item){
                            ?>
                                <li class="filter" data-filter=".photography"><?php echo $item->name; ?></li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="project-container">
                    <!-- project-item -->
                    <div class="col-lg-3 col-md-6 project-grid-item all branding webdesign">
                        <div class="project-item">
							<img src="assets/img/portfolio/portfolio-1.jpg" alt="image">
                            <div class="project-content-overlay">
								<p>App Store | Social Media</p>
								<h3><a href="single-projects.php">Creative Web Design</a></h3>
                            </div>
                        </div>
                    </div>
                    <!-- project-item -->
                    <div class="col-lg-6 col-md-6 project-grid-item all application photography">
                        <div class="project-item">
							<img src="assets/img/portfolio/portfolio-2.jpg" alt="image">
                            <div class="project-content-overlay">
								<p>App Store | Social Media</p>
								<h3><a href="single-projects.php">Creative Web Design</a></h3>
                            </div>
                        </div>
                    </div>
                    <!-- project-item -->
                    <div class="col-lg-3 col-md-6 project-grid-item all branding webdesign">
                        <div class="project-item">
							<img src="assets/img/portfolio/portfolio-3.jpg" alt="image">
                            <div class="project-content-overlay">
								<p>App Store | Social Media</p>
								<h3><a href="single-projects.php">Creative Web Design</a></h3>
                            </div>
                        </div>
                    </div>
                    <!-- project-item -->
                    <div class="col-lg-3 col-md-6 project-grid-item all branding webdesig photographyn">
                        <div class="project-item">
							<img src="assets/img/portfolio/portfolio-4.jpg" alt="image">
                            <div class="project-content-overlay">
								<p>App Store | Social Media</p>
								<h3><a href="single-projects.php">Creative Web Design</a></h3>
                            </div>
                        </div>
                    </div>
                    <!-- project-item -->
                    <div class="col-lg-3 col-md-6 project-grid-item all application webdesign photography">
                        <div class="project-item">
							<img src="assets/img/portfolio/portfolio-5.jpg" alt="image">
                            <div class="project-content-overlay">
								<p>App Store | Social Media</p>
								<h3><a href="single-projects.php">Creative Web Design</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Project Section -->
	
<?php include "inc/footer.php"; ?>