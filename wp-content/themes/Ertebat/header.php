<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ertebat Test</title>
    <?php wp_head(); ?>
</head>
<body>

<header class=" mt-0 px-5 bg-gray-100 shadow-md  ">
    <div class="flex flex-row items-center justify-between  py-6">

        <div class="logo w-3/12">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" class="w-32" alt="">
        </div>
        <div class="menu w-6/12   flex justify-center  ">
            <?php
            //                wp_nav_menu(array(
            //                    'menu' => 'main menu',//نام منو که ساخته اید
            //                    'menu_class' => 'mehri-menu'
            //                ))
            wp_nav_menu(array(
                'theme_location' => 'header-menu-center', // شناسه مکان منوی ثبت شده که در آن منو نمایش داده می‌شود (مثلاً منوی سربرگ)
                'container' => 'nav',              // نوع تگ HTML برای محفظه منو (در اینجا از تگ <nav> استفاده شده است)
                'menu_class' => 'header-menu-center' // کلاس CSS سفارشی که به تگ <ul> منو اضافه می‌شود
            ));
            ?>
        </div>
        <div class="account-info w-3/12 text-left">
            <?php
                wp_nav_menu(array(
                    'theme_location' => 'header-menu-left', // شناسه مکان منوی ثبت شده که در آن منو نمایش داده می‌شود (مثلاً منوی سربرگ)
                    'container' => 'nav',              // نوع تگ HTML برای محفظه منو (در اینجا از تگ <nav> استفاده شده است)
                    'menu_class' => 'header-menu-left' // کلاس CSS سفارشی که به تگ <ul> منو اضافه می‌شود
                ));
            ?>
        </div>

    </div>
</header>

