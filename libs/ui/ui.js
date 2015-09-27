$(document).ready(function () {
	/*
	
	UI WIDGET OPEN / CLOSE STATE
	
	*/

	$(".ui_widget .actions .toggle").click(function () {
		$(this).closest(".ui_widget").toggleClass('closed');
		$(this).toggleClass('active');
	});
	
	$(".sidebar ul.menu .arrow").click(function () {
		$(this).closest("li").toggleClass('opened');
		$(this).toggleClass('active');
	});
	
	$(".site_header .logo .hotdog").click(function () {
		$(this).closest(".logo").toggleClass('closed');
		$(".site_content").toggleClass('closed');
		$(".site_content .sidebar").toggleClass('closed');
		$(".site_content .sidebar ul.menu").toggleClass('closed');
		$(this).toggleClass('active');
	});


});









/*

$("#toggle_user_menu").click(function () {
	$("#header_user_menu").toggleClass("open");
	$("#toggle_user_menu").toggleClass("active");
});*/

/*
// MAIN MENU SUB ITEMS TOGGLE
// TODO: Auto opening via clicking on parent item in menu (no arrow needed)
$( "#admin_sidebar div.opener" ).click(function() {
	$(this).parent("li").toggleClass('opened');
	$(this).toggleClass('active')
});

// FOR MOBILE - HOTDOG
$( "#main_menu_hotdog" ).click(function() {
	$("#admin_sidebar").toggleClass("opened");
});

// UI BOX CLOSE-OPEN TOGGLE
$( ".ui_box .header .close" ).click(function() {
	$(this).parent().parent().parent(".ui_box").toggleClass('closed');
	$(this).toggleClass('active')
});

// UI MESSAGE CLOSE-OPEN TOGGLE
$( ".ui_message .close" ).click(function() {
	$(this).parent(".ui_message").addClass('closed');
});

*/
// MAIN CONTENT WINDOWS RESIZE
