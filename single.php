<?php get_header(); ?>

<section class="single-post">
    <div class="container mx-auto px-4 py-8">
        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>
                <article class="post mb-6">
                    <h2 class="text-2xl font-bold mb-2"><?php the_title(); ?></h2>
                    <?php if (has_post_thumbnail()): ?>
                        <div class="post-thumbnail mb-4">
                            <?php the_post_thumbnail("large", [
                                "class" => "w-full h-auto",
                            ]); ?>
                        </div>
                    <?php endif; ?>
                    <p class="text-gray-500 mb-4"><?php the_date(); ?></p>
                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>
                </article>

                <section class="comments">
                    <?php if (comments_open() || get_comments_number()): ?>
                        <div class="comments-title">
                            <h3><?php comments_number(
                                "No Comments",
                                "1 Comment",
                                "% Comments"
                            ); ?></h3>
                        </div>

                        <div class="comments-list">
                            <?php wp_list_comments([
                                "style" => "div",
                                "short_ping" => true,
                                "avatar_size" => 50,
                            ]); ?>
                        </div>

                        <div class="comment-form">
                            <?php comment_form([
                                "class_submit" =>
                                    "bg-blue-500 text-white py-2 px-4 rounded",
                                "title_reply_before" =>
                                    '<h4 class="text-xl font-bold mb-4">',
                                "title_reply_after" => "</h4>",
                                "comment_notes_before" => "",
                                "comment_field" =>
                                    '<textarea id="comment" name="comment" class="w-full h-20 border border-gray-300 rounded mb-4" required></textarea>',
                                "fields" => [
                                    "author" =>
                                        '<div class="mb-4"><input id="author" name="author" type="text" class="w-full border border-gray-300 rounded py-2 px-4" placeholder="Name" required></div>',
                                    "email" =>
                                        '<div class="mb-4"><input id="email" name="email" type="email" class="w-full border border-gray-300 rounded py-2 px-4" placeholder="Email" required></div>',
                                ],
                            ]); ?>
                        </div>
                    <?php endif; ?>
                </section>
        <?php
            endwhile;
        else:
            echo "<p>No posts found.</p>";
        endif; ?>
    </div>
</section>
<div class="col-span-1">
            <div class="sticky top-0">
                <?php get_sidebar(); ?>
            </div>
        </div>
<?php get_footer(); ?>
