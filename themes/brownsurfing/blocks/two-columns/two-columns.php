<?php

echo '<section class="position-relative ' . get_field('classes') . '" style="padding:125px 0;' . get_field('style') . '" id="' . get_field('id') . '">';

echo get_template_part('partials/bg-img');

echo '<div class="container">';

echo '<div class="row row-content justify-content-center ' . get_field('row_classes') . '" style="' . get_field('row_style') . '">';

if(have_rows('content_left')): while(have_rows('content_left')): the_row();
echo '<div class="col-lg-6 ' . get_sub_field('column_classes') . '" style="' . get_sub_field('column_style') . '" data-aos="fade-up">';

echo get_sub_field('content');

echo '</div>';
endwhile; endif;

if(have_rows('content_right')): while(have_rows('content_right')): the_row();
echo '<div class="col-lg-6 ' . get_sub_field('column_classes') . '" style="' . get_sub_field('column_style') . '" data-aos="fade-up">';

echo get_sub_field('content');

echo '</div>';
endwhile; endif;



echo '</div>';
echo '</div>';
echo '</section>';

 ?>