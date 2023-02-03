<section class="section-about-us bg_dark py-5"<?php if (isset($block['anchor'])) { ?> id="<?php echo esc_attr($block['anchor']); ?>"<?php } ?>>
    <div class="container">
        <div class="row">
            <div class="col-xl-3 offset-xl-1">
                <h2 class="color_blue"><?php the_field('title'); ?></h2>
            </div>
            <div class="col-xl-7">
                <?php the_field('description'); ?>
            </div>
        </div>
    </div>
</section>