<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]--> 
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]--> 
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]--> 
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]--> 
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" lang="en"><!--<![endif]-->
	<head>
		<title><?php bloginfo( 'name' ); ?><?php wp_title( '|' ); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Remove if you're not building a responsive site. (But then why would you do such a thing?) -->
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico"/>
        
		<?php wp_head(); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css"/>
		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.slides.js"></script>

        <!--full paged background js-->
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.backstretch.min.js"></script>
        <script type="text/javascript">
            window.onload = function()	{
            
                $.backstretch("<?php echo get_stylesheet_directory_uri(); ?>/img/DIY-background.png");
                
            }
        </script>
	</head>
	<body <?php body_class(); ?>>