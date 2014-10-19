				<div id="Footer-Menu-1" class="footer-text-menu" role="complementary">

					<?php if ( is_active_sidebar( 'Footer1' ) ) : ?>

						<?php dynamic_sidebar( 'Footer1' ); ?>

					<?php else : ?>

						<div class="no-widgets">
							<p><?php _e( 'This is a widget ready area. Add some and they will appear here.', 'bonestheme' );  ?></p>
						</div>

					<?php endif; ?>

				</div>
