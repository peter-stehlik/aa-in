<?php
    $user = wp_get_current_user();
	$rolesArr = $user->roles;
	$roles = implode(" ", $rolesArr);
?>
<body <?php body_class($roles); ?>>
	<header class="fixed top-0 left-0 z-20 flex w-full bg-neutral-100 h-12 text-primary">
		<div class="flex justify-between xl:justify-center items-center w-full xl:w-60 p-3 bg-primary">
			<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" width="160" height="50" alt="aardwark logo"></a>

			<a class="relative z-20 js-nav-toggler flex xl:hidden" href="javascript:void(0);">
				<svg class="w-10 h-8" id="hamburger">
					<line stroke="#fff" x1="0" y1="50%" x2="100%" y2="50%" class="hamburger__bar hamburger__bar--top"></line>
					<line stroke="#fff" x1="0" y1="50%" x2="100%" y2="50%" class="hamburger__bar hamburger__bar--middle"></line>
					<line stroke="#fff" x1="50%" y1="50%" x2="100%" y2="50%" class="hamburger__bar hamburger__bar--bottom"></line>
				</svg>			  
			</a>
		</div>

		<div class="hidden xl:flex flex-1 justify-between items-center">
			<?php $langs = icl_get_languages(); ?>
			
			<div class="flex px-8">
				<?php foreach( $langs as $lang ): ?>
					<?php if( $lang["active"] ): ?>
						<a class="px-2 uppercase cursor-default text-black font-semibold" href="javascript:void(0);"><?php echo $lang["code"]; ?></a>
					<?php else: ?>
						<a class="px-2 uppercase font-semibold" href="<?php echo $lang["url"]; ?>"><?php echo $lang["code"]; ?></a>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		
			<div class="flex justify-end items-center w-full h-full px-8">
				<p class="mr-1 text-primary"><?php _e("Prihlásený", "intranetaa"); ?>: <strong class="tracking-wide"><?php echo $user->display_name; ?></strong> | </p>
			
				<a class="tracking-wide text-sm hover:text-green" href="<?php echo wp_logout_url(); ?>"><?php _e("Odhlásiť sa", "intranetaa"); ?></a>
			</div>
		</div>
	</header>