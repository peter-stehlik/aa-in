<?php
/*
    Template Name: Team
*/
?>

<?php get_header('head'); ?>
<body <?php body_class(); ?>>
    <?php get_header('html'); ?>

	<div class="flex h-screen">		
        <?php get_sidebar(); ?>

		<main class="flex-1 lg:ml-60 px-4 lg:px-8 pt-20">
            <div class="container flex flex-col">
				<h1 class="md:max-w-[704px] pr-8 md:pr-0 md:mt-5 md:mb-8 text-right md:text-left text-primary text-3xl lg:text-6xl"><?php the_title(); ?></h1>


				<footer class="mt-auto pt-10 pb-4">
					<hr class="mb-4">

					<p class="text-gray-400"> Aardwark 2022 <span class="block lg:inline">&copy; Špecialisti na Enterprise IT riešenia</span></p>
				</footer>
			</div>
		</main>
	</div>


<?php get_footer("foot"); ?>