<aside class="nav-wrap fixed left-0 top-12 z-10 lg:flex flex-col w-full lg:w-60 lg:pt-10 h-screen bg-secondary text-white">
    <div class="sub-nav-wrap w-[200%] flex lg:w-full">
        <div class="flex-1">
            <?php if( !is_home() ): ?>
                <div class="mt-5 mb-2 mx-4">
                    <?php get_search_form(); ?>
                </div>
            <?php endif; ?>

            <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'top-menu',
                        'menu_class' => 'left-nav lg:pt-5',
                        'menu_id' => '',
                        'container' => '',
                    )
                );
            ?>

            <div class="lg:hidden mt-2 px-4">
                <hr>
            </div>

            <ul class="left-nav lg:hidden">
                <li><a href="<?php echo wp_logout_url(); ?>">Odhlásiť</a></li>
            </ul>
        </div>

        <div class="flex-1 lg:hidden overflow-auto h-screen">
            <div class="pt-5 pb-5 px-4">
                <a class="js-back-mob-nav inline-flex mb-4 text-xl" href="javascript:void(0);">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-full-right-medium.svg" width="30" height="20" alt="arrow white right" style="transform: rotate(180deg);">
                    
                    <span class="flex ml-2">Späť</span>
                </a>

                <hr class="mb-4">

                <ul class="js-mob-sub-nav">

                </ul>
            </div>
        </div>
    </div>
</aside>