<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Smyth
 */
?>

<article>

	<? if ($post->ID == 2){ ?>

	<h1 style="font-size:25px; text-transform:uppercase; margin-bottom:20px;"><?php the_title(); ?></h1>

	<?php the_content(); ?>

	<div id="hours">
	<? if (get_field('lunch')){ ?>
		<div><span style="font-family:navigationregular;">LUNCH:</span><br><?=get_field('lunch')?></div>
	<? } ?>

	<? if (get_field('dinner')){ ?>
		<div><span style="font-family:navigationregular;">DINNER:</span><br><?=get_field('dinner')?></div>
	<? } ?>

	<? if (get_field('brunch')){ ?>
		<div><span style="font-family:navigationregular;">ROUTE 66 BRUNCH:</span><br><?=get_field('brunch')?></div>
	<? } ?>
	</div>

	<? } else { ?>

		<div style="color:#333;">

		<?php the_content(); ?>

		<? if (have_rows('menu_categories')){ ?>
			
				<? while(have_rows('menu_categories')){ the_row(); ?>

					<em class="category-title"><? the_sub_field('category_title') ?></em>

					<ul class="menu-items">

						<? while(have_rows('menu_items')){ the_row(); ?>

						<li class="menu-item">
							<span class="title"><? the_sub_field('title') ?></span>
							<em class="location"><? the_sub_field('location') ?></em>  
							<span class="description"><? the_sub_field('description') ?></span> 
							<span class="price"><? the_sub_field('price') ?></span>
						</li>

						<? } ?>

					</ul>

				<? } ?>

		<? } ?>

		</div>

	<? } ?>



</article>