<?php

	$item['product_id'] = $post->ID; // get the product-id
	$item['product_name'] = get_the_title(); // set the title of the product
	$item['sku'] = strtoupper(md5($item['product_id'])); // change the sku to uppercase and hidden chars
	$item['default_currency']	= "$";
	$item['product_img_default_height'] = 250;
	$item['product_img_default_width']	= 250;
	$item['short_summary']	= get_field('summary');
	$item['product_new_price'] = get_field("price") ? $item['default_currency'].number_format(get_field('price')) : "No Price Stated";
	$item['product_old_price'] = get_field("old_price") ? $item['default_currency'].number_format(get_field('old_price')) : "";;
	$item['product_availability']	= get_field('availability');
	$item['default_btn_name'] = "Get More Details";
	$item['shipping_port'] = get_field('shipping');
	$item['gallery']	= get_field('gallery');

	extract($item);

	?>

<!-- image -->
<div class="col-md-6">
	<?php echo $gallery; ?>
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

		<h3 style="margin:0">F.O.B Price:  <small> <s> <?php echo $product_old_price; ?> </s> </small>  <?php echo $item['product_new_price']; ?> </h3>
		<div style="max-height:300px;overflow-x:auto;">
			<p class="lead">
				<h4 style="margin-bottom:5px; "> Product Summary </h4>
				<div class="colored-line-left"></div>
				<div class="clearfix"></div>
				<?php echo $short_summary; ?>
			</p>
		</div>

		<blockquote class="bg-warning">
		  <p>Shipping is done From :<?php echo $shipping_port; ?> </p>
		  <p> Our <span class="text-primary">Products</span> are always <span class="text-info">Delivered </span> on Time, Delivered in the <span class="text-success">Best</span> of Conditions, why not place a <a href="<?php echo network_site_url('/contact-us/'); ?>" class="text-primary text-capitalize"> <u> free quote on us now!  </u> </a> </p>
		</blockquote>
		<div class="clearfix"></div>
		<a href="<?php echo network_site_url('/contact-us/'); ?>" class="btn btn-danger btn-product"> Get A Free Quote Now</a>
			
		</div><!-- .entry-content -->

	</article><!-- #post-## -->
</div>

<div class="clearfix"></div>
<br>
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
  <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
  <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <h3>HOME</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam accusantium, ab dignissimos nam ut harum! Odit, architecto saepe? Veniam corrupti alias, suscipit veritatis voluptate molestiae consequatur repudiandae quos nobis nulla! Dicta distinctio molestiae suscipit harum nostrum blanditiis facilis quasi dolorum quo nesciunt eius explicabo laudantium, non sint repellendus, culpa sunt minus debitis, adipisci dolores fugiat! Rerum consequuntur, dolorum quaerat suscipit possimus nam quod tenetur, quisquam repellendus et nostrum, voluptatum explicabo aspernatur cumque debitis saepe expedita, numquam ex deleniti odio. Adipisci vitae cumque aperiam sapiente laudantium fugit maiores, eos iste quam ipsa quas quaerat dignissimos delectus, eum sequi ratione sed iure quis. Eos expedita accusamus, explicabo. Amet a adipisci officia asperiores quam officiis, nam, corporis at saepe facilis, quod laborum laboriosam ipsam facere dignissimos voluptas, fugit iusto nisi natus veritatis tenetur dolor. Minus molestias, nemo, illo praesentium expedita illum vitae ratione! Quo nemo, accusantium, cum itaque maxime unde doloribus voluptatibus praesentium eveniet placeat laboriosam quia quasi nobis optio dignissimos quae nulla, minus blanditiis labore doloremque cumque iusto. Magni doloribus necessitatibus autem nemo excepturi reprehenderit iste, at alias dolore eum itaque, labore voluptatibus veniam sunt eos doloremque odio et iure in consectetur, blanditiis natus quia mollitia pariatur. Aliquid quidem sequi unde nam.</p>
  </div>
  <div id="menu1" class="tab-pane fade">
    <h3>Menu 1</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque repellat ratione ea magni autem doloribus minima, alias temporibus beatae fugit est nihil atque, natus accusamus incidunt quibusdam at. Impedit molestias eligendi corporis sint at, facilis, voluptates inventore officiis unde voluptatem saepe odit omnis suscipit expedita repellat nemo sapiente necessitatibus alias, aperiam ipsa ad eum. Doloremque itaque pariatur voluptatem aliquam velit ea sapiente odit dignissimos soluta consequatur nobis rerum id fugiat autem repudiandae unde cupiditate dolorem quas ipsum non beatae deserunt, facilis repellendus. Hic odit neque, nostrum consectetur? Quae dicta cum repellat vero ab impedit hic voluptate nostrum autem! Distinctio, voluptas!.</p>
  </div>
  <div id="menu2" class="tab-pane fade">
    <h3>Menu 2</h3>
    <p>Some content in menu 2.</p>
  </div>
</div>