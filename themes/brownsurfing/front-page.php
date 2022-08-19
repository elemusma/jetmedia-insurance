<?php get_header();

// start of intro
if(have_rows('intro_content')): while(have_rows('intro_content')): the_row();
if(have_rows('icons')):
echo '<section class="pt-5 pb-5 position-relative">';
echo '<div class="container">';
echo '<div class="row">';

while(have_rows('icons')): the_row();
$svgCode = get_sub_field('svg_code');
$title = get_sub_field('title');
$description = get_sub_field('description');
$link = get_sub_field('link');
$link_url = $link['url'];
$link_title = $link['title'];
$link_target = $link['target'] ? $link['target'] : '_self';

echo '<div class="col-lg-2 col-md-3 text-center col-icons" style="">';

echo '<div class="m-auto w-auto col-icons-svg pb-4" style="">';
echo '<div class="m-auto col-icons-border">';
echo $svgCode;
echo '</div>';
echo '</div>';

echo '<h6>' . $title . '</h6>';
echo $description;
echo '<a class="bg-accent btn text-white" href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . esc_html( $link_title ) . '</a>';

echo '</div>';
endwhile;

echo '</div>';
echo '</div>';
echo '</section>';
endif;
endwhile; endif;
// end of intro

// start of content
// end of content


// how to use new image hover effect
echo '<div class="col-6 col-intro-gallery col mb-1 p-1 overflow-h">';
echo '<div class="position-relative img-hover w-100">';
echo '<a href="' . wp_get_attachment_image_url($image['id'], 'full') . '" data-lightbox="image-set">';
echo wp_get_attachment_image($image['id'], 'full','',['class'=>'w-100 image-intro-gallery','style'=>'object-fit:cover;']);
echo '</a>';
echo '</div>';
echo '</div>';

// popup trigger
echo '<span class="btn bg-white text-accent apply-now open-modal" id="apply-now" style="">Apply Now</span>';

// popup content
echo '<div class="modal-content apply-now position-fixed w-100 h-100 z-3">';
echo '<div class="bg-overlay"></div>';
echo '<div class="bg-content">';
echo '<div class="bg-content-inner">';
echo '<div class="close" id="">X</div>';
echo '<div>';
echo get_field('popup_content');
echo '</div>';
echo '</div>';

echo '</div>';
echo '</div>';

get_footer(); ?>