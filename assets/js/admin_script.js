
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
        $(document).ready(function () {
            $('#number').usPhoneFormat({
                format: '(xxx) xxx-xxxx',
            });   
        });
        $(document).ready(function () {
            $('#whatsapp').usPhoneFormat({
                format: '(xxx) xxx-xxxx',
            });   
        });

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
                        $('#header-logo-upload').val(attachment.url);
                        $('#header-logo-upload').next().children('img').attr('src',header_logo);
                    }
                }
                if ( $logo_uploader == 'footer_logo') {
                    var header_logo = attachment.url;
                    if ( header_logo != '' ) {
                        $('div.footer_logo').removeAttr('style');
                        $('#header-logo-upload').val(attachment.url);
                        $('#header-logo-upload').next().children('img').attr('src',header_logo);
                    }
                }
                if ( $logo_uploader == 'favicon') {
                    var header_logo = attachment.url;
                    if ( header_logo != '' ) {
                        $('div.favicon').removeAttr('style');
                        $('#header-logo-upload').val(attachment.url);
                        $('#header-logo-upload').next().children('img').attr('src',header_logo);
                    }
                }
            });
            
            mediaUploader.open();
        });
    });  
    
    