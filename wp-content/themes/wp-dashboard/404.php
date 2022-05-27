<?php get_header('head'); ?>
    <?php get_header('html'); ?>

	<div class="flex">		
        <?php get_sidebar(); ?>

		<main class="flex-1 xl:ml-60 px-4 xl:px-16 pt-20">
			<?php echo get_template_part("template-parts/content", "desktop-subnav"); ?>

			<div class="container border-neutral-500 border-b border-dotted mb-8 xl:mb-16">
				<div class="flex flex-col xl:flex-row xl:items-center">
					<div class="px-8 mb-4 xl:mb-0">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/Ikona.svg" alt="<?php the_title(); ?>">
					</div>
					
					<div class="mb-8 xl:mb-0">
						<h1 class="text-4xl xl:text-6xl text-primary"><?php _e("Chyba 404: stránka nenájdená", "intranetaa"); ?></h1>
					</div>
				</div>
			</div>

			<div class="container">
				<p><?php _e("Skontrolujte si URL adresu alebo využite navigáciu", "intranetaa"); ?>.</p>
			</div>
		</main>
	</div>
	
	<?php get_footer("html"); ?>

<?php get_footer("foot"); ?>