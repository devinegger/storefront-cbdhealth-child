<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package storefront
 */

get_header(); ?>

	<div id="primary" class="content-area">
	    <div id="mainCarousel" class="carousel slide" style="color: #27a79d;" data-interval="6000">
              <ol class="carousel-indicators">
                    <li data-target="#mainCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#mainCarousel" data-slide-to="1"></li>
                    <li data-target="#mainCarousel" data-slide-to="2"></li>
                    <li data-target="#mainCarousel" data-slide-to="3"></li>
              </ol>
              <div class="carousel-inner" role="listbox">
                    <div class="carousel-item white active" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/images/warrior-yoga-banner2.jpg');">
                    <!--<div class="carousel-item white active" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/images/CBDSWEEPSBANNER_EDIT.jpg');">-->
                        <div class="carousel-content overlay center">
                            <div style="width: 80%; margin: 0 auto;">
                                <h3 class="white">Welcome to CBD Health Products</h3>

                                <p>We source only the purest, organic lab tested ingredients from hemp plants.  We stand behind our superior products.</p> 
                                <p>CBD, or Cannabidiol, is just one of the many healing compounds in Cannabis. Unlike the more widely known THC, CBD does not contain psychoactive material. This makes CBD very appealing to many people seeking a healthier day to day life without sacrificing mental clarity.</p>
                                
                                <a class="button" href="<?php echo site_url() ?>/what-is-cbd" style="margin-right: 20px;">Read More</a><a class="button" href="/shop">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item white" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/images/cbdhealth-meditation-carousel.jpg');">
                        <div class="carousel-content overlay center" >
                            <div style="width: 80%; margin: 0 auto;">
                                <h3 class="white">CBD Tinctures</h3>
                                <p>Our CBD tinctures are made from the highest quality organic material. All of our tinctures can be mixed with food, drink or taken under your tongue.</p>  
                                <p>CBD concentrate, including our tinctures can be used for a wide range of healing from children to the elderly. Research shows CBD tinctures are just as benificial for pets; horses, dogs and cats.</p>
                                <a class="button" href="<?php echo site_url() ?>/product-category/featured/cbd-tinctures/">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item white" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/images/cherrydieselsauceBANNER.jpg');">
                        <div class="carousel-content overlay center" >
                            <div style="width: 80%; margin: 0 auto;">
                                <h3 class="white">Introducing: Terp Sauce</h3>
                                <p>This CBD Concentrate is made from whole plant full spectrum extracts unrivaled in flavor and complexity. This THC free compound just brought dabbing to the next level!</p>

<p> High potency crystals floating in Terp Sauce give it an intense aroma and expressive flavor.</p>  
								
                                <a class="button" href="<?php echo site_url() ?>/product-category/featured/concentrates/cbd-terp-sauce/">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item white" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/images/skywalkerogjarBANNER.jpg');">
                        <div class="carousel-content overlay center">
                            <div style="width: 80%; margin: 0 auto;">
                                <h3 class="white">CBD Shatter</h3>
                                <p>All the flavor and benifits with no psychoactive properties. </p>
                                <p>Our CBD Shatter tests at 90% CBD, 5% CBG, and 5% CDT (Cannabis Derived Terpenes)</p>
								<p>You will immediately be amazed at the calming effects of CBD at this concentration and purity.</p>
                                <a class="button" href="<?php echo site_url() ?>/product-category/featured/concentrates/shatter/">Shop Now</a>
                            </div>
                        </div>
                    </div>
              </div>
              <a class="carousel-control-prev" href="#mainCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#mainCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
        </div> <!-- #mainCarousel -->
        <div class="container center">
            <div class="row" style="clear: both;">
                <div class="col-md-6 left">
                    <img class="front-page-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/images/cbd_graphic4-trans-med.png" style="margin-right: 5%; margin-bottom: 5%; max-width: 90%;" />
                </div>
                <div class="col-md-6 left">
                    <ul class="large check" style="margin-top: 10%;">
                        <li>Increased Well-Being</li>
                        <li>Calming Effect</li>
                        <li>Non-Psychoactive (0.03% THC)</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row center white parallax" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/images/dock-meditation-parallax.jpg');">
            <div class="overlay" style="padding: 5% 10% 5% 10%; margin-bottom: 0;">
                <img class="front-page-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/images/cbdhealthLogoCropped-middle-white.png'); ?>"/>
                <h3 class="white">CBD Health Products</h3>
                <p>The Mission of CBD Health Products is to source the very finest full-spectrum whole plant CBD products in the nation, in order to provide our clients with access to wellness and elevated consciousness.</p>
            </div>
        </div>
        <div class="row center front-page-section">
            <div class="container">
                <?php echo do_shortcode('[product_categories number="3" columns="3" parent="25"]'); ?>
            </div>
        </div>
        <div class="row center blue-bg">
            <div class="container left white">
                <div style="display: inline-block;">
                    <h3 class="white">Get our free Newsletter!</h3>
                </div>
                <div style="display: inline-block;">
                    <!-- Begin MailChimp Signup Form -->
                    <link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css">
                    <div id="mc_embed_signup">
                    <form action="https://cbdconcentrates.us17.list-manage.com/subscribe/post?u=0bd97d7dcd9deb229d0972a78&amp;id=736e00623f" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                        <div id="mc_embed_signup_scroll">
    
                        <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_0bd97d7dcd9deb229d0972a78_736e00623f" tabindex="-1" value=""></div>
                        <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                        </div>
                    </form>
                    </div>

                    <!--End mc_embed_signup-->
                </div>
            </div>
        </div>
        <div class="row center front-page-section">
            <div class="container">
                <h3>Tinctures</h3>
                <?php 
                    //echo do_shortcode('[products limit="3" columns="3" category="cbd-tinctures"]'); 
                    echo do_shortcode('[products columns="3" order="DESC" skus="SCBD-PT-001,SCBD-CT-001,SCBD-ET-001"]');    
                ?>
            </div>
        </div>
        <div class="row center white parallax" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/images/rock-lotus-parallax.jpg');">
            <div class="overlay" style="padding: 7% 10% 7
            % 10%;">
                <div class="row" style="clear: both;">
                    <div class="col-md-6 left">
                        <ul class="large check" style="margin-top: 5%; padding-left: 10%; font-size: 1.8em;">
                            <li>100% Hemp Derived</li>
                            <li>Legal in ALL 50 states</li>
                            <li>Non-Psychoactive (0.03% THC)</li>
                        </ul>
                    </div>
                    <div class="col-md-6 left">
                        <img class="front-page-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/images/cbdhealthLogoCropped-left-white.png" style="padding-right: 2%; padding-bottom: 2%;" />
                    </div>
                </div>
            </div>
        </div>
        <div class="row center" style="margin: 5%;">
            <?php 
                 $args = array(
                     'category_name' => 'new',
                     'posts_per_page' => 4
                 );
                 $the_query = new WP_Query( $args );

                 // Loop
                 if ( $the_query->have_posts() ) :  while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            
                        <div class="col-md-6 col-sm-6" style="margin-top: 5%;">
                            <div class="front-page-post">
                                <div class="front-page-post-header" style="max-height: 180px; overflow: hidden; margin-bottom: 10px;">
                                    <?php
                                        $thumbnail = get_field('small_post_thumbnail'); 
                                        if( ! empty($thumbnail) ) : ?>
                                            <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
                                                <img src="<?php echo $thumbnail['url']; ?>" alt="<?php echo $thumbnail['alt']; ?>" />
                                            </a>
                                        <?php endif; ?>
                                </div>
                                <h4 id="post-<?php the_ID(); ?>">
                                    <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
                                        <?php the_title(); ?>
                                    </a>
                                </h4>
                                <div class="entry">
                                    <?php 
                                        //the_content('Read More...'); 
                                        the_excerpt();
                                    ?>
                                </div>
                            </div>
                        </div>
                <?php
                    endwhile;
                 endif;
            ?>
        </div>
	</div><!-- #primary -->

<?php
get_footer();
