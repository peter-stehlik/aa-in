<?php get_header('head'); ?>
    <?php get_header('html'); ?>

	<div class="flex h-screen">		
        <?php get_sidebar(); ?>

		<main class="flex-1 lg:ml-60 px-4 lg:px-8 pt-20">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="bg-primary px-4 lg:px-8 rounded-lg">
                    <div class="container mx-auto">
                        <div class="flex flex-col lg:flex-row lg:h-[380px]">
                            <div class="flex-1 flex flex-col justify-center pt-10 lg:py-20">
                                <div class="content flex-1 order-2 lg:order-1 text-white">
                                    <p class="mb-4 lg:mb-8 text-quaternary tracking-wide">Aardwark</p>

                                    <h1 class="mb-8 text-4xl lg:text-6xl"><?php the_title(); ?></h1>

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
                    <?php
                    $args = [
                        'post_parent' => $post->ID,
                        'post_type' => 'page',
                    ];
                    $children = get_children( $args );

                    if( !empty($children) ): ?>
                        <div class="flex flex-wrap -mx-2 mb-8">
                            <?php foreach( $children as $child ): ?>
                                <div class="w-1/2 lg:w-1/4 mb-4 px-2 hover:drop-shadow-xl hover:-translate-y-1 transition-transform duration-500">
                                    <article class="h-full bg-secondary p-4 rounded-lg text-white">
                                        <figure>
                                            <a href="<?php echo $child->guid; ?>">
                                                <span class="flex justify-center py-4">
													<img src="<?php echo get_template_directory_uri(); ?>/assets/img/aardwark-green.svg" width="150" height="120" alt="aardwark">
												</span>
                                            </a>
                                        </figure>

                                        <div class="text-center">
                                            <h2 class="text-xl"><a class="hover:underline focus:text-green" href="<?php echo $child->guid; ?>"><?php echo $child->post_title; ?></a></h2>
                                        </div>
                                    </article>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <div class="prose prose-p:text-lg prose-headings:text-primary prose-headings:font-normal prose-h2:text-3xl prose-a:text-secondary hover:prose-a:no-underline max-w-2xl"> 
                        <?php the_content(); ?>
                    </div>
                </div>
            <?php endwhile; else : ?>
                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>
            
            <?php get_footer("html"); ?>
		</main>
	</div>


<?php get_footer("foot"); ?>