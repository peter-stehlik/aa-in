<?php get_header('head'); ?>
    <?php get_header('html'); ?>

	<div class="flex">		
        <?php get_sidebar(); ?>

		<main class="flex-1 lg:ml-60 px-4 lg:px-8 pt-20">
			<?php
				$archiveTitle = get_the_archive_title();
				$archiveTitleArr = explode(":", $archiveTitle);
				array_shift($archiveTitleArr);
				$archiveTitle = implode(" ", $archiveTitleArr);
			?>

			<div class="container border-neutral-500 border-b border-dotted mb-8 lg:mb-16">
				<div class="flex flex-col lg:flex-row lg:items-center">
					<div class="px-8 mb-4 lg:mb-0">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/Ikona.svg" alt="<?php echo $archiveTitle; ?>">
					</div>
					
					<div class="mb-8 lg:mb-0">
						<h1 class="py-2 text-4xl lg:text-6xl text-primary"><?php echo $archiveTitle; ?></h1>
					</div>
				</div>
			</div>

			<div class="container flex flex-col" id="detail">
				<div class="flex flex-wrap -mx-2 mb-8">
					<?php $loop = 1; ?>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<div class="w-full sm:w-1/2 lg:w-1/3 mb-4 px-2 hover:drop-shadow-xl hover:-translate-y-1 transition-transform duration-500">
							<article class="h-full bg-neutral-100 rounded-lg text-primary overflow-hidden">
								<figure class="relative">
									<?php if( !empty(get_field("rezervovane")) ): ?>
										<span class="absolute right-2 top-2 py-1 px-4 bg-green rounded-md text-black uppercase tracking-wide font-bold">rezervované</span>
									<?php endif; ?>

									<a href="<?php the_permalink(); ?>">
										<?php if( get_the_post_thumbnail() ): ?>
											<?php the_post_thumbnail("gallery_2x", ['class' => 'object-cover']) ?>
										<?php else: ?>
											<span class="flex justify-center" style="padding: 3rem 0;">
												<img src="<?php echo get_template_directory_uri(); ?>/assets/img/aardwark-green.svg" width="150" height="120" alt="aardwark">
											</span>
										<?php endif; ?>
									</a>
								</figure>

								<div class="p-4">
									<?php
										$current_post_categories = get_the_category(); 
										foreach( $current_post_categories as $category): ?>
											<span class="text-sm text-green"><a class="hover:border-b border-green" href="<?php echo home_url(); ?>?cat=<?php echo $category->cat_ID; ?>"><?php echo $category->cat_name; ?></a></span>
										<?php endforeach; ?>
									
									<h2 class="text-xl lg:text-3xl"><a class="hover:underline focus:text-green" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								</div>
							</article>
						</div>
					<?php $loop++; endwhile; ?>

					<div class="w-full py-4">
						<div class="btn-secondary-wrap flex justify-between items-center w-full px-2 mt-8">
							<?php previous_posts_link( 'Predošlé' ); ?>
							<?php next_posts_link( 'Ďalšie' ); ?>
						</div>
					</div>

					<?php else : ?>
						<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</main>
	</div>
	
	<?php get_footer("html"); ?>


<?php get_footer("foot"); ?>