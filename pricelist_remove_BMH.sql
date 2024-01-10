# for use in PHPMyAdmin where tabel prefix zen_ is used NOT zen cart admin module REMOVE THIS LINE before use
DELETE FROM zen_configuration WHERE configuration_key LIKE 'PL_%';
DELETE FROM zen_configuration_group WHERE configuration_group_title='Printable Price-list';
DELETE FROM zen_configuration_group WHERE configuration_group_title LIKE 'Price-list Profile-%';
DELETE FROM zen_admin_pages WHERE page_key LIKE 'config%Pricelist%';