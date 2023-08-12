<?php

echo '<section class="position-relative ' . get_field('classes') . '" style="padding:50px 0;' . get_field('style') . '" id="' . get_field('id') . '">';

echo get_template_part('partials/bg-img');

echo '<div class="container">';

if(have_rows('content_top')): while(have_rows('content_top')): the_row();
echo '<div class="row justify-content-center" style="">';
echo '<div class="col-lg-9 ' . get_sub_field('column_classes') . '" style="' . get_sub_field('column_style') . '" data-aos="fade-up">';

echo get_sub_field('content');

echo '</div>';
echo '</div>';
endwhile; endif;

echo '<div class="row row-content justify-content-center ' . get_field('row_classes') . '" style="' . get_field('row_style') . '">';

if(have_rows('columns_repeater')): while(have_rows('columns_repeater')): the_row();
echo '<div class="' . get_sub_field('column_classes') . '" style="' . get_sub_field('column_style') . '" data-aos="fade-up">';

echo get_sub_field('content');

echo '</div>';
endwhile; endif;

echo '</div>';

if(have_rows('content_bottom')): while(have_rows('content_bottom')): the_row();
echo '<div class="row justify-content-center" style="">';
echo '<div class="col-lg-9 ' . get_sub_field('column_classes') . '" style="' . get_sub_field('column_style') . '" data-aos="fade-up">';

echo get_sub_field('content');

echo '</div>';
echo '</div>';
endwhile; endif;

echo '</div>';
echo '</section>';

 ?>