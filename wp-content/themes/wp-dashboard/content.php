<div class="search-result">
	<?php if ( is_search() ) : ?>
		<?php if ( get_the_title() ) : ?>
			<?php
				if ( is_single() ) :
					the_title( '<h2>', '</h2>' );
					the_excerpt();
				else :
					the_title( '<h2><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
					the_excerpt();
				endif;
			?>		
		<?php else : ?>
			<h1><?php _e('Bohužiaľ, nič sme nenašli. Skúste zmeniť hľadaný výraz.'); ?></h1>
		<?php endif; ?>
	<?php endif; ?>
</div><!-- end .search-result -->