<!doctype HTML>

<html> 
	<head>
		<?php wp_head(); ?>
		<meta charset="utf-8">
		<link rel="stylesheet" href="<?= get_stylesheet_directory_uri(); ?>/css/bootstrap.css">
		<link rel="stylesheet" href="<?= get_stylesheet_directory_uri(); ?>/css/main.css">
	</head>
	<body>
		<header>
			<a href="<?= site_url(); ?>"> 
				<h1><?php bloginfo('name'); ?></h1>
			</a>
			<?php
			wp_nav_menu( array(
				'menu' => 'primary-menu'
			) ); ?>
		</header>
