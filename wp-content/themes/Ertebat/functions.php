<?php


function enqueue_custom_styles(): void
{
    wp_enqueue_style('tailwind-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0', 'all');
    wp_enqueue_style('style', get_template_directory_uri() . './style.css', array(), '1.0', 'all');
}

add_action('wp_enqueue_scripts', 'enqueue_custom_styles');


function my_custom_theme_setup()
{
    // فعال کردن پشتیبانی از منوها
    add_theme_support('menus');

    // فعال کردن پشتیبانی از تصاویر شاخص
    add_theme_support('post-thumbnails');
     // فعال کردن پشتیبانی ویجت
    add_theme_support('widgets');

    // تعریف اندازه‌های سفارشی برای تصاویر
    add_image_size('small-size', 200, 200, true); // اندازه تصویر سفارشی 200x200 پیکسل با برش (crop)
    add_image_size('large-size', 500, 400, true); // اندازه تصویر سفارشی 800x600 پیکسل با برش (crop)
}

add_action('after_setup_theme', 'my_custom_theme_setup');

// تابعی برای ثبت چندین منوی سفارشی در قالب
function my_custom_menus()
{
//    تابع register_nav_menu() (و همچنین register_nav_menus()) در وردپرس منو را نمی‌سازد بلکه فقط مکان (یا مکان‌هایی) برای منوی ناوبری را در قالب مشخص می‌کند. این مکان‌ها به عنوان نقاطی در قالب شما تعریف می‌شوند که می‌توانید منوهای سفارشی خود را در آنها نمایش دهید.
// ثبت مکان‌های مختلف منو با استفاده از تابع register_nav_menus
    register_nav_menus(array(
        'header-menu-center' => 'Header Menu center',  // منوی ناوبری در سربرگ (Header)
        'header-menu-left' => 'Header menu  left',  // منوی ناوبری چپ در سربرگ (Header)
        'footer-menu' => 'Footer Menu',  // منوی ناوبری در پاورقی (Footer)
        'sidebar-menu' => 'Sidebar Menu' // منوی ناوبری در نوار کناری (Sidebar)
    ));

    //کدد زیر درقالب استفاده می شود در اینجا کاربردی ندارد
    //    wp_nav_menu(array(
    //        'theme_location' => 'header-menu', // شناسه مکان منوی ثبت شده که در آن منو نمایش داده می‌شود (مثلاً منوی سربرگ)
    //        'container' => 'nav',              // نوع تگ HTML برای محفظه منو (در اینجا از تگ <nav> استفاده شده است)
    //        'menu_class' => 'header-menu-class' // کلاس CSS سفارشی که به تگ <ul> منو اضافه می‌شود
    //    ));

}

// استفاده از اکشن 'init' برای اجرای تابع my_custom_menus هنگام بارگذاری وردپرس
add_action('init', 'my_custom_menus');

//برای ایجاد یک ساید بار از کد زیر استفاده می کنیم و سپس در پنل مدیریت هر ویجت را بخواهیم به ان اضافه می کنیم
 function my_sidebar()
 {
     register_sidebar(array(
         'name' => 'page sidebar',
         'id' => 'page-sidebar',
         'before_title' => '<h4>',
         'after_title' => '</h4>',
     ));
 }
add_action('widgets_init', 'my_sidebar');

// برای استفاده در قالب ا کد زیر برای نشان دادن ساید بار استفاده می کنیم این ک در اینجا کار نمی کند فقط قالب
//
//if (is_active_sidebar('page-sidebar')) :
//    dynamic_sidebar('page-sidebar');
//endif
//




function my_custom_sidebars() {
    register_sidebar( array(
        'name'          => 'Custom Sidebar',
        'id'            => 'custom-sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'my_custom_sidebars' );


// Register Custom Post Type
//برای ایجاد یک پست تایپ سفارشی با دسته‌بندی و برچسب در وردپرس، می‌توانید از قطعه کد زیر استفاده کنید. این کد را در فایل functions.php قالب وردپرس خود اضافه کنید:
function custom_post_type() {

    $labels = array(
        'name'                  => _x( 'پست‌های سفارشی', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'پست سفارشی', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'پست‌های سفارشی', 'text_domain' ),
        'name_admin_bar'        => __( 'پست سفارشی', 'text_domain' ),
        'archives'              => __( 'آرشیو پست سفارشی', 'text_domain' ),
        'attributes'            => __( 'ویژگی‌های پست سفارشی', 'text_domain' ),
        'parent_item_colon'     => __( 'پست والد:', 'text_domain' ),
        'all_items'             => __( 'همه پست‌ها', 'text_domain' ),
        'add_new_item'          => __( 'افزودن پست جدید', 'text_domain' ),
        'add_new'               => __( 'افزودن جدید', 'text_domain' ),
        'new_item'              => __( 'پست جدید', 'text_domain' ),
        'edit_item'             => __( 'ویرایش پست', 'text_domain' ),
        'update_item'           => __( 'بروزرسانی پست', 'text_domain' ),
        'view_item'             => __( 'مشاهده پست', 'text_domain' ),
        'view_items'            => __( 'مشاهده پست‌ها', 'text_domain' ),
        'search_items'          => __( 'جستجوی پست', 'text_domain' ),
        'not_found'             => __( 'یافت نشد', 'text_domain' ),
        'not_found_in_trash'    => __( 'در زباله‌دان یافت نشد', 'text_domain' ),
        'featured_image'        => __( 'تصویر شاخص', 'text_domain' ),
        'set_featured_image'    => __( 'تنظیم تصویر شاخص', 'text_domain' ),
        'remove_featured_image' => __( 'حذف تصویر شاخص', 'text_domain' ),
        'use_featured_image'    => __( 'استفاده به عنوان تصویر شاخص', 'text_domain' ),
        'insert_into_item'      => __( 'درج در پست', 'text_domain' ),
        'uploaded_to_this_item' => __( 'آپلود شده در این پست', 'text_domain' ),
        'items_list'            => __( 'لیست پست‌ها', 'text_domain' ),
        'items_list_navigation' => __( 'مسیریابی لیست پست‌ها', 'text_domain' ),
        'filter_items_list'     => __( 'فیلتر لیست پست‌ها', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'پست سفارشی', 'text_domain' ),
        'description'           => __( 'پست‌های سفارشی شما', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    register_post_type( 'custom_post', $args );

}
add_action( 'init', 'custom_post_type', 0 );

//پایان پست تایپ