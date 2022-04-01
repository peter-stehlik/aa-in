<?php
/*
    Template Name: Teambuildings
*/
?>

<?php get_header('head'); ?>
    <?php get_header('html'); ?>

	<div class="flex">		
        <?php get_sidebar(); ?>

		<main class="flex-1 min-h-[50vh] lg:ml-60 px-4 lg:px-16 pt-20">
            <div class="container border-neutral-500 border-b border-dotted mb-8 lg:mb-16">
                <div class="flex flex-col lg:flex-row lg:items-center">
                    <?php echo get_template_part("template-parts/content", "ilustration-img"); ?>
                    
                    <div class="ml-8 mb-8 lg:mb-0">
                        <h1 class="py-2 text-4xl lg:text-6xl text-primary"><?php the_title(); ?></h1>
                    </div>
                </div>
            </div>

            <div class="container flex flex-col mx-auto" id="detail">
				<h1 class="md:max-w-[704px] pr-8 md:pr-0 md:mt-5 md:mb-8 text-right md:text-left text-primary text-3xl lg:text-6xl"></h1>

                <?php
                    $actions = [];

                    $args = [
                        'order' => 'DESC',
                        'orderby' => 'date',
                        'post_type' => 'teambuildings',
                    ];
                    $the_query = new WP_Query($args);

                    if ( $the_query->have_posts() ) :
                        while ( $the_query->have_posts() ) : $the_query->the_post();
                            $action = [
                                "year" => get_the_time("Y"),
                                "title" => get_the_title(),
                                "permalink" => get_the_permalink(),
                            ];

                            array_push($actions, $action);
                        endwhile;
                    endif;

                   /* echo "<pre>";
                    print_r($actions);
                    echo "</pre>";*/
                ?>

				<div class="relative -top-8 flex flex-col md:max-w-[704px] pt-12 md:pt-24 pb-20 md:pb-32 md:mb-8">
					<div class="absolute top-0 left-[91.666666667%] md:left-1/2 w-px h-full border-r border-gray-300 translate-x-[22px] md:translate-x-0">
						<div class="absolute left-0 top-0 w-px h-20 bg-gradient-to-b from-gray-100 to-gray-300"></div>
						<div class="absolute left-0 bottom-0 w-px h-20 bg-gradient-to-t from-gray-100 to-gray-300"></div>
					</div>

                    <?php
                        $current = 0;
                        $i = 0;
                        $lastKey = array_key_last($actions);
                    ?>
                    <?php foreach( $actions as $key => $item ): ?>
                        <?php if( $current != $item["year"] ): ?>
                            <?php if( $key != 0 ): ?>
                                </ul>

                                <span class="absolute top-1/2 -right-8 <?php if($i % 2 == 0): ?> md:-right-10 <?php else: ?> md:-left-10 <?php endif; ?> w-4 h-4 rounded-full border-2 border-gray-100 md:-translate-y-2 md:-translate-x-px bg-quaternary"></span>
                            </section>
                            <?php endif; ?>
                            
                            <section class="relative w-11/12 md:max-w-xs p-4 border border-gray-300 rounded-lg mt-8 <?php if($i % 2 == 0): ?> md:ml-96 <?php endif; ?> shadow-lg bg-white text-right md:text-left">
                                <h2 class="mb-2 font-bold text-xl text-primary"><?php echo $item["year"]; ?></h2>

                                <ul class="ml-4 list-disc">
                            <?php $i++; ?>
                        <?php endif; ?>

                        <li class="mb-1"><a class="border-b hover:border-0 border-black" href="<?php echo $item["permalink"]; ?>"><?php echo $item["title"]; ?></a></li>

                        <?php if( $key == $lastKey ): ?>
                                </ul>

                                <span class="absolute top-1/2 -right-8 <?php if($i % 2 == 0): ?> md:-right-10 <?php else: ?> md:-left-10 <?php endif; ?> w-4 h-4 rounded-full border-2 border-gray-100 md:-translate-y-2 md:-translate-x-px bg-quaternary"></span>
                            </section>
                        <?php endif; ?>

                        <?php $current = $item["year"]; ?>
                    <?php endforeach; ?>
				</div>
			</div>

		</main>
	</div>
    
    <?php get_footer("html"); ?> 

<?php get_footer("foot"); ?>