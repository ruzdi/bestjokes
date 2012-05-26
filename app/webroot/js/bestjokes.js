jQuery(document).ready(function(){
    if(jQuery('#myCarousel').parent().hasClass("slider")){
        jQuery('#myCarousel').carousel()            
    }
    
    jQuery('#left_shadow').height(jQuery('#content').height());
    jQuery('#right_shadow').height(jQuery('#content').height());
    
    
    jQuery('ul.items li').live('click', function(){
        jQuery(this).addClass('visited');
        var id = jQuery(this).attr('id')+'_content';
        jQuery('#service_detail h2#service_detail_title').html(jQuery('#'+id).find('h2').html());
        jQuery('#service_detail h2#service_detail_desc').html(jQuery('#'+id).find('p').html());
        jQuery('#service_image img').attr('src', jQuery('#'+id).find('input').val());
    });
    
    //Chnage gallery style
    jQuery('#rg-gallery > .rg-thumbs:first').hide();
    $('#myModal').on('shown', function () {
        jQuery('#rg-gallery > .rg-image-wrapper').css('margin-bottom', '10px');
        jQuery('#rg-gallery > .rg-image-wrapper:first').after(jQuery('#rg-gallery > .rg-thumbs:first'));        
        jQuery('#rg-gallery > .rg-thumbs:first').show();
    })
    


});