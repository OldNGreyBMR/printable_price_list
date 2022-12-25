# Printable Pricelist for Zen Cart V1.5.8 PHP8-1
#NOTE: This version willnot work with Zen Cart 1.5.7

The only changes made to make this plugin work with zen-cart V158 and PHP8-1 are:
admin/includes/languages/english/extra_definitions
    create lang.printable_pricelist_extra_definitions.php
    
includes/languages/english/extra_definitions/
    create lang.printable_pricelist_extra_definitions.php
    
includes/templates/template_default/pricelist/
     edit tpl_main_page.php on line 92 and replace strftime()  with $zcDate->output
    
