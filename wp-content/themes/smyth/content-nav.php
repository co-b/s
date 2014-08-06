<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Smyth
 */


class CustomHeader extends Walker_Nav_Menu {
	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		if ($item->object_id == 2){

			$template_url = get_bloginfo('template_url');

$output .= <<<EOF

			<a href="/" class="smyth-logo"><img src="$template_url/assets/images/smyth-logo.png" width="261" height="188"></a>



EOF;
		}
		$output .= "</li>\n";
	}
}
?>

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="position:relative;">



<? if ($post->ID == 147){ ?>
		
		<div id="map" style="margin: 0 0 0 0; color:#333; width: 100%; height: 460px; position:absolute; top:0; left:0;"></div>

		<script>

			var map;

			function initialize() {

	
				var styles = [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":45}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]}];


				var myOptions = {
						scrollwheel: false,
						disableDefaultUI: true,
				    zoom: 16,
				    center: new google.maps.LatLng(43.02719121843511,-87.90817240469356),
				    mapTypeId: google.maps.MapTypeId.ROAD,
				    styles: styles,
				    backgroundColor: "#000000"
				};
				map = new google.maps.Map(document.getElementById('map'), myOptions);



				var icon = {
				  path: 'M0-165c-27.618 0-50 21.966-50 49.054C-50-88.849 0 0 0 0s50-88.849 50-115.946C50-143.034 27.605-165 0-165z',
				  fillColor: '#FFF',
				  fillOpacity: 1,
				  scale: 0.4,
				  strokeColor: '#2B2B2B',
				  strokeWeight: 4
				};




				marker = new google.maps.Marker({
					position: new google.maps.LatLng(43.027552,-87.917249),
					map: map,
					title: "Smyth at the Iron Horse Hotel",
					draggable: false,
					//animation: google.maps.Animation.DROP,
					html: '<div class="markerInfo"><strong style="display:block;">Smyth at the Iron Horse Hotel</strong><span style="display:block;">500 W Florida St #102<br>Milwaukee, WI 53204</span></div>',
					icon: {origin: new google.maps.Point(0, 0), anchor: new google.maps.Point(0, 0), size: new google.maps.Size(100, 100), url:'http://smyth.companybonline.com/wp-content/themes/smyth/assets/images/the-iron-horse-hotel-marker.svg'}
				});


			info_window = new google.maps.InfoWindow({
			  content: marker.html
			});
			
			setTimeout(function(){
				//info_window.open(map, marker);
			},2500);

			google.maps.event.addListener(marker, 'click', function() {
				info_window.setContent(this.html);
				info_window.open(map, this);
			});


			}

			function loadScript() {
			  var script = document.createElement('script');
			  script.type = 'text/javascript';
			  script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&' +
			      'callback=initialize';
			  document.body.appendChild(script);
			}

			window.onload = loadScript;

		</script>



<? } ?>






  <div class="inner-wrap">
  	
  	<a class="phone" href="tel:+14148314615">414.831.4615</a>
  	
  	<div class="header-wrap">


    	<nav>
				<div class="short-divider-left"></div>
				<div class="short-divider-right"></div>
				<div class="short-divider-left" style="top:127px;"></div>
				<div class="short-divider-right" style="top:127px;"></div>
				<? wp_nav_menu(array('link_before' => '<span>', 'link_after' => '</span>', 'container'=>false, 'theme_location' => 'primary', 'depth'=>1, 'walker'=>new CustomHeader())); ?>
    	</nav>


    	<? if ($post->ID != 2){ ?>

    	<?php wp_nav_menu(array('level' => 2, 'depth' => 0, 'container'=>false, 'menu_id'=>'sub-menu')); ?>

    	<div class="blurb">

				<? if ($post->ID === 52){ ?>

				<img src="<?=get_bloginfo('template_url')?>/assets/images/route-66-brunch-logo.svg" width="300" height="55" alt="Route 66 Brunch">

				<? } else { ?>

				<h1 style="font-size:32px; text-transform:uppercase;"><? the_title() ?></h1> 

				<? } ?>

				<? the_field('header_content') ?>


				<? if ($post->ID == 11){ ?>

				<form id="opentable" action="http://www.opentable.com/restaurant-search.aspx" method="get" target="_blank">

				  <select name="ResTime">
				  	<optgroup label="Brunch">
					  	<option value="10:00 AM">10:00 AM</option>
					  	<option value="10:30 AM">10:30 AM</option>
				  	</optgroup>
				  	<optgroup label="Lunch">
					  	<option value="11:00 AM">11:00 AM</option>
					  	<option value="11:30 AM">11:30 AM</option>
					  	<option value="12:00 PM">12:00 PM</option>
					  	<option value="12:30 PM">12:30 PM</option>
					  	<option value="1:00 PM">1:00 PM</option>
					  	<option value="1:30 PM">1:30 PM</option>
					  	<option value="2:00 PM">2:00 PM</option>
				  	</optgroup>
				  	<optgroup label="Dinner">
					  	<option value="5:00 PM">5:00 PM</option>
					  	<option value="5:30 PM">5:30 PM</option>
					  	<option value="6:00 PM">6:00 PM</option>
					  	<option value="6:30 PM">6:30 PM</option>
					  	<option value="7:00 PM">7:00 PM</option>
					  	<option value="7:30 PM">7:30 PM</option>
					  	<option value="8:00 PM">8:00 PM</option>
					  	<option value="8:30 PM">8:30 PM</option>
					  	<option value="9:00 PM">9:00 PM</option>
					  	<option value="9:30 PM">9:30 PM</option>
					  	<option value="10:00 PM">10:00 PM</option>
					  	<option value="10:30 PM">10:30 PM</option>
				  	</optgroup>
				  </select>

				  <select name="PartySize">
				  	<option value="1">1 Person</option>
				  	<option value="2" selected>2 People</option>
				  	<option value="3">3 People</option>
				  	<option value="3">3 People</option>
				  	<option value="4">4 People</option>
				  	<option value="5">5 People</option>
				  	<option value="6">6 People</option>
				  	<option value="7">7 People</option>
				  	<option value="8">8 People</option>
				  	<option value="9">9 People</option>
				  	<option value="10">10 People</option>
				  	<option value="11">11 People</option>
				  	<option value="12">12 People</option>
				  	<option value="13">13 People</option>
				  	<option value="14">14 People</option>
				  	<option value="15">15 People</option>
				  	<option value="16">16 People</option>
				  	<option value="17">17 People</option>
				  	<option value="18">18 People</option>
				  	<option value="19">19 People</option>
				  	<option value="20">20 People</option>
				  </select>

				  <input id="startDate" type="text" name="startDate" value="08/06/2014">

					<input id="RestaurantID" name="RestaurantID" type="hidden" value="26596">
					<input id="rid" name="rid" type="hidden" value="26596">
					<input id="GeoID" name="GeoID" type="hidden" value="26">
					<input id="txtDateFormat" name="txtDateFormat" type="hidden" value="MM/dd/yyyy">
					<input id="RestaurantReferralID" name="RestaurantReferralID" type="hidden" value="26596">

				  <button class="pretty" type="submit">Reserve Your Spot</button>
				    
				</form>


				<? } ?>


				<? if (get_field('menu_download')) { 

					$menu = get_field('menu_download'); ?>

					<a class="menu-download" target="_blank" href="<?=$menu['url']?>">
	    			<span><?=$menu['title']?></span>
	    		</a>

				<? } ?>

    	</div>

    	<? } ?>

  	</div>