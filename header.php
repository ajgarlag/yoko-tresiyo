<?php
/**
 * @package WordPress
 * @subpackage Yoko
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged, $_wp_default_headers;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'yoko' ), max( $paged, $page ) );
?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="clearfix">
	<header id="branding">
		<nav id="mainnav" class="clearfix">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- end mainnav -->

		<?php global $yoko_options;
		$yoko_settings = get_option( 'yoko_options', $yoko_options ); ?>

		<hgroup id="site-title">
		<?php if( $yoko_settings['custom_logo'] ) : ?>
			<a href="<?php echo home_url( '/' ); ?>" class="logo"><img src="<?php echo $yoko_settings['custom_logo']; ?>" alt="<?php bloginfo('name'); ?>" /></a>
		<?php else : ?>
			<h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
		<?php endif; ?>
		</hgroup><!-- end site-title -->

        <?php
		// The header image
		// Check if this is a post or page, if it has a thumbnail, and if it's a big one
			if ( is_singular() &&
				current_theme_supports( 'post-thumbnails' ) &&
				has_post_thumbnail( $post->ID ) &&
				( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&
				$image[1] >= HEADER_IMAGE_WIDTH ) :
				// Houston, we have a new header image!
						echo get_the_post_thumbnail( $post->ID , array(1102,250), array('class' => 'headerimage'));
						elseif ( get_header_image() ) : ?>
                                                <a href="<?php echo home_url( '/' ); ?>">
						<img src="<?php
                                                                $himg_title = "Volver a inicio";
                                                                if (is_category('parecidos-razonables')) {
                                                                    echo $_wp_default_headers['parecidos-razonables']['url'];
                                                                    $himg_description = $_wp_default_headers['parecidos-razonables']['description'];
                                                                } elseif(is_category('parecidos-razonados')) {
                                                                    echo $_wp_default_headers['parecidos-razonados']['url'];
                                                                    $himg_description = $_wp_default_headers['parecidos-razonados']['description'];
                                                                } elseif(is_category('y-como-se-hace')) {
                                                                    echo $_wp_default_headers['y-como-se-hace']['url'];
                                                                    $himg_description = $_wp_default_headers['y-como-se-hace']['description'];
                                                                } elseif(is_category('daguerrotipo')) {
                                                                    echo $_wp_default_headers['daguerrotipo']['url'];
                                                                    $himg_description = $_wp_default_headers['daguerrotipo']['description'];
                                                                } elseif(is_category('diseccion')) {
                                                                    echo $_wp_default_headers['diseccion']['url'];
                                                                    $himg_description = $_wp_default_headers['diseccion']['description'];
                                                                } elseif(is_category('evolucion')) {
                                                                    echo $_wp_default_headers['evolucion']['url'];
                                                                    $himg_description = $_wp_default_headers['evolucion']['description'];
                                                                } elseif(is_category('pildoras-de-viaje')) {
                                                                    echo $_wp_default_headers['pildoras-de-viaje']['url'];
                                                                    $himg_description = $_wp_default_headers['pildoras-de-viaje']['description'];
                                                                } else {
                                                                    header_image();
                                                                    $himg_description = "TRESiYO";
                                                                    $himg_title = "Inicio";
                                                                }
                                                          ?>" class="headerimage" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="<?php echo $himg_description ?>" title="<?php echo $himg_title ?>" /><!-- end headerimage -->
                                                </a>
					<?php endif; ?>
					<div class="clear"></div>

		<nav id="subnav">
			<?php
			if (is_nav_menu( 'Sub Menu' ) ) {
			wp_nav_menu( array('menu' => 'Sub Menu' ));} ?>
		</nav><!-- end subnav -->
</header><!-- end header -->