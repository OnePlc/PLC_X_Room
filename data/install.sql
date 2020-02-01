--
-- Base Table
--
CREATE TABLE `room` (
  `Room_ID` int(11) NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `room`
  ADD PRIMARY KEY (`Room_ID`);

ALTER TABLE `room`
  MODIFY `Room_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Permissions
--
INSERT INTO `permission` (`permission_key`, `module`, `label`, `nav_label`, `nav_href`, `show_in_menu`) VALUES
('add', 'OnePlace\\Room\\Controller\\RoomController', 'Add', '', '', 0),
('edit', 'OnePlace\\Room\\Controller\\RoomController', 'Edit', '', '', 0),
('index', 'OnePlace\\Room\\Controller\\RoomController', 'Index', 'Rooms', '/room', 1),
('list', 'OnePlace\\Room\\Controller\\ApiController', 'List', '', '', 1),
('view', 'OnePlace\\Room\\Controller\\RoomController', 'View', '', '', 0),
('dump', 'OnePlace\\Room\\Controller\\ExportController', 'Excel Dump', '', '', 0),
('index', 'OnePlace\\Room\\Controller\\SearchController', 'Search', '', '', 0);

--
-- Form
--
INSERT INTO `core_form` (`form_key`, `label`, `entity_class`, `entity_tbl_class`) VALUES
('room-single', 'Room', 'OnePlace\\Room\\Model\\Room', 'OnePlace\\Room\\Model\\RoomTable');

--
-- Index List
--
INSERT INTO `core_index_table` (`table_name`, `form`, `label`) VALUES
('room-index', 'room-single', 'Room Index');

--
-- Tabs
--
INSERT INTO `core_form_tab` (`Tab_ID`, `form`, `title`, `subtitle`, `icon`, `counter`, `sort_id`, `filter_check`, `filter_value`) VALUES ('room-base', 'room-single', 'Room', 'Base', 'fas fa-cogs', '', '0', '', '');

--
-- Buttons
--
INSERT INTO `core_form_button` (`Button_ID`, `label`, `icon`, `title`, `href`, `class`, `append`, `form`, `mode`, `filter_check`, `filter_value`) VALUES
(NULL, 'Save Room', 'fas fa-save', 'Save Room', '#', 'primary saveForm', '', 'room-single', 'link', '', ''),
(NULL, 'Edit Room', 'fas fa-edit', 'Edit Room', '/room/edit/##ID##', 'primary', '', 'room-view', 'link', '', ''),
(NULL, 'Add Room', 'fas fa-plus', 'Add Room', '/room/add', 'primary', '', 'room-index', 'link', '', ''),
(NULL, 'Export Rooms', 'fas fa-file-excel', 'Export Rooms', '/room/export', 'primary', '', 'room-index', 'link', '', ''),
(NULL, 'Find Rooms', 'fas fa-searh', 'Find Rooms', '/room/search', 'primary', '', 'room-index', 'link', '', ''),
(NULL, 'Export Rooms', 'fas fa-file-excel', 'Export Rooms', '#', 'primary initExcelDump', '', 'room-search', 'link', '', ''),
(NULL, 'New Search', 'fas fa-searh', 'New Search', '/room/search', 'primary', '', 'room-search', 'link', '', '');

--
-- Fields
--
INSERT INTO `core_form_field` (`Field_ID`, `type`, `label`, `fieldkey`, `tab`, `form`, `class`, `url_view`, `url_list`, `show_widget_left`, `allow_clear`, `readonly`, `tbl_cached_name`, `tbl_class`, `tbl_permission`) VALUES
(NULL, 'text', 'Name', 'label', 'room-base', 'room-single', 'col-md-3', '/room/view/##ID##', '', 0, 1, 0, '', '', '');

--
-- Default Widgets
--
INSERT INTO `core_widget` (`Widget_ID`, `widget_name`, `label`, `permission`) VALUES
(NULL, 'room_dailystats', 'Room - Daily Stats', 'index-Room\\Controller\\RoomController'),
(NULL, 'room_taginfo', 'Room - Tag Info', 'index-Room\\Controller\\RoomController');

COMMIT;