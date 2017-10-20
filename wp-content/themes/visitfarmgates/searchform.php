<?php
	$form = '<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
				<label>
					<span class="screen-reader-text">' . _x( 'Search for:', 'label' ) . '</span>
					<input type="search" class="search-field" placeholder="Nuts" value="' . get_search_query() . '" name="s" />
				</label>
				<input type="submit" class="search-submit" value="'. esc_attr_x( 'Search', 'submit button' ) .'" />
			</form>';

	$quick_search = '<div class="quick-search"><a class="quick-search-item" href="http://demo.simbaroo.com/region/east-coast/">East Coast</a><a class="quick-search-item" href="http://demo.simbaroo.com/region/west-coast/">West Coast</a><a class="quick-search-item" href="http://demo.simbaroo.com/region/north-coast/">North Coast</a></div>';

	$result = $form . $quick_search;

	echo $result;

?>
