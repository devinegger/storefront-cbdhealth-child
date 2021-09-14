<?php
/**
 * CBD Health Functions
 *
 * @package storefront-cbdhealth-child
 */

/**
 * Assign the Storefront version to a var
 */
 
$theme              = wp_get_theme( 'storefront-cbdhealth-child' );
$storefront_version = $theme['Version'];
 
$theme              = wp_get_theme( 'storefront' );
$storefront_version = $theme['Version'];

/**
 * Load the individual classes required by this theme
 */
 
require_once( 'inc/class-cbdhealth-child-template.php' );

/**
 * Enqueue scripts, styles, and fonts.
 */

 
function cbdhealth_scripts() {
    
    // unregister jquery loaded by WP - replace with 3.0 so caurousel will work - use jquery migrate to fix breaks from jquery 3.0
    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', '//code.jquery.com/jquery-3.0.0.min.js', array(), '3.0.0' );
    wp_enqueue_script( 'jquery-migrate', '//code.jquery.com/jquery-migrate-3.0.0.min.js', array(), '3.0.0' );
    
    // register bootstrap
    wp_register_style( 'bootstrap-css', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css' );
    wp_register_script( 'popper-js', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js', array( 'jquery' ), '1.12.3', true );
    wp_register_script( 'bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js', array( 'jquery' ), '4.0.0', true );
    
    //register custom javascript
    wp_register_script( 'custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array( 'jquery' ), '1.0.0', true ); 
    
    //register google fonts
    wp_register_style( 'google-font', 'http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Merriweather:400i' );
    
    // load scripts and styles
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'jquery-migrate' );
    wp_enqueue_style( 'bootstrap-css' );
    wp_enqueue_script( 'popper-js' );
    wp_enqueue_script( 'bootstrap-js' );
    wp_enqueue_script( 'custom-js' );
    wp_enqueue_style( 'google-font' );
}
add_action( 'wp_enqueue_scripts', 'cbdhealth_scripts' );


/**
* Add sidebar for non-storefront pages
*/

add_action( 'widgets_init', 'cbdhealth_widgets_init' );

function cbdhealth_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar 2', 'storefront' ),
		'id'            => 'sidebar2',
		'description'   => __( 'Add here.', 'storefront' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}


// replacing default storefront site-branding 
function storefront_site_title_or_logo( $echo = true ) {
    if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
        $logo = get_custom_logo();
        $html = is_home() ? '<h1 class="logo">' . $logo . '</h1>' : $logo;
        
        // add this as well when displaying logo
        if ( '' !== get_bloginfo( 'description' ) ) {
            $html .= '<p class="site-description">' . esc_html( get_bloginfo( 'description', 'display' ) ) . '</p>';
        }
        
    } elseif ( function_exists( 'jetpack_has_site_logo' ) && jetpack_has_site_logo() ) {
        // Copied from jetpack_the_site_logo() function.
        $logo    = site_logo()->logo;
        $logo_id = get_theme_mod( 'custom_logo' ); // Check for WP 4.5 Site Logo
        $logo_id = $logo_id ? $logo_id : $logo['id']; // Use WP Core logo if present, otherwise use Jetpack's.
        $size    = site_logo()->theme_size();
        $html    = sprintf( '<a href="%1$s" class="site-logo-link" rel="home" itemprop="url">%2$s</a>',
            esc_url( home_url( '/' ) ),
            wp_get_attachment_image(
                $logo_id,
                $size,
                false,
                array(
                    'class'     => 'site-logo attachment-' . $size,
                    'data-size' => $size,
                    'itemprop'  => 'logo'
                )
            )
        );

        $html = apply_filters( 'jetpack_the_site_logo', $html, $logo, $size );
        
        // add this as well when displaying logo
        if ( '' !== get_bloginfo( 'description' ) ) {
            $html .= '<p class="site-description">' . esc_html( get_bloginfo( 'description', 'display' ) ) . '</p>';
        }
        
    } else {
        $tag = is_home() ? 'h1' : 'div';

        $html = '<' . esc_attr( $tag ) . ' class="beta site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_html( get_bloginfo( 'name' ) ) . '</a></' . esc_attr( $tag ) .'>';

        if ( '' !== get_bloginfo( 'description' ) ) {
            $html .= '<p class="site-description">' . esc_html( get_bloginfo( 'description', 'display' ) ) . '</p>';
        }
    }

    if ( ! $echo ) {
        return $html;
    }

    echo $html;
}


add_action( 'init', 'cbdhealth_customise_storefront' );

function cbdhealth_customise_storefront() {
	// Remove the storefromt post content function
	remove_action( 'storefront_loop_post', 'storefront_post_content', 30 );

	// Add our own custom function
	add_action( 'storefront_loop_post', 'cbdhealth_custom_storefront_post_content', 30 );
}


/*  Change 'Shipping' to 'Shipping and Handling' on Cart and Checkout Pages */

add_filter( 'woocommerce_shipping_package_name', 'custom_shipping_package_name' );

function custom_shipping_package_name( $name ) {
  return 'Shipping & Handling';
}


function cbdhealth_custom_storefront_post_content() {
	?>
	<div class="entry-content" itemprop="articleBody">
		<?php
			if ( has_post_thumbnail() ) { ?>
			    <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
				    <?php the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) ); ?>
				</a>			
			<?php }  ?>
			
		<?php the_excerpt(); ?>
		<div class="continue-reading" style="text-align: center;">
            <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
                <?php printf(
                    /* translators: %s: Name of current post. */
                    wp_kses( __( 'Continue reading %s', 'storefront' ), array( 'span' => array( 'class' => array() ) ) ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ); ?>
            </a>
        </div>
	</div><!-- .entry-content -->
	<?php
}


function new_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');


// change default footer credit
function storefront_credit() {
?>
    <div class="site-info">
        <p class="small">This product is not for use by or sale to persons under the age of 18. This product should be used only as directed on the label. It should not be used if you are pregnant or nursing. Consult with a physician before use if you have a serious medical condition or use prescription medications. A Doctor's advice should be sought before using this and any supplemental dietary product. All trademarks and copyrights are property of their respective owners and are not affiliated with nor do they endorse this product. These statements have not been evaluated by the FDA. This product is not intended to diagnose, treat, cure or prevent any disease.  By using this site you agree to follow the Privacy Policy and all Terms & Conditions printed on this site. Void Where Prohibited By Law.</p>
        <span>&copy;2018 CBD Health Products LLC</span>
    </div>
<?php
}

//add secure seals to footer
add_action('storefront_footer', 'cbdhealth_security_seal', 15);

function cbdhealth_security_seal() { ?>

    <div class="center" style="width: 100%;">
        <div class="center">
            <a href="https://www.positivessl.com/trusted-ssl-site-seal.php" style="font-family: arial; font-size: 10px; color: #212121; text-decoration: none; display: inline-block;"  target="_blank">
                <img src="https://www.positivessl.com/images-new/comodo_secure_seal_100x85_transp.png" alt="Trusted Site Seal" title="Trusted Site Seal for Transparent background" border="0" />
            </a>
        </div>
        <div class="center">
            <img src="<?php echo get_stylesheet_directory_uri() . '/images/credit-card-icons.png' ?>" style="display: block; width: 280px; margin: 0 auto;"/>
        </div>
    <div>

<?php }

/*
// remove page title from woocommerce pages
add_filter( 'woocommerce_show_page_title' , 'woo_hide_page_title' );

function woo_hide_page_title() { return false; }

// create custom header for all pages (aside from front page) with page title and description 
add_action( 'storefront_content_top', 'cbdhealth_page_header_image', 5 );
remove_action( 'storefront_page', 'storefront_page_header', 10 );

remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10 );
remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );

function cbdhealth_page_header_image() {
    if ( ! is_front_page() ) {
        $term_object = get_queried_object();
?>
    <div id="page-header" class="center">
        <div class="overlay">
            <?php 
                $page_title = "CBD Health Products";
                $page_description = "";
                
                if ( is_single() || is_home() ) {
                    $page_title = 'Elevation';
                }
                if ( is_product_category()) { 
                    $page_title = $term_object->name;
                    $page_description = $term_object->description;
                }
                else {
                    $page_title = get_the_title();
                } 
            ?>
            <div class="woocommerce-category-title">
                <div class="title">
                    <h1 class="page-title white">
                        <?php echo $page_title; ?>
                    </h1>
                </div>
                <div class="description"><?php echo $page_description ?></div>
            </div>
        </div>
    </div>   

<?php
	}
}
*/


add_action( 'init', 'cbdhealth_remove_storefront_header_defaults' );

function cbdhealth_remove_storefront_header_defaults() {
    remove_action( 'storefront_header', 'storefront_site_branding', 20);
    remove_action( 'storefront_header', 'storefront_product_search', 40);
    remove_action( 'storefront_header', 'storefront_header_cart', 60);
}

add_action( 'init', 'cbdhealth_replace_storefront_headers' );

function cbdhealth_replace_storefront_headers() {
  add_action( 'storefront_header', 'storefront_site_branding', 40);
  add_action( 'storefront_header', 'storefront_header_cart', 60);
  add_action( 'storefront_header', 'storefront_product_search', 65);
}

add_action( 'storefront_header', 'cbdhealth_support_links', 20 );

function cbdhealth_support_links() { 
$email = "sales@cbdconcentrates.com";
$phone = "5593493339";
$phone_display = "(559) 349-3339";
?>
	<div class="support-links">
        <span>
            <a class="support-phone" href="tel:<?php echo $phone; ?>"><?php echo $phone_display; ?></a> | 
            <a class="support-email" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
        </span>
    </div>
<?php
}

//add_action( 'storefront_header', 'cbdhealth_shipping_notice', 35 );
function cbdhealth_shipping_notice() { ?>
	<div id="shipping-notice">
	    <span class="green">FREE Shipping on ALL ORDERS until June 1st!!!</span>	
	</div>
<?php
}

add_action( 'storefront_header', 'cbdhealth_search_icon', 55 );
function cbdhealth_search_icon() { ?>
	<span class="search-icon">
		<a class="search-icon-button" href=""></a>
	</span>
<?php
}

add_filter( 'wp_nav_menu_items', 'wti_loginout_menu_link', 10, 2 );
function wti_loginout_menu_link( $items, $args ) {
   if ($args->theme_location == 'secondary') {
      if (is_user_logged_in()) {
         $items .= '| <li class="right"><a href="'. wp_logout_url() .'">'. __("Log Out") .'</a></li>';
      } else {
         $items .= '| <li class="right"><a href="'. wp_login_url(get_permalink()) .'">'. __("Log In") .'</a></li>';
      }
   }
   return $items;
}

// Add 5% Bank Processing Fee to checkout 
//add_action( 'woocommerce_cart_calculate_fees','woocommerce_custom_surcharge' );
function woocommerce_custom_surcharge() {
  global $woocommerce;

	if ( is_admin() && ! defined( 'DOING_AJAX' ) )
		return;

	$percentage = 0.05;
	$surcharge = ( $woocommerce->cart->cart_contents_total + $woocommerce->cart->shipping_total ) * $percentage;	
	$woocommerce->cart->add_fee( 'Processing Fee', $surcharge, true, '' );

}


// Add statement charge notice to bottom of checkout page

/*
add_action( 'woocommerce_review_order_after_payment', 'statement_charge_message_bottom', 10 );
function statement_charge_message_bottom( ) {
    echo '<div class="checkout-statement-charge-message"><p>Charges on your statement will appear as concentrates5593493339</p></div>';
}
*/



