-- setting for Isreali imaging clinics
REPLACE INTO `globals` (`gl_name`, `gl_index`, `gl_value`) VALUES ('date_display_format', '0', '2'),('language_default', '0', 'Hebrew');

-- update menu for the admin user
UPDATE `users` SET `main_menu_role` = 'clinikal' WHERE `users`.`id` = 1;

-- setting for client side app
INSERT INTO `globals` (`gl_name`, `gl_index`, `gl_value`) VALUES
('clinikal_react_vertical', 0, 'imaging');

INSERT INTO `globals` (`gl_name`, `gl_index`, `gl_value`) VALUES
('clinikal_hide_appoitments', 0, '0');

INSERT INTO `globals` (`gl_name`, `gl_index`, `gl_value`) VALUES
('clinikal_pa_commitment_form', 0, '1');


INSERT INTO `globals` (`gl_name`, `gl_index`, `gl_value`) VALUES
('clinikal_pa_arrival_way', 0, '0');

INSERT INTO `globals` (`gl_name`, `gl_index`, `gl_value`) VALUES
('clinikal_pa_next_enc_status', 0, 'arrived');


INSERT INTO `list_options` (`list_id`, `option_id`, `title`, `seq`, `is_default`, `option_value`, `mapping`, `notes`, `codes`, `toggle_setting_1`, `toggle_setting_2`, `activity`, `subtype`, `edit_options`) VALUES
('lists', 'clinikal_service_categories', 'Clinikal Service Categories', 0, 0, 0, '', '', '', 0, 0, 1, '', 1),
('clinikal_service_categories', '30', 'Specialist Radiology/Imaging', 10, 0, 0, '', '', '', 0, 0, 1, '', 1);

INSERT INTO `list_options` (`list_id`, `option_id`, `title`, `seq`, `is_default`, `option_value`, `mapping`, `notes`, `codes`, `toggle_setting_1`, `toggle_setting_2`, `activity`, `subtype`, `edit_options`) VALUES
('lists', 'clinikal_service_types', 'Clinikal Service Types', 0, 0, 0, '', '', '', 0, 0, 1, '', 1),
('clinikal_service_types', '1', 'Ultrasound', 10, 0, 0, '', '', '', 0, 0, 1, '', 1),
('clinikal_service_types', '2', 'Mammography', 20, 0, 0, '', '', '', 0, 0, 1, '', 1),
('clinikal_service_types', '3', 'X-ray', 30, 0, 0, '', '', '', 0, 0, 1, '', 1),
('clinikal_service_types', '4', 'CT', 40, 0, 0, '', '', '', 0, 0, 1, '', 1),
('clinikal_service_types', '5', 'MRI', 50, 0, 0, '', '', '', 0, 0, 1, '', 1),
('clinikal_service_types', '6', 'Cardiology', 60, 0, 0, '', '', '', 0, 0, 1, '', 1),
('clinikal_service_types', '7', 'Biopsy', 15, 0, 0, '', '', '', 0, 0, 1, '', 1);

INSERT INTO `list_options` (`list_id`, `option_id`, `title`, `seq`, `is_default`, `option_value`, `mapping`, `notes`, `codes`, `toggle_setting_1`, `toggle_setting_2`, `activity`, `subtype`, `edit_options`) VALUES
('lists', 'clinikal_reason_codes', 'Clinikal Reason Codes', 0, 0, 0, '', '', '', 0, 0, 1, '', 1),
('clinikal_reason_codes', '1', 'Shoulder', 10, 0, 0, '', '1', '', 0, 0, 1, '', 1),
('clinikal_reason_codes', '2', 'Ankle', 20, 0, 0, '', '1', '', 0, 0, 1, '', 1),
('clinikal_reason_codes', '3', 'Foot', 30, 0, 0, '', '1', '', 0, 0, 1, '', 1),
('clinikal_reason_codes', '4', 'Hand', 40, 0, 0, '', '1', '', 0, 0, 1, '', 1),
('clinikal_reason_codes', '5', 'Upper Abdomen', 50, 0, 0, '', '1', '', 0, 0, 1, '', 1),
('clinikal_reason_codes', '6', 'Upper And Lower Abdomen', 60, 0, 0, '', '1', '', 0, 0, 1, '', 1),
('clinikal_reason_codes', '7', 'Lower Abdomen And Kidney And Urinary Tract', 70, 0, 0, '', '1', '', 0, 0, 1, '', 1),
('clinikal_reason_codes', '8', 'Head And Neck', 80, 0, 0, '', '1', '', 0, 0, 1, '', 1),
('clinikal_reason_codes', '9', 'Breast', 90, 0, 0, '', '1', '', 0, 0, 1, '', 1),
('clinikal_reason_codes', '10', '3D Breast', 100, 0, 0, '', '1', '', 0, 0, 1, '', 1),
('clinikal_reason_codes', '11', 'Breast', 10, 0, 0, '', '7', '', 0, 0, 1, '', 1),
('clinikal_reason_codes', '12', 'Mammography', 10, 0, 0, '', '2', '', 0, 0, 1, '', 1),
('clinikal_reason_codes', '13', 'Shoulder', 10, 0, 0, '', '3', '', 0, 0, 1, '', 1),
('clinikal_reason_codes', '14', 'Ankle', 20, 0, 0, '', '3', '', 0, 0, 1, '', 1),
('clinikal_reason_codes', '15', 'Foot', 30, 0, 0, '', '3', '', 0, 0, 1, '', 1),
('clinikal_reason_codes', '16', 'Lung', 10, 0, 0, '', '4', '', 0, 0, 1, '', 1),
('clinikal_reason_codes', '17', 'Blood Vessel', 20, 0, 0, '', '4', '', 0, 0, 1, '', 1),
('clinikal_reason_codes', '18', 'Backbone', 10, 0, 0, '', '5', '', 0, 0, 1, '', 1),
('clinikal_reason_codes', '19', 'Brain', 20, 0, 0, '', '5', '', 0, 0, 1, '', 1),
('clinikal_reason_codes', '20', 'Echocardiography', 10, 0, 0, '', '6', '', 0, 0, 1, '', 1),
('clinikal_reason_codes', '21', 'Echo In Effort', 20, 0, 0, '', '6', '', 0, 0, 1, '', 1),
('clinikal_reason_codes', '22', 'Holter Blood Pressure', 30, 0, 0, '', '6', '', 0, 0, 1, '', 1);

INSERT INTO `fhir_value_sets` (`id`, `title`)
VALUES
('service_types', 'Service Types'),
('encounter_statuses', 'Encounter Statuses'),
('reason_codes_1', 'Ultrasound Reason Codes'),
('reason_codes_2', 'Mammography Reason Codes'),
('reason_codes_3', 'X-ray Reason Codes'),
('reason_codes_4', 'CT Reason Codes'),
('reason_codes_5', 'MRI Reason Codes'),
('reason_codes_6', 'Cardiology Reason Codes'),
('reason_codes_7', 'Biopsy Reason Codes'),
('identifier_type_list', 'Identifier Type List');

INSERT INTO `fhir_value_set_systems` (`vs_id`, `system`, `type`,`filter`)
VALUES
('service_types', 'clinikal_service_types', 'All', NULL),
('encounter_statuses', 'clinikal_enc_statuses', 'All', NULL),
('reason_codes_1', 'clinikal_reason_codes', 'Filter', '1'),
('reason_codes_2', 'clinikal_reason_codes', 'Filter', '2'),
('reason_codes_3', 'clinikal_reason_codes', 'Filter', '3'),
('reason_codes_4', 'clinikal_reason_codes', 'Filter', '4'),
('reason_codes_5', 'clinikal_reason_codes', 'Filter', '5'),
('reason_codes_6', 'clinikal_reason_codes', 'Filter', '6'),
('reason_codes_7', 'clinikal_reason_codes', 'Filter', '7'),
('identifier_type_list', 'userlist3', 'All', NULL);




-- -------------------------------
INSERT INTO `fhir_value_sets` (`id`, `title`)
VALUES
('patient_tracking_statuses', 'Appointment Statuses For Patients Tracking');

INSERT INTO `fhir_value_set_systems` (`vs_id`, `system`, `type`)
VALUES
('patient_tracking_statuses', 'clinikal_app_statuses', 'Partial');

INSERT INTO `fhir_value_set_codes` (`vss_id`, `code`)
VALUES
((SELECT id FROM fhir_value_set_systems WHERE vs_id = 'patient_tracking_statuses' AND type = 'Partial'), 'pending'),
((SELECT id FROM fhir_value_set_systems WHERE vs_id = 'patient_tracking_statuses' AND type = 'Partial'), 'booked'),
((SELECT id FROM fhir_value_set_systems WHERE vs_id = 'patient_tracking_statuses' AND type = 'Partial'), 'cancelled'),
((SELECT id FROM fhir_value_set_systems WHERE vs_id = 'patient_tracking_statuses' AND type = 'Partial'), 'noshow');
-- -------------------------------



INSERT INTO `list_options` (`list_id`, `option_id`, `title`, `seq`, `is_default`, `option_value`, `mapping`, `notes`, `codes`, `toggle_setting_1`, `toggle_setting_2`, `activity`, `subtype`, `edit_options`)
VALUES
('clinikal_enc_statuses', 'planned', 'Planned', 10, 0, 0, '', '', '', 0, 0, 1, '', 1),
('clinikal_enc_statuses', 'arrived', 'Admitted', 20, 0, 0, '', '', '', 0, 0, 1, '', 1),
('clinikal_enc_statuses', 'triaged', 'Triaged', 30, 0, 0, '', '', '', 0, 0, 1, '', 1),
('clinikal_enc_statuses', 'in-progress', 'In Progress', 40, 0, 0, '', '', '', 0, 0, 1, '', 1),
('clinikal_enc_statuses', 'waiting-for-results', 'Waiting For Results', 50, 0, 0, '', '', '', 0, 0, 1, '', 1),
('clinikal_enc_statuses', 'finished', 'Finished', 60, 0, 0, '', '', '', 0, 0, 1, '', 1),
('clinikal_enc_statuses', 'cancelled', 'Cancelled', 15, 0, 0, '', '', '', 0, 0, 1, '', 1);





REPLACE INTO `facility` (`id`, `name`, `phone`, `fax`, `street`, `city`, `state`, `postal_code`, `country_code`, `federal_ein`, `website`, `email`, `service_location`, `billing_location`, `accepts_assignment`, `pos_code`, `x12_sender_id`, `attn`, `domain_identifier`, `facility_npi`, `tax_id_type`, `color`, `primary_business_entity`, `facility_code`, `extra_validation`, `facility_taxonomy`, `mail_street`, `mail_street2`, `mail_city`, `mail_state`, `mail_zip`, `oid`, `iban`, `info`, `active`)
VALUES
('5', 'כללית', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '1', '0', '0', '71', NULL, NULL, NULL, NULL, '', '#91AFFF', '0', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '1'),
('6', 'מכבי', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '1', '0', '0', '71', NULL, NULL, NULL, NULL, '', '#92AFFF', '0', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '1'),
('7', 'מאוחדת', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '1', '0', '0', '71', NULL, NULL, NULL, NULL, '', '#93AFFF', '0', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '1'),
('8', 'לאומית', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '1', '0', '0', '71', NULL, NULL, NULL, NULL, '', '#94AFFF', '0', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '1'),
('9', 'צה"ל', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '1', '0', '0', '71', NULL, NULL, NULL, NULL, '', '#95AFFF', '0', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '1');

UPDATE `list_options` SET `option_id` = '5' WHERE `list_options`.`list_id` = 'mh_ins_organizations' AND `list_options`.`option_id` = 'hmo_1';
UPDATE `list_options` SET `option_id` = '6' WHERE `list_options`.`list_id` = 'mh_ins_organizations' AND `list_options`.`option_id` = 'hmo_2';
UPDATE `list_options` SET `option_id` = '7' WHERE `list_options`.`list_id` = 'mh_ins_organizations' AND `list_options`.`option_id` = 'hmo_3';
UPDATE `list_options` SET `option_id` = '8' WHERE `list_options`.`list_id` = 'mh_ins_organizations' AND `list_options`.`option_id` = 'hmo_4';

INSERT INTO `list_options` (`list_id`, `option_id`, `title`, `seq`, `is_default`, `option_value`, `notes`,`activity`)
VALUES
('mh_ins_organizations', 'idf', 'IDF', '0', '0', '0','' ,'1');

ALTER TABLE facility AUTO_INCREMENT = 17;

-- --------------------------------------------------------

UPDATE `categories` SET `name` = 'HPatient Photograph', `lft` = '105', `rght` = '106' WHERE `id` = '4';
UPDATE `categories` SET `name` = 'EMedical Record', `lft` = '101', `rght` = '102' WHERE `id` = '2';
UPDATE `categories` SET `rght` = '271' WHERE `id` = '1';
UPDATE `categories` SET `name` = 'FLab Report', `lft` = '103', `rght` = '104' WHERE `id` = '3';

DELETE FROM `categories` WHERE `id` = '19';
DELETE FROM `categories` WHERE `id` = '22';
DELETE FROM `categories` WHERE `id` = '15';
DELETE FROM `categories` WHERE `id` = '14';
DELETE FROM `categories` WHERE `id` = '11';
DELETE FROM `categories` WHERE `id` = '21';
DELETE FROM `categories` WHERE `id` = '25';
DELETE FROM `categories` WHERE `id` = '20';
DELETE FROM `categories` WHERE `id` = '27';
DELETE FROM `categories` WHERE `id` = '6';
DELETE FROM `categories` WHERE `id` = '12';
DELETE FROM `categories` WHERE `id` = '24';
DELETE FROM `categories` WHERE `id` = '9';
DELETE FROM `categories` WHERE `id` = '10';
DELETE FROM `categories` WHERE `id` = '5';
DELETE FROM `categories` WHERE `id` = '8';
DELETE FROM `categories` WHERE `id` = '16';
DELETE FROM `categories` WHERE `id` = '17';
DELETE FROM `categories` WHERE `id` = '18';
DELETE FROM `categories` WHERE `id` = '13';
DELETE FROM `categories` WHERE `id` = '28';
DELETE FROM `categories` WHERE `id` = '7';
DELETE FROM `categories` WHERE `id` = '29';
DELETE FROM `categories` WHERE `id` = '26';
DELETE FROM `categories` WHERE `id` = '23';

DELETE FROM `categories_seq` WHERE `id` = '29';
INSERT INTO `categories_seq` (`id`) VALUES('9');



