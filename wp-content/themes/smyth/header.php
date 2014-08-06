<?php
/**
 * The header for our theme.
 *
 *
 * @package Smyth
 */
?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, minimal-ui">
<title><?php wp_title('|', true, 'right'); ?></title>
<script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?=get_template_directory_uri()?>/assets/stylesheets/aleo/aleo.css">
<link rel="stylesheet" type="text/css" href="<?=get_template_directory_uri()?>/assets/stylesheets/navigation/navigation.css">

<?php wp_head(); ?>
</head>

<? $background = (get_field('background_image')) ? "background-image:url('".get_field('background_image')."');" : ''; ?>

<body <?php body_class('faster'); ?> style="<?=$background?>">

<!--[if lt IE 8]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="pushy pushy-left">
  <?php wp_nav_menu(array('level' => 0, 'depth' => 2, 'container'=>false, 'menu_id'=>'pushy')); ?>
</div>


<div class="site-overlay"></div>

<div id="container">

	<div class="menu-btn"> &#9776; </div>
