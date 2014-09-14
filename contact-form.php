<?php
/*
 Template Name: Contact Form
*/
?>

<?php
 
  //response generation function
  $response = "";
 
  //function to generate response
  function my_contact_form_generate_response($type, $message){
 
    global $response;
 
    if($type == "success") $response = "<div class='success'>{$message}</div>";
    else $response = "<div class='error'>{$message}</div>";
 
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

										<div id="respond" class="m-all t-3of5 d-2of5">
	 										 <?php echo $response; ?>
											  <form class="field" action="<?php the_permalink(); ?>" method="post">
											    	<input type="text" name="message_name" placeholder="Name" value="<?php echo esc_attr($_POST['message_name']); ?>">
											    	<input type="text" name="message_email" placeholder="Email" value="<?php echo esc_attr($_POST['message_email']); ?>">
											    	<textarea type="text" placeholder="Message" name="message_text"><?php echo esc_textarea($_POST['message_text']); ?></textarea>
											    	<input type="hidden" name="submitted" value="1">
											    	<input class="blue-btn" type="submit" value="Go">
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
