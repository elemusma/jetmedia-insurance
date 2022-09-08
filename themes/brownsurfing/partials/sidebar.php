<div class="col-md-3 sidebar order-2 order-md-1">
<div class="card p-3 mb-2">
<?php get_search_form(); ?>
</div>
<?php 
// echo '<div class="card p-3 mt-2 mb-2">';

// echo '<h3>Categories</h3>';
// echo '<ul>';
// wp_list_categories( array('taxonomy' => 'product_cat', 'title_li'  => '') );
// echo '</ul>';

// echo '</div>';
?>

<div class="card p-3 mt-2 mb-2">
<h3 class="teko">Recent Posts</h3>
<?php
$recentBlog = new WP_Query(array(
'posts_per_page' => 5,
'post_type' => 'post'
)); ?>
<ul>
<?php while($recentBlog->have_posts()){
$recentBlog->the_post(); ?>
<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php } wp_reset_postdata(); ?>
</ul>
</div>
<!-- <div class="card p-3 mt-2 mb-2">
<h3 class="teko">Archives</h3>
<ul>
<?php wp_get_archives(); ?>
</ul>
</div> -->
</div>