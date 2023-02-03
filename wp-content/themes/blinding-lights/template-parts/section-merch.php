<section class="section-merch py-5"<?php if (isset($block['anchor'])) { ?> id="<?php echo esc_attr($block['anchor']); ?>"<?php } ?>>
    <div class="container">
        <div class="row">
            <div class="col-xl-10 offset-xl-1">
                <h2 class="color_blue mb-4"><?php the_field('title'); ?></h2>
                <?php the_field('description'); ?>
                <?php if (have_rows('items')): ?>
                    <div class="row mt-5 mb-4">
                        <div class="col-xl-10">
                            <div class="merch-slider">
                                <?php while (have_rows('items')): the_row(); ?>
                                    <div class="merch-item">
                                        <div class="row">
                                            <div class="col-md-6 pr-md-0">
                                                <div class="merch-item-info">
                                                    <h3 class="merch-item-title text-uppercase color_white mb-5"><?php the_sub_field('title'); ?></h3>
                                                    <div class="merch-item-desc pt-3">
                                                        <?php the_sub_field('description'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 py-4 merch-item-image d-flex align-items-center justify-content-center">
                                                <?php echo wp_get_attachment_image(get_sub_field('image'), 'large', '', array('class' => 'responsive-image')); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>