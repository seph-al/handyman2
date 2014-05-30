jQuery(document).ready(function($){
	$(".cp_colorpicker").ColorPicker({
		onSubmit: function(hsb, hex, rgb, el) {
			$(el).val(hex);
			$(el).ColorPickerHide();
		},
		onBeforeShow: function () {
			$(this).ColorPickerSetColor(this.value);
		}
	}).bind("keyup", function(){
		$(this).ColorPickerSetColor(this.value);
	});
	
	if ($("#theme-menu")) {
		
		var hashtag = window.location.hash.slice(1);
		
		if (hashtag != '') {
			$("." + hashtag).css("display","block");
			$(".menu-" + hashtag).addClass('current-item');
		} else {
			$(".item-general").css("display","block");
			$(".menu-item-general").addClass('current-item');
		}
		
	}

	$("#theme-menu").find(".menu-item").click(function(){
		$(this).parents('#theme-menu').find(".menu-item").removeClass("current-item");
		$(this).addClass("current-item");
		var item = $(this).attr("item");
		$(".rm_section").css("display","none");
		$("."+item).css("display","block");
	});
});