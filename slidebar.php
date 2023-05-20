<div class="sticky top-0">
    <div class="h-screen flex flex-col justify-between bg-gray-200">
        <div class="p-4">
            <h2 class="text-xl font-bold mb-4">Latest Posts</h2>
            <ul class="space-y-4">
                <?php
                $latest_posts = new WP_Query([
                    "post_type" => "post",
                    "posts_per_page" => 5,
                    "order" => "DESC",
                ]);

                if ($latest_posts->have_posts()):
                    while ($latest_posts->have_posts()):
                        $latest_posts->the_post(); ?>
                        <li>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </li>
                <?php
                    endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </ul>
        </div>
        <div class="p-4">
            <h2 class="text-xl font-bold mb-4">Subscribe to Newsletter</h2>
            <form class="flex">
                <input type="email" placeholder="Your email" class="rounded-l-lg px-4 py-2 w-full" />
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-r-lg">
                    Subscribe
                </button>
            </form>
        </div>
    </div>
</div>
