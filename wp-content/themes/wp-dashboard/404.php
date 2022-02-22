<?php get_header('head'); ?>
<body <?php body_class(); ?>>
    <?php get_header('html'); ?>

	<div class="flex h-screen">		
        <?php get_sidebar(); ?>

		<main class="flex-1 lg:ml-60 px-4 lg:px-8 pt-20">
			<div class="container flex flex-col mx-auto lg:mx-0">
                <div class="prose prose-a:text-secondary hover:prose-a:no-underline xl:w-3/4 lg:pt-8 pb-20 mx-auto">
                    <h1 class="mb-2">Chyba 404: stránka nenájdená</h1>

                    <p>Skontrolujte si URL adresu alebo využite navigáciu.</p>
                </div>

				<?php get_footer("html"); ?>
			</div>
		</main>
	</div>


<?php get_footer("foot"); ?>