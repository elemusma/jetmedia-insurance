<footer>
<?php echo get_template_part('partials/si'); ?>
<section class="bg-accent-secondary pt-5 pb-5">
<div class="container">
<div class="row">
<?php 
echo '<div class="col-12 text-center pb-5">';

wp_nav_menu(array(
    'menu' => 'footer',
    'menu_class'=>'menu  list-unstyled text-white text-uppercase d-flex justify-content-center'
    ));
    
echo '</div>';
echo '<div class="col-lg-4 col-md-6">';
    echo get_field('map','options');
echo '</div>';

echo '<div class="col-lg-8 col-12 text-white">';
echo get_field('website_message','options'); 
echo '</div>';

// echo '<div class="col-12 text-center">';


// echo '</div>';
echo '</div>';
echo '</div>';
echo '</section>';

echo '<section class="bg-black text-white pt-2 pb-2">';

echo '<div class="container">';
echo '<div class="row">';
echo '<div class="col-12">';
echo '<p class="mb-0"><small><em>Copyright ©' . date("Y") . '. Please do not copy any of the text, images or any of the other content in this website.</em></small></p>';




echo '</div>';
echo '</div>';
echo '</div>';
echo '</section>';

echo '</footer>';

if(get_field('footer', 'options')) { the_field('footer', 'options'); } ?>
<?php wp_footer(); ?>
</body>
</html>