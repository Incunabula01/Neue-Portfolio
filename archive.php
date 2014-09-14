<?php get_header(); ?>

			<div id="content">

				<header id="archive-header">

					<div class="wrap">

						<?php if (is_category()) { ?>
							<h1 class="archive-title">
								<?php single_cat_title(); ?>
							</h1>

						<?php } elseif (is_tag()) { ?>
							<h1 class="archive-title">
								<?php single_tag_title(); ?>
							</h1>

						<?php } elseif (is_author()) {
							global $post;
							$author_id = $post->post_author;
						?>
							<h1 class="archive-title">

								<?php the_author_meta('display_name', $author_id); ?>

							</h1>
						<?php } elseif (is_day()) { ?>
							<h1 class="archive-title">
								<?php the_time('l, F j, Y'); ?>
							</h1>

						<?php } elseif (is_month()) { ?>
							<h1 class="archive-title">
								<?php the_time('F Y'); ?>
							</h1>

						<?php } elseif (is_year()) { ?>
							<h1 class="archive-title">
								<?php the_time('Y'); ?>
							</h1>
						<?php } ?>

					</div>

				</header>

					<div id="inner-content" class="wrap cf">

						<div id="main" class="m-all t-2of3 d-5of7 cf" role="main">

								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">


									<header class="article-header">

											<h3 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

									</header>

									<section class="cf">


										<?php the_post_thumbnail( 'portfolio-post' ); ?>

										<div class="entry-content">

											<?php the_excerpt(); ?>

										</div>

									</section>

									<footer class="article-footer">
										<a href="<?php the_permalink() ?>">
											<button class="cyan-btn">Read More</button>
										</a>
									</footer>

							</article>

							<?php endwhile; ?>

									<?php bones_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">

										<div class="wrap">

											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
											</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
											</section>
											<footer class="article-footer">
													<p><?php _e( 'This is the error message in the archive.php template.', 'bonestheme' ); ?></p>
											</footer>

										</div>

									</article>

							<?php endif; ?>

						</div>

					<?php get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
