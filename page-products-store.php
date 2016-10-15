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
					<?php get_template_part( 'content', 'store' ); ?>
				<?php parallax_hook_page_after();?>
			</main><!-- #main -->
		</div><!-- #primary -->

	</div>
</div><!-- .content-wrap -->

<?php get_footer(); ?>