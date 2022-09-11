<?php get_header();

// start of intro
if(have_rows('intro_content')): while(have_rows('intro_content')): the_row();
if(have_rows('icons')):
echo '<section class="pt-5 pb-5 position-relative section-intro">';
echo '<div class="container">';
echo '<div class="row justify-content-center">';

while(have_rows('icons')): the_row();
$svgCode = get_sub_field('svg_code');
$title = get_sub_field('title');

$description = get_sub_field('description');
$link = get_sub_field('link');

if($link):
$link_url = $link['url'];
$link_title = $link['title'];
$link_target = $link['target'] ? $link['target'] : '_self';
endif;

echo '<div class="col-lg-2 col-md-4 col-6 text-center col-icons mb-5" style="">';

echo '<div class="m-auto w-auto col-icons-svg pb-4" style="">';
echo '<div class="m-auto col-icons-border">';
echo $svgCode;
echo '</div>';
echo '</div>';

echo '<h6>' . $title . '</h6>';

if($description):
echo $description;
endif;

if($link):
echo '<a class="bg-accent btn text-white" href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . esc_html( $link_title ) . '</a>';
endif;

echo '</div>';
endwhile;

echo '</div>';
echo '</div>';
echo '</section>';
endif;
endwhile; endif;
// end of intro

// start of content
// if(have_rows('content_section')): while(have_rows('content_section')): the_row();
// $svgCode = get_sub_field('svg_icon');
// $content = get_sub_field('content');
// $bigImg = get_sub_field('big_image');

echo '<section class="pt-5 pb-5 position-relative bg-accent section-content">';
echo '<div class="container">';
echo '<div class="row justify-content-center">';
echo '<div class="col-12 text-white col-icons" style="">';
// echo '<div class="m-auto w-auto col-icons-svg pb-4" style="">';
// echo '<div class="m-auto col-icons-border">';
// echo $svgCode;
// echo '</div>';
// echo '</div>';

// echo $content;

if ( have_posts() ) : while ( have_posts() ) : the_post();
the_content();
endwhile;
endif;

echo '</div>';
echo '</div>';
echo '</div>';
echo '</section>';

if(have_rows('content_section')): while(have_rows('content_section')): the_row();
$svgCode = get_sub_field('svg_icon');
$content = get_sub_field('content');
$bigImg = get_sub_field('big_image');

if($bigImg):

    echo '<section class="bg-attachment" style="background:url(' . wp_get_attachment_image_url($bigImg['id'],'full') . ');background-attachment:fixed;background-size:cover;height:550px;">';
    echo '</section>';

    // echo wp_get_attachment_image($bigImg['id'],'full','',['class'=>'w-100','style'=>'height:500px;object-fit:cover;']);
endif;

endwhile; endif;
// end of content

// start of blog
if(have_rows('blog_content')): while(have_rows('blog_content')): the_row();
$blogPosts = get_sub_field('blog_posts');

if(get_sub_field('content') || $blogPosts):
echo '<section class="pt-5 pb-5 position-relative bg-accent section-content">';
echo '<div class="container">';
echo '<div class="row">';
if(get_sub_field('content')):
    echo '<div class="col-md-9 text-white">';
    echo get_sub_field('content');
    echo '</div>';
    if( $blogPosts ):
        echo '<div class="col-12 pb-4"></div>';
    endif;
endif;
echo '</div>';


if( $blogPosts ):
    echo '<div class="row justify-content-center">';
        foreach( $blogPosts as $post ): 
        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post);
        echo '<div class="col-md-4 mb-4" style="">';
        echo '<div class="position-relative bg-white">';
        echo '<a href="' . get_the_permalink() . '">';
        echo '<div class="position-relative overflow-h img-hover w-100" style="cursor:pointer;">';
        the_post_thumbnail('full',array('class'=>'w-100','style'=>'height:250px;object-fit:cover;'));
        echo '</div>';
        echo '</a>';

        echo '<div class="p-4">';
        echo '<div class="text-gray">';
        the_date();
        echo '</div>';
        echo '<h4>' . get_the_title() . '</h4>';
        echo '</div>';

        echo '</div>';
        echo '</div>';
        endforeach;
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); 
    echo '</div>';
endif;




echo '</div>';
echo '</section>';
endif;

endwhile; endif;
// end of blog


// how to use new image hover effect
// echo '<div class="col-6 col-intro-gallery col mb-1 p-1 overflow-h">';
// echo '<div class="position-relative img-hover w-100">';
// echo '<a href="' . wp_get_attachment_image_url($image['id'], 'full') . '" data-lightbox="image-set">';
// echo wp_get_attachment_image($image['id'], 'full','',['class'=>'w-100 image-intro-gallery','style'=>'object-fit:cover;']);
// echo '</a>';
// echo '</div>';
// echo '</div>';

// // popup trigger
// echo '<span class="btn bg-white text-accent apply-now open-modal" id="apply-now" style="">Apply Now</span>';

// // popup content
// echo '<div class="modal-content apply-now position-fixed w-100 h-100 z-3">';
// echo '<div class="bg-overlay"></div>';
// echo '<div class="bg-content">';
// echo '<div class="bg-content-inner">';
// echo '<div class="close" id="">X</div>';
// echo '<div>';
// echo get_field('popup_content');
// echo '</div>';
// echo '</div>';

// echo '</div>';
// echo '</div>';

get_footer(); ?>