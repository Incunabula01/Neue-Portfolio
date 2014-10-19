<?php
/*
 Template Name: Contact Form
*/
?>

<?php

	$nameError = 'Please enter your name.';
	$emailError = 'Please enter your email address.';
	$commentError = 'Please enter a message.';
	$hasError = false;

if(isset($_POST['submitted'])) {

	if(trim($_POST['contactName']) === '') {
		$nameError;
		$hasError = true;
	} else {
		$name = trim($_POST['contactName']);
	}

	if(trim($_POST['email']) === '')  {
		$emailError;
		$hasError = true;
	} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
		$emailError;
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	if(trim($_POST['comments']) === '') {
		$commentError;
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['comments']));
		} else {
			$comments = trim($_POST['comments']);
		}
	}

	if(!isset($hasError)) {
		$emailTo = get_option('tz_email');
		if (!isset($emailTo) || ($emailTo == '') ){
			$emailTo = get_option('admin_email');
		}
		$subject = 'JWidener Design From '.$name;
		$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
		$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		wp_mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}
} 
?>
<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="cf">

						<div id="main" class="m-all t-all d-all cf" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header contact-me">
									<div class="wrap">
										<h1 class="page-title"><?php the_title(); ?></h1>
									</div>
								</header>

								<section class="entry-content cf" itemprop="articleBody">

									<div class="wrap">

										<div class="m-all t-1of2 d-1of3">
												<?php the_content(); ?>
										</div>

										<div class="m-all t-3of5 d-2of5">

											<?php if(isset($emailSent) && $emailSent == true) { ?>
												<div class="thanks">
													<i class="fa fa-paper-plane-o fa-5x"></i>
													<p>Thanks, your email was sent successfully.You will be contacted asap!</p>
												</div>
											<?php } else { ?>
												<?php if(isset($hasError)) { ?>
												<div class="error">
													<i class="fa fa-frown-o fa-5x"></i>
													<p>Sorry, an error occured. Please try again.</p>
												</div>
												<?php } ?>
	 										 <form action="<?php the_permalink(); ?>" id="contactForm" method="post">
													<ul class="contactform">
													<li>
														<label for="contactName">Name:</label>
														<input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="required requiredField" />
														<?php if($nameError != '') { ?>
															<span class="error"><?= $nameError; ?></span>
														<?php } ?>
													</li>

													<li>
														<label for="email">Email</label>
														<input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="required requiredField email" />
														<?php if($emailError != '') { ?>
															<span class="error"><?=$emailError;?></span>
														<?php } ?>
													</li>

													<li>
													<label for="commentsText">Message:</label>
													<textarea type="text" name="comments" id="commentsText" rows="20" cols="30" class="required requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
														<?php if($commentError != '') { ?>
															<span class="error"><?=$commentError;?></span>
														<?php } ?>
													</li>

													<li>
														<button class="cyan-btn" type="submit">
															<i class="fa fa-send"><p>Send Email</p></i>
														</button>
										
													</li>
												</ul>
												<input type="hidden" name="submitted" id="submitted" value="true" />
											</form>
											<?php } ?>
			
										</div>
										
									</div>
								</section>

								<footer class="article-footer">
								</footer>

							</article>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<div class="wrap">
													<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
												</div>
										</header>
											<section class="entry-content">
												<div class="wrap">
													<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
												</div>
											</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div>

				</div>

			</div>


<?php get_footer(); ?>
