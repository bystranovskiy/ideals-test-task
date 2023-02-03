<section class="section-intro bg_blue color_white d-flex flex-column justify-content-center"<?php if (isset($block['anchor'])) { ?> id="<?php echo esc_attr($block['anchor']); ?>"<?php } ?>>
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-lg-1">
                <h1 class="intro-title"><?php the_field('title'); ?></h1>
                <?php the_field('description'); ?>
                <?php
                $link = get_field('button');
                if ($link):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ?: '_self';
                    ?>
                    <div class="text-center mt-4 d-inline-block">
                        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"
                           class="btn mb-2"><?php echo esc_html($link_title); ?> <i class="icon-apple"></i></a>
                        <?php if (get_field('button_exp')) { ?>
                            <small class="d-block mt-3"><?php the_field('button_exp'); ?></small>
                        <?php } ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php if (get_field('anchor_link')) { ?>
        <a href="<?php the_field('anchor_link'); ?>" class="icon-down-open color_white"></a>
    <?php } ?>
</section>