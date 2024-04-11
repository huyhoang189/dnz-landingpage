<?php
/**
 * Post archive title.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

?>
<section class="section blog-1 dark" id="section_33816847">
		<div class="bg section-bg fill bg-fill bg-loaded">	
	</div>
		<div class="section-content relative">			
<div class="row align-middle" id="row-1374329716">
	<div id="col-1739883268" class="col medium-9 small-12 large-9">
				<div class="col-inner">
					<?php 
$vnkings_cat_id = get_cat_id( single_cat_title("",false) );
// Lấy id của Danh mục hiện tại
?>
					<?php 
$categories = get_categories(
array('child_of' => $vnkings_cat_id,'hide_empty' => 0,'orderby' => 'id', 'order' => 'ASC',)); 
if(!empty($categories)){ ?>
    <ul>
        <?php foreach($categories as $cat){
        if('Uncategorized' != $cat->name){ ?>
            <li><a  href="<?php echo get_category_link($cat->term_id); ?>"  ><?php echo $cat->name; ?></a></li>
        <?php } } ?>      
    </ul>
<?php } else { ?>
    <ul>
        <li class="cat"><a href="<?php echo get_category_link($vnkings_cat_id); ?>"><?php echo get_cat_name($vnkings_cat_id); ?></a></li>
    </ul>
<?php } ?>
		</div></div>
	<div id="col-1612314354" class="col medium-3 small-12 large-3">
				<div class="col-inner">					
<div class="searchform-wrapper ux-search-box relative form-flat is-normal"><form method="get" class="searchform" action="https://trianh.ninhbinhweb.site/" role="search">
		<div class="flex-row relative">
			<div class="flex-col flex-grow">
	   	   <input type="search" class="search-field mb-0" name="s" value="" id="s" placeholder="Nhập từ khóa tìm kiếm">
			</div>
			<div class="flex-col">
				<button type="submit" class="ux-search-submit submit-button secondary button icon mb-0" aria-label="Submit">
					<i class="icon-search"></i>				</button>
			</div>
		</div>
    <div class="live-search-results text-left z-top"></div>
</form>
</div>
		</div>
					</div>

	
</div>
		</div>

		
<style>
#section_33816847 {
  padding-top: 10px;
  padding-bottom: 10px;
}
#section_33816847 .ux-shape-divider--top svg {
  height: 150px;
  --divider-top-width: 100%;
}
#section_33816847 .ux-shape-divider--bottom svg {
  height: 150px;
  --divider-width: 100%;
}
</style>
	</section>
<header class="archive-page-header">
	<div class="row">
	<div class="large-12 text-center col">
		<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
	<h1 class="page-title is-large uppercase">
		<?php

			if ( is_category() ) :
				printf( __( '%s', 'flatsome' ), '<span>' . single_cat_title( '', false ) . '</span>' );

			elseif ( is_tag() ) :
				printf( __( 'Tag Archives: %s', 'flatsome' ), '<span>' . single_tag_title( '', false ) . '</span>' );

			elseif ( is_search() ) :
				printf( __( 'Search Results for: %s', 'flatsome' ), '<span>' . get_search_query() . '</span>' );

			elseif ( is_author() ) :
				/* Queue the first post, that way we know
				 * what author we're dealing with (if that is the case).
				*/
				the_post();
				printf( __( 'Author Archives: %s', 'flatsome' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
				/* Since we called the_post() above, we need to
				 * rewind the loop back to the beginning that way
				 * we can run the loop properly, in full.
				 */
				rewind_posts();

			elseif ( is_day() ) :
				printf( __( 'Daily Archives: %s', 'flatsome' ), '<span>' . get_the_date() . '</span>' );

			elseif ( is_month() ) :
				printf( __( 'Monthly Archives: %s', 'flatsome' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

			elseif ( is_year() ) :
				printf( __( 'Yearly Archives: %s', 'flatsome' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

			elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
				_e( 'Asides', 'flatsome' );

			elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
				_e( 'Images', 'flatsome');

			elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
				_e( 'Videos', 'flatsome' );

			elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
				_e( 'Quotes', 'flatsome' );

			elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
				_e( 'Links', 'flatsome' );

			else :
				_e( '', 'flatsome' );

			endif;
		?>
	</h1>
	<?php
		if ( is_category() ) :
			// show an optional category description
			$category_description = category_description();
			if ( ! empty( $category_description ) ) :
				echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );
			endif;

		elseif ( is_tag() ) :
			// show an optional tag description
			$tag_description = tag_description();
			if ( ! empty( $tag_description ) ) :
				echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
			endif;

		endif;
	?>
	</div>
	</div>
</header>
