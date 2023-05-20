<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo("charset"); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title("|", true, "right"); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Header -->
    <header class="bg-gray-900 py-4">
        <div class="container mx-auto px-4">
            <h1 class="text-2xl text-white"><?php bloginfo("name"); ?></h1>
            <p class="text-white"><?php bloginfo("description"); ?></p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>
                <article <?php post_class("mb-8"); ?>>
                    <h2 class="text-xl font-bold mb-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p class="text-gray-500"><?php the_date(); ?></p>
                    <div class="mt-4"><?php the_content(); ?></div>
                </article>
            <?php
            endwhile;
        else:
             ?>
            <p><?php _e("Sorry, no posts matched your criteria."); ?></p>
        <?php
        endif; ?>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 py-4">
        <div class="container mx-auto px-4">
            <p class="text-white">Footer content goes here.</p>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>

</html>
