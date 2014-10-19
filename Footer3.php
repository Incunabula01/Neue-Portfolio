				<div id="Footer-Menu-3" class="social-media-icons" role="complementary">

					<?php if ( is_active_sidebar( 'Footer3' ) ) : ?>

						<?php dynamic_sidebar( 'Footer3' ); ?>

					<?php else : ?>

						<div class="no-widgets">
							<p><?php _e( 'This is a widget ready area. Add some and they will appear here.', 'bonestheme' );  ?></p>
						</div>

					<?php endif; ?>

				</div>