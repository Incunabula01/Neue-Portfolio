<?php
 /*  Template Name: Home Page  */
?>

<?php get_header(); ?>

	<div id="main" class=" m-all t-all d-all cf" role="main">

			<div id="content">

					<div id="inner-content" class="wrap cf">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title"><?php the_title(); ?></h1>


								</header>

								<section class="entry-content cf" itemprop="articleBody">

									<div class="m-all t-2of3 d-5of7 cf">

										<?php the_content(); ?>

									</div>

									<h1 class="page-title"> Superpowers </h1>
									
									<div class="m-all t-1of4 d-2of8 last-col cf">
										<ul id="skill-chart">
											<li class="chart-bar-1">
												<h2>HTML5</h2>
											</li>
											<li class="chart-bar-1">
												<h2>CSS3/Sass</h2>
											</li>
											<li class="chart-bar-2">
												<h2>jQuery</h2>
											</li>
											<li class="chart-bar-3">
												<h2>WordPress</h2>
											</li>
											<li class="chart-bar-3">
												<h2>UI/UX</h2>
											</li>
										</ul>
										<ul id="chart-range">
											<li>
												Beginner
											</li>
											<li>
												Intermediate
											</li>
											<li>
												Skilled
											</li>
											<li>
												Advanced
											</li>
										</ul>
									</div>
								<div class="m-all t-all d-all cf">

									<div class="gallery">
										<?php
											global $post;
											$tmp_post = $post;
											$args = array( 'numberposts' => 6 );
											$myposts = get_posts( $args );
											foreach( $myposts as $post ) :	setup_postdata($post); 
												$post_thumbnail_id = get_post_thumbnail_id();
												$featured_src = wp_get_attachment_image_src( $post_thumbnail_id, 'bones-thumb-400' );
										?>

											<div class="item gallery-item <?php $category = get_the_category(); echo $category[0]->cat_name; ?>">
												<a href="<?php echo get_permalink(); ?>" >
													<div><span><h2><?php echo get_the_title(); ?></h2></span></div>
													<img src="<?php echo $featured_src[0]; ?>"/>
												</a>
											</div>

										<?php endforeach; ?>
										<?php $post = $tmp_post; ?>
									</div>

								</div>

								</section>

								<footer class="article-footer">

                  <?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>

								</footer>

							</article>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
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
