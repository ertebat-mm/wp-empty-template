<?php
// بررسی وجود نظرات و نمایش نظرات موجود
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <h2 class="text-xl font-bold mb-4 mt-6 text-red-500">
            <?php
            $comment_count = get_comments_number();
            if ('1' === $comment_count) {
                printf(
                    esc_html__('یک نظر بر روی "%s"', 'textdomain'),
                    get_the_title()
                );
            } else {
                printf(
                    esc_html(_nx('%1$s نظر بر روی "%2$s"', '%1$s نظر بر روی "%2$s"', $comment_count, 'comments title', 'textdomain')),
                    number_format_i18n($comment_count),
                    get_the_title()
                );
            }
            ?>
        </h2>

        <ol class="list-decimal pl-5 mb-8">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 50,
                'callback'    => 'my_custom_comments',
            ));
            ?>
        </ol>

        <?php
        if (get_comment_pages_count() > 1 && get_option('page_comments')) :
            ?>
            <nav class="pagination">
                <div class="nav-previous"><?php previous_comments_link(esc_html__('نظرات قدیمی‌تر', 'textdomain')); ?></div>
                <div class="nav-next"><?php next_comments_link(esc_html__('نظرات جدیدتر', 'textdomain')); ?></div>
            </nav>
        <?php endif; ?>

    <?php endif; ?>

    <?php
    // نمایش فرم ارسال نظر

    comment_form(array(
        'title_reply' => __('ارسال نظر', 'textdomain'),
        'comment_notes_before' => '<p class="text-sm text-gray-500 mb-4">' . __('آدرس ایمیل شما منتشر نخواهد شد.', 'textdomain') . '</p>',
        'class_form' => 'space-y-4',
        'class_submit' => 'bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300',
        'fields' => array(
            'author' => '<p class="flex flex-col mb-4">' .
                '<label for="author" class="text-lg font-medium text-gray-700 mb-1">' . __('نام', 'textdomain') . '</label> ' .
                '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" class="border border-gray-300 rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500" /></p>',
            'email'  => '<p class="flex flex-col mb-4">' .
                '<label for="email" class="text-lg font-medium text-gray-700 mb-1">' . __('ایمیل', 'textdomain') . '</label> ' .
                '<input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" class="border border-gray-300 rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500" /></p>',
            'url'    => '<p class="flex flex-col mb-4">' .
                '<label for="url" class="text-lg font-medium text-gray-700 mb-1">' . __('وب‌سایت', 'textdomain') . '</label> ' .
                '<input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" class="border border-gray-300 rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500" /></p>',
        ),
        'comment_field' => '<p class="flex flex-col mb-4">' .
            '<label for="comment" class="text-lg font-medium text-gray-700 mb-1">' . __('نظر', 'textdomain') . '</label> ' .
            '<textarea id="comment" name="comment" cols="45" rows="8" class="border border-gray-300 rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500" aria-required="true"></textarea></p>',
    ));
    ?>

</div><!-- #comments -->

<?php
// تابع سفارشی برای نمایش نظرات
function my_custom_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    ?>
    <li <?php comment_class('mb-6 mx-5'); ?> id="comment-<?php comment_ID(); ?>">
        <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
            <footer class="comment-meta">
                <div class="comment-author vcard flex items-center mb-2">
                    <?php echo get_avatar($comment, 50, '', '', array('class' => 'rounded-full')); ?>
                    <div class=" mr-2">
                        <b class="fn"><?php comment_author_link(); ?></b> <span class="text-gray-500 text-sm"><?php comment_date(); ?></span>
                    </div>
                </div>
            </footer><!-- .comment-meta -->

            <div class="comment-content">
                <?php comment_text(); ?>
            </div><!-- .comment-content -->

            <div class="comment-reply">
                <?php comment_reply_link(array_merge($args, array('reply_text' => __('پاسخ', 'textdomain'), 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
            </div><!-- .comment-reply -->
        </article><!-- .comment-body -->
    </li>
    <?php
}
?>
