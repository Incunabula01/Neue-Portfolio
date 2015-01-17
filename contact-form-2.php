<?php
/*
 Template Name: Contact Form 2
*/
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

										<div class="m-all t-1of2 d-2of5">

												<div class="circle-portrait">
													<img src="/wp-content/themes/Neue-Portfolio/library/images/jw-portrait.jpg"/>
												</div>
												<?php the_content(); ?>
										</div>

										<div class="m-all t-1of2 d-1of2">
											<?php
												
												if ( isset( $_POST['submit'] ) ) {
 
											        $name    = sanitize_text_field( $_POST["form_name"] );
											        $email   = sanitize_email( $_POST["email"] );
											        $subject = sanitize_text_field( $_POST["email_subject"] );
											        $message = esc_textarea( $_POST["message"] );
											        $to = get_option( 'admin_email' );
											        $headers = "From: $name <$email>" . "\r\n";
											 
											        if ( wp_mail( $to, $subject, $message, $headers ) ) {
											            echo '<div class="thanks">';
											            echo '<i class="fa fa-send-o fa-5x"></i>';
											            echo '<p>Thanks for contacting me, expect a response soon.</p>';
											            echo '</div>';
											        } else {
											        	echo '<div class="error">';
											        	echo '<i class="fa fa-frown-o fa-5x"></i>';
											            echo '<p>An unexpected error occurred</p>';
											            echo '</div>';
											        }
											    }
												
											?>

											<form id="contactForm" action="<?php esc_url( $_SERVER['REQUEST_URI'] ); ?>" method="post">
        
												<label id="cf-name" for="name">Name</label>
												<input name="form_name" type="text" value="<?php ( isset( $_POST['form_name'] ) ? esc_attr( $_POST['form_name'] ) : '' ); ?>">
											            
												<label id="cf-email" for="email">Email</label>
												<input name="email" type="email"  value="<?php ( isset( $_POST['email'] ) ? esc_attr( $_POST['email'] ) : '' ); ?>">

												<label>Subject</label>
												<input name="email_subject" type="text" value="<?php ( isset( $_POST['email_subject'] ) ? esc_attr( $_POST['email_subject'] ) : '' ); ?>">

												<label for="message">Message</label>
												<textarea name="message" value="<?php ( isset( $_POST['message'] ) ? esc_attr( $_POST['message'] ) : '' ); ?>"></textarea>
											            
												<button class="cyan-btn" type="submit" name="submit">
															<i class="fa fa-send"></i>Send Email
												</button>
											        
											</form>
			
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
