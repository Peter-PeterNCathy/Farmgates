<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Visit_Farmgates
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="fg-index">
			<h3>Browse Farmgates on Map</h3>
		    <div id="gmap"></div>

		    <script>
		      function initMap() {
		        var tas = {lat: -41.866065, lng: 146.632570};
		        var map = new google.maps.Map(document.getElementById('gmap'), {
		          zoom: 6,
		          center: tas
		        });
		        var service = new google.maps.places.PlacesService(map);

		        <?php 
					$fg_query = new WP_Query( array('post_type' => 'farmgate') );	
					while ($fg_query->have_posts()) {
						$fg_query->the_post();
						$place_id = get_post_meta( get_the_ID(), 'wp_place_id', true );
						if (!empty($place_id)) {
				?>

				service.getDetails({
				    placeId: <?php echo '"'.$place_id.'"'; ?>
				}, function (result, status) {
				    var marker = new google.maps.Marker({
				        map: map,
				        place: {
				            placeId: <?php echo '"'.$place_id.'"'; ?>,
				            location: result.geometry.location
				        }
				    });

				    var contentString = '<div id="infowindow">'+
							            '<h3 class="infowin-title"><?php echo get_the_title(); ?></h3>'+
							            '<div class="infowin-content">'+
							            '<p class="infowin-addr">'+
							            result.formatted_address+
							            '</p>'+
							            '<a class="infowin-link" href="<?php echo get_permalink(); ?>" target="_blank">Details</a>'+
							            '<a class="infowin-link" target="_blank" href="https://www.google.com/maps/dir/?api=1&destination_place_id=<?php echo $place_id; ?>&destination='+
							            result.name+
							            '">Directions</a>'+
							            '</div>'+
							            '</div>';

					var infowindow = new google.maps.InfoWindow({
			          content: contentString
			        });

			        marker.addListener('click', function() {
			          infowindow.open(map, marker);
			        });

			        map.addListener('click', function() {
			        	infowindow.close();
			        });
				});



				<?php 
						}
					} 
					$fg_query->wp_reset_query();
				?>

		      }
		    </script>
		    <script async defer
		    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwTItEuZK0EfnJtKlHLymc6f2HWpYkxzo&callback=initMap&libraries=places">
		    </script>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();