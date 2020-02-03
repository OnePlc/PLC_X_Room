--
-- Base Table
--
CREATE TABLE `room_furniture` (
  `Furniture_ID` int(11) NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `room_furniture`
  ADD PRIMARY KEY (`Furniture_ID`);

ALTER TABLE `room_furniture`
  MODIFY `Furniture_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Permissions
--
INSERT INTO `permission` (`permission_key`, `module`, `label`, `nav_label`, `nav_href`, `show_in_menu`) VALUES
('add', 'OnePlace\\Room\\Controller\\FurnitureController', 'Add', '', '', 0),
('edit', 'OnePlace\\Room\\Controller\\FurnitureController', 'Edit', '', '', 0),
('index', 'OnePlace\\Room\\Controller\\FurnitureController', 'Index', 'Furniture', '/room/furniture', 1),
('list', 'OnePlace\\Room\\Controller\\FurnitureApiController', 'List', '', '', 1),
('view', 'OnePlace\\Room\\Controller\\FurnitureController', 'View', '', '', 0);

--
-- Form
--
INSERT INTO `core_form` (`form_key`, `label`, `entity_class`, `entity_tbl_class`) VALUES
('roomfurniture-single', 'Furniture', 'OnePlace\\Room\\Model\\Furniture', 'OnePlace\\Room\\Model\\FurnitureTable');

--
-- Index List
--
INSERT INTO `core_index_table` (`table_name`, `form`, `label`) VALUES
('room_furniture-index', 'roomfurniture-single', 'Furniture Index');

--
-- Tabs
--
INSERT INTO `core_form_tab` (`Tab_ID`, `form`, `title`, `subtitle`, `icon`, `counter`, `sort_id`, `filter_check`, `filter_value`) VALUES
('roomfurniture-base', 'roomfurniture-single', 'Furniture', 'Romm Furniture', 'fas fa-cogs', '', '0', '', '');

--
-- Buttons
--
INSERT INTO `core_form_button` (`Button_ID`, `label`, `icon`, `title`, `href`, `class`, `append`, `form`, `mode`, `filter_check`, `filter_value`) VALUES
(NULL, 'Save Furniture', 'fas fa-save', 'Save Furniture', '#', 'primary saveForm', '', 'roomfurniture-single', 'link', '', ''),
(NULL, 'Edit Furniture', 'fas fa-edit', 'Edit Furniture', '/room/furniture/edit/##ID##', 'primary', '', 'roomfurniture-view', 'link', '', ''),
(NULL, 'Add Furniture', 'fas fa-plus', 'Add Furniture', '/room/furniture/add', 'primary', '', 'roomfurniture-index', 'link', '', '');

--
-- Fields
--
INSERT INTO `core_form_field` (`Field_ID`, `type`, `label`, `fieldkey`, `tab`, `form`, `class`, `url_view`, `url_list`, `show_widget_left`, `allow_clear`, `readonly`, `tbl_cached_name`, `tbl_class`, `tbl_permission`) VALUES
(NULL, 'text', 'Name', 'label', 'roomfurniture-base', 'roomfurniture-single', 'col-md-3', '/room/furniture/view/##ID##', '', 0, 1, 0, '', '', '');

--
-- Default Widgets
--
INSERT INTO `core_widget` (`Widget_ID`, `widget_name`, `label`, `permission`) VALUES
(NULL, 'roomfurniture_dailystats', 'Room Furniture - Daily Stats', 'index-Room\\Controller\\FurnitureController'),
(NULL, 'roomfurniture_taginfo', 'Room Furniture - Tag Info', 'index-Room\\Controller\\FurnitureController');

COMMIT;