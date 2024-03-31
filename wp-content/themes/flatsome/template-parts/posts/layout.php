<?php
/**
 * Posts layout.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

do_action('flatsome_before_blog');
?>

<?php if(!is_single() && get_theme_mod('blog_featured', '') == 'top'){ get_template_part('template-parts/posts/featured-posts'); } ?>
<div class="row align-center">
	<div class="large-12 col">
	<?php if(!is_single() && get_theme_mod('blog_featured', '') == 'content'){ get_template_part('template-parts/posts/featured-posts'); } ?>

	<?php
		if(is_single()){
			get_template_part( 'template-parts/posts/single');
			comments_template();
		} elseif(get_theme_mod('blog_style_archive', '') && (is_archive() || is_search())){
			get_template_part( 'template-parts/posts/archive', get_theme_mod('blog_style_archive', '') );
		} else{
			get_template_part( 'template-parts/posts/archive', get_theme_mod('blog_style', 'normal') );
		}
	?>
	</div>

</div>

<?php do_action('flatsome_after_blog');?>
<div class="box-bvlq">
	<div class="container">
		<?php
/*
 * Code hiển thị bài viết liên quan trong cùng 1 category
 */
$categories = get_the_category(get_the_ID());
if ($categories){
    echo '<div class="bai-viet-lien-quan">';
    $category_ids = array();
    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
    $args=array(
        'category__in' => $category_ids,
        'post__not_in' => array(get_the_ID()),
        'posts_per_page' => 8, // So bai viet dc hien thi
    );
    $my_query = new wp_query($args);
    if( $my_query->have_posts() ):
        echo '<h3>Bài viết cùng chủ đề:</h3>
        <ul class="list-bai-viet">';
        while ($my_query->have_posts()):$my_query->the_post();
            ?>
            <li>
           
            <div class="box-image">
                 <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('large'); ?></a>
            </div>
             <a href="<?php the_permalink() ?>"><h4 class="tieu-de-bai-viet"><?php the_title(); ?></h4>
                        </a>
				<div class="thong-tin-meta">
	<span class="luot-xem">
<i class="fa fa-eye" aria-hidden="true"></i> <?php echo getPostViews(get_the_ID()); ?> </span><span class="ngay-dang-bai"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo get_the_date();?></span>
</div>
            </li>
            <?php
        endwhile;
        echo '</ul>';
    endif; wp_reset_query();
    echo '</div>';
}
?>
	</div>
</div>

