<footer class="bg-black text-white fixed bottom-0 left-0 w-full">
    <div class="container mx-auto h-700 flex flex-col justify-center">
        <nav class="footer-menu">
            <?php wp_nav_menu([
                "theme_location" => "footer",
                "container" => false,
                "menu_class" => "flex",
                "fallback_cb" => false,
            ]); ?>
        </nav>

        <div class="flex justify-center items-center mt-4">
            <!--<img src="<?php
// echo get_template_directory_uri();
?>/path/to/logo.png" alt="Logo" class="h-8 mr-2"> -->
            <span>&copy; <?php echo date(
                "Y"
            ); ?> Your Site Name. All Rights Reserved.</span>
        </div>
    </div>
</footer>
