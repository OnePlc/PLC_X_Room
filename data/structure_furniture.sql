
ALTER TABLE `room_furniture`
ADD `article_idfs` INT(11) NOT NULL DEFAULT '0' AFTER `label`,
ADD `condition_idfs` INT(11) NOT NULL DEFAULT '0' AFTER `article_idfs`,
ADD `room_idfs` INT(11) NOT NULL DEFAULT '0' AFTER `condition_idfs`,
ADD `description` TEXT NOT NULL AFTER `room_idfs`;

