<?php 
	// create a init array of $query
	$query['post_type']	= "products_store";
	$query['posts_per_page'] = -1;

	$product = new WP_Query($query);

	if($product->have_posts()):
		while($product->have_posts()): $product->the_post();

		// array of product_values
		setlocale(LC_MONETARY, 'en_US');
		$item['product_id'] = $post->ID; // get the product-id
		$item['product_name'] = get_the_title(); // set the title of the product
		$item['sku'] = strtoupper(md5($item['product_id'])); // change the sku to uppercase and hidden chars
		$item['default_currency']	= "$";
		$item['product_img_default_height'] = 250;
		$item['product_img_default_width']	= 250;
		$item['short_summary']	= get_field('summary');
		$item['product_new_price'] = get_field("price") ? $item['default_currency'].number_format(get_field('price')) : "No Price Stated";
		$item['product_old_price'] = get_field("old_price") ? $item['default_currency'].number_format(get_field('old_price')) : "No Price Stated";;
		$item['product_availability']	= get_field('availability');
		$item['default_btn_name'] = "Get More Details";
?>

			<div class="col-md-4 col-sm-6">
				<div class="product-card __sku" data-sku="<?php echo $item['sku']; ?>">
					<a href="" class="product-card-link">
						<!-- <div class="clearfix"></div> -->
						<div class="product-image default-state">
							<?php
								if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
							?>
								<?php
									$image_id = get_post_thumbnail_id();
									$image_url_big = wp_get_attachment_image_src($image_id,'parallax-one-post-thumbnail-big', true);
									$image_url_mobile = wp_get_attachment_image_src($image_id,'parallax-one-post-thumbnail-mobile', true);
								?>
						 		<picture itemscope itemprop="image">
									<source media="(max-width: 300px)" srcset="<?php echo esc_url($image_url_mobile[0]); ?>">
									<img src="<?php echo esc_url($image_url_big[0]); ?>" alt="<?php echo $item['short_summary']; ?>"">
								</picture>
							<?php
								} else {
							?>
						 		<picture itemscope itemprop="image">
									<source media="(max-width: 300px)" srcset="<?php echo parallax_get_file('/images/no-thumbnail-mobile.jpg');?> ">
									<img src="<?php echo parallax_get_file('/images/no-thumbnail.jpg'); ?>" alt="<?php echo $item['short_summary']; ?>"">
								</picture>
							<?php } ?>
						</div>
						<h2 class="product-title">
							<span class="product-name"> <?php echo $item['product_name']; ?> </span>
							<span class="product-short-summary"> <?php // echo $item['short_summary']; ?> </span>
						</h2>
						<span class="price-box">
							<span class="price new-price">
								<span class="ltr" data-price="<?php echo $item['product_new_price']; ?>"> <?php echo $item['product_new_price']; ?> </span>
							</span>
							<span class="price old-price">
								<span class="ltr" data-price="<?php echo $item['product_old_price']; ?>"> <?php echo $item['product_old_price']; ?> </span>
							</span>
						</span>
						<a href="" class="btn btn-danger btn-product" data-sku="<?php echo $item['sku']; ?>" title="<?php the_title_attribute(); ?>" rel="ogolord-product <?php the_title(); ?>"  target="__blank">
							<?php echo $item['default_btn_name']; ?>
						</a>
					</a>
				</div>
<!-- 
				<div  class="sku -gallery"  data-sku="GE779MT1KQK26NAFAMZ"     > <a  class="link" href="https://www.jumia.com.ng/generic-qt-3g-tablet-pc-9.6-hd-android-4.4-dual-sim-otg-16gb-uk-pink-5579259.html">  <div class="top"> </div>  <div class="image-wrapper default-state"><img class="lazy image" alt="QT - 3G Tablet PC 9.6&amp;quot; HD Android 4.4 Dual SIM OTG 16GB UK - Pink" data-image-vertical="1" width="210" height="262" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-sku="GE779MT1KQK26NAFAMZ" data-src="https://static.jumia.com.ng/p/generic-3240-9529755-1-catalog_grid_3.jpg" data-placeholder="placeholder_m_1.jpg"><noscript><img src="https://static.jumia.com.ng/p/generic-3240-9529755-1-catalog_grid_3.jpg" width="210" height="262" class="image" /></noscript></div> <h2 class="title"><span class="brand ">Generic&nbsp;</span> <span class="name"  dir="ltr">QT - 3G Tablet PC 9.6&quot; HD Android 4.4 Dual SIM OTG 16GB UK - Pink</span></h2><span class="sale-flag-percent">-15%</span>  <span class="price-box"> <span class="price "><span data-currency-iso="NGN" >&#8358;</span> <span dir="ltr" data-price="28710">28,710</span> </span>   <span class="price -old "><span data-currency-iso="NGN" >&#8358;</span> <span dir="ltr" data-price="33780">33,780</span> </span> </span>   <div class="rating-stars"   ><div class="stars-container"><div class="stars" style="width: 100%"></div></div> <div class="total-ratings">(1)</div> </div>       <div class="list -sizes" data-selected-sku="">  </div>      <button      class="osh-btn -primary -add-to-cart js-link js-add_cart_tracking" data-emit-event="cart-item.add" data-js-uri="https://www.jumia.com.ng/ajax/cart/add/?return=json&keepMessages=false&sku=GE779MT1KQK26NAFAMZ-3628438" data-sku="GE779MT1KQK26NAFAMZ" data-sku-simple="GE779MT1KQK26NAFAMZ-3628438" data-add-to-cart-type="catalogPage" >  <span class="label " >Buy now</span>    </button>    <div data-href="https://www.jumia.com.ng/ajax/reminder/getreminderform/sku/GE779MT1KQK26NAFAMZ/" class="osh-popup -template -checkout link hidden js-back-in-stock-reminder-popup-GE779MT1KQK26NAFAMZ" data-style="back-in-stock-reminder" data-type="ajax" data-title="Please notify me when this product is available again" data-open-callback="popup.BackInStockReminder.open" data-close-callback=""></div> </a></div> -->
			</div>

<?php 
		endwhile;
	else:
		echo "No products to show";
	endif;
?>