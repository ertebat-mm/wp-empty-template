<?php


<<<<<<< HEAD
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

//hellow
 
