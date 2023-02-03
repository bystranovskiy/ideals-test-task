<section class="section-hot-news bg_dark pt-5"<?php if (isset($block['anchor'])) { ?> id="<?php echo esc_attr($block['anchor']); ?>"<?php } ?>>
    <div class="container">
        <div class="row">
            <div class="col-xl-10 offset-xl-1">
                <h2 class="color_blue mb-4"><?php the_field('title'); ?></h2>
                <?php the_field('description'); ?>
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'post_status' => array('publish'),
                    'order' => 'DESC',
                );
                $query = get_field('posts_query');
                if ($query == 'viewed') {
                    $args['meta_key'] = 'views';
                    $args['orderby'] = 'meta_value_num';
                } else if ($query == 'custom' && get_field('posts')) {
                    $args['post__in'] = get_field('posts');
                    $args['orderby'] = 'post__in';
                } else {
                    $args['orderby'] = 'date';
                }
                $the_query = new WP_Query($args);
                if ($the_query->have_posts()) { ?>
                    <div class="posts-list py-5 row">
                        <?php while ($the_query->have_posts()) {
                            $the_query->the_post(); ?>
                            <div class="post-item col-lg-4 mb-5">
                                <a href="<?php the_permalink(); ?>" class="post-image">
                                    <?php the_post_thumbnail('square', array('class' => 'responsive-image')); ?>
                                </a>
                                <h3 class="post-title my-4">
                                    <a class="color_white" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <div class="post-desc">
                                    <p><?php the_excerpt(); ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <?php wp_reset_postdata(); ?>
                <?php } ?>
            </div>
        </div>
    </div>
</section>