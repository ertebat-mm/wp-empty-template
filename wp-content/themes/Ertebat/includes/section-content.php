<div class="mx-4 mt-6 flex  gap-14">

    <div class="right-sidebar w-1/6  rtl text-right flex flex-col items-start">
        <?php
        if (is_active_sidebar('page-sidebar')) :
            dynamic_sidebar('page-sidebar');
        endif
        ?>
        <div class="custome-sidebar  text-right">
            <?php get_sidebar('custom'); ?>

        </div>
    </div>
    <div class="left  w-full">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>

                <div>

                    <h2 class="text-4xl font-semibold mb-4 mt-4">
                        <a href="<?php the_permalink(); ?>"
                           class="text-blue-600 hover:text-blue-800 transition-colors duration-200"><?php the_title(); ?></a>
                    </h2>

                </div>
                <div class="text-sm  "><?php the_content(); ?></div>

            <?php endwhile; ?>
        <?php endif; ?>

    </div>

</div>
