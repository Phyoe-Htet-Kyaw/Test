<?php

	include "inc/header.php";
	
	$blog = new Btasks;
	if($blog->middleware($_GET)){
		$res = $blog->edit($_GET['id']); 
	}else{
	  echo "<script>window.location.href='blog.php'</script>";
	}

	$detail = $blog->detail($_GET['id']);

?>
	
	<!-- Start Page Title Area -->
	<div class="page-title-area item-bg1">
		<div class="d-table">
			<div class="d-table-cell">
				<div class="container">
					<div class="page-title-content">
						<h2>Blog Details</h2>
						<ul>
							<li><a href="index.php">Home</a>
							</li>
							<li>Blog Details</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Page Title Area -->
	
	<!-- Start Blog Details Area -->
	<section class="blog-details-area ptb-100">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="blog-details-desc">
						<div class="article-image">
							<img src="admin/uploads/<?php echo $detail->images; ?>" alt="image">
						</div>
						<div class="article-content">
							<div class="entry-meta">
								<ul>
									<li> <span>Posted On:</span> 
										<a href="#">
										<?php
											$s = $detail->created_at;
											$date = strtotime($s);
											echo date('d/M/Y', $date);
										?>
										</a>
									</li>
									<li> <span>Posted By:</span>  <a href="#"><?php echo $detail->user; ?></a>
									</li>
								</ul>
							</div>
							<h3><?php echo $detail->title; ?></h3>
							<p><?php echo $detail->description; ?></p>
						</div>
						<div class="article-footer">
							<div class="article-tags"> <span>Tag:</span>
								<a href="#"><?php echo $detail->tag; ?></a>
							</div>
							<div class="article-share">
								<ul class="social">
									<li><span>Share:</span>
									</li>
									<li>
										<a href="#"> <i class="fab fa-facebook-f"></i>
										</a>
									</li>
									<li>
										<a href="#"> <i class="fab fa-twitter"></i>
										</a>
									</li>
									<li>
										<a href="#"> <i class="fab fa-instagram"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="post-navigation">
							<div class="navigation-links">
								<div class="nav-previous">
									<a href="#"> <i class="fa fa-arrow-left"></i> Prev Post</a>
								</div>
								<div class="nav-next"> <a href="#">
                                            Next Post 
                                            <i class="fa fa-arrow-right"></i>
                                        </a>
								</div>
							</div>
						</div>
						<div class="comments-area">
							<h3 class="comments-title">3 Comments:</h3>
							<ol class="comment-list">
								<li class="comment">
									<article class="comment-body">
										<footer class="comment-meta">
											<div class="comment-author vcard">
												<img src="assets/img/client/1.jpg" class="avatar" alt="image"> <b class="fn">Wilson Swanson</b>
												<span class="says">says:</span>
											</div>
											<div class="comment-metadata">
												<a href="#">
													<span>June 15 - 2021 12:30 PM</span>
												</a>
											</div>
										</footer>
										<div class="comment-content">
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. enim ad minim veniam, quis nostrud exercitation.</p>
										</div>
										<div class="reply"> <a href="#" class="comment-reply-link">Reply</a>
										</div>
									</article>
									<ol class="children">
										<li class="comment">
											<article class="comment-body">
												<footer class="comment-meta">
													<div class="comment-author vcard">
														<img src="assets/img/client/2.jpg" class="avatar" alt="image"> <b class="fn">Ella Hodges</b>
														<span class="says">says:</span>
													</div>
													<div class="comment-metadata">
														<a href="#">
															<span>June 15 - 2021 12:30 PM</span>
														</a>
													</div>
												</footer>
												<div class="comment-content">
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. enim ad minim veniam, quis nostrud exercitation.</p>
												</div>
												<div class="reply"> <a href="#" class="comment-reply-link">Reply</a>
												</div>
											</article>
										</li>
									</ol>
								</li>
								<li class="comment">
									<article class="comment-body">
										<footer class="comment-meta">
											<div class="comment-author vcard">
												<img src="assets/img/client/4.jpg" class="avatar" alt="image"> <b class="fn">Melissa Bryant</b>
												<span class="says">says:</span>
											</div>
											<div class="comment-metadata">
												<a href="#">
													<span>June 15 - 2021 12:30 PM</span>
												</a>
											</div>
										</footer>
										<div class="comment-content">
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. enim ad minim veniam, quis nostrud exercitation.</p>
										</div>
										<div class="reply"> <a href="#" class="comment-reply-link">Reply</a></div>
									</article>
								</li>
							</ol>
							<div class="comment-respond">
								<h3 class="comment-reply-title">Leave a Reply</h3>
								<form class="comment-form">
									<p class="comment-notes"> <span id="email-notes">Your email address will not be published.</span>
										Required fields are marked <span class="required">*</span>
									</p>
									<p class="comment-form-comment">
										<label>Comment</label>
										<textarea name="comment" id="comment" cols="45" rows="5" maxlength="65525" required="required"></textarea>
									</p>
									<p class="comment-form-author">
										<label>Name <span class="required">*</span>
										</label>
										<input type="text" id="author" name="author" required="required">
									</p>
									<p class="comment-form-email">
										<label>Email <span class="required">*</span>
										</label>
										<input type="email" id="email" name="email" required="required">
									</p>
									<p class="comment-form-url">
										<label>Website</label>
										<input type="url" id="url" name="url">
									</p>
									<p class="comment-form-cookies-consent">
										<input type="checkbox" value="yes" name="wp-comment-cookies-consent" id="wp-comment-cookies-consent">
										<label for="wp-comment-cookies-consent">Save my name, email, and website in this browser for the next time I comment.</label>
									</p>
									<p class="form-submit">
										<input type="submit" name="submit" id="submit" class="submit" value="Post Comment">
									</p>
								</form>
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
	<!-- End Blog Details Area -->
	
<?php include "inc/footer.php"; ?>