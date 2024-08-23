<aside id="secondary" class="widget-area text-right">
    <h2 class="widget-title mt-4 text-red-400">Custom Sidebar</h2>
    <?php if ( is_active_sidebar( 'custom-sidebar' ) ) : ?>
        <?php dynamic_sidebar( 'custom-sidebar' ); ?>
    <?php else : ?>
        <p>ویجتی برای نمایش وجود ندارد. لطفاً از پنل مدیریت وردپرس ویجت‌ها را اضافه کنید.</p>
    <?php endif; ?>
</aside>
