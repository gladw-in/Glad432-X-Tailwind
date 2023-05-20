<?php if (have_posts()):
    while (have_posts()):
        the_post(); ?>
    <?php if (wp_attachment_is_image()): ?>
        <div class="attachment-image">
            <?php echo wp_get_attachment_image(get_the_ID(), "full"); ?>
        </div>
        <h2><?php the_title(); ?></h2>
        <p><?php the_excerpt(); ?></p>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
    <?php endif; ?>
<?php
    endwhile;
endif; ?>
