<?php  get_header(); ?>

  <div class="mx-4 mt-6">


      <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>

          <div>

              <h2 class="text-4xl font-semibold mb-4 mt-4">
                  <a href="<?php the_permalink(); ?>"
                     class="text-blue-600 hover:text-blue-800 transition-colors duration-200"><?php the_title(); ?></a>
              </h2>

          </div>
              <div class="text-sm  "><?php the_content(); ?></div>

          <?php endwhile; ?>
      <?php endif; ?>



  </div>


<?php get_footer() ?>

