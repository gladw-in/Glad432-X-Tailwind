<?php
// Enqueue theme styles and scripts cdn link!!
function tailwind_theme_cdn()
{
    wp_enqueue_style(
        "tailwind",
        "https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css"
    );
}
add_action("wp_enqueue_scripts", "tailwind_theme_cdn");

// Enqueue custom theme styles and scripts
function custom_tailwind_theme_scripts()
{
    wp_enqueue_style(
        "tailwind",
        get_stylesheet_directory_uri() . "/assets/css/tailwind.css"
    );
}
add_action("wp_enqueue_scripts", "custom_tailwind_theme_scripts");

function theme_enqueue_scripts()
{
    wp_enqueue_script(
        "custom-script",
        get_template_directory_uri() . "/js/custom.js",
        ["jquery"],
        "1.0",
        true
    );
}
add_action("wp_enqueue_scripts", "theme_enqueue_scripts");

remove_action("wp_head", "wp_generator");
add_filter("wp_lazy_loading_enabled", "__return_false");

// disable srcset on frontend
function disable_wp_responsive_images()
{
    return 1;
}
add_filter("max_srcset_image_width", "disable_wp_responsive_images");

remove_action("wp_head", "wp_shortlink_wp_head", 10, 0);

function remove_url_comments($fields)
{
    unset($fields["url"]);
    return $fields;
}
add_filter("comment_form_default_fields", "remove_url_comments");

/*  DISABLE GUTENBERG STYLE IN HEADER| WordPress 5.9 */
function wps_deregister_styles()
{
    wp_dequeue_style("global-styles");
}
add_action("wp_enqueue_scripts", "wps_deregister_styles", 100);

add_filter("jetpack_sharing_counts", "__return_false", 99);
add_filter("jetpack_implode_frontend_css", "__return_false", 99);

add_action("init", "remove_dns_prefetch");
function remove_dns_prefetch()
{
    remove_action("wp_head", "wp_resource_hints", 2, 99);
}

// REMOVE WP EMOJI
remove_action("wp_head", "print_emoji_detection_script", 7);
remove_action("admin_print_scripts", "print_emoji_detection_script");

function custom_deregister_styles()
{
    wp_deregister_style("mediaelement");
}
add_action("wp_print_styles", "custom_deregister_styles", 100);

// Remove Multi Purpose Style

add_action("wp_enqueue_scripts", "infophilic_remove_multi_purpose", 20);
function infophilic_remove_multi_purpose()
{
    wp_dequeue_style("td-plugin-multi-purpose");
}

add_filter("wpseo_debug_markers", "__return_false");

add_filter("wpseo_json_ld_output", "__return_false");

//Remove JQuery migrate

function remove_jquery_migrate($scripts)
{
    if (!is_admin() && isset($scripts->registered["jquery"])) {
        $script = $scripts->registered["jquery"];
        if ($script->deps) {
            // Check whether the script has any dependencies

            $script->deps = array_diff($script->deps, ["jquery-migrate"]);
        }
    }
}
add_action("wp_default_scripts", "remove_jquery_migrate");

// Removing Emojis

add_action("init", "infophilic_disable_wp_emojicons");
function infophilic_disable_wp_emojicons()
{
    // all actions related to emojis

    remove_action("admin_print_styles", "print_emoji_styles");
    remove_action("wp_head", "print_emoji_detection_script", 7);
    remove_action("admin_print_scripts", "print_emoji_detection_script");
    remove_action("wp_print_styles", "print_emoji_styles");
    remove_filter("wp_mail", "wp_staticize_emoji_for_email");
    remove_filter("the_content_feed", "wp_staticize_emoji");
    remove_filter("comment_text_rss", "wp_staticize_emoji");
}

add_filter("comment_form_default_fields", "wc_comment_form_change_cookies");
function wc_comment_form_change_cookies($fields)
{
    $commenter = wp_get_current_commenter();

    $consent = empty($commenter["comment_author_email"])
        ? ""
        : ' checked="checked"';

    $fields["cookies"] = " ";
    return $fields;
}
add_action("wp_enqueue_scripts", "mywptheme_child_deregister_styles", 20);
function mywptheme_child_deregister_styles()
{
    wp_dequeue_style("classic-theme-styles");
}

function smartwp_remove_wp_block_library_css()
{
    wp_dequeue_style("wp-block-library");
    wp_dequeue_style("wp-block-library-theme");
    wp_dequeue_style("wc-blocks-style"); // Remove WooCommerce block CSS
}
add_action("wp_enqueue_scripts", "smartwp_remove_wp_block_library_css", 100);

add_filter("wpo_update_plugin_json", "__return_false");

remove_action("wp_head", "wlwmanifest_link");

remove_action("wp_enqueue_scripts", "wp_enqueue_global_styles");
remove_action("wp_body_open", "wp_global_styles_render_svg_filters");
