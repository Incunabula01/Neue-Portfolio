				<div id="Footer-Menu-2" class="footer-text-menu" role="complementary">

					<?php if ( is_active_sidebar( 'Footer2' ) ) : ?>

						<?php dynamic_sidebar( 'Footer2' ); ?>

					<?php else : ?>

						<div class="no-widgets">
							<p><?php _e( 'This is a widget ready area. Add some and they will appear here.', 'bonestheme' );  ?></p>
						</div>

					<?php endif; ?>

				</div>
