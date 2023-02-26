# Printable Pricelist for Zen Cart V1.5.8 PHP8-2
#copy the zc 158 files to your folders

#NOTE: To use with Zen Cart 1.5.7 and PHP7.4 and PHP8.0
#This will not work with PHP8.1 as strftime() is deprecated
#copy the zc157 files to your folders 


The only changes made to make this plugin work with zen-cart V158 and PHP8-1 are:
admin/includes/languages/english/extra_definitions
    create lang.printable_pricelist_menu_definitions.php
    
includes/languages/english/extra_definitions/
    create lang.printable_pricelist_extra_definitions.php
    
includes/templates/template_default/pricelist/
     edit tpl_main_page.php on line 92 and replace strftime()  with $zcDate->output

To Use from the client side
----------------------------
invoke with DOMAIN NAME/index.php?main_page=pricelist
    
