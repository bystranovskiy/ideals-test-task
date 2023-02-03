        <footer class="bg_blue pt-5 pb-md-5">
            <div class="container py-xl-3">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-auto text-center mb-4 mb-lg-0">
                        <?php if (function_exists('the_custom_logo')) {
                            the_custom_logo();
                        } ?>
                    </div>
                    <div class="col-lg-auto">
                        <?php wp_nav_menu(array('theme_location' => 'secondary', 'menu_class' => 'menu menu-footer')); ?>
                    </div>
                </div>
            </div>
        </footer>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>
