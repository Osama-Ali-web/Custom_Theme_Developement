     <?php
        /*
      * Template Name: Custom Product Archive
      */
        get_header();
        ?>
     <!-- Your archive content here -->
     <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
        ?>
             <h2><?php the_title(); ?></h2>
             <p><?php the_excerpt(); ?></p>
     <?php
            endwhile;
        endif;
        ?>



     <?php get_footer(); ?>