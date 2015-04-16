


 /**
 * Sidebar-menu - toggle
 * ----------------------------------------------------------------------------
 */

 $(document).ready(function(){

    $(".sidebar-menu-toggle").click(function(){
        $(".sidebar-menu-container").toggleClass( "display-sidebar-menu" );
    });

    $(".submenu-toggle").click(function(){
        $(this).toggleClass( "display-submenu" );
    });
});