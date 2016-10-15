<?php

/**
* Template Name: Products Store
* @version 3.2.1
* @package ogolord-theme
* @author Peterson Nwachukwu Umoke
*/

	get_header();
?>

	</div>
	<!-- /END COLOR OVER IMAGE -->
	<?php parallax_hook_header_bottom(); ?>
</header>
<!-- /END HOME / HEADER  -->
<?php parallax_hook_header_after(); ?>
<div class="content-wrap">
	<div class="container">

		<div id="primary" class="content-area col-md-12 <?php if( empty( $page_title ) ){ echo 'parallax-one-top-margin-5px'; } ?>">
			<main id="main" class="site-main" role="main">
				<?php parallax_hook_page_before();?>
					<br/>

					<?php $page_title = get_the_title(); ?>
					<h1 class="entry-title single-title" itemprop="headline" > <?php echo $page_title; ?> </h1>
					<div class="colored-line-left"></div>
					<div class="clearfix"></div>
					<div class="clearfix"></div>

					<br/>
					<?php get_template_part( 'content', 'store_homepage' ); ?>
				<?php parallax_hook_page_after();?>
			</main><!-- #main -->
		</div><!-- #primary -->

	</div>
</div><!-- .content-wrap -->

<?php get_footer(); ?>