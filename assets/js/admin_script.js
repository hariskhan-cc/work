
function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
return true;
}   

    jQuery(document).ready(function($)
    {     
        // jQuery('#number').mask('(999)-999-9999');  
        // jQuery('#whatsapp').inputmask('(99)-9999-9999');  
            $('#number').usPhoneFormat({
                format: 'xxxx-xxxxxxx',
            });   
            $('#whatsapp').usPhoneFormat({
                format: '(xxx) xxx-xxxx',
            });   

        if($(".head_logo").val() != '' || $(".head_logo").val() != null){
            $('div.head_logo').removeAttr('style');
        }
        if($(".footer_logo").val() != '' || $(".footer_logo").val() != null){
            $('div.footer_logo').removeAttr('style');
        }
        if($(".favicon").val() != '' || $(".favicon").val() != null){
            $('div.favicon').removeAttr('style');
        }

        $('.upload-button').on( 'click' , function(e) {
            e.preventDefault();
    
            var mediaUploader;
            var $media_uploader = $(this).prev().attr('name');
            var $logo_uploader  = $(this).prev().prev().attr('name');
            var $image_uploader = $(this).prev().next().attr('class').split(" ")[3];
    
            if ( mediaUploader ) {
    
                mediaUploader.open();
                return;
            } 
    
            mediaUploader = wp.media.frames.file_frame = wp.media({
                title: 'Choose Media To Upload',
                button: {
                    text: 'choose file'
                },
                multiple: false
            });
    
            mediaUploader.on( 'select' , function(e) {
                attachment = mediaUploader.state().get('selection').first().toJSON();
    
                if ( $logo_uploader == 'head_logo') {
                    var header_logo = attachment.url;
                    if ( header_logo != '' ) {
                        $('div.head_logo').removeAttr('style');
                        $('#header_logo').val(attachment.url);
                        $('#header_logo').next().children('img').attr('src',header_logo);
                    }
                }
                if ( $logo_uploader == 'footer_logo') {
                    var foot_logo = attachment.url;
                    if ( foot_logo != '' ) {
                        $('div.footer_logo').removeAttr('style');
                        $('#foot_logo').val(attachment.url);
                        $('#foot_logo').next().children('img').attr('src',foot_logo);
                    }
                }
                if ( $logo_uploader == 'favicon') {
                    var fav_icon = attachment.url;
                    if ( fav_icon != '' ) {
                        $('div.favicon').removeAttr('style');
                        $('#fav_icon').val(attachment.url);
                        $('#fav_icon').next().children('img').attr('src',fav_icon);
                    }
                }
            });
            
            mediaUploader.open();
        });
    });  
    
    