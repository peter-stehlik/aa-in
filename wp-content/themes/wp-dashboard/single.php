<?php get_header('head'); ?>
    <?php get_header('html'); ?>

	<div class="flex h-screen">		
        <?php get_sidebar(); ?>

		<main class="flex-1 lg:ml-60 px-4 lg:px-8 pt-12">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="bg-primary px-4 lg:px-8 rounded-lg">
                    <div class="container mx-auto">
                        <div class="flex flex-col lg:flex-row lg:h-[380px]">
                            <div class="flex-1 flex flex-col justify-center pt-10 lg:py-20">
                                <div class="content flex-1 order-2 lg:order-1 text-white">
                                    <p class="mb-4 lg:mb-8 text-quaternary tracking-wide">Aktuality</p>

                                    <h1 class="lg:pr-8 mb-4 text-4xl lg:text-6xl"><?php the_title(); ?></h1>

                                    <div class="flex items-center mb-4">
                                        <time class="inline-flex mr-2 text-white" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('d.m.Y'); ?></time>
                
                                        <div>
                                            <?php
                                            $current_post_categories = get_the_category(); 
                                            foreach( $current_post_categories as $category): ?>
                                                <span class="text-sm text-green"><a href="<?php echo home_url(); ?>?cat=<?php echo $category->cat_ID; ?>"><?php echo $category->cat_name; ?></a></span>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                    <a class="inline-flex justify-center items-center min-w-[250px] px-8 py-4 mt-1 lg:mt-0 rounded-full focus:bg-green font-semibold transition-colors  bg-secondary hover:bg-quaternary text-white " href="#detail">Prečítať viac</a>
                                </div>
                            </div>

                            <?php if( get_the_post_thumbnail() ): ?>
                                <div class="flex-1 flex items-center pb-8 lg:py-8 mt-8 lg:mt-0">
                                    <?php the_post_thumbnail("large", ['class' => 'rounded-lg object-cover max-h-full']) ?>
                                </div>
                            <?php else: ?>
                                <div class="svg-wrap flex-1">
                                    <?php echo get_template_part("template-parts/svg/content", "animation-green-aardwark"); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="container flex flex-col mx-auto pt-20 lg:pl-8 2xl:pl-0" id="detail">
                    <div class="prose prose-p:text-lg prose-headings:text-primary prose-headings:font-normal prose-h2:text-3xl prose-a:text-secondary hover:prose-a:no-underline max-w-2xl"> 
                        <?php the_content(); ?>
                    </div>

                    <div class="mt-20">
                        <a class="btn px-8 py-4 border-2 border-primary rounded-full bg-white hover:bg-quaternary text-primary font-semibold tracking-wide no-underline" href="<?php echo home_url(); ?>">späť na Aktuality</a>
                    </div>
                </div>
            <?php endwhile; else : ?>
                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>

            <?php get_footer("html"); ?>
		</main>
	</div>


<?php get_footer("foot"); ?>