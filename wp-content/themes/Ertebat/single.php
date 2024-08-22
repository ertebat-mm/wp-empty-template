
<?php get_header(); ?>
<div class="content flex mx-5 mt-8">
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <div class="right-info w-1/2 ">
            <h1 class="text-2xl"><?php the_title(); ?></h1>
            <small><?php the_date(); ?></small>
            <p class="text-xl text-justify mt-4"><?php the_content(); ?></p>

            <!--            <h4><span>نویسنده :</span>--><?php //the_author(); ?><!--</h4>-->
            <?php
            $fname = get_the_author_meta('first_name');
            $lname = get_the_author_meta('last_name');
            $fullname = $fname . ' ' . $lname;
            ?>
            <h4 class="mt-6"><span>نویسنده :</span><?php echo $fullname ?></h4>

            <div class="flex">
                <!--            <h5>--><?php //the_tags('برچسب های این پست'); ?><!--</h5>-->
                <h5 class="ml-4"><span>دسته بندی :</span><?php echo the_category(','); ?></h5>
                <h5 class="ml-4"><?php the_tags(''); ?></h5>
            </div>

            <!--            //ایجاد بخش نظر دهی-اختیاری می باشد-->
            <?php comments_template(); ?>

        </div>
        <div class="left-img  w-1/2  flex justify-center items-center text-center p-4">
            <?php if (has_post_thumbnail()) : ?>
                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/no-image.png" class="w-[300px]" alt="">
            <?php endif ?>
        </div>

    <?php endwhile ?>
    <?php endif ?>
</div>

<?php get_footer(); ?>

<?php

