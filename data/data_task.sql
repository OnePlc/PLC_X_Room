--
-- Core Form - Room Task Parial
--
INSERT INTO `core_form_field` (`Field_ID`, `type`, `label`, `fieldkey`, `tab`, `form`, `class`, `url_view`, `url_list`, `show_widget_left`, `allow_clear`, `readonly`, `tbl_cached_name`, `tbl_class`, `tbl_permission`) VALUES
(NULL, 'partial', 'Task', 'room_task', 'room-task', 'room-single', 'col-md-12', '', '', 0, 1, 0, '', '', '');


--
-- Core Form  Tabs
--
INSERT INTO `core_form_tab` (`Tab_ID`, `form`, `title`, `subtitle`, `icon`, `counter`, `sort_id`, `filter_check`, `filter_value`) VALUES
('room-task', 'task-single', 'Task', 'Related Tasks', 'fas fa-tasks ', '', 1, '', '');

--
-- Buttons
--
INSERT INTO `core_form_button` (`Button_ID`, `label`, `icon`, `title`, `href`, `class`, `append`, `form`, `mode`, `filter_check`, `filter_value`) VALUES
(NULL, 'Add task', 'fas fa-plus', 'Add Task', '/task/add/', 'primary', '', 'room-single', 'link', '', '');
