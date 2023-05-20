<?php get_header(); ?>

<main class="container mx-auto px-4 py-8">
    <?php if (have_posts()):
        while (have_posts()):
            the_post(); ?>
            <article>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p><?php the_date(); ?></p>
                <div><?php the_excerpt(); ?></div>
            </article>
        <?php
        endwhile;
    else:
         ?>
        <p><?php _e("Sorry, no posts matched your criteria."); ?></p>
    <?php
    endif; ?>
</main>
<div class="col-span-1">
            <div class="sticky top-0">
                <?php get_sidebar(); ?>
            </div>
        </div>
<?php get_footer(); ?>
