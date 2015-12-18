<?php
/*
 Template Name: Portfolio Page
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content">

						<div id="main" class="m-all t-all d-all cf" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

									<header class="article-header work">

										<div class="wrap">
											<h1 class="page-title"><?php the_title(); ?></h1>
										</div>

									</header>

									<section class="entry-content cf" itemprop="articleBody">

										<div class="wrap">
											<?php the_content();?>
										</div>

										<div class="gallery-section m-all t-all d-all cf">

											<div class="wrap">
				
												<div id="filters">
													<ul class="button-group">
														<li>
															<h4>Show All</h4>
															<button class="cyan-btn current" data-filter="*">
																<i class="fa fa-image fa-2x" alt="Show All"></i>
															</button>
														</li>
														<li>
															<h4>UI UX</h4>
															<button class="cyan-btn" data-filter=".UI-UX">
																<i class="fa fa-tablet fa-2x" alt="UI UX"></i>
															</button>
														</li>
														<li>
															<h4>Web</h4>
															<button class="cyan-btn" data-filter=".Web">
																<i class="fa fa-html5 fa-2x" alt="Web"></i>
															</button>	
														</li>
														<li>
															<h4>Print</h4>
															<button class="cyan-btn" data-filter=".Print">
																<i class="fa fa-file fa-2x" alt="Print"></i>
															</button>
														</li>
														<li>
															<h4>Identity</h4>
															<button class="cyan-btn" data-filter=".Identity">
																<i class="fa fa-file-image-o fa-2x" alt="Identity"></i>
															</button>
														</li>
													</ul>

												</div>
									
												<div id="gallery-container" class="gallery">
													<?php
													global $post;
													$tmp_post = $post;
													$args = array( 'numberposts' => -1);
													$myposts = get_posts( $args );
													foreach( $myposts as $post ) :	setup_postdata($post); 
														$post_thumbnail_id = get_post_thumbnail_id();
														$featured_src = wp_get_attachment_image_src( $post_thumbnail_id, 'gallery-thumb' );
													?>

														<div class="item <?php $category = get_the_category(); echo $category[0]->cat_name; ?>">
															<a href="<?php echo get_permalink(); ?>" >
																<div><span><h2><?php echo get_the_title(); ?></h2></span></div>
																<img src="<?php echo $featured_src[0]; ?>"/>
															</a>
														</div>

													<?php endforeach; ?>
													<?php $post = $tmp_post; ?>
												</div>

											</div>

										</div>

									</section>

								</div>

							</article>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry cf">

										<div class="wrap">

											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
											</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
											</section>
											<footer class="article-footer">
													<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
											</footer>

										</div>

									</article>

							<?php endif; ?>

						</div>

			</div>


<?php get_footer(); ?>
