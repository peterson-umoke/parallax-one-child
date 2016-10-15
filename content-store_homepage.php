<?php 
	// create a init array of $query
	$query['post_type']	= "products_store";
	$query['posts_per_page'] = -1;

	$product = new WP_Query($query);

	if($product->have_posts()):
		while($product->have_posts()): $product->the_post();
?>

			div.product-card.__sku[data-sku=""]>a.product-card-link[href=""]>div.clearfix+(div.product-image.default-state>img.image-responsive.laxy-image[alt="" width="250" height="250" src="" data-placeholder=""])+(h2.title>span.product-name+span.product-short-summary)+(span.price-box>(span.price.new-price>span.currency-sign{$}+span.ltr[data-price=""])+(span.price.old-price>span.currency-sign{$}+span.ltr[data-price=""]))+a.btn.btn-danger.btn-product[data-sku="" href="" title="" rel="ogolord-product <?php the_title(); ?>"]

<?php 
		endwhile;
	else:
		echo "No products to show";
	endif;
?>