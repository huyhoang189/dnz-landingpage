<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
<?php
/**
 * Post-entry title.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

if ( is_single() ) :
	if ( get_theme_mod( 'blog_single_header_category', 1 ) ) :
		echo '<h6 class="entry-category is-xsmall">';
		echo get_the_category_list( __( ', ', 'flatsome' ) );
		echo '</h6>';
	endif;
else :
	echo '<h6 class="entry-category is-xsmall">';
	echo get_the_category_list( __( ', ', 'flatsome' ) );
	echo '</h6>';
endif;

if ( is_single() ) :
	if ( get_theme_mod( 'blog_single_header_title', 1 ) ) :
		echo '<h1 class="entry-title">' . get_the_title() . '</h1>';
		echo '<div class="entry-divider is-divider small"></div>';
	endif;
else :
	echo '<h2 class="entry-title"><a href="' . get_the_permalink() . '" rel="bookmark" class="plain">' . get_the_title() . '</a></h2>';
	echo '<div class="entry-divider is-divider small"></div>';
endif;
?>

<?php
$single_post = is_singular( 'post' );
if ( $single_post && get_theme_mod( 'blog_single_header_meta', 1 ) ) : ?>
	<div class="entry-meta uppercase is-xsmall">
		<?php flatsome_posted_on(); ?>
	</div>
<?php elseif ( ! $single_post && 'post' == get_post_type() ) : ?>
	<div class="entry-meta uppercase is-xsmall">
		<?php flatsome_posted_on(); ?>
	</div>
<?php endif; ?>
<?php $author_id = get_the_author_meta('ID');
$author_url = get_author_posts_url( $author_id );?>
<div class="thong-tin-meta">
	<span class="tac-gia"><i class="fa fa-user-circle-o"></i> Đóng góp bởi: <a href="<?php echo $author_url;?>"><?php the_author_meta( 'display_name' ); ?></a></span> <span class="luot-xem">
<i class="fa fa-eye" aria-hidden="true"></i> <?php echo getPostViews(get_the_ID()); ?> </span><span class="ngay-dang-bai"><i class="fa fa-clock-o" aria-hidden="true"></i> Đăng ngày <?php echo get_the_date();?></span>
	<span class="chia-se"><i class="fa fa-share-alt" aria-hidden="true"></i> Chia sẻ: <?php echo do_shortcode( '[share]' );?></span>
</div>
