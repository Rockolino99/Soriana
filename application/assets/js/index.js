(function($) {
	//console.clear()
	var tabs =  $(".tabs li a");
  
	tabs.click(function() {
		var content = this.hash.replace('/','');
		tabs.removeClass("active");
		$(this).addClass("active");
    $("#content").find('section').hide();
    $(content).fadeIn(300);
	});

})(jQuery);