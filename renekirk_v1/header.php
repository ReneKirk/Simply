<!DOCTYPE html>
<html>
<head>
	<title><?php wp_title(); ?></title>
	<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" type="text/css" rel="stylesheet" media="screen" async />
	<link href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.css" type="text/css" rel="stylesheet" media="screen" async />
	<link href="//fonts.googleapis.com/css?family=Noto+Serif:400,700,400italic" type="text/css" rel="stylesheet" media="screen" async />
	<link href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css" rel="stylesheet" media="screen" async />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','<?php echo get_template_directory_uri(); ?>/js/google-analytics.js','ga');

    ga('create', '<?php echo GA_ACCOUNT; ?>', 'auto');
    ga('send', 'pageview');

</script>
<div class="container-fluid header">
    <div class="container header-wrap">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="blog-name">
                    <a href="<?php echo get_site_url(); ?>" title="<?php echo get_bloginfo('description') ?>"><?php echo get_bloginfo( 'name' ); ?></a>
                </h1>

                <nav class="main-nav">
	                <?php if ( has_nav_menu( 'primary' ) ) : ?>
                        <nav id="site-navigation" class="main-navigation" role="navigation">
			                <?php
			                // Primary navigation menu.
			                wp_nav_menu( array(
				                'menu_class'     => 'nav-menu',
				                'theme_location' => 'primary',
			                ) );
			                ?>
                        </nav><!-- .main-navigation -->
	                <?php endif; ?>
                </nav>

            </div>
        </div>
    </div>
</div>

<div class="container main_container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
