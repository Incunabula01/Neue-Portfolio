<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="description" content="Iam a web designer who does websites">
		<meta name="keywords" content="web design,ui-ux,print design,responsive,word press,javascript,jquery,sass,css3,html5,front end developer,apps,ios,android">

		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body <?php body_class(); ?>>

		<div id="container">

			<header id="nav" class="header" role="banner">

				<button class="menu-toggle"><i class="fa fa-bars fa-lg"></i></button>

				<div id="inner-header" class="cf">
					<div id="content-anchor"></div>
					<nav id="site navigation" class="nav stuck" role="navigation">

							<a class="logo-text-stuck" style="display:block" href="<?php echo home_url(); ?>" rel="nofollow" alt="JWidener Design">
								<p class="h1"><?php bloginfo('name'); ?></p>
							</a>
							
								<?php wp_nav_menu(array(
		    						'container' => 'div',                           
		    						'container_class' => 'menu cf',                 
		    						'menu' => __( 'The Main Menu', 'bonestheme' ),  
		    						'menu_class' => 'stuck-nav-menu cf',               
		    						'theme_location' => 'main-nav'      
								)); ?>

						</nav>	

				</div>

			</header>
