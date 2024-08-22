<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <div class="mx-4">
            <h1 class="text-4xl text-red-400 my-6"><?php the_title(); ?></h1>
            <div class=" mt-6 text-xl text-justify">
                <?php the_content(); ?>
            </div>
        </div>

    <?php endwhile; ?>
<?php endif; ?>
