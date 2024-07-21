<?php get_header(); ?>

<main>
    <?php
    if (have_posts()):
        while (have_posts()):
            the_post();
            get_template_part('template-parts/content', get_post_format());
        endwhile;
    else:
        echo '<p>No content found</p>';
    endif;
    ?>
</main>

<?php get_footer(); ?>