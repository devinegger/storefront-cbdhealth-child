<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sahti
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<!--<meta property="og:image" content="https://cbdconcentrates.com/site/wp-content/uploads/2018/03/warrior-yoga-banner.jpg" />-->
    

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112659649-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-112659649-2');
</script>
    
    <!-- Facebook Pixel Code 
    
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '123339795087630');
      fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=123339795087630&ev=PageView&noscript=1"/></noscript>
    
     End Facebook Pixel Code -->

<!-- Mail Chimp Code -->
<script id="mcjs">
!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/0bd97d7dcd9deb229d0972a78/5721a0004e47ce20c5fa51db8.js");
</script>



	<?php 
	    // Site Globals
	    //require( 'inc/info.php' );
	    // WP HEAD
	    wp_head(); 
	?>
</head>

<body <?php body_class(); ?> >

<?php do_action( 'storefront_before_site' ); ?>

<div id="page" class="hfeed site">
    
    <?php do_action( 'storefront_before_header' ); ?>
    
	<header id="masthead" class="site-header" role="banner" style="<?php storefront_header_styles(); ?>">

			<?php
			/**
			 * Functions hooked into storefront_header action
			 *
			 * @hooked storefront_skip_links                       - 0
			 * @hooked storefront_social_icons                     - 10
			 * @hooked storefront_secondary_navigation             - 30
			 * @hooked storefront_site_branding                    - 40
			 * @hooked storefront_primary_navigation_wrapper       - 42
			 * @hooked storefront_primary_navigation               - 50
			 * @hooked storefront_product_search                   - 60
			 * @hooked storefront_header_cart                      - 65
			 * @hooked storefront_primary_navigation_wrapper_close - 68
			 */
			do_action( 'storefront_header' ); ?>
	</header><!-- #masthead -->
	
		<?php
	/**
	 * Functions hooked in to storefront_before_content
	 *
	 * @hooked storefront_header_widget_region - 10
	 */
	do_action( 'storefront_before_content' ); ?>
	
	<?php 
	    $class = '';
	    if ( ! is_front_page() ) {
	        $class = 'not-home';
	    }
	?>

	<div id="content" class="site-content <?php echo $class;?>" tabindex="-1">

		<?php
		/**
		 * Functions hooked in to storefront_content_top
		 *
		 * @hooked woocommerce_breadcrumb - 10
		 */
		do_action( 'storefront_content_top' );
