<?php
 /*  Template Name: Home Page  */
?>

<?php get_header(); ?>

			<div id="content">

				<div id="main" class="m-all t-all d-all cf" role="main">

					<div id="inner-content" class="wrap cf">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title"><?php the_title(); ?></h1>


								</header>

								<section class="entry-content cf" itemprop="articleBody">

									<h1 class="page-title"> Superpowers </h1>
									
									<div class="m-all t-all d-all">
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
										<?php the_content(); ?>
									</div>

									<h1 class="page-title"> Work </h1>

									<div id="filters" class="button-group">
										<button class="show-all cyan-btn is-checked" data-filter="*">Show All</button>
										<button class="ui-ux cyan-btn" data-filter="ui-ux">UI UX</button>
										<button class="web cyan-btn" data-filer="web">Web</button>	
										<button class="print cyan-btn" data-filter="print">Print</button>
										<button class="identity cyan-btn" data-filter="identity">Identity</button>
									</div>
									
									<div id="gallery-container">
										<?php
											$media_query = new WP_Query(
											    array(
											        'post_type' => 'attachment',
											        'post_status' => 'inherit',
											        'posts_per_page' => -1,
											    )
											);
											$list = array();
											foreach ($media_query->posts as $post) {
											    $list[] = wp_get_attachment_url($post->ID);
											}
										?>
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
