<section class="section-clients bg_dark-alt py-5"<?php if (isset($block['anchor'])) { ?> id="<?php echo esc_attr($block['anchor']); ?>"<?php } ?>>
    <div class="container">
        <div class="row">
            <div class="col-xl-10 offset-xl-1">
                <h2 class="color_white"><?php the_field('title'); ?></h2>
                <?php
                $args = array(
                    'post_type' => 'clients',
                    'posts_per_page' => 6,
                    'post_status' => array('publish'),
                    'post__in' => get_field('clients'),
                    'orderby' => 'post__in'
                );
                $the_query = new WP_Query($args);
                if ($the_query->have_posts()) { ?>
                    <div class="clients-list row align-items-center mt-4">
                        <?php while ($the_query->have_posts()) {
                            $the_query->the_post(); ?>
                            <div class="client-item col-md-6 col-lg-4 py-4">
                                <?php echo wp_get_attachment_image(get_field('logo', get_the_ID()), 'large', '', array('class' => 'client-img')); ?>
                            </div>
                        <?php } ?>
                    </div>
                    <?php wp_reset_postdata(); ?>
                <?php } ?>
            </div>
        </div>
    </div>
</section>