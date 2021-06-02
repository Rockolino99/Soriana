(function($) {

	var tabs =  $(".tabs li a");
	var tabs2 =  $(".tabs2 li a");

	tabs.click(function() {
		var content = this.hash.replace('/','');
		tabs.removeClass("active");
		$(this).addClass("active");
    $("#content").find('section').hide();
    $(content).fadeIn(200);
	});

	tabs2.click(function() {
		var content = this.hash.replace('/','');
		tabs2.removeClass("active");
		$(this).addClass("active");
    $("#content2").find('section').hide();
    $(content).fadeIn(200);
	});

})(jQuery);

$(document).ready(() => {
	getAreas()
})

function getAreas() {
	$.ajax({
		url: 'application/controllers/administracion/controller_getAreas.php',
		success: function(data) {
			$('#selectArea').append(data)
		}
	})
}