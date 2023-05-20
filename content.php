<article <?php post_class(); ?>>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <p><?php the_date(); ?></p>
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
</article>
