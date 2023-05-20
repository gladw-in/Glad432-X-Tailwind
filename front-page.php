<?php get_header(); ?>

<section class="post-list">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-4">Latest Posts</h1>
        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>
                <article class="post mb-6">
                    <?php if (has_post_thumbnail()): ?>
                        <div class="post-thumbnail mb-4">
                            <?php the_post_thumbnail("large", [
                                "class" => "w-700",
                            ]); ?>
                        </div>
                    <?php endif; ?>
                    <h2 class="text-2xl font-bold mb-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p class="text-gray-500 mb-4"><?php the_date(); ?></p>
                    <div class="post-content">
                        <?php// the_excerpt(); ?>
                    </div>
                </article>
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
