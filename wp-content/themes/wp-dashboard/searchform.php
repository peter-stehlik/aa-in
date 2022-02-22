<form class="lg:mt-5 mb-5 lg:mb-10" role="search" method="GET" action="<?php echo home_url(); ?>">
    <?php if( is_home() ): ?>
        <input class="w-full max-w-md py-4 pl-5 pr-20 border-primary focus:border-quaternary focus:ring-primary bg-green rounded-full text-2xl bg-[url('/assets/img/icn-search.svg')] bg-no-repeat bg-right bg-[length:80px_40px]" type="search" name="s" id="search" placeholder="čo hľadáte?" value="<?php the_search_query(); ?>" autocomplete="off">
    <?php else: ?>
        <input class="w-full py-2 pl-5 pr-20 border-primary focus:border-quaternary focus:ring-primary bg-green rounded-full text-lg bg-[url('/assets/img/icn-search.svg')] bg-no-repeat bg-right bg-[length:60px_30px]" type="search" name="s" id="search" placeholder="čo hľadáte?" value="<?php the_search_query(); ?>" autocomplete="off">
    <?php endif; ?>
</form>