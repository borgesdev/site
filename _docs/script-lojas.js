jQuery(document).ready(function() {

jQuery('#upload_image_lojas').click(function() {
	formfield = jQuery('#imagem_lojas').attr('name');
	tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	return false;
});

window.send_to_editor = function(html) {
	imgurl = jQuery('img',html).attr('src');
	jQuery('#imagem_lojas').val(imgurl);
	
	tb_remove();
}

});