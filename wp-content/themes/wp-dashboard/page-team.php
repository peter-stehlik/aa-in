<?php
/*
    Template Name: Team
*/
?>

<?php get_header('head'); ?>
    <?php get_header('html'); ?>

	<div class="flex">		
        <?php get_sidebar(); ?>

		<main class="relative flex-1 min-h-[85vh] lg:ml-60 px-4 lg:px-8 pt-20">
            <div class="container flex flex-col">
				<h1 class="md:max-w-[704px] pr-8 md:pr-0 md:mt-5 md:mb-8 text-right md:text-left text-primary text-3xl lg:text-6xl"><?php the_title(); ?></h1>
			</div>

			<?php get_footer("html"); ?>
		</main>
	</div>

<?php get_footer("foot"); ?>