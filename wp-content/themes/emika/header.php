<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Emika
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
	<?php if ( !empty( Kirki::get_option( 'emika_customizer', 'emika_favicon' ) ) ) { ?>
		<link rel="icon" type="image/png" href="<?php echo esc_url( Kirki::get_option( 'emika_customizer', 'emika_favicon' ) ); ?>">
	<?php } ?>
	<?php if ( !empty( Kirki::get_option( 'emika_customizer', 'emika_apple_favicon' ) ) ) { ?>
		<link rel="apple-touch-icon" href="<?php echo esc_url( Kirki::get_option( 'emika_customizer', 'emika_apple_favicon' ) ); ?>">
	<?php } ?>
<?php } ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<?php
	if ( is_front_page() && is_home() ) : 

		$enable_title = Kirki::get_option( 'emika_customizer', 'emika_home_title_enable' );
		$enable_desc = Kirki::get_option( 'emika_customizer', 'emika_home_desc_enable' );

		if ( $enable_title == 1 ) { 
			$title = esc_html( get_theme_mod('emika_home_title') );

				if ( empty($title) ) {
					$title = get_bloginfo('name');
				}

		} else {
			$title = '';
		}

		if ( $enable_desc == 1 ) { 
			$desc = esc_html( get_theme_mod('emika_home_description') );

				if ( empty($desc) ) {
					$desc = get_bloginfo('description');
				}

		} else {
			$desc = '';
		}

		$img = Kirki::get_option( 'emika_customizer', 'emika_front_page_bg_image' );

		$header_class_1 = 'site-header main-header';
		$header_class_2 = 'index-header-title';
		$overlay = 'main-header-overlay';
		$parallax = 'header-parallax'; 

	elseif ( is_single() ) : 
		$title = esc_html( get_the_title() );

		$current_post = get_post( $id );

		$enable_post_date = Kirki::get_option( 'emika_customizer', 'emika_single_page_date_enable' );
		$enable_post_author = Kirki::get_option( 'emika_customizer', 'emika_single_page_author_enable' );
		$author_name_value = Kirki::get_option( 'emika_customizer', 'emika_single_page_author_name' );

		if ( $author_name_value == 'full-name' ) {
			$author_name = get_the_author_meta( 'display_name', $current_post->post_author );
		} else {
			if ( $author_name_value == 'f-name' ) {
				$author_name = get_the_author_meta( 'user_firstname', $current_post->post_author );
			} else {
				if ( $author_name_value == 'l-name' ) {
					$author_name = get_the_author_meta( 'user_lastname', $current_post->post_author );
				} 
			}
		}
						
		$desc = '';
		if ( $enable_post_date == 1 ) { $desc .= esc_html( emika_relative_time( get_the_date() ) ); } else { }
		if ( $enable_post_date == 1 and $enable_post_author == 1 ) { $desc .= esc_html( ' / ' ); } else { }
		if ( $enable_post_author == 1 ) { $desc .= esc_html__( 'by ', 'emika' ); $desc .= esc_html( $author_name ); } else { }		
		
		$thumb_id = get_post_thumbnail_id();
		$thumb_url = wp_get_attachment_image_src( $thumb_id, '', false );
		$img = $thumb_url[0];

		$header_class_1 = 'main-header';
		$header_class_2 = 'post-header-title';
		$overlay = 'main-header-overlay';
		$parallax = 'header-parallax';

	else : 

		if  ( is_404() or is_search() or is_category() or is_tag() ) :
			$title = esc_html( wp_title( '', false ) );
		else :
			$title = esc_html( get_the_title() );
		endif;

		if  ( is_category() or is_tag() ) : 
			$img = Kirki::get_option( 'emika_customizer', 'emika_archive_bg_image' );
		elseif ( is_search() ) :
			$img = Kirki::get_option( 'emika_customizer', 'emika_search_page_bg_image' );
		elseif ( is_404() ) :
			$img = Kirki::get_option( 'emika_customizer', 'emika_page_404_bg_image' );
		else :
			$thumb_id = get_post_thumbnail_id();
			$thumb_url = wp_get_attachment_image_src( $thumb_id, '', false );
			$img = $thumb_url[0];
		endif;

		$header_class_1 = 'simple-page-header';
		$header_class_2 = 'page-header-title';
		$overlay = 'page-header-overlay';
		$parallax = 'page-header-parallax';
		
	endif;
	?>

	<header id="masthead" class="<?php echo esc_attr( $header_class_1 ); ?>" role="banner">
		<div class="<?php echo esc_attr( $overlay ); ?>"></div>

		<div class="<?php echo esc_attr( $parallax ); ?>" style="background: url(<?php echo esc_url( $img ); ?>) 50% 50% no-repeat fixed;">

			<nav class="navbar navbar-default">
				<div class="container navbar-container">

					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
							<span><?php esc_html_e( 'Menu', 'emika' ); ?></span>
						</button>

						<?php
						$logo = Kirki::get_option( 'emika_customizer', 'emika_logo' );

						if ( !empty($logo) ) { 
						?>
						<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $logo ); ?>" title="<?php esc_attr( bloginfo( 'name' ) ); ?>" alt="logo"></a>
						<?php
						} else {
						?>
							<span>
								<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a>
							</span>
						<?php
						}
						?>

					</div>
					<?php emika_navigation(); ?>
					<?php
					$sidebar = Kirki::get_option( 'emika_customizer', 'emika_sidebar_enable' ); 

					if ( $sidebar == 1 ) { ?>
					<div class="widget-btn">
						<button id="open-button" class="menu-button"><span></span></button>
					</div>
					<?php } ?>
					
				</div><!-- /.container -->
			</nav>

			<div class="<?php echo esc_attr( $header_class_2 ); ?>">
				<?php
					if ( is_single() ) :
						$enable_category = Kirki::get_option( 'emika_customizer', 'emika_single_page_category_enable' );
						if ( $enable_category == 1 ) {
							$category = get_the_category_list( esc_html__( '', 'emika' ) );
							echo '<span class="header-category">' . $category . '</span>';
						}
					endif;
				?>
				<h1><?php echo esc_html( $title ); ?></h1>

				<?php 
				if ( !empty( $desc ) ) {
				?>
				<span><?php echo esc_html( $desc ); ?></span>
				<?php } ?>
			</div>

		</div>

	</header><!-- #masthead -->

	<div id="search-block" class="overlay-search overlay-slidedown">
		<button type="button" class="overlay-close search-close">
			<span class="line-search-close"></span>
		</button>
		<div class="search-form-block">
			<div class="col-lg-6 col-md-6 col-sm-8 col-xs-10 search-content">
				<h1>Search Here</h1>
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>

	<div id="content" class="site-content">
