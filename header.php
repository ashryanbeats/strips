<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
	<meta charset="<?php bloginfo('charset') ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php bloginfo('description') ?>"/>
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>"/>
	<title><?php bloginfo('name')?> <?php wp_title() ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri() ?>" media="all">
	<link href='http://fonts.googleapis.com/css?family=Orbitron:400,500,700,900' rel='stylesheet' type='text/css'>
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js "></script>
	<?php wp_head() ?>
</head>

<body <?php body_class() ?>>
	<div id="main-container">
	<nav class="navbar navbar-static-top">
		<div class="container">
			<div class="row">
				<div class="col-sm-11 col-sm-offset-1">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		    				<span class="glyphicon glyphicon-collapse-down gray"></span>
		  				</button> 
		  				<a href="<?php echo home_url() ?>" class="navbar-brand"><?php bloginfo('name') ?></a>
					</div>
					<?php
			            wp_nav_menu( array(
			                'menu'              => 'main',
			                'theme_location'    => 'main',
			                'depth'             => 2,
			                'container'         => 'div',
			                'container_class'   => 'collapse navbar-collapse',
			                'container_id'		=> 'myNavbar',
			                'menu_class'        => 'nav navbar-nav',
			                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
			                'walker'            => new wp_bootstrap_navwalker())
			            );
			        ?>	
				</div>
			</div>	
        </div>
	</nav>
	
	<div class="container">		
		<div class="row" id="body-content">
			<div class="col-sm-8 col-sm-offset-1"> <!-- main content column -->

