<?php
/**
 * Template Name: Demo Page
 */

get_header( 'demo' );


$products = [
    
	'integrate-google-drive' => [
		'name'        => 'Integrate Google Drive',
		'description' => 'Complete Google Drive Cloud Solution For WordPress.',
	],
	'radio-player'    => [
		'name'        => 'Radio Player',
		'description' => 'Worldwide Online Radio Stations Directory for WordPress.',
	],
    'dracula-dark-mode'  => [
		'name'        => 'Dracula Dark Mode',
		'description' => 'The Revolutionary Dark Mode Plugin For WordPress',
	],
    'reader-mode'     => [
		'name'        => 'Reader Mode',
		'description' => 'Distraction-free Content Reader for WordPress.',
	],
    
	'wp-radio'               => [
		'name'        => 'WP Radio',
		'description' => 'Live Shoutcast, Icecast and Audio Stream Player for WordPress.',
	],
    
];


?>
    <div class="page-header-wrap">
        <div class="ast-container">
            <div class="page-header">
                <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/softlab-logo.png'; ?>"
                     alt="SoftLab">
                <h2 class="page-header-title">Welcome to SoftLab Demo Portal</h2>
                <p class="page-header-description">This is the playground for our Plugins. It allows you to experiment
                    with all the functionality of the plugins on both the Front-End and Back-End.
                    Feel free to explore the possibilities and limits of our plugins to see if it fits your
                    requirements!</p>
            </div>
        </div>
    </div>


    <div class="demo-box-wrap">
        <div class="ast-container">
            <div class="demo-box">
				<?php echo do_shortcode( '[try_demo]' ); ?>
            </div>
        </div>
    </div>

    <div class="explore-products-wrap">
        <div class="ast-container">

            <div class="explore-products-header">
                <h2 class="explore-products-title">Explore our products</h2>
                <p class="explore-products-description">We have a lot of products to offer. Check out our product
                    catalog to find the one that fits your needs!</p>
            </div>

            <div class="explore-products">
				<?php foreach ( $products as $key => $product ) { ?>
                    <a class="product-item" href="https://softlabbd.com/<?php echo $key; ?>">
                        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/products/' . $key . '.png'; ?>"
                             alt="<?php echo $product['name']; ?>">
                        <h3><?php echo $product['name']; ?></h3>
                        <p><?php echo $product['description']; ?></p>
                    </a>
				<?php } ?>
            </div>
        </div>
    </div>

<?php
get_footer();
