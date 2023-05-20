<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo("charset"); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <header class="bg-black text-white">
        <div class="container mx-auto flex justify-between items-center p-4">
            <div class="logo">
                <a href="<?php echo esc_url(home_url("/")); ?>">
                    <?php bloginfo("name"); ?>
                </a>
            </div>

            <nav class="header-menu">
                <?php wp_nav_menu([
                    "theme_location" => "primary",
                    "container" => false,
                    "menu_class" => "flex",
                    "fallback_cb" => false,
                ]); ?>
            </nav>
        </div>
    </header>
