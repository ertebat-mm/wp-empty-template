<?php get_header(); ?>

<div class="       mx-5 mt-5  py-8">
    <h1 class="text-3xl font-bold text-center mb-8">
        <?php
        if (is_category()) {
            single_cat_title(); // عنوان دسته‌بندی
        } elseif (is_tag()) {
            single_tag_title(); // عنوان برچسب
        } elseif (is_author()) {
            the_author(); // نام نویسنده
        } elseif (is_date()) {
            echo get_the_date(); // تاریخ
        } else {
            _e('آرشیو', 'textdomain'); // عنوان پیش‌فرض
        }
        ?>
    </h1>

    <?php if (have_posts()) : ?>
        <div class="grid grid-cols-1 gap-12 md:grid-cols-2 lg:grid-cols-4   ">
            <?php while (have_posts()) : the_post(); ?>
                <div class="p-6 bg-amber-300 min-h-96 border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 ">
                    <div class="img  text-center flex justify-center  ">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('small-size'); ?>" class="w-[300px] h-[200px] " alt="<?php the_title(); ?>">
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/no-image.png"  class="w-[300px] h-[200px] " alt="No Image">
                        <?php endif ?>

                    </div>
                    <h2 class="text-2xl font-semibold mb-4 mt-4">
                        <a href="<?php the_permalink(); ?>"
                           class="text-blue-600 hover:text-blue-800 transition-colors duration-200"><?php the_title(); ?></a>
                    </h2>
                    <div class="text-gray-600">
                        <?php the_excerpt(); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="inline-block mt-4 text-blue-500 hover:underline">ادامه
                        مطلب</a>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- Pagination -->
        <div class="pagination mt-8 flex justify-center items-center space-x-2">
            <?php
            $args = array(
                'prev_text' => '<span class="px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition-colors duration-200">' . __('قبلی', 'textdomain') . '</span>',
                'next_text' => '<span class="px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition-colors duration-200">' . __('بعدی', 'textdomain') . '</span>',
                'before_page_number' => '<span class="px-3 py-1 bg-gray-200 rounded-full hover:bg-gray-300 transition-colors duration-200">',
                'after_page_number' => '</span>',
                'mid_size' => 1, // تعداد صفحات نمایش داده‌شده قبل و بعد از صفحه جاری
                'end_size' => 1,  // تعداد صفحات نمایش داده‌شده در ابتدا و انتها
            );

            $links = paginate_links(array_merge($args, array(
                'current' => max(1, get_query_var('paged')),
                'format' => '?paged=%#%',
                'type' => 'array',  // گرفتن لینک‌ها به عنوان آرایه برای تغییر استایل‌ها
            )));

            if ($links) {
                foreach ($links as $link) {
                    // برجسته کردن صفحه جاری
                    if (strpos($link, 'current') !== false) {
                        echo '<span class="px-3 py-1 bg-blue-600 text-white font-bold rounded-full">' . strip_tags($link) . '</span>';
                    } else {
                        echo $link;
                    }
                }
            }
            ?>
        </div>

    <?php else : ?>
        <p class="text-center text-red-500"><?php _e('هیچ مطلبی یافت نشد.', 'textdomain'); ?></p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
