<?php get_header(); ?>
<div class="l-inner">
  <div class="l-contact-form">
    <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
    ?>
        <div class="p-form">
          <?php the_content(); ?>
        </div>
    <?php
      endwhile;
    endif;
    ?>
  </div>
</div>

<?php get_footer(); ?>