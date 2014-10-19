			<footer class="footer" role="contentinfo">

				<div id="inner-footer" class="wrap cf">

					<div class="footer-links">

						<div id="Footer-Menu-1" class="m-all t-1of3 d-2of7 cf">
							<ul class="footer-text-menu">
								<?php dynamic_sidebar('Footer1') ?>
							</ul>
						</div>
						<div id="Footer-Menu-2" class="m-all t-1of3 d-2of7 cf">
							<ul class="footer-text-menu">
								<?php dynamic_sidebar('Footer2') ?>
							</ul>
						</div>
						<div id="Footer-Menu-3" class="social-media-links m-all t-1of3 d-2of7 last-col cf">

							<ul>
								<li>
									<a href="#"><i class="fa fa-linkedin fa-2x"></i></a>
								</li>
								<li>
									<a href="#"><i class=" fa fa-twitter fa-2x"></i></a>
								</li>
								<li>
									<a href="#"><i class=" fa fa-instagram fa-2x"></i></a>
								</li>
								<li>
									<a href="#"><i class=" fa fa-github fa-2x"></i></a>
								</li>
							</ul>

						</div>

					</div>

					<p class="source-org copyright cf">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p>

				</div>

			</footer>

		</div>

		<?php wp_footer(); ?>

	</body>

</html>
