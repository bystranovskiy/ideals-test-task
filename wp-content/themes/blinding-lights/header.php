<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php $fonts_google = 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap'; ?>
    <!-- connect to domain of font files -->
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- optionally increase loading priority -->
    <link rel="preload" as="style" href=<?php echo $fonts_google; ?>>
    <!-- async CSS -->
    <link rel="stylesheet" media="print" onload="this.onload=null;this.removeAttribute('media');"
          href="<?php echo $fonts_google; ?>">
    <!-- no-JS fallback -->
    <noscript>
        <link rel="stylesheet" href="<?php echo $fonts_google; ?>">
    </noscript>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header>
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-auto">
                <?php if (function_exists('the_custom_logo')) {
                    the_custom_logo();
                } ?>
            </div>
            <div class="col-auto ml-auto d-none d-lg-block">
                <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'menu menu-header')); ?>
            </div>
            <div class="col-auto d-none d-lg-block">
                <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                    <input name="s" class="search-field search-field_fade-in" type="text" placeholder="<?php echo esc_html__('Search here...', 'blinding-lights'); ?>">
                    <button type="button" class="search-toggle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                            <path d="M18.375 18.375L14.4497 14.4428M16.625 9.1875C16.625 11.16 15.8414 13.0518 14.4466 14.4466C13.0518 15.8414 11.16 16.625 9.1875 16.625C7.21495 16.625 5.3232 15.8414 3.92839 14.4466C2.53359 13.0518 1.75 11.16 1.75 9.1875C1.75 7.21495 2.53359 5.3232 3.92839 3.92839C5.3232 2.53359 7.21495 1.75 9.1875 1.75C11.16 1.75 13.0518 2.53359 14.4466 3.92839C15.8414 5.3232 16.625 7.21495 16.625 9.1875V9.1875Z" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </button>
                </form>
            </div>
            <div class="mobile-toggle-wrapper py-3 col-auto d-lg-none">
                <div class="mobile-toggle"></div>
            </div>
        </div>
    </div>
</header>

<div class="menu-mobile-wrapper">
    <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'menu menu-mobile')); ?>
    <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
        <input name="s" class="search-field" type="text" placeholder="<?php echo esc_html__('Search here...', 'blinding-lights'); ?>">
    </form>
</div>

<div id="page" class="page-container">