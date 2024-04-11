<?php
/**
 * Posts content single.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

?>
<div class="entry-content single-page">

	<?php the_content(); ?>

	<?php
	wp_link_pages();
	?>

	<?php if ( get_theme_mod( 'blog_share', 1 ) ) {
		// SHARE ICONS
		echo '<div class="blog-share text-center">';
		echo '<div class="is-divider medium"></div>';
		echo '<span class="des"><i class="fa fa-share-alt" aria-hidden="true"></i> Chia sẻ bài viết trên:</span>';
	echo do_shortcode( '[share]' );
		echo '</div>';
	} ?>
</div>

<?php if ( get_theme_mod( 'blog_single_footer_meta', 1 ) ) : ?>
	<footer class="entry-meta text-<?php echo get_theme_mod( 'blog_posts_title_align', 'center' ); ?>">
		<?php
		/* translators: used between list items, there is a space after the comma */
		$category_list = get_the_category_list( __( ', ', 'flatsome' ) );

		/* translators: used between list items, there is a space after the comma */
		$tag_list = get_the_tag_list( '', __( ', ', 'flatsome' ) );


		// But this blog has loads of categories so we should probably display them here.
		if ( '' != $tag_list ) {
			$meta_text = __( 'This entry was posted in %1$s and tagged %2$s.', 'flatsome' );
		} else {
			$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'flatsome' );
		}

		printf( $meta_text, $category_list, $tag_list, get_permalink(), the_title_attribute( 'echo=0' ) );
		?>
	</footer>
<?php endif; ?>

<?php if ( get_theme_mod( 'blog_author_box', 1 ) ) : ?>
	<div class="entry-author author-box">
		<div class="flex-row align-top">
			<div class="flex-col mr circle">
				<div class="blog-author-image">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), apply_filters( 'flatsome_author_bio_avatar_size', 90 ) ); ?>
				</div>
			</div>
			<div class="flex-col flex-grow">
				<?php $author_id = get_the_author_meta('ID');
$author_url = get_author_posts_url( $author_id );?>
				<h5 class="author-name uppercase pt-half">
					<a href="<?php echo $author_url;?>"><?php the_author_meta( 'display_name' ); ?></a>
				</h5>
				<p class="author-desc small">
<?php
$author_id = get_the_author_meta('ID');
$author_description = get_the_author_meta('description', $author_id);

echo $author_description;
?>
				</p>
				<a class="xem-chi-tiet-tg" target="blank" href="<?php echo $author_url;?>">Xem chi tiết tác giả</a>
			</div>
		</div>
	</div>
<?php endif; ?>
<div class="xem-them">
    <h3>Xem thêm:</h3>
    <ul>
<?php 
    $postquery = new WP_Query(array('posts_per_page' => 5, 'orderby' => 'rand'));
    if ($postquery->have_posts()) {
    while ($postquery->have_posts()) : $postquery->the_post();
    $do_not_duplicate = $post->ID;
?>
 
<li>
    <a href="<?php the_permalink();?>"><?php the_title();?></a>
</li>
 
<?php endwhile; }  wp_reset_postdata(); ?>  </ul>
 
</div>

<?php if ( get_theme_mod( 'blog_single_next_prev_nav', 1 ) ) :
	flatsome_content_nav( 'nav-below' );
endif; ?>
