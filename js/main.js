(function ($) {
    "use strict";

    /*-------------------------------------
    After Load All Content Add a Class In Body
    -------------------------------------*/
    $(window).on('load', addNewClass);

    function addNewClass() {
        $('.fxt-template-animation').imagesLoaded().done(function (instance) {
            $('.fxt-template-animation').addClass('loaded');
        });
    }

    /*-------------------------------------
    Intersection Observer
    -------------------------------------*/
    if (!!window.IntersectionObserver) {
        let observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("active-animation");
                    observer.unobserve(entry.target);
                }
            });
        }, {
            rootMargin: "0px 0px -150px 0px"
        });
        document.querySelectorAll('.has-animation').forEach(block => {
            observer.observe(block)
        });
    } else {
        document.querySelectorAll('.has-animation').forEach(block => {
            block.classList.remove('has-animation')
        });
    }

    /*-------------------------------------
	Section background image
	-------------------------------------*/
	$("[data-bg-image]").each(function() {
		var img = $(this).data("bg-image");
		$(this).css({
			backgroundImage: "url(" + img + ")"
		});
    });
    
    /*-------------------------------------
    Toggle Class
    -------------------------------------*/
    $(".toggle-password").on('click', function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

})(jQuery);