<?php get_header('head'); ?>
    <?php get_header('html'); ?>

	<div class="flex h-screen">		
        <?php get_sidebar(); ?>

		<main class="flex-1 lg:ml-60 px-4 lg:px-8 pt-12">
			<?php
				$archiveTitle = get_the_archive_title();
				$archiveTitleArr = explode(":", $archiveTitle);
				array_shift($archiveTitleArr);
				$archiveTitle = implode(" ", $archiveTitleArr);
			?>

			<div class="bg-primary px-4 lg:px-8 mb-8 rounded-lg">
				<div class="container mx-auto">
					<div class="flex flex-col lg:flex-row lg:h-[380px]">
						<div class="flex-1 flex flex-col justify-center pt-10 lg:py-20">
							<div class="content flex-1 order-2 lg:order-1 text-white">
								<p class="mb-4 lg:mb-8 text-quaternary tracking-wide">Aardwark</p>

								<h1 class="mb-8 text-4xl lg:text-6xl"><?php echo $archiveTitle; ?></h1>

								<a class="inline-flex justify-center items-center min-w-[250px] px-8 py-4 mt-1 lg:mt-0 rounded-full focus:bg-green font-semibold transition-colors  bg-secondary hover:bg-quaternary text-white " href="#detail">Pozrieť viac</a>
							</div>
						</div>

						<div class="svg-wrap flex-1">
							<?php echo get_template_part("template-parts/svg/content", "animation-green-aardwark"); ?>
						</div>
					</div>
				</div>
			</div>

			<div class="container flex flex-col mx-auto" id="detail">
				<h1 class="lg:mt-5 mb-8 text-primary text-3xl lg:text-6xl"><?php echo $archiveTitle; ?></h1>

				<div class="flex flex-wrap -mx-2 mb-8">
					<?php $loop = 1; ?>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<div class="w-full sm:w-1/2 lg:w-1/3 mb-4 px-2 hover:drop-shadow-xl hover:-translate-y-1 transition-transform duration-500">
								<article class="h-full <?php if( $loop == 2 || $loop == 6 ): ?> bg-quaternary <?php else: ?> bg-secondary <?php endif; ?> p-4 rounded-lg text-white">
									<figure class="relative">
										<?php if( !empty(get_field("rezervovane")) ): ?>
											<span class="absolute right-2 top-2 py-1 px-4 bg-green rounded-md text-black uppercase tracking-wide font-bold">rezervované</span>
										<?php endif; ?>

										<a href="<?php the_permalink(); ?>">
											<?php if( get_the_post_thumbnail() ): ?>
												<?php the_post_thumbnail("gallery_2x", ['class' => 'rounded-lg object-cover']) ?>
											<?php else: ?>
												<span style="display: flex; justify-content: center; padding: 3rem 0;">
													<img src="<?php echo get_template_directory_uri(); ?>/assets/img/aardwark-green.svg" width="150" height="120" alt="aardwark">
												</span>
											<?php endif; ?>
										</a>
									</figure>

									<div class="pt-4">
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

			<?php get_footer("html"); ?>
		</main>
	</div>


<?php get_footer("foot"); ?>