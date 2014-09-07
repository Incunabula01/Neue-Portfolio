<?php
/*
 Template Name: Portfolio Page
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<div id="main" class="m-all t-all d-all cf" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title"><?php the_title(); ?></h1>

								</header>

								<section class="entry-content cf" itemprop="articleBody">
									<?php
										the_content();
									?>
									<h1 class="page-title"> Work </h1>

									<div id="filters" class="button-group">
										<button class="cyan-btn current" data-filter="*">Show All</button>
										<button class="cyan-btn" data-filter=".UI-UX">UI UX</button>
										<button class="cyan-btn" data-filer=".Web">Web</button>	
										<button class="cyan-btn" data-filter=".Print">Print</button>
										<button class="cyan-btn" data-filter=".Identity">Identity</button>
									</div>
									
									<div id="gallery-container">
										<?php
										global $post;
										$tmp_post = $post;
										$args = array( 'numberposts' => -1 );
										$myposts = get_posts( $args );
										foreach( $myposts as $post ) :	setup_postdata($post); 
											$post_thumbnail_id = get_post_thumbnail_id();
											$featured_src = wp_get_attachment_image_src( $post_thumbnail_id, 'medium' );
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
