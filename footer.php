			<footer class="footer" role="contentinfo">

				<div id="inner-footer" class="wrap cf">

					<div class="footer-links">

						<div id="Footer-Menu-1" class="m-all t-1of3 d-1of3 cf">
							<ul class="footer-text-menu">
								<?php dynamic_sidebar('Footer1') ?>
							</ul>
						</div>
						<div id="Footer-Menu-2" class="m-all t-1of3 d-1of3 cf">
							<ul class="footer-text-menu">
								<?php dynamic_sidebar('Footer2') ?>
							</ul>
						</div>
					
						<div id="Footer-Menu-3" class="m-all t-1of3 d-1of3 cf">
							<ul class="social-media-links">
								<?php dynamic_sidebar('Footer3') ?>
							</ul>
						
						</div>

					</div>

					<p class="source-org copyright cf">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p>

				</div>

			</footer>

		</div>

		<?php wp_footer(); ?>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-97233858-1', 'auto');
		  ga('send', 'pageview');

		</script>

	</body>

</html>
