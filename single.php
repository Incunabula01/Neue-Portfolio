<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="cf">

					<div id="main" class="m-all t-all d-10of12 cf" role="main">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


						 <article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

						 	<?php $thumb_id = get_post_thumbnail_id();
								  $post_header = wp_get_attachment_image_src($thumb_id, 'portfolio-post', true);
							?>

						 	<div class="header-image" style="background: url(<?php echo $post_header[0]; ?>) 50% 0 no-repeat; background-size: cover"></div>

			                <header class="article-header">
			                	<div class="wrap">

			                  		<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>

			                  	</div>
			                </header> 

			                <section class="entry-content cf" itemprop="articleBody">
			                	<div class="wrap">
			                  		<?php
			                    		the_content();
			                  		?>
			                 	 </div>
			                </section> 

			                <footer class="article-footer wrap">

			                  <?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ' ', '</p>' ); ?>

			                </footer> <?php // end article footer ?>

              			</article> 
              		<?php // end article ?>

						<?php endwhile; ?>

						<?php else : ?>

							<article id="post-not-found" class="hentry wrap cf">
									<header class="article-header">
										<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
									</header>
									<section class="entry-content">
										<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
									</section>
									<footer class="article-footer">
											<p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
									</footer>
							</article>

						<?php endif; ?>

					</div>


				</div>

			</div>

<?php get_footer(); ?>
