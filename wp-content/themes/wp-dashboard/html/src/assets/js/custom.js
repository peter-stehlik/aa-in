let AA = {
    $menu: document.querySelector(".nav-wrap"),
    $subMenu: document.querySelector(".sub-nav-wrap"),

    toggleMobNav: () => {
		let $el = document.querySelector(".js-nav-toggler");
		
		if( !$el ) {
			return;
		}

		$el.addEventListener("click", () => {
			let $hamburger = document.querySelector("#hamburger");

			if( $hamburger.classList.contains("is-opened") ){
				AA.helperCloseMobNav();
			} else {
				AA.helperOpenMobNav();
			}

			$hamburger.classList.toggle("is-opened");
		});
	},
	helperCloseMobNav: () => {
		AA.$menu.classList.remove("is-opened");
		AA.$subMenu.classList.remove("is-opened");
	},
	helperOpenMobNav: () => {
		AA.$menu.classList.add("is-opened");
		AA.$subMenu.classList.remove("is-opened");
	},
	buildMobNav: () => {
		let $navLinks = document.querySelectorAll(".left-nav > li");
		let build = $el => {
			let $arr = `
				<a class="js-show-sub-nav xl:hidden" href="javascript:void(0);">
					<img src="/intranet/wp-content/themes/wp-dashboard/assets/img/arrow-full-right-medium.svg" width="30" height="20" alt="arrow white right">
				</a>
			`;
			let subNav = $el.querySelector("ul");

			if( subNav ){
				$el.innerHTML += $arr;
			}
		};

		$navLinks.forEach( el => build(el) );

		AA.buildMobSubNav();
	},
	buildMobSubNav: () => {
		let $navLinks = document.querySelectorAll(".js-show-sub-nav");
		let build = $el => {
			$el.addEventListener("click", () => {
				let $subNav = $el.closest("li").querySelector("ul").innerHTML;

				document.querySelector(".js-mob-sub-nav").innerHTML = $subNav;

				AA.$subMenu.classList.add("is-opened");
			});
		};

		$navLinks.forEach( el => build(el) );

		document.querySelector(".js-back-mob-nav").addEventListener("click", () => {
			AA.$subMenu.classList.remove("is-opened");
		});
	},
	buildDesktopSubNav: () => {
		let $navLinks = document.querySelectorAll("#mainNav > li");
		let $wrapper = document.getElementById("mainSubNavWrap");

		let build = $el => {
			let index = [...$navLinks].indexOf($el);

			$el.addEventListener("mouseenter", () => {
				$wrapper.style.marginTop = 0;
				$wrapper.classList.remove("justify-center");
				$wrapper.classList.add("justify-start");

				let $subNav = $el.querySelector("ul");

				if( !$subNav ){
					hideWrapperHelper();

					return;
				}

				let offsetTop = $el.offsetTop;
				let offsetHeight = $el.offsetHeight;
				let subNavCount = $subNav.querySelectorAll("li").length;

				if( subNavCount >= 7 ){
					if( index >= 3 ){
						$wrapper.classList.remove("justify-start");
						$wrapper.classList.add("justify-center");
					}
				} else {
					$wrapper.style.marginTop = (offsetTop-offsetHeight-16) + "px";
				}

				let subNavItems = $subNav.innerHTML;
				
				document.getElementById("mainSubNav").innerHTML = subNavItems;

				showWrapperHelper();			
			});
		};

		$navLinks.forEach( el => build(el) );

		$wrapper.addEventListener("mouseleave", () => {
			hideWrapperHelper();
		});

		let hideWrapperHelper = () => {
			$wrapper.classList.add("hidden");
		};
		let showWrapperHelper = () => {
			$wrapper.classList.remove("hidden");
		};
	},
}

AA.toggleMobNav();

if( window.innerWidth < 1280 ){
	AA.buildMobNav();
} else {
	AA.buildDesktopSubNav();
}