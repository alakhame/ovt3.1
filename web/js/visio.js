/***** CUSTOM JS  *****/
$('#cloche').click(function(){  
	if($('.container_drop_down_notif').is(":visible")){ 
		$('.container_drop_down_notif').focusout();
	}else{
		$('.container_drop_down_notif').fadeIn(1000); 
		$('.container_drop_down_notif').focusin();
	}
	$('#nbNotif').fadeOut(2000);
});
$('.container_notif_svg').click(function(e){ 
	$(this).parent().parent().fadeOut(500);
});
$('.container_drop_down_notif').focusout(function() {
	alert("notif");
  $('.container_drop_down_notif').fadeOut(1000);
});
$('#cloche').focusout(function() {
	alert("cloche");
  $('.container_drop_down_notif').fadeOut(1000);
});

/*$('.valid_box').click(function(){ 
	$(this).toggleClass('select');
	if($(this).hasClass('select')) $(this).find('svg').css('display','block'); 
	else $(this).find('svg').css('display','none');
});*/


/**** END CUSTOM *****/

$("[name=range]").on("change", function() {
    $("[for=range]").val(this.value +"min" );
    }).trigger("change");

$('.container_tab_1').click(function(){

$('.content_name_container_program_now').empty();

});

$(document).keyup(function(touche){

  var appui = touche.which || touche.keyCode;

	if(appui != 0 ) {
		$('.title_container_program_now').empty();
		$('.title_container_program_now').append($('.content_name_container_program_now:input').val());			
	}

});

/* TOUR */

$('.button_next_tour_1').click(function() {
	$('.tour_1').fadeOut(400);
	$('.tour_2').delay(400).fadeIn(600);
})

$('.button_next_tour_2').click(function() {
	$('.tour_2').fadeOut(400);
	$('.tour_3').delay(400).fadeIn(600);
})

$('.button_next_tour_3').click(function() {
	$('.container_tour').fadeOut(400);
})

$('.button_passe_tour').click(function() {
	$('.container_tour').fadeOut(400);
})

/* END TOUR */


/* ALERT DELETE */

$('.delet_action_drop_down_rdv_day').click(function() {
	$('.container_position_delete_rdv').fadeIn(400);
	$('#container_delete_alert_1').fadeIn(400);
})
$('.container_info_editable_user_delete').click(function() {
	$('#container_delete_alert_2').fadeIn(400);
})
$('.action_call').click(function() {
	$('.position_delete_visio').fadeIn(400);
	$('#container_delete_alert_3').fadeIn(400);
})

$('.container_close_delete_alert').click(function() {
	$('.container_delete_alert').fadeOut(400);
	$('.position_delete_visio').fadeOut(400);
	$('.container_delete_alert').fadeOut(400);
})
$('.button_delete_alert_action').click(function() {
	$('.container_position_delete_rdv').fadeOut(400);
	$('.position_delete_visio').fadeOut(400);
	$('.container_delete_alert').fadeOut(400);
})
$('.button_cancel_delete_alert').click(function() {
	$('.container_delete_alert').fadeOut(400);
	$('.position_delete_visio').fadeOut(400);
	$('.container_delete_alert').fadeOut(400);
})

$('#container_delete_alert_3 .button_delete_alert_action').click(function() {
	$('.tab_bar_left_5').removeClass('anim');
	

	$('.position_call_done').fadeIn(400);
})
/* ---------------------------------------------------- */
/* ------------------- TAB BAR LEFT ------------------- */
/* ---------------------------------------------------- */

$('.tab_bar_left_1').click(function() {
	$('.tab_bar_left').removeClass('activate');
	$('.tab_bar_left').removeClass('theme_color_border');

	$('.tab_bar_left_1').addClass('activate');
	$('.tab_bar_left_1').addClass('theme_color_border');

	$('.header_tab').fadeOut(0);
	$('.header_tab_1').fadeIn(400);

	$('.container_tab').fadeOut(0);
	$('.container_tab_1').fadeIn(400);

	$('.bar_left').addClass('height');
})

$('.tab_bar_left_2').click(function() {
	$('.tab_bar_left').removeClass('activate');
	$('.tab_bar_left').removeClass('theme_color_border');

	$('.tab_bar_left_2').addClass('activate');
	$('.tab_bar_left_2').addClass('theme_color_border');

	$('.header_tab').fadeOut(0);
	$('.header_tab_2').fadeIn(400);

	$('.container_tab').fadeOut(0);
	$('.container_tab_2').fadeIn(400);

	$('.bar_left').removeClass('height');
})

$('.tab_bar_left_3').click(function() {
	$('.tab_bar_left').removeClass('activate');
	$('.tab_bar_left').removeClass('theme_color_border');
	$('.tab_bar_left_3 .notif_round_tab_bar').fadeOut(400);


	$('.tab_bar_left_3').addClass('activate');
	$('.tab_bar_left_3').addClass('theme_color_border');

	$('.header_tab').fadeOut(0);
	$('.header_tab_3').fadeIn(400);

	$('.container_tab').fadeOut(0);
	$('.container_tab_3').fadeIn(400);

	$('.bar_left').removeClass('height');


	/* ----------------- CALENDAR -----------------  */


	/* ----------------- END CALENDAR -----------------  */

})

$('.tab_bar_left_4').click(function() {
	$('.tab_bar_left').removeClass('activate');
	$('.tab_bar_left').removeClass('theme_color_border');

	$('.tab_bar_left_4').addClass('activate');
	$('.tab_bar_left_4').addClass('theme_color_border');

	$('.header_tab').fadeOut(0);
	$('.header_tab_4').fadeIn(400);

	$('.container_tab').fadeOut(0);
	$('.container_tab_4').fadeIn(400);

	$('.bar_left').removeClass('height');
})

$('.tab_bar_left_5').click(function() {
	$('.tab_bar_left').removeClass('activate');
	$('.tab_bar_left').removeClass('theme_color_border');
	$('.tab_bar_left_5 .notif_round_tab_bar').fadeOut(400);

	$('.tab_bar_left_5').addClass('activate');
	$('.tab_bar_left_5').addClass('theme_color_border');

	$('.header_tab').fadeOut(0);
	$('.header_tab_5').fadeIn(400);

	$('.container_tab').fadeOut(0);
	$('.container_tab_5').fadeIn(400);

	$('.bar_left').removeClass('height');
})

/* -------------------------------------------------------- */
/* ------------------- END TAB BAR LEFT ------------------- */
/* -------------------------------------------------------- */

/* -------------------------------------------------------- */
/* ------------------- CONTAINER TAB 1 -------------------- */
/* -------------------------------------------------------- */

$('.button_program_now').click(function() {
	$('.container_position_tab_1').fadeOut(0);
	$('.container_notif_rdv').fadeOut(0);
	$('.container_program_now_position').fadeIn(400);
})

$('.button_choose_date_program_now').click(function() {
	$('.container_drop_down_calendar_program_now').fadeToggle(400);
})

$('.day_style_calendar_program_now').click(function() {
	$('.day_style_calendar_program_now').removeClass('theme_color_background');
	$('.number_day_program_now').removeClass('white_text');
	$(this).toggleClass('theme_color_background');
	$(this).find('.number_day_program_now').addClass('white_text');
})

$('.valid_email_program_now').click(function() {
	var button_valid_email = $('.valid_email_program_now');
	button_valid_email.addClass('active');
	setTimeout(function() {
		button_valid_email.removeClass('active');
	}, 1000);

})

$('.container_contact_program_now_style').click(function() {
	$(this).find('.container_check_contact_program_now').toggleClass('active');
})

$('.valid_program_now').click(function() {

	var valid_program_now = $('.valid_program_now');
	valid_program_now.addClass('anim');
	setTimeout(function() {
		valid_program_now.removeClass('anim');
	}, 1000);

	var container_check_valid_program_now = $('.container_check_valid_program_now');
	container_check_valid_program_now.addClass('anim');
	setTimeout(function() {
		container_check_valid_program_now.removeClass('anim');
	}, 1000);


	$('.container_position_tab_1').delay(1000).fadeIn(400);
	$('.container_notif_rdv').delay(1000).fadeIn(400);
	$('.container_program_now_position').delay(1000).fadeOut(0);

	$('.position_add_contact').delay(1000).fadeOut(400);
})


$('.cancel_program_now').click(function() {
	$('.container_position_tab_1').fadeIn(400);
	$('.container_notif_rdv').fadeIn(400);
	$('.container_program_now_position').fadeOut(0);
})
/* -------------------------------------------------------- */
/* ------------------- CONTAINER TAB 5 ------------------- */
/* -------------------------------------------------------- */

/* RATING */ 

$('.star_1').hover(function() {
	$('.star').removeClass('theme_color_fill');

	$(this).toggleClass('theme_color_fill');

	$('.value_star').removeClass('show');
	$('.value_1').addClass('show');
})

$('.star_2').hover(function() {
	$('.star').removeClass('theme_color_fill');

	$('.star_1').toggleClass('theme_color_fill');
	$(this).toggleClass('theme_color_fill');

	$('.value_star').removeClass('show');
	$('.value_2').addClass('show');
})

$('.star_3').hover(function() {
	$('.star').removeClass('theme_color_fill');

	$('.star_1').toggleClass('theme_color_fill');
	$('.star_2').toggleClass('theme_color_fill');
	$(this).toggleClass('theme_color_fill');

	$('.value_star').removeClass('show');
	$('.value_3').addClass('show');
})

$('.star_4').hover(function() {
	$('.star').removeClass('theme_color_fill');

	$('.star_1').toggleClass('theme_color_fill');
	$('.star_2').toggleClass('theme_color_fill');
	$('.star_3').toggleClass('theme_color_fill');
	$(this).toggleClass('theme_color_fill');

	$('.value_star').removeClass('show');
	$('.value_4').addClass('show');
})

$('.star_5').hover(function() {
	$('.star').removeClass('theme_color_fill');

	$('.star_1').toggleClass('theme_color_fill');
	$('.star_2').toggleClass('theme_color_fill');
	$('.star_3').toggleClass('theme_color_fill');
	$('.star_4').toggleClass('theme_color_fill');
	$(this).toggleClass('theme_color_fill');

	$('.value_star').removeClass('show');
	$('.value_5').addClass('show');
})


$('.star_1').click(function() {
	$(this).toggleClass('theme_color_fill');

	$('.value_star').removeClass('show');
	$('.value_1').addClass('show');
})

$('.star_2').click(function() {
	$('.star_1').toggleClass('theme_color_fill');
	$(this).toggleClass('theme_color_fill');

	$('.value_star').removeClass('show');
	$('.value_2').addClass('show');
})

$('.star_3').click(function() {
	$('.star_1').toggleClass('theme_color_fill');
	$('.star_2').toggleClass('theme_color_fill');
	$(this).toggleClass('theme_color_fill');

	$('.value_star').removeClass('show');
	$('.value_3').addClass('show');
})

$('.star_4').click(function() {
	$('.star_1').toggleClass('theme_color_fill');
	$('.star_2').toggleClass('theme_color_fill');
	$('.star_3').toggleClass('theme_color_fill');
	$(this).toggleClass('theme_color_fill');

	$('.value_star').removeClass('show');
	$('.value_4').addClass('show');
})

$('.star_5').click(function() {
	$('.star_1').toggleClass('theme_color_fill');
	$('.star_2').toggleClass('theme_color_fill');
	$('.star_3').toggleClass('theme_color_fill');
	$('.star_4').toggleClass('theme_color_fill');
	$(this).toggleClass('theme_color_fill');

	$('.value_star').removeClass('show');
	$('.value_5').addClass('show');
})

$('.note_lambda .container_close_note').click(function() {
	$('.note_lambda').fadeOut(400);
	/* $('.container_note_rdv').fadeOut(400); */
})

$('.note_lambda .cancel_note').click(function() {
	$('.note_lambda').fadeOut(400);
	/* $('.container_note_rdv').fadeOut(400); */
})

$('.note_user .container_close_note').click(function() {
	$('.note_user').fadeOut(400);
	/* $('.container_note_rdv').fadeOut(400); */
})

$('.note_user .cancel_note').click(function() {
	$('.note_user').fadeOut(400);
	/* $('.container_note_rdv').fadeOut(400); */
})

$('.button_done_note').click(function() {
	$(this).addClass('anim');
	$(this).find('.container_check_note').addClass('anim');
	$(this).parent().parent().parent().parent().delay(1000).fadeOut(400);
	$('.container_note_rdv').delay(1000).fadeOut(400);

})

/* END RATING */

$('.action_add_people').click(function() {
	$('.position_add_contact').fadeIn(400);
})

$('.cancel_program_now').click(function() {
	$('.position_add_contact').fadeOut(400);
})

$('.container_close_add_contact').click(function() {
	$('.position_add_contact').fadeOut(400);
})

$('body').click(function() {
	/* $('.title').attr("contentEditable", "false");
	$('.title').addClass('edit'); */
	$('.container_drop_down_title').fadeOut(400);
})

$('.logo_edit_title').click(function() {
	event.stopPropagation();
	$(this).toggleClass('anim');
	$('.container_edit_title_pen').toggleClass('anim');
	$('.container_valid_edit_title').toggleClass('anim');

	if ($(this).hasClass('anim')){
		$('.title').attr("contentEditable", "true");
		$('.title').removeClass('edit');
		$('.title').removeClass('subtitle_color_text');
	}
	else {
		$('.title').attr("contentEditable", "false");
		$('.title').addClass('edit');
		$('.title').addClass('subtitle_color_text');
	}
	

})

$('.title').click(function() {
	event.stopPropagation();
	if ($('.title').hasClass('edit')){
		$('.container_drop_down_title').fadeToggle(400);
	}
	
})

$('.container_drop_down_title').click(function() {
	event.stopPropagation();
})

/* -------------------------------------------------------- */
/* ------------------- END CONTAINER TAB 5 -------------------- */
/* -------------------------------------------------------- */

/* ------------------------------------------------------------ */
/* ------------------- END CONTAINER TAB 1 -------------------- */
/* ------------------------------------------------------------ */

/* -------------------------------------------------------- */
/* ------------------- CONTAINER TAB 2 ------------------- */
/* -------------------------------------------------------- */


$('.element_header_container_historique ').click(function() {
	$('.container_arrow_element_heade_historique_position').removeClass('active');
	$(this).find('.container_arrow_element_heade_historique_position').toggleClass('active');
})

$('.close_video_historique').click(function() {
	$('.container_position_video_historique').fadeOut(400);
	$('.container_play_video_historique').fadeIn(400);
})

$('.content_element_historique_play').click(function() {
	$('.container_position_video_historique').fadeIn(400);
})

$('.video_historique').click(function() {
	$('.container_play_video_historique').fadeIn(400);
})

$('.round_play_video_historique').click(function() {
	event.stopPropagation();
	$('.container_play_video_historique').fadeOut(400);
})

/* -------------------------------------------------------- */
/* ------------------- END CONTAINER TAB 2 -------------------- */
/* -------------------------------------------------------- */

/* --------------------------------------------- */
/* ------------------- SLIDE ------------------- */
/* --------------------------------------------- */

$('.button_show_container_slide').click(function() {
	$(this).toggleClass('active');
	$('.container_slide').toggleClass('show');
	$('.container_video').toggleClass('full');

	$(this).removeClass('anim');
	$(this).removeClass('theme_color_fill');
})

$('.button_show_detail').click(function() {
	$(this).toggleClass('active');
	$('.my_special').toggleClass('show');
	$('.head_container_slide').toggleClass('show');
	$('.head_container_slide p').toggleClass('show');
	$('.contact_detail_head_slide').toggleClass('show');
	$('.discussion_contact').toggleClass('min');
	$('.file_contact').toggleClass('min');
})

$('.discussion').click(function() {
	$('.tab_slide').removeClass('active');
	$('.tab_slide').removeClass('title_color_fill');

	$('.discussion').addClass('active');
	$('.discussion').addClass('title_color_fill');

	$('.container_fichier').fadeOut(0);
	$('.container_discussion').fadeIn(400);

	$('.container_tool_fichier').fadeOut(0);
	$('.container_tool_chat').fadeIn(200);

	$('.tab_slide').removeClass('subtitle_color_fill');
	$('.fichier').addClass('subtitle_color_fill');

	$('.container_choose_contact_action').fadeIn(400);
})

$('.fichier').click(function() {
	$('.tab_slide').removeClass('active');
	$('.tab_slide').removeClass('title_color_fill');

	$('.fichier').addClass('active');
	$('.discussion').addClass('title_color_fill');

	$('.container_discussion').fadeOut(0);
	$('.container_fichier').fadeIn(400);

	$('.container_tool_chat').fadeOut(0);
	$('.container_tool_fichier').fadeIn(200);

	$('.tab_slide').removeClass('subtitle_color_fill');
	$('.discussion').addClass('subtitle_color_fill');

	$('.container_choose_contact_action').fadeOut(0);
})

$('.all_choose_action').click(function() {
	$('.choose_action').removeClass('active');
	$(this).addClass('active');
	$('.bar_choose_section').removeClass('middle');
	$('.bar_choose_section').removeClass('right');
	$('.bar_choose_section').addClass('left');

	/* DISCUSSION */
	$('.discussion_contact').fadeOut(0);
	$('.container_all_choose_action_discussion').fadeIn(400);

	/* FILE */
	$('.file_contact').fadeOut(0);
	$('.container_all_choose_action_file').fadeIn(400);

})
$('.contact_1_choose_action').click(function() {
	$('.choose_action').removeClass('active');
	$(this).addClass('active');
	$('.bar_choose_section').removeClass('left');
	$('.bar_choose_section').removeClass('right');
	$('.bar_choose_section').addClass('middle');

	/* DISCUSSION */
	$('.discussion_contact').fadeOut(0);
	$('.container_contact_1_choose_action_discussion').fadeIn(400);

	/* FILE */
	$('.file_contact').fadeOut(0);
	$('.container_container_1_file').fadeIn(400);
})
$('.contact_2_choose_action').click(function() {
	$('.choose_action').removeClass('active');
	$(this).addClass('active');
	$('.bar_choose_section').removeClass('middle');
	$('.bar_choose_section').removeClass('left');
	$('.bar_choose_section').addClass('right');

	/* DISCUSSION */
	$('.discussion_contact').fadeOut(0);
	$('.container_contact_2_choose_action_discussion').fadeIn(400);

	/* FILE */
	$('.file_contact').fadeOut(0);
	$('.container_container_2_file').fadeIn(400);
})

$('.button_upload_file_done').click(function() {
    $(this).addClass('anim');
    $(this).addClass('anim_2');
	 $(this).find('.load_bar_button_upload_file_done').addClass('anim');
})

$('.container_drag_drop_fichier svg').click(function() {

	$('.container_tool_fichier').addClass('more');
	$('.file_contact').addClass('more');
	$('.container_drag_drop_fichier').fadeOut(0);
	$('.container_upload_fichier').fadeIn(400);
	$('.button_send_img_to').fadeIn(200);

})

$('.send_file_done').click(function() {

	var send_file_done = $(this);
	send_file_done.addClass('anim');
	setTimeout(function() {
		send_file_done.removeClass('anim');
	}, 1200);

	var send_file_done_check = $('.send_file_done_check');
	send_file_done_check.addClass('anim');
	setTimeout(function() {
		send_file_done_check.removeClass('anim');
	}, 1200);

	$('.button_send_img_to').delay(1000).fadeOut(0);

	$('.container_upload_fichier').delay(1000).fadeOut(0);
	$('.container_drag_drop_fichier').delay(1000).fadeIn(400);
	

	var container_upload_fichier = $('.container_upload_fichier');
	container_upload_fichier.addClass('more');
	setTimeout(function() {
		container_upload_fichier.removeClass('more');
	}, 1000);

	var container_tool_fichier = $('.container_tool_fichier');
	container_tool_fichier.addClass('more');
	setTimeout(function() {
		container_tool_fichier.removeClass('more');
	}, 1000);
	
	var title_upload_fichier = $('.title_upload_fichier');
	title_upload_fichier.addClass('hide');
	setTimeout(function() {
		title_upload_fichier.removeClass('hide');
	}, 1000);
})

$('.ignore_send_file').click(function() {
	$('.button_send_img_to').fadeOut(0);
	$('.container_tool_fichier').removeClass('more');
	$('.file_contact').removeClass('more');
	$('.container_upload_fichier').fadeOut(0);
	$('.container_drag_drop_fichier').fadeIn(400);
	$('.title_upload_fichier').removeClass('hide');
})

$('.contact_1_send_to_click').click(function() {
	$('.send_to_img_name').removeClass('active');
	$('.send_to_img_name_1').addClass('active');
})
$('.contact_2_send_to_click').click(function() {
	$('.send_to_img_name').removeClass('active');
	$('.send_to_img_name_2').addClass('active');
})
$('.contact_3_send_to_click').click(function() {
	$('.send_to_img_name').removeClass('active');
	$('.send_to_img_name_3').addClass('active');
})

/* ------------------------------------------------- */
/* ------------------- END SLIDE ------------------- */
/* ------------------------------------------------- */

/* --------------------------------------------- */
/* ------------------- VIDEO ------------------- */
/* --------------------------------------------- */


$('.view_cam').click(function() {
	$('.view_cam').removeClass('theme_color_border');
	$('.view_cam').removeClass('up');
	$(this).addClass('theme_color_border');
	$(this).addClass('up');

})

$('.container_cut').click(function() {
	event.stopPropagation();

	$(this).toggleClass('subtitle_color_fill');
	$(this).toggleClass('title_color_fill');
	$(this).find('.bar_cut_mic').toggleClass('show');
})

/* TOOLS VIDEO */ 

$('.app_install_fichier').click(function() {

	$('.action_fichier').toggleClass('active');
	$('.action_fichier').removeClass('theme_color_fill');

	$('.fichier').removeClass('active');
	$('.fichier').fadeOut(0);
	$('.container_fichier').fadeOut(0);
	$('.container_tool_fichier').fadeOut(0);


	if ($('.action_chat').hasClass('theme_color_fill')) {
		$('.discussion').addClass('center');
		$('.discussion').addClass('active');
		$('.discussion').fadeIn(400);
		$('.container_discussion').fadeIn(400);
		$('.container_tool_chat').fadeIn(400);
		$('.container_choose_contact_action').fadeIn(400);		
			}
			else {

			}

})

$('.app_install_chat').click(function() {

	$('.action_chat').toggleClass('active');
	$('.action_chat').removeClass('theme_color_fill');

	$('.fichier').addClass('center');
			$('.fichier').addClass('active');
			$('.discussion').removeClass('active');
			$('.discussion').fadeOut(0);
			$('.container_discussion').fadeOut(0);
			$('.container_tool_chat').fadeOut(0);
			$('.container_choose_contact_action').fadeOut(0);

			if ($('.action_fichier').hasClass('theme_color_fill')) {
				$('.fichier').addClass('active');
				$('.fichier').fadeIn(400);
				$('.container_fichier').fadeIn(400);
				$('.container_tool_fichier').fadeIn(400);
			}
			else {

			}	

})

$('.app_install_sharscreen').click(function() {
	$('.action_share_screen').toggleClass('active');
})

$('.app_install_enregistrement').click(function() {
	$('.action_enregistrement').toggleClass('active');
})

/* ACTION TOOLS VIDEO */
$('.action_chat').click(function() {
	$('.no_app_text').fadeOut(400);
})
$('.action_fichier').click(function() {	
	$('.no_app_text').fadeOut(400);
	
})

$('.tools_style').click(function() {	
	$(this).toggleClass('theme_color_fill');
	
})

$('.action_chat').click(function() {
	$('.button_show_container_slide').addClass('active');
	$('.container_slide').addClass('show');
	$('.container_video').removeClass('full');
 
	$('.fichier').removeClass('center');
	if ($(this).hasClass('theme_color_fill')) {
			$('.fichier').removeClass('active');
			$('.container_fichier').fadeOut(0);
			$('.container_tool_fichier').fadeOut(0);

			$('.discussion').addClass('active');
			$('.discussion').fadeIn(400);
			$('.container_discussion').fadeIn(400);
			$('.container_tool_chat').fadeIn(400);
			$('.container_choose_contact_action').fadeToggle(400);


		}
		else {
			$('.fichier').addClass('center');
			$('.fichier').addClass('active');
			$('.discussion').removeClass('active');
			$('.discussion').fadeOut(0);
			$('.container_discussion').fadeOut(0);
			$('.container_tool_chat').fadeOut(0);
			$('.container_choose_contact_action').fadeOut(0);

			if ($('.action_fichier').hasClass('theme_color_fill')) {
				$('.fichier').addClass('active');
				$('.fichier').fadeIn(400);
				$('.container_fichier').fadeIn(400);
				$('.container_tool_fichier').fadeIn(400);
			}
			else {

			}			
			
		}
	
})

$('.action_fichier').click(function() {	
	$('.button_show_container_slide').addClass('active');
	$('.container_slide').addClass('show');
	$('.container_video').removeClass('full');

	$('.discussion').removeClass('center');
	if ($(this).hasClass('theme_color_fill')) {
			$('.discussion').removeClass('active');
			$('.container_discussion').fadeOut(0);
			$('.container_tool_chat').fadeOut(0);
			$('.container_choose_contact_action').fadeOut(0);

			$('.fichier').addClass('active');
			$('.fichier').fadeIn(400);
			$('.container_fichier').fadeIn(400);
			$('.container_tool_fichier').fadeIn(400);
		}
		else {
			$('.fichier').removeClass('active');
			$('.fichier').fadeOut(0);
			$('.container_fichier').fadeOut(0);
			$('.container_tool_fichier').fadeOut(0);

			if ($('.action_chat').hasClass('theme_color_fill')) {
				$('.discussion').addClass('center');
				$('.discussion').addClass('active');
				$('.discussion').fadeIn(400);
				$('.container_discussion').fadeIn(400);
				$('.container_tool_chat').fadeIn(400);
				$('.container_choose_contact_action').fadeIn(400);
			}
			else {

			}

			
		}
	
})

/* ------------------------------------------------- */
/* ------------------- END VIDEO ------------------- */
/* ------------------------------------------------- */

/* -------------------------------------------------------- */
/* ------------------- CONTAINER TAB 4 -------------------- */
/* -------------------------------------------------------- */

$('.button_edit_tab_4').click(function() {
	$('.content_info_editable_user_style').attr("contentEditable", "true");
	$('.content_info_editable_user_style').addClass('edit');
	$('.content_info_editable_user_style').addClass('subtitle_color_text');
})
 
	 

$('.button_save_tab_4').click(function() {
	
	var button_save = $('.button_save_tab_4');
	button_save.addClass('done');
	setTimeout(function() {
		button_save.removeClass('done');
	}, 5000);

	var done_save_tab_4 = $('.container_done_save_tab_4');
	done_save_tab_4.addClass('anim');
	setTimeout(function() {
		done_save_tab_4.removeClass('anim');
	}, 5000);


	$('.content_info_editable_user_style').attr("contentEditable", "false");
	$('.content_info_editable_user_style').removeClass('edit');
	$('.content_info_editable_user_style').removeClass('subtitle_color_text');
})

$('.action_change_password').click(function() {	
	$('.container_profil').fadeOut(0);
	$('.container_info_contact_tab_4').fadeOut(0);

	$('.container_change_password').fadeIn(400);

})
$('.button_save_new_data').click(function() {

	var button_save_new_data = $('.button_save_new_data');
	button_save_new_data.addClass('anim');
	setTimeout(function() {
		button_save_new_data.removeClass('anim');
	}, 1000);

	var container_check_valid_data = $('.container_check_valid_data');
	container_check_valid_data.addClass('anim');
	setTimeout(function() {
		container_check_valid_data.removeClass('anim');
	}, 1000);

	$('.container_change_password').delay(1000).fadeOut(0);
	$('.container_change_email').delay(1000).fadeOut(0);
	$('.container_profil').delay(1000).fadeIn(400);
	$('.container_info_contact_tab_4').delay(1000).fadeIn(400);
})
$('.cancel_save_new_data').click(function() {	
	$('.container_change_password').fadeOut(0);
	$('.container_change_email').fadeOut(0);
	$('.container_profil').fadeIn(400);
	$('.container_info_contact_tab_4').fadeIn(400);
})
$('.action_change_email').click(function() {
	$('.container_profil').fadeOut(0);
	$('.container_info_contact_tab_4').fadeOut(0);

	$('.container_change_email').fadeIn(400);
	
})

/* ------------------------------------------------------------ */
/* ------------------- END CONTAINER TAB 4 -------------------- */
/* ------------------------------------------------------------ */

/* ------------------------------------------------- */
/* ------------------- CALENDAR -------------------- */
/* ------------------------------------------------- */

$('.right_button').click(function() {
		$(this).fadeOut(0);
        $('.container_janvier').animate({
        'marginTop' : "-=980px" //moves up
        });

        $('.month_move').animate({
        'marginTop' : "-=90px" //moves up
        });
		$(this).delay( 700 ).fadeIn( 100 );

    });
$('.left_button').click(function() {
		$(this).fadeOut(0);
        $('.container_janvier').animate({
        'marginTop' : "+=980px" //moves up
        });

       	$('.month_move').animate({
        'marginTop' : "+=90px" //moves up
        });
        $(this).delay( 700 ).fadeIn( 100 );

    });

$('.day_style').click(function() {
	$('.day_style').removeClass('active');
	$('.number_day_calendar').removeClass('white_text');
	$('.container_rdv_day_calendar').removeClass('white_text');
	$('.round_rdv_day_calendar').removeClass('white_background');
	$(this).addClass('active');
	$(this).find('.number_day_calendar').addClass('white_text');
	$(this).find('.container_rdv_day_calendar').addClass('white_text');
	$(this).find('.container_rdv_day_calendar').find('.rdv_day_calendar').find('.round_rdv_day_calendar').addClass('white_background');
})

$('.rdv_more_style').click(function() {
	$('.rdv_more_style').addClass('slide');
	$('.rdv_more_style').fadeOut(400);
	$(this).fadeIn(0);
	$(this).find('.drop_down_rdv_day').delay(400).fadeIn(100);
	$('.container_return_drop_down_more_rdv').fadeIn(400);	
})

$('.container_return_drop_down_more_rdv').click(function() {
	$('.rdv_more_style').removeClass('slide');
	$('.rdv_more_style').fadeIn(400);
	$('.rdv_more_style .drop_down_rdv_day').removeClass('active');
	$('.rdv_more_style .drop_down_rdv_day').fadeOut(400);
	$(this).fadeOut(400);	
})

$('.container_more_rdv').click(function() {
	$('.container_drop_down_rdv_day').fadeOut(400);

	$('.day_style').removeClass('active');
	$('.number_day_calendar').removeClass('white_text');
	$('.container_rdv_day_calendar').removeClass('white_text');
	$('.round_rdv_day_calendar').removeClass('white_background');	
	
	$(this).parent().parent().addClass('active');

	$(this).parent().parent().find('.number_day_calendar').addClass('white_text');
	$(this).parent().parent().find('.container_rdv_day_calendar').addClass('white_text');
	$(this).parent().parent().find('.container_rdv_day_calendar').find('.rdv_day_calendar').find('.round_rdv_day_calendar').addClass('white_background');	
})

$('.rdv_day_calendar').click(function() {
	$('.container_drop_down_more_rdv').fadeOut(400)

	$('.container_drop_down_rdv_day').fadeOut(400)

	$('.day_style').removeClass('active');
	$('.number_day_calendar').removeClass('white_text');
	$('.container_rdv_day_calendar').removeClass('white_text');
	$('.round_rdv_day_calendar').removeClass('white_background');

	$(this).parent().parent().addClass('active');

	$(this).parent().parent().find('.number_day_calendar').addClass('white_text');
	$(this).parent().parent().find('.container_rdv_day_calendar').addClass('white_text');
	$(this).parent().parent().find('.container_rdv_day_calendar').find('.rdv_day_calendar').find('.round_rdv_day_calendar').addClass('white_background');	

})

/* ---------------------------------------------------- */
/* ------------------- END CALENDAR ------------------- */
/* ---------------------------------------------------- */

/* ------------------------------------------------- */
/* ------------------- DROP DOWN ------------------- */
/* ------------------------------------------------- */

/* CLOSE DROP DOWN */
$(document).click( function(){

	/* DROP DOWN AVIS */
    $('.container_drop_down_avis').removeClass('show');
	$('.container_drop_down').removeClass('show');
	$('.arrow_drop_down_avis img').fadeOut(0);
	$('.drop_down_avis').removeClass('show');

	/* DROP DOWN COMMENTAIRE */
	$('.container_drop_down_commentaire').fadeOut(400);
	$('.container_drop_down_view_commentaire').fadeOut(400);

	/* DROP DOWN RDV DAY */
	$('.container_drop_down_rdv_day').fadeOut(400);

	/* DROP DOWN MORE RDV */
	$('.container_drop_down_more_rdv').fadeOut(400);

	/* DROP DOWN FILE DONE */
	$('.container_drop_down_file_done').fadeOut(400);

	/* DROP DOWN IMG SEND */
	$('.container_drop_down_choose_contact_img').fadeOut(400);

	/* DROP DOWN APP INSTALL */
	$('.container_drop_down_app_install').fadeOut(400);

	/* DROP DOWN STAT */
	$('.container_drop_down_date_stat_tab_2').fadeOut(200);

});
/* END CLOSE DROP DOWN */

/* DROP DOWN AVIS */
$('.content_element_historique_avis').click(function() {
	event.stopPropagation();
	$(this).parent().parent().addClass('up');
	$(this).parent().find('.container_drop_down_avis').toggleClass('show');
	$(this).parent().find('.container_drop_down_avis').find('.arrow_drop_down_avis img').fadeToggle(100);
	$(this).parent().find('.container_drop_down_avis').find('.drop_down_avis').toggleClass('show');
	/* $this).parent().find('.container_drop_down_avis').find('.container_drop_down').toggleClass('show'); */

	/* FADE OTHER DROP DOWN */
	$('.container_drop_down_commentaire').fadeOut(400);
	$('.container_drop_down_view_commentaire').fadeOut(400);

})

/* DROP DOWN COMMENTAIRE */
$('.container_drop_down_commentaire').click(function() {
	event.stopPropagation();
})

$('.container_valide_commentaire').click(function() {
	$('.container_drop_down_commentaire').fadeOut(400);
})

$('.content_commentaire').click(function() {
	event.stopPropagation();
})

$('.delet_comment').click(function() {
	$('.container_drop_down_view_commentaire').fadeOut(400);
})

$('.edit_comment_historique').click(function() {
	$('.container_drop_down_view_commentaire').fadeOut(400);
	$(this).parent().parent().parent().find('.container_drop_down_commentaire').fadeIn(400);
})



$('.content_element_historique_commentaire svg').click(function() {
	event.stopPropagation();
	$(this).parent().parent().parent().addClass('up');

	if ($(this).parent().find('.container_drop_down_commentaire').hasClass('no_active')) {
			$(this).parent().find('.container_drop_down_view_commentaire').fadeToggle(400);
		}
		else{
			$(this).parent().find('.container_drop_down_commentaire').fadeToggle(400);
		}

	/* $('.container_drop_down_commentaire').fadeToggle(400); */

	/* FADE OTHER DROP DOWN */
	$('.container_drop_down_avis').removeClass('show');
	$('.container_drop_down').removeClass('show');
	$('.arrow_drop_down_avis img').fadeOut(0);
	$('.drop_down_avis').removeClass('show');

	if ($(this).parent().find('.container_drop_down_view_commentaire').hasClass('active')) {
			$(this).parent().find('.container_drop_down_view_commentaire').fadeIn(400);
		}
		else{
			
			$(this).parent().find('.container_drop_down_view_commentaire').fadeOut(400);
		}
})

/* DROP DOWN COMMENTAIRE TEXTAREA */
$('.textarea_commentaire').click(function() {
	event.stopPropagation();
})

/* DROP DOWN COMMENTAIRE VALIDE */
$('.container_valide_commentaire').click(function() {
	$(this).parent().parent().parent().find('.container_drop_down_view_commentaire').addClass('active');
	$(this).parent().parent().addClass('no_active');

})

/* DROP DOWN COMMENTAIRE DELETE COMMENT */
$('.delet_comment').click(function() {
	$(this).parent().parent().removeClass('active');
	$(this).parent().parent().parent().find('.container_drop_down_commentaire').removeClass('no_active');

})

/* DROP DOWN COMMENTAIRE CROSS CLOSE */
$('.cross_close_drop_down_commentaire').click(function() {
	$(this).parent().parent().fadeOut(400);
})

/* DROP DOWN RDV DAY */
$('.rdv_day_calendar').click(function() {
	$(this).find('.container_drop_down_rdv_day').fadeToggle(400);
	event.stopPropagation();
})

/* DROP DOWN MORE RDV */
$('.container_more_rdv').click(function() {
	$(this).find('.container_drop_down_more_rdv').fadeToggle(400);
	event.stopPropagation();
})

$('.container_drop_down_more_rdv').click(function() {
	event.stopPropagation();
})

/* DROP DOWN FILE DONE */
$('.button_more_file_done').click(function() {
	event.stopPropagation();
	$('.container_file_done').removeClass('active');
	$(this).parent().parent().addClass('active');
	$('.container_drop_down_file_done').fadeOut(0);
	$(this).parent().parent().find('.container_drop_down_file_done').fadeIn(400);
})

$('.option_drop_down_file_done_delete').click(function() {
	$(this).parent().parent().parent().fadeOut(400);
})

/* DROP DOWN IMG SEND */
$('.button_send_img_to').click(function() {
	event.stopPropagation();
	$('.container_drop_down_choose_contact_img').fadeToggle(400);
})
$('.container_drop_down_choose_contact_img').click(function() {
	event.stopPropagation();
})

/* DROP DOWN APP INSTALL */
$('.container_app_install').click(function(e) {
	$('.container_drop_down_app_install').fadeToggle(400); e.stopPropagation();
	
})

$('.container_drop_down_app_install').click(function(e) {
	e.stopPropagation();
})
/* ACTION ON DROP DOWN APP INSTALL*/

$('.button_add_app_install').click(function() {
	$(this).toggleClass('active')
	$(this).toggleClass('theme_color_background')
	$(this).find('.container_done_app_install').toggleClass('anim')

})

/* STAT DROP DOWN */

$('.date_stat_tab_2').click(function(e) {
	$('.container_drop_down_date_stat_tab_2').fadeOut(200);
	$(this).find('.container_drop_down_date_stat_tab_2').fadeToggle(200); e.stopPropagation();
})

$('.drop_down_date_stat_tab_2').click(function(e) {
	$('.container_drop_down_date_stat_tab_2').fadeOut(200); e.stopPropagation();
})


/* ----------------------------------------------------- */
/* ------------------- END DROP DOWN ------------------- */
/* ----------------------------------------------------- */



$('.tab_bar_left_2').click(function() {

	$(function () {
    $('#chart_1').highcharts({
        chart: {
            type: 'spline'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            type: 'datetime',
            labels: {
                overflow: 'justify'
            },
            
        },
        yAxis: {
            title: {
                text: 'Wind speed (m/s)',
                style: {
                        display: 'none'
                    },
            },
            min: 0,
            minorGridLineWidth: 1,
            gridLineWidth: 0,
            alternateGridColor: null,
            plotBands: [{ // Light air
                from: 0,
                to: 3.5,
                color: 'rgba(255, 255, 255, 1)',
                label: {
                    text: 'Light air',
                    style: {
                        color: 'transparent'
                    }
                }
            }, { // Light breeze
                from: 3.5,
                to: 7,
                color: '#F5F6F9',
                label: {
                    text: 'Light breeze',
                    style: {
                        color: 'transparent'
                    }
                }
            }, { // Gentle breeze
                from: 7,
                to: 10.5,
                color: 'rgba(255, 255, 255, 1)',
                label: {
                    text: 'Gentle breeze',
                    style: {
                        color: 'transparent'
                    }
                }
            }, { // Moderate breeze
                from: 10.5,
                to: 14,
                color: '#F5F6F9',
                label: {
                    text: 'Moderate breeze',
                    style: {
                        color: 'transparent'
                    }
                }
            }]
        },
        tooltip: {
            valueSuffix: ' m/s'
        },


        plotOptions: {
            spline: {
                lineWidth: 1,
                states: {
                    hover: {
                        lineWidth: 1
                    }

                },

                marker: {
                    enabled: false
                },
                pointInterval: 86400000, // one hour
                pointStart: Date.UTC(2015, 4, 6, 0, 0, 0)
            }
        },
        series: [{
            name: 'Hestavollane',
            data: [4, 7, 4, 5,
                8, 3, 1]

        }, {
            name: 'Voll',
            data: []
        }],
        navigation: {
            menuItemStyle: {
                fontSize: '10px'
            }
        },
        tooltip: {
        	height: 25,
		    backgroundColor: '#FFF',
		    borderColor: '#FFF',
		    borderRadius: 25,
		    borderWidth: 0
		}
    });

});

$(function () {
    $('#chart_2').highcharts({
        chart: {
            type: 'spline'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            type: 'datetime',
            labels: {
                overflow: 'justify'
            },
            
        },
        yAxis: {
            title: {
                text: 'Wind speed (m/s)',
                style: {
                        display: 'none'
                    },
            },
            min: 0,
            minorGridLineWidth: 1,
            gridLineWidth: 0,
            alternateGridColor: null,
            plotBands: [{ // Light air
                from: 0,
                to: 3.5,
                color: 'rgba(255, 255, 255, 1)',
                label: {
                    text: 'Light air',
                    style: {
                        color: 'transparent'
                    }
                }
            }, { // Light breeze
                from: 3.5,
                to: 7,
                color: '#F5F6F9',
                label: {
                    text: 'Light breeze',
                    style: {
                        color: 'transparent'
                    }
                }
            }, { // Gentle breeze
                from: 7,
                to: 10.5,
                color: 'rgba(255, 255, 255, 1)',
                label: {
                    text: 'Gentle breeze',
                    style: {
                        color: 'transparent'
                    }
                }
            }, { // Moderate breeze
                from: 10.5,
                to: 14,
                color: '#F5F6F9',
                label: {
                    text: 'Moderate breeze',
                    style: {
                        color: 'transparent'
                    }
                }
            },
            { // Gentle breeze
                from: 14,
                to: 17.5,
                color: 'rgba(255, 255, 255, 1)',
                label: {
                    text: 'Gentle breeze',
                    style: {
                        color: 'transparent'
                    }
                   }
                },
                { // Moderate breeze
                from: 17.5,
                to: 21,
                color: '#F5F6F9',
                label: {
                    text: 'Moderate breeze',
                    style: {
                        color: 'transparent'
                    }
                }
                }]
        },
        tooltip: {
            valueSuffix: ' m/s'
        },


        plotOptions: {
            spline: {
                lineWidth: 1,
                states: {
                    hover: {
                        lineWidth: 1
                    }

                },

                marker: {
                    enabled: false
                },
                pointInterval: 86400000, // one hour
                pointStart: Date.UTC(2015, 4, 6, 0, 0, 0)
            }
        },
        series: [{
            name: 'Hestavollane',
            data: [1, 3, 7, 6,
                1, 3, 9]

        }, {
            name: 'Voll',
            data: []
        }],
        navigation: {
            menuItemStyle: {
                fontSize: '10px'
            }
        },
        tooltip: {
        	height: 25,
		    backgroundColor: '#FFF',
		    borderColor: '#FFF',
		    borderRadius: 25,
		    borderWidth: 0
		}
    });

});

$(function () {

    Highcharts.data({
        csv: document.getElementById('tsv').innerHTML,
        itemDelimiter: '\t',
        parsed: function (columns) {

            var brands = {},
                brandsData = [],
                versions = {},
                drilldownSeries = [];

            // Parse percentage strings
            columns[1] = $.map(columns[1], function (value) {
                if (value.indexOf('%') === value.length - 1) {
                    value = parseFloat(value);
                }
                return value;
            });

            $.each(columns[0], function (i, name) {
                var brand,
                    version;

                if (i > 0) {

                    // Remove special edition notes
                    name = name.split(' -')[0];

                    // Split into brand and version
                    version = name.match(/([0-9]+[\.0-9x]*)/);
                    if (version) {
                        version = version[0];
                    }
                    brand = name.replace(version, '');

                    // Create the main data
                    if (!brands[brand]) {
                        brands[brand] = columns[1][i];
                    } else {
                        brands[brand] += columns[1][i];
                    }

                    // Create the version data
                    if (version !== null) {
                        if (!versions[brand]) {
                            versions[brand] = [];
                        }
                        versions[brand].push(['v' + version, columns[1][i]]);
                    }
                }

            });

            $.each(brands, function (name, y) {
                brandsData.push({
                    name: name,
                    y: y,
                    drilldown: versions[name] ? name : null
                });
            });
            $.each(versions, function (key, value) {
                drilldownSeries.push({
                    name: key,
                    id: key,
                    data: value
                });
            });

            // Create the chart
            $('#chart_3').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Browser market shares. November, 2013'
                },
                subtitle: {
                    text: 'Click the columns to view versions. Source: netmarketshare.com.'
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: 'Total percent market share'
                    }
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}'
                        }
                    }
                },

                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                },

                series: [{
                    name: 'Brands',
                    colorByPoint: true,
                    data: brandsData
                }],
                drilldown: {
                    series: drilldownSeries
                }
            });
        }
    });
});




})



/* -------------------- NUMBER RDV -------------------- */