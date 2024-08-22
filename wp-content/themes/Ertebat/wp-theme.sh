#!/bin/bash

# تعیین نام فایل‌ها و محتوای آن‌ها
declare -A files_contents
files_contents=(
  ["front-page.php"]='<?php
//  محتوای فایل
 
?>'
  ["footer.php"]='<?php
//  محتوای فایل
 
?>'
  ["header.php"]='<?php
//  محتوای فایل
 
?>'
 

  ["functions.php"]='<?php
//  محتوای فایل
 
?>'
 

  ["page.php"]='<?php
//  محتوای فایل
 
?>'
 
  ["404.php"]='<?php
//  محتوای فایل
 
?>'
 
  ["index.php"]='<?php
//  محتوای فایل
 
?>'
 
  ["archive.php"]='<?php
//  محتوای فایل
 
?>'
 
   ["archive.php"]='<?php
//  محتوای فایل
 
?>'
 

  ["style.css"]=''
  
)




# ایجاد فایل‌ها و اضافه کردن محتوا
for file in "${!files_contents[@]}"; do
  content="${files_contents[$file]}"
  
  if [ ! -f "$file" ]; then
    echo "$content" > "$file"
    echo "فایل '$file' ایجاد شد و محتوا به آن اضافه شد."
  else
    echo "فایل '$file' از قبل وجود دارد."
  fi
done

echo "تمام فایل‌های PHP با محتوای منحصر به فرد ایجاد شد."


mkdir includes && cd includes && touch section-content.php   