<?php
 /*  Template Name: Home Page  */
?>

<?php get_header(); ?>

	<div id="main" class=" m-all t-all d-all cf" role="main">

			<div id="content">

					<div id="inner-content" class="cf">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

									<!-- <header class="article-header about-me">

										<div class="wrap">
											<h1 class="page-title"><?php the_title(); ?></h1>

										</div>

									</header> -->

									<section class="entry-content cf" itemprop="articleBody">

											<div class="m-all t-all d-all cf">

												<div id="about-me">

													<div class="wrap">
														<?php the_content(); ?>
													</div>
												
													<div class="center">
														<a id="galleryButton" href="#gallery-container"><button class="border-btn" title="View Work"> View Work</button></a>
													</div>

												</div>
												

												<div class="chart-section">

													<div class="chart skills">
														<div class="wrap">

															<h1 class="page-title">Superpowers</h1>
													
															<div id="skillChart"></div>

														</div>
													</div>
												</div>

											</div>

											<div id="gallery" class="gallery-section m-all t-all d-all cf">

												<div class="wrap img-gallery">

													<h1 class="page-title">Gallery</h1>


													<div id="filters">
														<ul class="button-group">
															<li>
																<button class="cyan-btn current" data-filter="*" title="Show All">
																	<i class="fa fa-image fa-2x" alt="Show All"></i>
																</button>
															</li>
															<li>
																<button class="cyan-btn" data-filter=".UI-UX" title="UI-UX">
																	<i class="fa fa-tablet fa-2x" alt="UI UX"></i>
																</button>
															</li>
															<li>
																<button class="cyan-btn" data-filter=".Web" title="Web">
																	<i class="fa fa-html5 fa-2x" alt="Web"></i>
																</button>	
															</li>
															<li>
																<button class="cyan-btn" data-filter=".Print" title="Print">
																	<i class="fa fa-file fa-2x" alt="Print"></i>
																</button>
															</li>
															<li>
																<button class="cyan-btn" data-filter=".Identity" title="Identity">
																	<i class="fa fa-file-image-o fa-2x" alt="Identity"></i>
																</button>
															</li>
														</ul>
													</div>

													<div id="gallery-container" class="gallery">
														<?php
														global $post;
														$tmp_post = $post;
														$args = array( 'numberposts' => 9);
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
										</div>
									</section>

									<footer class="article-footer">
									</footer>

								</div>

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

								</div>

							<?php endif; ?>

						</div>

				</div>

			</div>


<?php get_footer(); ?>
