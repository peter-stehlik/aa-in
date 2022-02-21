<header class="fixed top-0 left-0 z-20 flex w-full bg-quaternary h-12 text-white">
    <div class="flex justify-between lg:justify-center items-center w-full lg:w-60 p-3 bg-primary">
        <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" width="160" height="50" alt="aardwark logo"></a>

        <a class="relative z-20 js-nav-toggler flex lg:hidden" href="javascript:void(0);">
            <svg class="w-10 h-8" id="hamburger">
                <line stroke="#fff" x1="0" y1="50%" x2="100%" y2="50%" class="hamburger__bar hamburger__bar--top"></line>
                <line stroke="#fff" x1="0" y1="50%" x2="100%" y2="50%" class="hamburger__bar hamburger__bar--middle"></line>
                <line stroke="#fff" x1="50%" y1="50%" x2="100%" y2="50%" class="hamburger__bar hamburger__bar--bottom"></line>
            </svg>			  
        </a>
    </div>

    <div class="hidden lg:flex flex-1 justify-between items-center">
        <div class="flex px-8">
            <p>Vitajte <strong>Peter Stehlík</strong></p>
        </div>

        <div class="h-full">
            <div class="h-full">
                <a class="flex justify-center items-center h-full px-4 bg-primary hover:bg-secondary" href="#">Odhlásiť sa</a>
            </div>
        </div>
    </div>
</header>