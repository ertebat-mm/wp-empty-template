<!-- شروع فرم جستجو بر اساس دسته ها-->
<form action="<?php echo esc_url(home_url('/')); ?>" method="get" class="text-right">

    <!-- لیبل برای دسترسی‌پذیری (مخفی شده) -->
    <!--    <label for="cat" class="sr-only">انتخاب دسته‌بندی</label>-->

    <!-- منوی کشویی برای انتخاب دسته‌بندی -->
    <!--    این قسمت اختیاری می باشد و درصورت حذف در کل سایت جستجو صورت می گیرد-->
    <!--    <select name="cat" id="cat" class="border border-gray-300 rounded px-4 py-2 w-full text-right">-->
    <!-- گزینه پیش‌فرض خالی -->

    <!--        <option value="">انتخاب دسته‌بندی</option>-->

    <!-- دریافت دسته‌بندی‌ها از وردپرس -->
    <!--        --><?php
    //        $categories = get_categories(); // دریافت تمام دسته‌بندی‌ها
    //        foreach ( $categories as $category ) { // نمایش دسته‌بندی‌ها در منوی کشویی
    //            echo '<option value="' . esc_attr( $category->term_id ) . '">' . esc_html( $category->name ) . '</option>';
    //        }
    //        ?>
    <!--    </select>-->

    <div class="flex ">
        <!-- فیلد جستجو برای وارد کردن کلمه کلیدی -->
        <input type="text" name="s" class="border border-gray-300 rounded px-4 py-2 w-full text-right mt-2"
               placeholder="جستجو..." value="<?php echo get_search_query(); ?>"/>

        <!-- دکمه جستجو -->
        <button type="submit" class="mt-2 mr-2 px-4 py-2 bg-blue-500 text-white rounded">جستجو</button>
    </div>
</form>
<!-- پایان فرم جستجو -->


<?php
