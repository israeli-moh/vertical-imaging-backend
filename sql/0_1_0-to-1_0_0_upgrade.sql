--
--  Comment Meta Language Constructs:
--
--  #IfNotTable
--    argument: table_name
--    behavior: if the table_name does not exist,  the block will be executed

--  #IfTable
--    argument: table_name
--    behavior: if the table_name does exist, the block will be executed

--  #IfColumn
--    arguments: table_name colname
--    behavior:  if the table and column exist,  the block will be executed

--  #IfMissingColumn
--    arguments: table_name colname
--    behavior:  if the table exists but the column does not,  the block will be executed

--  #IfNotColumnType
--    arguments: table_name colname value
--    behavior:  If the table table_name does not have a column colname with a data type equal to value, then the block will be executed

--  #IfNotRow
--    arguments: table_name colname value
--    behavior:  If the table table_name does not have a row where colname = value, the block will be executed.

--  #IfNotRow2D
--    arguments: table_name colname value colname2 value2
--    behavior:  If the table table_name does not have a row where colname = value AND colname2 = value2, the block will be executed.

--  #IfNotRow3D
--    arguments: table_name colname value colname2 value2 colname3 value3
--    behavior:  If the table table_name does not have a row where colname = value AND colname2 = value2 AND colname3 = value3, the block will be executed.

--  #IfNotRow4D
--    arguments: table_name colname value colname2 value2 colname3 value3 colname4 value4
--    behavior:  If the table table_name does not have a row where colname = value AND colname2 = value2 AND colname3 = value3 AND colname4 = value4, the block will be executed.

--  #IfNotRow2Dx2
--    desc:      This is a very specialized function to allow adding items to the list_options table to avoid both redundant option_id and title in each element.
--    arguments: table_name colname value colname2 value2 colname3 value3
--    behavior:  The block will be executed if both statements below are true:
--               1) The table table_name does not have a row where colname = value AND colname2 = value2.
--               2) The table table_name does not have a row where colname = value AND colname3 = value3.

--  #IfRow2D
--    arguments: table_name colname value colname2 value2
--    behavior:  If the table table_name does have a row where colname = value AND colname2 = value2, the block will be executed.

--  #IfRow3D
--        arguments: table_name colname value colname2 value2 colname3 value3
--        behavior:  If the table table_name does have a row where colname = value AND colname2 = value2 AND colname3 = value3, the block will be executed.

--  #IfIndex
--    desc:      This function is most often used for dropping of indexes/keys.
--    arguments: table_name colname
--    behavior:  If the table and index exist the relevant statements are executed, otherwise not.

--  #IfNotIndex
--    desc:      This function will allow adding of indexes/keys.
--    arguments: table_name colname
--    behavior:  If the index does not exist, it will be created

--  #EndIf
--    all blocks are terminated with a #EndIf statement.

--  #IfNotListReaction
--    Custom function for creating Reaction List

--  #IfNotListOccupation
--    Custom function for creating Occupation List

--  #IfTextNullFixNeeded
--    desc: convert all text fields without default null to have default null.
--    arguments: none

--  #IfTableEngine
--    desc:      Execute SQL if the table has been created with given engine specified.
--    arguments: table_name engine
--    behavior:  Use when engine conversion requires more than one ALTER TABLE

--  #IfInnoDBMigrationNeeded
--    desc: find all MyISAM tables and convert them to InnoDB.
--    arguments: none
--    behavior: can take a long time.

--  #IfTranslationNeeded
--    desc: find all MyISAM tables and convert them to InnoDB.
--    arguments: constant_name english hebrew
--    behavior: can take a long time.


#IfNotTable fhir_rest_elements
 CREATE TABLE `fhir_rest_elements` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `fhir_rest_elements`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `fhir_rest_elements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
#EndIf

#IfNotRow fhir_rest_elements name Organization
INSERT INTO `fhir_rest_elements` (`name`, `active`) VALUES
('Organization', 1);
#EndIf

#IfNotRow fhir_rest_elements name Patient
INSERT INTO `fhir_rest_elements` (`name`, `active`) VALUES
('Patient', 1);
#EndIf

#IfNotRow fhir_rest_elements name Appointment
INSERT INTO `fhir_rest_elements` (`name`, `active`) VALUES
('Appointment', 1);
#EndIf

#IfNotRow fhir_rest_elements name HealthcareService
INSERT INTO `fhir_rest_elements` (`name`, `active`) VALUES
('HealthcareService', 1);
#EndIf

#IfNotTable fhir_healthcare_services
RENAME TABLE `healthcare_services` TO `fhir_healthcare_services`;
#EndIf

#IfMissingColumn fhir_healthcare_services id
ALTER TABLE `fhir_healthcare_services` CHANGE `identifier` `id` INT NOT NULL AUTO_INCREMENT;
#EndIf


#IfMissingColumn openemr_postcalendar_events pc_priority
ALTER TABLE `openemr_postcalendar_events` ADD `pc_priority` INT NOT NULL DEFAULT '1' AFTER `pc_gid`;
#EndIf

#IfMissingColumn openemr_postcalendar_events pc_service_type
ALTER TABLE `openemr_postcalendar_events` ADD `pc_service_type` INT NULL DEFAULT NULL AFTER `pc_priority`;
#EndIf

#IfMissingColumn openemr_postcalendar_events pc_healthcare_service_id
ALTER TABLE `openemr_postcalendar_events` ADD `pc_healthcare_service_id` INT NULL DEFAULT NULL AFTER `pc_service_type`;
#EndIf

#IfNotTable encounter_reasoncode_map
CREATE TABLE encounter_reasoncode_map (
eid INT(6) UNSIGNED,
reason_code  INT(6) UNSIGNED
);
#EndIf

#IfMissingColumn facility active
ALTER TABLE facility ADD active int DEFAULT 1;
#EndIf


-- Example for Eyal
#IfNotRow2D list_options list_id lists option_id clinikal_reason_code
INSERT INTO `list_options` (`list_id`, `option_id`, `title`, `seq`, `is_default`, `option_value`, `mapping`, `notes`, `codes`, `toggle_setting_1`, `toggle_setting_2`, `activity`, `subtype`, `edit_options`) VALUES
('lists', 'clinikal_reason_code', 'Clinikal Reason code', 0, 0, 0, '', 'BFBFBF|0', '', 0, 0, 1, '', 1),
('clinikal_reason_code', '1', 'shoulder', 10, 0, 0, '', 'FFFF2B|0', '', 0, 0, 1, '', 1),
('clinikal_reason_code', '2', 'ankle', 20, 0, 0, '', 'FFFF2B|0', '', 0, 0, 1, '', 1);
#EndIf

-- no appropriate condition
UPDATE `list_options` SET `list_id` = 'clinikal_service_categories' WHERE list_id = 'fhir_service_categories';

-- no appropriate condition
UPDATE `list_options` SET `option_id` = 'clinikal_service_categories' WHERE option_id = 'fhir_service_categories';


#IfNotRow fhir_rest_elements name Encounter
INSERT INTO `fhir_rest_elements` (`id`, `name`, `active`) VALUES
(5, 'Encounter', 1);
#EndIf

#IfMissingColumn form_encounter status
ALTER TABLE form_encounter ADD status VARCHAR(100) NULL  AFTER `parent_encounter_id`;
#EndIf

#IfMissingColumn form_encounter eid
ALTER TABLE form_encounter ADD eid INT NULL  AFTER `status`;
#EndIf

#IfMissingColumn form_encounter priority
ALTER TABLE form_encounter ADD priority INT DEFAULT 0 AFTER `eid`;
#EndIf

#IfMissingColumn form_encounter service_type
ALTER TABLE form_encounter ADD service_type INT DEFAULT NULL  AFTER `priority`;
#EndIf


#IfNotTable encounter_reasoncode_map
CREATE TABLE encounter_reasoncode_map (
event_id INT(6),
option_id  INT(6) UNSIGNED
);
#EndIf

ALTER TABLE form_encounter MODIFY COLUMN priority INT DEFAULT 1;
ALTER TABLE `openemr_postcalendar_events` MODIFY COLUMN `pc_priority` INT NOT NULL DEFAULT 1;
ALTER TABLE `fhir_rest_elements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE event_codeReason_map DROP PRIMARY KEY;
ALTER TABLE event_codeReason_map ADD PRIMARY KEY (event_id, option_id);