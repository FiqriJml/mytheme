<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
        <h1><?php bloginfo('name'); ?></h1>
        <p><?php bloginfo('description'); ?></p>
        <nav>
            <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
        </nav>
    </header>
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
    <footer>
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
    </footer>
    <?php wp_footer(); ?>
</body>

</html>