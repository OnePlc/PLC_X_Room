

--
-- -- Core Form - Furniture Form Fields
--
INSERT INTO `core_form_field` (`Field_ID`, `type`, `label`, `fieldkey`, `tab`, `form`, `class`, `url_view`, `url_list`, `show_widget_left`, `allow_clear`, `readonly`, `tbl_cached_name`, `tbl_class`, `tbl_permission`) VALUES
(NULL, 'select', 'Article', 'article_idfs', 'roomfurniture-base', 'roomfurniture-single', 'col-md-2', '', '/article/api/list/0', 0, 1, 0, 'entitytag-single', 'OnePlace\\Article\\Model\\ArticleTable','add-OnePlace\\Article\\Controller\\ArticleController'),
(NULL, 'select', 'Condition', 'condition_idfs', 'roomfurniture-base', 'roomfurniture-single', 'col-md-2', '', '/tag/api/list/roomfurniture-single/condition', 0, 1, 0, 'entitytag-single', 'OnePlace\\Tag\\Model\\EntityTagTable','add-OnePlace\\Room\\Controller\\ConditionController'),
(NULL, 'select', 'Room', 'room_idfs', 'roomfurniture-base', 'roomfurniture-single', 'col-md-2', '', '/room/api/list/0', 0, 1, 0, 'entitytag-single', 'OnePlace\\Room\\Model\\RoomTable','add-OnePlace\\Room\\Controller\\RoomController'),
(NULL, 'textarea', 'Description', 'description', 'roomfurniture-base', 'roomfurniture-single', 'col-md-12', '', '', 0, 1, 0, '', '', '');

--
-- Core Form - Room Furniture Parial
--
INSERT INTO `core_form_field` (`Field_ID`, `type`, `label`, `fieldkey`, `tab`, `form`, `class`, `url_view`, `url_list`, `show_widget_left`, `allow_clear`, `readonly`, `tbl_cached_name`, `tbl_class`, `tbl_permission`) VALUES
(NULL, 'partial', 'Furniture', 'room_furniture', 'roomfurniture', 'room-single', 'col-md-12', '', '', 0, 1, 0, '', '', '');


--
-- Core Form  Tabs
--
INSERT INTO `core_form_tab` (`Tab_ID`, `form`, `title`, `subtitle`, `icon`, `counter`, `sort_id`, `filter_check`, `filter_value`) VALUES
('roomfurniture', 'room-single', 'Furniture', 'Room furnishings', 'fas fa-couch ', '', 1, '', '');


--
-- Permissions
--
INSERT INTO `permission` (`permission_key`, `module`, `label`, `nav_label`, `nav_href`, `show_in_menu`) VALUES
('add', 'OnePlace\\Room\\Controller\\ConditionController', 'Add Condition', '', '', 0);


--
-- Buttons
--
INSERT INTO `core_form_button` (`Button_ID`, `label`, `icon`, `title`, `href`, `class`, `append`, `form`, `mode`, `filter_check`, `filter_value`) VALUES
(NULL, 'Add Furniture', 'fas fa-plus', 'Add Furniture', '/room/furniture/add', 'primary', '', 'room-view', 'link', '', '');

--
-- Custom Tags
--
-- todo: add select before and check if tag exists
--
INSERT INTO `core_tag` (`Tag_ID`, `tag_key`, `tag_label`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(NULL, 'condition', 'Condition', '1', '0000-00-00 00:00:00', '1', '0000-00-00 00:00:00');