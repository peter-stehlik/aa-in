<?php get_header('head'); ?>
    <?php get_header('html'); ?>

	<div class="flex">		
        <?php get_sidebar(); ?>

		<main class="flex-1 lg:ml-60 px-4 lg:px-16 pt-20">
			<div class="container border-neutral-500 border-b border-dotted mb-8 lg:mb-16">
				<div class="flex flex-col lg:flex-row lg:items-center">
					<div class="px-8 mb-4 lg:mb-0">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/Ikona.svg" alt="<?php the_title(); ?>">
					</div>
					
					<div class="mb-8 lg:mb-0">
						<h1 class="text-4xl lg:text-6xl text-primary">Chyba 404: stránka nenájdená</h1>
					</div>
				</div>
			</div>

			<div class="container">
				<p>Skontrolujte si URL adresu alebo využite navigáciu.</p>
			</div>
		</main>
	</div>
	
	<?php get_footer("html"); ?>

<?php get_footer("foot"); ?>