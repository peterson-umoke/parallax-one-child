<?php
	$query = array(
			'post_type'	=> 'products_store',
		);

	$item = new WP_Query($query);
?>

<?php while($item->have_posts()):$item->the_post(); ?>

	<single-ogolord-product-item>

		<div class="col-md-6 col-lg-4 col-sm-6 col-xs-12">
			<article itemscope itemprop="blogPosts" itemtype="http://schema.org/BlogPosting" itemtype="http://schema.org/BlogPosting" <?php post_class('border-bottom-hover blog-post-wrap'); ?> title="<?php printf( esc_html__( 'Blog post: %s', 'parallax-one' ), get_the_title() )?>">
				<?php parallax_hook_entry_top(); ?>
				<header class="entry-header">

						<div class="post-img-wrap">
						 	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >

								<?php
									if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
								?>
									<?php
										$image_id = get_post_thumbnail_id();
										$image_url_big = wp_get_attachment_image_src($image_id,'parallax-one-post-thumbnail-big', true);
										$image_url_mobile = wp_get_attachment_image_src($image_id,'parallax-one-post-thumbnail-mobile', true);
									?>
							 		<picture itemscope itemprop="image">
										<source media="(max-width: 600px)" srcset="<?php echo esc_url($image_url_mobile[0]); ?>">
										<img src="<?php echo esc_url($image_url_big[0]); ?>" alt="<?php the_title_attribute(); ?>">
									</picture>
								<?php
									} else {
								?>
							 		<picture itemscope itemprop="image">
										<source media="(max-width: 600px)" srcset="<?php echo parallax_get_file('/images/no-thumbnail-mobile.jpg');?> ">
										<img src="<?php echo parallax_get_file('/images/no-thumbnail.jpg'); ?>" alt="<?php the_title_attribute(); ?>">
									</picture>
								<?php } ?>

							</a>

							<?php
							if( function_exists( 'cwppos_calc_overall_rating' ) ) {
								$review_score = cwppos_calc_overall_rating( get_the_ID() );
								if( !empty( $review_score['overall'] ) ) {
									$review_score = $review_score['overall'];
									if ( !empty( $review_score ) ) {
										echo '<div class="wppr-rating-wrap">';
										echo '<div class="wppr-rating-wrap-text">' . esc_html__( 'Rating', 'parallax-one' ) . '</div>';
										echo '<div class="wppr-rating-wrap-score">' . ( floor( $review_score ) / 10 ) . '</div>';
										echo '</div>';
									}
								}
							}
						?>

						</div>

						<div class="entry-meta text-small list-post-entry-meta bg-info">
						<?php

						?>
							<table class=" ">
								<tr>
									<td>Product</td>
									<td> <?php the_title(); ?> </td>
								</tr>
								<tr>
									<td> F.O.B Price</td>
									<td> 
										<?php $value = get_field( "price" );

											if( $value ) {
											    
											    echo "$".$value;

											} else {

											    echo 'No Price Given Yet';
											    
											} ?>
									 </td>
								</tr>
								<tr>
									<td> Availability</td>
									<?php
									$item['product_availability']	= get_field('availability') ? "<i class='fa fa-check-circle'></i> In Stock" : "<i class='fa fa-times-circle'></i>  Out Of Stock" ;
	$item['product_availability_class']	= get_field('availability') ? "success" : "danger" ; ?>
									<td> <div class="text-<?php echo $product_availability_class; ?> fade in"> <abbr title="<?php echo $product_availability; ?>"> <?php echo $product_availability; ?> </abbr> </div> </td>
								</tr>
								<tr>
									<td colspan="2"> <a href="<?php the_permalink(); ?>" rel="<?php the_title(); ?>-product-link" title="<?php the_title_attribute(); ?>" class="btn btn-success" target="_blank"> More Details </a> </td>
								</tr>
							</table>
						</div><!-- .entry-meta -->
						<div class="clearfix"></div>


				</header><!-- .entry-header -->

				<?php parallax_hook_entry_bottom(); ?>
			</article><!-- #post-## -->
			<br/>
		</div>
	</single-ogolord-product-item>

<?php
endwhile;
// wp_reset_post_meta();
?>