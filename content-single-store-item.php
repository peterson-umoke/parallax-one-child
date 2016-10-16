<?php

	$item['product_id'] = $post->ID; // get the product-id
	$item['product_name'] = get_the_title(); // set the title of the product
	$item['sku'] = strtoupper(md5($item['product_id'])); // change the sku to uppercase and hidden chars
	$item['default_currency']	= "<i class='fa fa-usd'></i>";
	$item['product_img_default_height'] = 250;
	$item['product_img_default_width']	= 250;
	$item['short_summary']	= get_field('summary');
	$item['product_new_price'] = get_field("price") ? $item['default_currency'].number_format(get_field('price')) : "No Price Stated";
	$item['product_old_price'] = get_field("old_price") ? $item['default_currency'].number_format(get_field('old_price')) : "";;
	$item['product_availability']	= get_field('availability') ? "<i class='fa fa-check-circle'></i> In Stock" : "<i class='fa fa-times-circle'></i>  Out Of Stock" ;
	$item['product_availability_class']	= get_field('availability') ? "success" : "danger" ;
	$item['default_btn_name'] = "Get More Details";
	$item['shipping_port'] = get_field('shipping_port');
	$item['gallery']	= get_field('gallery');
	$item['content']	= get_field('content');

	extract($item);

	?>

<!-- image -->
<div class="col-md-6">

	<script>
		jQuery(document).ready(function($){
			$(window).load(function() {
			  // The slider being synced must be initialized first
			  $('#carousel').flexslider({
			    animation: "slide",
			    controlNav: false,
			    animationLoop: true,
			    slideshow: false,
			    itemWidth: 210,
			    itemMargin: 5,
			    asNavFor: '#slider',
			    minItems: 2,
			    maxItems: 4
			  });
			 
			  $('#slider').flexslider({
			    animation: "slide",
			    controlNav: false,
			    animationLoop: true,
			    slideshow: false,
			    sync: "#carousel"
			  });
			});
		});
	</script>
	
	<div class="product-meta">
		<div id="slider" class="flexslider">
		  <ul class="slides">
		 
			 <?php 
				$main_slider = explode(",",$gallery); // get the id of the whole inner gallery
				$image_id = get_post_thumbnail_id();  // the id of the current post_thumnbnail
				array_unshift($main_slider, $image_id); // add the current featured image with the array made from above
				$arrlength = count($main_slider);
				if(has_post_thumbnail() and $arrlength > 2):
			?>
					<?php for($x = 0; $x < $arrlength; $x++) {
					    $image_url_big = wp_get_attachment_image_src($main_slider[$x],"", true);
					    $image_url_mobile = wp_get_attachment_image_src($main_slider[$x],'parallax-one-post-thumbnail-mobile', true);
					?>
				    <li>
						<img style="max-height:300px;" class="img-responsive" src="<?php echo esc_url($image_url_big[0]); ?>" alt="<?php the_title_attribute(); ?>">
				    </li>
					<?php } ?>
				<?php
				else:

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
						<?php }

				endif;
			?>
		  </ul>
		</div>

		<div class="available-tag alert fade in alert-<?php echo $product_availability_class; ?>">
			<?php echo $product_availability; ?>
		</div>
	</div>

	<div id="carousel" class="flexslider">
	  <ul class="slides">
	 
		 <?php 
			$carousel = explode(",",$gallery); // get the id of the whole inner gallery
			$image_id = get_post_thumbnail_id();  // the id of the current post_thumnbnail
			array_unshift($carousel, $image_id); // add the current featured image with the array made from above
			$arrlength = count($carousel);

			if(has_post_thumbnail() and $arrlength > 2):
		?>
				<?php for($x = 0; $x < $arrlength; $x++) {
				    $image_url_big = wp_get_attachment_image_src($carousel[$x],"", true);
				    $image_url_mobile = wp_get_attachment_image_src($carousel[$x],'parallax-one-post-thumbnail-mobile', true);
				?>
			    <li>
					<img style="max-height:100px;" class="img-responsive" src="<?php echo esc_url($image_url_big[0]); ?>" alt="<?php the_title_attribute(); ?>">
			    </li>
				<?php } ?>
			<?php
			else:

			endif;
		?>
	  </ul>
	</div>

</div>

<!-- product summary -->
<div class="col-md-6">
	<article id="post-<?php the_ID(); ?>" <?php post_class('content-single-page'); ?>>
		<header class="entry-header single-header">
			<?php the_title( '<h1 itemprop="headline" class="entry-title single-title"><strong>', '</strong></h1>' ); ?>
			<div class="colored-line-left"></div>
			<div class="clearfix"></div>
		</header><!-- .entry-header -->

		<div itemprop="text" class="entry-content">

		<h3 style="margin:0">F.O.B Price:  <small> <s> <?php echo $product_old_price; ?> </s> </small>  <u><?php echo $item['product_new_price']; ?> </u> </h3>

		<div class="text-<?php echo $product_availability_class; ?> fade in"> <abbr title="<?php echo $product_availability; ?>"> <?php echo $product_availability; ?> </abbr> </div>

		<div style="max-height:300px;overflow-x:auto;">
			<p class="lead">
				<h4 style="margin-bottom:5px; "> Product Summary </h4>
				<div class="colored-line-left"></div>
				<div class="clearfix"></div>
				<?php echo $short_summary; ?>
			</p>
		</div>

		<blockquote class="bg-warning">
		  <p>Shipping is done From : <?php echo $shipping_port; ?> </p>
		  <p> Our <span class="text-primary">Products</span> are always <span class="text-info">Delivered </span> on Time, Delivered in the <span class="text-success">Best</span> of Conditions, why not place a <a href="<?php echo network_site_url('/contact-us/'); ?>" class="text-primary text-capitalize"> <u> free quote on us now!  </u> </a> </p>
		</blockquote>
		<div class="clearfix"></div>
		<a href="<?php echo network_site_url('/contact-us/'); ?>" class="btn btn-danger btn-product"> Get A Free Quote Now</a>
			
		</div><!-- .entry-content -->

	</article><!-- #post-## -->
</div>

<div class="clearfix"></div>
<br>
<ul class="nav nav-tabs nav-pills product-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Product Description</a></li>
  <li ><a data-toggle="tab" href="#menu1">Reviews</a></li>
</ul>

<div class="tab-content product-tab-content">
  <div id="home" class="tab-pane fade in active">
    <h3>Product Description</h3>
    <p> <?php echo $content; ?> </p>

    <div class="clearfix"></div>
  </div>
  <div id="menu1" class="tab-pane fade">
    <h3> Be The First To Review this Product, "<?php echo $product_name; ?>" </h3>
    	<?php
			comments_template("/reviews.php");
		?>
  </div>
  <div id="menu2" class="tab-pane fade">
    <h3>Menu 2</h3>
    <p>Some content in menu 2.</p>
  </div>
</div>