<?php


// get all blog sites
use motopress_demo\classes\models\General_Settings;


$sites = get_sites( [
	'public'   => 1,
	'archived' => 0,
	'spam'     => 0,
	'deleted'  => 0,
] );

$source_id = '';
$source    = '';

$product = ! empty( $_GET['product'] ) ? $_GET['product'] : '';

if ( ! empty( $product ) ) {
	$source    = array_values( wp_list_filter( $sites, [ 'path' => '/' . $product . '/' ] ) );
	$source_id = $source[0]->blog_id;
	$name      = get_blog_details( $source_id )->blogname;
}


?>

<div class="mp-start-demo<?php echo ( empty( $wrapper_class ) ) ? '' : ' ' . $wrapper_class; ?>">

	<?php do_action( 'mp_demo_form_before' ); ?>

    <form action="<?php the_permalink(); ?>" method="post" id="try-demo"
          class="try-demo <?php echo apply_filters( 'mp_demo_form_class', '' ) ?>">
        <input name="mp_demo_create_sandbox" type="hidden" value="1">

        <div class="input-wrapper">
            <label for="mp_email">Select Product</label>

            <div class="product-select">
                <div class="product-select-current">
                    <div class="current-selection">
						<?php if ( ! empty( $source ) ) { ?>
                            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/products/' . $product . '.png'; ?>"
                                 alt="<?php echo $name; ?>">
                            <span><?php echo $name; ?></span>
						<?php } else { ?>
                            <span class="none">Select Product</span>
						<?php } ?>

                    </div>
                    <div class="arrow">
                        <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 5.5L0.5 1" stroke="black" stroke-width="1.5" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                            <path d="M9.5 1L5 5.5" stroke="black" stroke-width="1.5" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>

                <div class="product-select-dropdown">
					<?php foreach ( $sites as $site ) {
						$site_id   = $site->blog_id;
						$name      = get_blog_option( $site_id, 'blogname' );
						$path      = trim( $site->path, '/' );
						$is_active = $path === $product;

						if ( empty( $path ) ) {
							continue;
						}

						?>
                        <div class="product-select-item <?php echo $is_active ? 'active' : ''; ?>"
                             data-id="<?php echo $site_id; ?>">
                            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/products/' . $path . '.png'; ?>"
                                 alt="<?php echo $name; ?>">
                            <span><?php echo $name; ?></span>
                        </div>
					<?php } ?>
                </div>

                <span class="error product-error">Please select a product.</span>
            </div>
        </div>


        <div class="input-wrapper">
            <label for="mp_email">Your email to send the demo link</label>
            <input type="email" id="mp_email" name="mp_email" class="mp-demo-email"
                   placeholder="Enter your email address" required>

            <span class="error email-error">Please enter a valid email address</span>


            <p>
                An activation email will be sent to this email address. After the confirmation, you will be redirected
                to
                WordPress Dashboard where you can start testing!
            </p>
            <p>
                Your email address will only be used to register you as a user in the SandBox demo and to provide you
                access to the Admin Dashboard.
            </p>
        </div>


        <input name="mp_source_id" type="hidden" value="<?php echo $source_id; ?>">

        <div class="input-wrapper">
            <div class="g-recaptcha mp-recaptcha" data-sitekey="6Lcam4EiAAAAAFV6aW-TFjU-CgUBaz03UP9DCqJz"></div>
        </div>

        <div class="input-wrapper">
            <button type="submit" name="submit" class="mp-submit">
                <img src="<?php echo includes_url( 'images/spinner-2x.gif' ); ?>" class="mp-loader">
                <span>Try Live Demo</span>
            </button>
        </div>

        <div class="mp-message">
            <p class="mp-body">
                <span class="mp-demo-success">
                    <strong>Success!</strong> Check your email for the demo link.
                </span>
                <span class="mp-demo-fail">
                    <strong>Oops!</strong> Something went wrong. Please try again.
                    <span class="mp-errors"></span>
                </span>
            </p>
        </div>

    </form>

	<?php do_action( 'mp_demo_form_after' ); ?>

</div>
