/**
 * *****************************************************************************
 * File: admin.js
 * Description: This js file is used for the back end javascript
 * Create Date: May 27, 2012
 * @author Md. Ruzdi Islam  
 * @copyright Copyright © 2012 Artomus , All rights reserved
 * ***************************************************************************
 */
jQuery(document).ready(function(){
    //setting dropdown event for menu
    jQuery('.dropdown-toggle').dropdown()
    
    // set the icon for sorted items both ascending & descending
    jQuery('.sortinglist .asc').append('<i class="pull-left icon-arrow-down"></i>');
    jQuery('.sortinglist .desc').append('<i class="pull-left icon-arrow-up"></i>')
});
