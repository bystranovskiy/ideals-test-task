<?php get_header();
$is_active_sidebar = is_active_sidebar('sidebar');
?>
    <main>
        <section class="section-intro bg_blue">
            <div class="container position-relative">
                <h1 class="archive-title color_white">
                    <?php if (is_home()) {
                        echo get_the_title(get_option('page_for_posts', true));
                    } else if (is_category()) {
                        echo single_cat_title();
                    } ?>
                </h1>
            </div>
        </section>
        <div class="container">
            <div class="row py-5">
                <div class="<?php echo $is_active_sidebar ? 'col-lg-7 mb-5 mb-lg-0' : 'col-lg-10 offset-lg-1 col-xl-8 offset-xl-2'; ?>">
                    <?php if (function_exists('yoast_breadcrumb')) {
                        yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
                    } ?>
                    <?php if (have_posts()) : ?>
                        <div class="posts-list">
                            <?php while (have_posts()) : the_post(); ?>
                                <div class="post-item">
                                    <?php if (has_post_thumbnail()) { ?>
                                        <a href="<?php the_permalink(); ?>" class="post-image mb-3">
                                            <?php the_post_thumbnail('featured-image', array('class' => 'responsive-image')); ?>
                                        </a>
                                    <?php } ?>
                                    <h2 class="post-title">
                                        <a href="<?php the_permalink(); ?>" class="color_white"><?php the_title(); ?></a>
                                    </h2>
                                    <div class="post-excerpt">
                                        <?php the_excerpt(); ?>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html__('Read More', 'blinding-lights'); ?></a>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <?php pagination(); ?>
                    <?php else :
                        echo esc_html__('Sorry, no posts were found.', 'blinding-lights');
                    endif; ?>
                </div>
                <div class="col-lg-5">
                    <?php if (is_active_sidebar('sidebar')) : dynamic_sidebar('sidebar'); endif; ?>
                </div>
            </div>
        </div>
    </main>

<?php
get_footer();