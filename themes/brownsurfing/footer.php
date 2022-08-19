<footer>
<?php echo get_template_part('partials/si'); ?>
<section class="bg-accent-secondary pt-5">
<div class="container">
<div class="row">
<?php 
echo '<div class="col-md-2 text-center pb-5">';

wp_nav_menu(array(
    'menu' => 'footer',
    'menu_class'=>'menu  list-unstyled text-white text-uppercase'
    ));
    
echo '</div>';
echo '<div class="col-md-4">';
    echo get_field('map','options');
echo '</div>';

echo '<div class="col-md-4 text-white">';
echo get_field('website_message','options'); 
echo '</div>';

// echo '<div class="col-12 text-center">';


// echo '</div>';
echo '</div>';
echo '</div>';
echo '</section>';

echo '<div class="bg-black text-white text-center pt-2 pb-2">';


echo '<p class="mb-0"><small><em>Copyright ©2022. Please do not copy any of the text, images or any of the other <a title="Affordable custom website development and design in Denver" href="https://brownsurfing.com/" target="_blank" rel="nofollow noreferrer noopener" class="text-white">website development</a>\'s work.</em></small></p>';




echo '</div>';

echo '</footer>';

if(get_field('footer', 'options')) { the_field('footer', 'options'); } ?>
<?php wp_footer(); ?>
</body>
</html>