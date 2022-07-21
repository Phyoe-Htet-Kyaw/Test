	<?php include "inc/header.php"; ?>
	
	<!-- Start Page Title Area -->
	<div class="page-title-area">
		<div class="d-table">
			<div class="d-table-cell">
				<div class="container">
					<div class="page-title-content">
						<h2>Contact</h2>
						<ul>
							<li><a href="index-2.html">Home</a>
							</li>
							<li>Contact</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Page Title Area -->
	
	<!-- Start Contact Box Area -->
	<section class="contact-info-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h6>Contact Information</h6>
						<h2>Find Us</h2>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="contact-info-content">
						<h5>USA Headquarter</h5>
						<p>304 NW St Homestead, Florida, Melrose Street, Water Mill, 76B Overlook Drive Chester, PA 19013, Flemingsburg USA.</p>
						<a href="tel:0802235678">080 707 555-321</a>
						<a href="mailto:demo@example.com">demo@example.com</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="contact-info-content">
						<h5>New York Office</h5>
						<p>1540 Pecks Ridge Tilton Rd Flemingsburg, Kentucky(KY), 4104188 Fulton Street Blackwood, NJ 08012, London.</p>
						<a href="tel:0802235678">080 707 555-321</a>
						<a href="mailto:demo@example.com">demo@example.com</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="contact-info-content">
						<h5>Panama Office</h5>
						<p>103 Richard Ave Ashville, Ohio, Water Mill,3468 16th Hwy Pangburn, Arkansas(AR), Charolais Ashville, Virginia, Panama.</p>
						<a href="tel:0802235678">080 707 555-321</a>
						<a href="mailto:demo@example.com">demo@example.com</a>
					</div>
				</div>
			</div>
		</div>
    </section>
	<!-- End Contact Box Area -->
	
	<!-- Start Contact Section -->
	<div class="contact-section bg-grey section-padding">
		<div class="container">
			<div class="section-title">
				<h6>Contact Us</h6>
				<h2>Let's Talk</h2>
			</div>
			<div class="row align-items-center">
				<div class="col-lg-10 offset-lg-1">
					<div class="contact-form">
						<p class="form-message"></p><br />
						<form id="contact-form" class="contact-form form" action="https://cutesolution.com/html/Techvio/mail.php" method="POST">
							<div class="row">
								<div class="col-lg-6 col-md-6">
									<div class="form-group">
										<input type="text" name="name" id="name" class="form-control" required placeholder="Your Name">
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="form-group">
										<input type="email" name="email" id="email" class="form-control" required placeholder="Your Email">
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="form-group">
										<input type="text" name="phone" id="phone" required class="form-control" placeholder="Your Phone">
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="form-group">
										<input type="text" name="subject" id="subject" class="form-control" required placeholder="Your Subject">
									</div>
								</div>
								<div class="col-lg-12 col-md-12">
									<div class="form-group">
										<textarea name="message" class="form-control" id="message" cols="30" rows="6" required placeholder="Your Message"></textarea>
									</div>
								</div>
								<div class="col-lg-12 col-md-12">
									<button type="submit" class="default-btn submit-btn">Send Message <span></span></button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact Section -->
	
    <!-- Map Section Start -->
    <div class="map-area">
        <div class="map-content">
            <div class="map-canvas" id="contact-map"></div>
        </div>
    </div>
    <!-- Map Section End -->
	
	<?php include "inc/footer.php"; ?>