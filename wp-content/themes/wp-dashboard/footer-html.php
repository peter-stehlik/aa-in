<footer class="bg-primary p-4 lg:p-16 mt-16 lg:mt-28 mb-8 rounded-lg">
    <div class="container mx-auto">
        <div class="flex flex-col lg:flex-row text-white">
            <div class="lg:w-1/2 mb-8 lg:mb-0">
                <span class="flex mb-4 lg:mb-10 text-3xl lg:text-5xl">Aardwark</span>

                <div class="rounded-wrap">
                    <?php
                    if (function_exists('dynamic_sidebar')) {
                        dynamic_sidebar('Pätička');
                    }
                    ?>
                </div>
            </div>

            <div class="lg:w-1/2 lg:pl-12">
                <span class="flex mb-4 lg:mb-10 text-3xl lg:text-5xl">Teambuildingy</span>

                <div class="flex flex-col lg:flex-row">
                    <div class="flex-1 lg:pr-8 mb-8 lg:mb-0">
                        <?php
                            $args = [
                                'post_type' => 'teambuildings',
                                'posts_per_page' => 5,
                                'order' => 'DESC',
                                'orderby' => 'post_date',
                            ];
                            $the_query = new WP_Query( $args );
                        ?>

                        <?php
                        if ( $the_query->have_posts() ) {
                            echo '<ul class="fnav">';
                            while ( $the_query->have_posts() ) {
                                $the_query->the_post();
                                echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                            }
                            echo '</ul>';
                        } else {
                            // no posts found
                        } ?>

                        <?php wp_reset_postdata(); ?>

                        <a class="inline-flex justify-center items-center min-w-[250px] px-8 py-4 rounded-full bg-white hover:bg-secondary hover:text-white focus:bg-green text-primary font-semibold transition-colors tracking-wide" href="<?php echo home_url("teambuildingy"); ?>">Prejsť na Teambuildingy</a>
                    </div>

                    <!--
                    <div class="flex-1 lg:pr-8">
                        <span class="flex mb-4 text-lg text-quaternary">Bazoš</span>

                        <?php
                            $args = [
                                'post_type' => 'aa-bazos',
                                'posts_per_page' => 5,
                                'order' => 'DESC',
                                'orderby' => 'post_date',
                            ];
                            $the_query = new WP_Query( $args );
                        ?>

                        <?php
                        if ( $the_query->have_posts() ) {
                            echo '<ul class="fnav">';
                            while ( $the_query->have_posts() ) {
                                $the_query->the_post();
                                echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                            }
                            echo '</ul>';
                        } else {
                            // no posts found
                        } ?>

                        <?php wp_reset_postdata(); ?>

                        <a class="inline-flex justify-center items-center min-w-[250px] px-8 py-4 rounded-full bg-white hover:bg-secondary hover:text-white focus:bg-green text-primary font-semibold transition-colors tracking-wide" href="<?php echo home_url("aa-bazos"); ?>">Prejsť do Bazoša</a>
                    </div>
                    -->
                </div>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row pt-8 border-t border-dotted border-gray-300">
            <div class="flex flex-col lg:flex-row order-2 lg:order-1 flex-1 items-center">
                <svg width="83" height="44" viewBox="0 0 83 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M63.4848 35.1457C54.5704 23.5057 60.5936 9.94561 60.5936 9.94561C60.5936 9.94561 52.8839 -2.53445 34.5733 0.465566C20.7199 2.74558 11.3237 17.3857 11.3237 17.3857C11.3237 17.3857 12.7692 11.9856 12.7692 8.2656C12.7692 4.78559 11.4441 2.98558 11.4441 2.98558C11.4441 2.98558 9.63716 6.34559 8.19158 6.7056C6.50508 7.1856 5.17997 4.90559 5.17997 4.90559C5.17997 4.90559 4.45718 6.8256 5.17997 10.9056C5.90276 15.3456 8.19158 21.8257 8.19158 21.8257C8.19158 21.8257 6.38462 24.9457 5.17997 28.4257C3.49347 33.1057 2.16836 38.7458 2.16836 38.7458L0 40.7858C0 40.7858 0.722787 41.7458 1.92743 42.3458C2.77068 42.8258 4.09579 42.9458 4.09579 42.9458L4.81858 39.7058C4.81858 39.7058 7.58926 33.3457 16.1422 29.0257C16.865 29.0257 17.4673 29.0257 18.1901 29.1457C18.0697 32.1457 15.6604 36.9457 15.1785 39.9458C14.4557 43.7858 21.0813 30.7057 23.4906 33.3457C23.4906 33.4657 23.611 33.4657 23.611 33.5857C23.7315 33.7057 23.7315 33.7057 23.852 33.8257C27.1045 38.1458 30.357 43.5458 29.9956 40.6658C29.3933 36.4657 26.2612 29.5057 28.1887 26.8657C29.1524 25.0657 31.6821 23.7457 34.5733 23.7457C37.1031 23.7457 39.2714 24.7057 40.4761 26.1457C43.9695 27.8257 38.7896 35.3857 37.5849 40.9058C36.8621 44.0258 41.6807 37.1857 45.8969 33.1057C49.8723 32.0257 56.6183 44.3858 55.5341 40.5458C54.3295 36.2257 52.2816 32.1457 54.209 30.9457C55.0522 31.4257 55.5341 31.7857 55.5341 31.7857C55.5341 31.7857 57.2206 35.9857 62.8824 39.7058C72.0377 45.7058 83 43.6658 83 43.6658C83 43.6658 69.7489 43.1858 63.4848 35.1457Z" fill="#CCA0D7"></path>
                </svg>	

                <p class="mt-4 lg:mt-0 lg:ml-4 text-white">&copy; <?php echo $year = date("Y"); ?> Aardwark s. r. o. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>