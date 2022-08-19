<?php 

if(have_rows('social_icons','options')): 
    echo '<div class="si d-flex flex-wrap justify-content-end">';
    while(have_rows('social_icons','options')): the_row(); 
$svgOrImg = get_sub_field('svg_or_image');
$socialLink = get_sub_field('link');
$svg = get_sub_field('svg');
$image = get_sub_field('image');
$bgColor = get_sub_field('background_color');

$socialLink_url = $socialLink['url'];
$socialLink_title = $socialLink['title'];
$socialLink_target = $socialLink['target'] ? $socialLink['target'] : '_self';

echo '<a href="' . $socialLink_url . '" target="' . $socialLink_target . '" style="text-decoration:none;background:' . $bgColor . '" class="si-icon-link col pt-3 pb-3 overflow-h">';

echo '<div class="position-absolute w-100 h-100 bg-black overlay-si" style="top:-100%;left:0;opacity:.2;transition:all .25s ease-in-out;"></div>';

if($svgOrImg == 'SVG') {

echo '<div class="svg-icon m-auto position-relative">';
echo $svg;
echo '</div>';
} elseif($svgOrImg == 'Image') {

echo wp_get_attachment_image($image['id'],'full','',['class'=>'img-si']);

}
echo '</a>';

endwhile; 

echo '</div>';
endif; 
?>