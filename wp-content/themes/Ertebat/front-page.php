<?php  get_header(); ?>

<<<<<<< HEAD
  <div class="mx-4 mt-6">


      <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>

          <div>

              <h1 class="text-4xl text-blue-600 mb-4  "><?php the_title(); ?></h1>
          </div>
              <div class="text-2xl text-red-500 "><?php the_content(); ?></div>

          <?php endwhile; ?>
      <?php endif; ?>



  </div>

=======
>>>>>>> 4d0189da475853b2c4096f9886f0136d89adaf50
<?php get_footer() ?>

