<?php get_header(); ?>

<section class="error-404">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-4">404 - Page Not Found</h1>
        <p class="text-lg mb-8">Sorry, but the page you are looking for could not be found.</p>
        <a href="<?php echo esc_url(
            home_url("/")
        ); ?>" class="text-blue-500 hover:text-blue-700">Go back to the homepage</a>
    </div>
</section>
<div class="col-span-1">
            <div class="sticky top-0">
                <?php get_sidebar(); ?>
            </div>
        </div>
<?php get_footer(); ?>
