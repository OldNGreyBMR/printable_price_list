<?php
// -----
// Part of the "Printable Price List" plugin by lat9.
// Copyright (C) 2026, https://vinosdefrutastropicales.com
//
// Last updated: v4.0.2 by OldNGrey
// Derive the web path from the plugin's installed version directory so the stylesheets keep loading correctly regardless of the installed version.

use Zencart\Traits\InteractsWithPlugins;
/**
 * Summary of zcObserverPrintablePriceList
 */
class zcObserverPrintablePriceList extends base
{
    use InteractsWithPlugins;
    /**
     * Summary of __construct
     */
    public function __construct()
    {
        global $current_page_base;

        $this->detectZcPluginDetails(__DIR__);

        if ($current_page_base !== FILENAME_PRICELIST) {
            $this->attach(
                $this,
                [
                    'NOTIFY_INFORMATION_SIDEBOX_ADDITIONS',
                ]
            );
        } else {
            // -----
            // Instantiate the price list for use by the template and observed notification.
            //
            require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'PrintablePriceList.php';
            global $price_list;
            $price_list = new PrintablePriceList();

            $this->attach(
                $this,
                [
                    'NOTIFY_HTML_HEAD_END',
                ]
            );
        }
    }
    /**
     * Summary of updateNotifyHtmlHeadEnd
     * @param mixed $class
     * @param mixed $eventId
     * @return void
     */
    protected function updateNotifyHtmlHeadEnd(&$class, $eventId)
    {
        global $price_list;

        // Derive the web path from the plugin's installed version directory so the
        // stylesheets keep loading correctly regardless of the installed version.
        if (!empty($this->zcPluginCatalogPath)) {
            $css_dir = DIR_WS_CATALOG . $this->zcPluginCatalogPath . 'includes/templates/default/css/';
        } else {
            // Fallback: derive purely from this file's location, no DB install record needed.
            $rel = str_replace(rtrim(DIR_FS_CATALOG, '\\/') . '/', '', str_replace('\\', '/', dirname(__DIR__, 3)));
            $css_dir = DIR_WS_CATALOG . $rel . '/includes/templates/default/css/';
        }

        echo '<!-- Printable Price List Styles -->' . PHP_EOL;
        echo '<link rel="stylesheet" type="text/css" href="' . $css_dir . 'profile-base.css" />' . PHP_EOL;

        $profile_css = 'profile-' . $price_list->getCurrentProfile() . '.css';
        echo '<link rel="stylesheet" type="text/css" href="' . $css_dir . $profile_css . '" />' . PHP_EOL;
    }

    /**
     *
     * @param mixed $class
     * @param mixed $eventID
     * @param mixed $not_used
     * @param mixed $information
     * @return void
     */
    protected function updateNotifyInformationSideboxAdditions(&$class, $eventID, $not_used, &$information)
    {
        if (PL_SHOW_INFO_LINK === 'false' || !is_array($information)) {
            return;
        }

        // -----
        // The Bootstrap template (and possibly others) provides a specific set of
        // classes to apply to the information-sidebox links.
        //
        global $information_classes;
        $link_class = (isset($information_classes)) ? ' class="' . $information_classes . '"' : '';
        $link_target = (PL_INFO_LINK_NEW_PAGE === 'true') ? '_blank' : '_self';
        $pricelist_page_link =
            '<a ' . $link_class . ' href="' . zen_href_link(FILENAME_PRICELIST) . '" target="' . $link_target . '">' .
                BOX_HEADING_PRICELIST .
            '</a>';
        $link_position = ((int)PL_INFO_LINK_POSITION) - 1;
        if ($link_position < 0) {
            $link_position = 0;
        }
        array_splice($information, $link_position, 0, $pricelist_page_link);
    }
}
