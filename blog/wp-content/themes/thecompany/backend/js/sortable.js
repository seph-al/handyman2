jQuery(document).ready(function($){
	$(".sortable-list").sortable({
		axis: 'y',
		cursor: 'move',
		items: '.sortable'
	});
});