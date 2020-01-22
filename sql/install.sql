-- Queries for imaging vertical - settup and data

INSERT INTO `list_options` (`list_id`, `option_id`, `title`, `seq`, `is_default`, `option_value`, `mapping`, `notes`, `codes`, `toggle_setting_1`, `toggle_setting_2`, `activity`, `subtype`, `edit_options`, `timestamp`) VALUES ('apps', 'react-dev', '../client-app/dev-mode/build', '100', '1', '0', '', NULL, '', '0', '0', '1', '', '1', '2017-07-23 09:33:02');
UPDATE globals SET gl_value = 'style_clinikal_generic.css' WHERE gl_name = 'css_header';
UPDATE globals SET gl_value = '1' WHERE gl_name = 'rest_api';
INSERT INTO `modules` (`mod_id`, `mod_name`, `mod_directory`, `mod_parent`, `mod_type`, `mod_active`, `mod_ui_name`, `mod_relative_link`, `mod_ui_order`, `mod_ui_active`, `mod_description`, `mod_nick_name`, `mod_enc_menu`, `permissions_item_table`, `directory`, `date`, `sql_run`, `type`) VALUES (NULL, 'ClinikalAPI', 'ClinikalAPI', '', '', '1', 'ClinikalAPI', '', '15', '0', '', '', '', NULL, '', '2019-12-04 00:26:40', '1', '1');
INSERT INTO `modules` (`mod_id`, `mod_name`, `mod_directory`, `mod_parent`, `mod_type`, `mod_active`, `mod_ui_name`, `mod_relative_link`, `mod_ui_order`, `mod_ui_active`, `mod_description`, `mod_nick_name`, `mod_enc_menu`, `permissions_item_table`, `directory`, `date`, `sql_run`, `type`) VALUES (NULL, 'FhirAPI', 'FhirAPI', '', '', '1', 'FhirAPI', '', '15', '0', '', '', '', NULL, '', '2019-12-04 00:26:40', '1', '1');

DELETE FROM list_options  WHERE `list_id` = 'apptstat';


-- Genric queries for fhir api - new tables and generic data

-- Appiontment statuses from Fhir
INSERT INTO `list_options` (`list_id`, `option_id`, `title`, `seq`, `is_default`, `option_value`, `mapping`, `notes`, `codes`, `toggle_setting_1`, `toggle_setting_2`, `activity`, `subtype`, `edit_options`, `timestamp`) VALUES
('apptstat', 'pending',         'Pending',     20, 0, 0, '', 'BFBFBF|0', '', 0, 0, 1, '', 1, '2017-03-09 07:22:18'),
('apptstat', 'booked',          'Booked',      45, 0, 0, '', 'FFFF2B|0', '', 0, 0, 1, '', 1, '2017-03-09 07:22:18'),
('apptstat', 'arrived',         'Arrived',     80, 0, 0, '', 'C0FF96|0', '', 0, 0, 1, '', 1, '2017-03-09 07:22:18'),
('apptstat', 'cancelled',       'Cancelled',   65, 0, 0, '', 'BFBFBF|0', '', 0, 0, 1, '', 1, '2017-03-09 07:22:18'),
('apptstat', 'noshow',          'No Show',     60, 0, 0, '', 'FFC9F8|0', '', 0, 0, 1, '', 1, '2017-03-09 07:22:18'),
('apptstat', 'waitlist',        'Waitlisted',  15, 0, 0, '', '87FF1F|0', '', 0, 0, 1, '', 1, '2017-03-09 07:22:18');

CREATE TABLE `healthcare_services` (
	`identifier` INT NOT NULL AUTO_INCREMENT,
    `active` BOOLEAN NOT NULL DEFAULT 1,
    `providedby` INT NOT NULL,
    `category` INT NOT NULL,
    `type` INT NOT NULL,
    `name` VARCHAR(125) NOT NULL,
    `comment` TEXT,
    `extradetails` TEXT,
    `availabletime` JSON,
    `notavailable` JSON,
    `availabilityexceptions` TEXT,
    CONSTRAINT time_json CHECK (Json_valid(`availabletime`)),
    CONSTRAINT tn_avlbl_json CHECK (Json_valid(`notavailable`)),
    PRIMARY KEY (`identifier`)
) ENGINE = innodb;
