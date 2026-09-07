## 2026-09-06 v 4.02 PrintablePriceList changelog

# profile-3.css
 *   removed unused selector: .colhPL
 *   cleaned trailing whitespace and whitespace-only lines
 *   cleaned selector spacing: 'body, html  {' => 'body, html {'
 *   removed '.footPL position: absolute; bottom: 0' which overlapped the last data
 *   line in print; repeating page footer now handled by 'tfoot { display:
 *   table-footer-group; }' in profile-base.css
 *   mirrored the full-bleed print rules and link-decor handling from profile-base.css
 *   grid borders defined per-cell (td/th), not on the whole table; re-asserted
 *   '.tablePL td, .tablePL th { border: 1px solid #ddf }' with 'border-collapse:
 *   collapse' so the cell grid prints matching the on-screen rendering
 *   cancels Bootstrap's print overrides ('@page size: a3', 'body/.container
 *   min-width: 992px !important') whose overflow triggered Chrome print scaling
 *   that rendered 1px borders sub-pixel
 
 * mirrored from profile-base.css: full-bleed so the price list spans the printed page width, matching the full-width site footer on Bootstrap-based templates. 'min-width: 0' cancels Bootstrap's print 'body/.container { min-width: 992px !important }',    which otherwise widens the layout past the printable area, triggers Chrome's  print scaling and renders 1px borders sub-pixel (invisible). 
 * cancel Bootstrap's print '@page { size: a3 }' and body min-width overrides 
 
 * The price-list grid borders live on the individual cells (td/th), not on the whole table. Use 'border-collapse: collapse' so adjacent cells merge into the same single-line grid as on screen. 
 

# profile-base.css
 * corrected syntax error that has existed since forever: 'page-break-before: always;!important' => 'always!important'
 * removed unused selectors: #optionsPL, .selectionPL, .selectionPl table
 * consolidated duplicate .pagePL/.pageOnePL rules into a single rule
 * cleaned selector spacing: 'h5 ,h6' => 'h5, h6', '#boxesPL td form{' => '#boxesPL td form {', 'td.prcPL , td.splPL' => 'td.prcPL, td.splPL'
 * simplified equivalent declarations: 'padding: 2px 2px' => '2px'; '.imgDescrPL div' border shorthand
 * normalized @media print indentation; increased on screen font size from  0.6em to 0.8rem  ln53
 *
 * print output now full-bleeds the price list to the printed page width so it aligns with the site footer when the store template uses a max-width Bootstrap '.container' (e.g. the BMH bootstrap templates) print rule 'a' => 'a:link, a:visited' so link underlines are removed even when a template stylesheet (e.g. BMH bootstrap) sets 'a { text-decoration: underline }'
 * sr added; css to ovecome absolute positioning issues of dropdown selectors
 * Full-bleed the price list so its print output spans the page width, matching the full-width site footer. Bootstrap-based templates (e.g. BMH bootstrap) wrap the page content in a max-width '.container', which prints centered with wide left/right margins. 
 
# tpl_pricelist_default.php
 * print opens in new page
 * sr (screen reader)label included for category

# auto.printable_pric_list.php
 * docblocks
 * correct directory patsh to stylesheets base on installed version 