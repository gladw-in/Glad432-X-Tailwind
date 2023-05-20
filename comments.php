<?php if (have_comments()): ?>
    <div class="comments">
        <h2><?php comments_number(); ?></h2>

        <ol class="comment-list">
            <?php wp_list_comments(); ?>
        </ol>

        <?php paginate_comments_links(); ?>
    </div>
<?php endif; ?>

<?php comment_form(); ?>

<?php if (comments_open()): ?>
    <div class="container mx-auto px-4 py-8">
        <?php comments_template(); ?>
    </div>
<?php endif; ?>
