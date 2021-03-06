
<?php
// Ensure this script is not called separately
if ((empty($_SESSION['acl_setup_unique_id'])) ||
    (empty($unique_id)) ||
    ($unique_id != $_SESSION['acl_setup_unique_id'])) {
    die('Authentication Error');
}
unset($_SESSION['acl_setup_unique_id']);

use OpenEMR\Common\Acl\AclExtended;

//EXAMPLE
/* Vaccines groups */
//$receptionist_view = @addNewACL('Vaccine receptionists', 'receptionist', 'view', 'Things that receptionists can read but not modify');
//$receptionist_write = @addNewACL('Vaccine receptionists', 'receptionist', 'write', 'Things that receptionists can modify');
$admin_write = AclExtended::getAclIdNumber('Administrators', 'write');

$imaging_technician_write =AclExtended::addNewACL('Imaging technician', 'imaging_technician', 'write', 'Things that imaging technician can modify');
$imaging_technician_view =AclExtended::addNewACL('Imaging technician', 'imaging_technician', 'view', 'Things that imaging technician can read but not modify');
$imaging_doctor_write =AclExtended::addNewACL('Imaging doctor', 'imaging_doctor', 'write', 'Things that imaging doctor can modify');
$imaging_doctor_view =AclExtended::addNewACL('Imaging doctor', 'imaging_doctor', 'view', 'Things that imaging doctor can read but not modify');
$imaging_clinic_manager_write =AclExtended::addNewACL('Imaging manager', 'imaging_clinic_manager', 'write', 'Things that imaging clinic manager can modify');
$imaging_clinic_manager_view =AclExtended::addNewACL('Imaging manager', 'imaging_clinic_manager', 'view', 'Things that imaging clinic manager can read but not modify');
$imaging_call_center_representative_write =AclExtended::addNewACL('Imaging representative', 'imaging_call_center_representative', 'write', 'Things that imaging call center representative can modify');
$imaging_call_center_representative_view =AclExtended::addNewACL('Imaging representative', 'imaging_call_center_representative', 'view', 'Things that imaging call center representative can read but not modify');
$imaging_receptionist_write =AclExtended::addNewACL('Imaging receptionist', 'imaging_receptionist', 'write', 'Things that imaging receptionist can modify');
$imaging_receptionist_view =AclExtended::addNewACL('Imaging receptionist', 'imaging_receptionist', 'view', 'Things that imaging receptionist can read but not modify');

/**********************************************************/

AclExtended::addObjectAcl('client_app', 'Client Application', 'PatientTrackingInvited','Patient Tracking Invited');
AclExtended::addObjectAcl('client_app', 'Client Application', 'PatientTrackingWaitingForExamination','Patient Tracking Waiting for Examination');
AclExtended::addObjectAcl('client_app', 'Client Application', 'PatientTrackingWaitingForDecoding','Patient Tracking Waiting for Decoding');
AclExtended::addObjectAcl('client_app', 'Client Application', 'PatientTrackingFinished','Patient Tracking Finished');



AclExtended::updateAcl($admin_write, 'Administrators', 'client_app', 'Client Application', 'SuperUser','Super User', 'write');

//ADMIN ACL
/*  AclExtended::updateAcl($admin_write, 'Administrators', 'client_app', 'Client Application', 'PatientTrackingInvited','Patient Tracking Invited', 'write');
  AclExtended::updateAcl($admin_write, 'Administrators', 'client_app', 'Client Application', 'PatientTrackingWaitingForExamination','Patient Tracking Waiting for Examination', 'write');
  AclExtended::updateAcl($admin_write, 'Administrators', 'client_app', 'Client Application', 'PatientTrackingWaitingForDecoding','Patient Tracking Waiting for Decoding', 'write');
  AclExtended::updateAcl($admin_write, 'Administrators', 'client_app', 'Client Application', 'PatientTrackingFinished','Patient Tracking Finished', 'write');
  AclExtended::updateAcl($admin_write, 'Administrators', 'client_app', 'Client Application', 'PatientAdmission','Patient Admission', 'write');
  AclExtended::updateAcl($admin_write, 'Administrators', 'client_app', 'Client Application', 'AddPatient','Add Patient', 'write');
  AclExtended::updateAcl($admin_write , 'Administrators', 'client_app', 'Client Application', 'AppointmentsAndEncounters','Appointments And Encounters', 'view');
  AclExtended::updateAcl($admin_write, 'Administrators', 'client_app', 'Client Application', 'EncounterSheet','Encounter Sheet', 'write');*/


//Receptionist ACL
AclExtended::updateAcl($imaging_receptionist_write, 'Imaging receptionist', 'client_app', 'Client Application', 'PatientTrackingInvited','Patient Tracking Invited', 'write');
AclExtended::updateAcl($imaging_receptionist_write, 'Imaging receptionist', 'client_app', 'Client Application', 'PatientTrackingWaitingForExamination','Patient Tracking Waiting for Examination', 'write');
AclExtended::updateAcl($imaging_receptionist_write, 'Imaging receptionist', 'client_app', 'Client Application', 'PatientTrackingWaitingForDecoding','Patient Tracking Waiting for Decoding', 'write');
AclExtended::updateAcl($imaging_receptionist_write, 'Imaging receptionist', 'client_app', 'Client Application', 'PatientTrackingFinished','Patient Tracking Finished', 'write');
AclExtended::updateAcl($imaging_receptionist_write, 'Imaging receptionist', 'client_app', 'Client Application', 'PatientAdmission','Patient Admission', 'write');
AclExtended::updateAcl($imaging_receptionist_write, 'Imaging receptionist', 'client_app', 'Client Application', 'AddPatient','Add Patient', 'write');
AclExtended::updateAcl($imaging_receptionist_view,  'Imaging receptionist', 'client_app', 'Client Application', 'AppointmentsAndEncounters','Appointments And Encounters', 'view');
AclExtended::updateAcl($imaging_receptionist_write, 'Imaging receptionist', 'client_app', 'Client Application', 'EncounterSheet','Encounter Sheet', 'write');
AclExtended::updateAcl($imaging_receptionist_view,  'Imaging receptionist', 'client_app', 'Client Application', 'SearchPatient','Search Patient', 'view');
AclExtended::updateAcl($imaging_receptionist_write,  'Imaging receptionist', 'client_app', 'Client Application', 'Calendar','Calendar', 'write');
AclExtended::updateAcl($imaging_receptionist_write,  'Imaging receptionist', 'client_app', 'Client Application', 'AppointmentDetails','Appointment Details', 'write');

//Clinic manager ACL
AclExtended::updateAcl($imaging_clinic_manager_write, 'Imaging manager', 'client_app', 'Client Application', 'PatientTrackingInvited','Patient Tracking Invited', 'write');
AclExtended::updateAcl($imaging_clinic_manager_write, 'Imaging manager', 'client_app', 'Client Application', 'PatientTrackingWaitingForExamination','Patient Tracking Waiting for Examination', 'write');
AclExtended::updateAcl($imaging_clinic_manager_write, 'Imaging manager', 'client_app', 'Client Application', 'PatientTrackingWaitingForDecoding','Patient Tracking Waiting for Decoding', 'write');
AclExtended::updateAcl($imaging_clinic_manager_write, 'Imaging manager', 'client_app', 'Client Application', 'PatientTrackingFinished','Patient Tracking Finished', 'write');
AclExtended::updateAcl($imaging_clinic_manager_write, 'Imaging manager', 'client_app', 'Client Application', 'PatientAdmission','Patient Admission', 'write');
AclExtended::updateAcl($imaging_clinic_manager_write, 'Imaging manager', 'client_app', 'Client Application', 'AddPatient','Add Patient', 'write');
AclExtended::updateAcl($imaging_clinic_manager_view,  'Imaging manager', 'client_app', 'Client Application', 'AppointmentsAndEncounters','Appointments And Encounters', 'view');
AclExtended::updateAcl($imaging_clinic_manager_write, 'Imaging manager', 'client_app', 'Client Application', 'EncounterSheet','Encounter Sheet', 'write');
AclExtended::updateAcl($imaging_clinic_manager_view,  'Imaging manager', 'client_app', 'Client Application', 'SearchPatient','Search Patient', 'view');
AclExtended::updateAcl($imaging_clinic_manager_write,  'Imaging manager', 'client_app', 'Client Application', 'Calendar','Calendar', 'write');
AclExtended::updateAcl($imaging_clinic_manager_write,  'Imaging manager', 'client_app', 'Client Application', 'AppointmentDetails','Appointment Details', 'write');


//Imaging technician_ ACL
//AclExtended::updateAcl($imaging_technician_write, 'Imaging technician', 'client_app', 'Client Application', 'PatientTrackingInvited','Patient Tracking Invited', 'write');
AclExtended::updateAcl($imaging_technician_write, 'Imaging technician', 'client_app', 'Client Application', 'PatientTrackingWaitingForExamination','Patient Tracking Waiting for Examination', 'write');
AclExtended::updateAcl($imaging_technician_write, 'Imaging technician', 'client_app', 'Client Application', 'PatientTrackingWaitingForDecoding','Patient Tracking Waiting for Decoding', 'write');
//AclExtended::updateAcl($imaging_technician_write, 'Imaging technician', 'client_app', 'Client Application', 'PatientTrackingFinished','Patient Tracking Finished', 'write');
//AclExtended::updateAcl($imaging_technician_write, 'Imaging technician', 'client_app', 'Client Application', 'PatientAdmission','Patient Admission', 'write');
//AclExtended::updateAcl($imaging_technician_write, 'Imaging technician', 'client_app', 'Client Application', 'AddPatient','Add Patient', 'write');
AclExtended::updateAcl($imaging_technician_view,  'Imaging technician', 'client_app', 'Client Application', 'AppointmentsAndEncounters','Appointments And Encounters', 'view');
AclExtended::updateAcl($imaging_technician_write, 'Imaging technician', 'client_app', 'Client Application', 'EncounterSheet','Encounter Sheet', 'write');
AclExtended::updateAcl($imaging_technician_view,  'Imaging technician', 'client_app', 'Client Application', 'SearchPatient','Search Patient', 'view');
AclExtended::updateAcl($imaging_technician_write,  'Imaging technician', 'client_app', 'Client Application', 'Calendar','Calendar', 'write');
AclExtended::updateAcl($imaging_technician_write,  'Imaging technician', 'client_app', 'Client Application', 'AppointmentDetails','Appointment Details', 'write');


//Doctor ACL
//AclExtended::updateAcl($imaging_doctor_write, 'Imaging doctor', 'client_app', 'Client Application', 'PatientTrackingInvited','Patient Tracking Invited', 'write');
//AclExtended::updateAcl($imaging_doctor_write, 'Imaging doctor', 'client_app', 'Client Application', 'PatientTrackingWaitingForExamination','Patient Tracking Waiting for Examination', 'write');
AclExtended::updateAcl($imaging_doctor_write, 'Imaging doctor', 'client_app', 'Client Application', 'PatientTrackingWaitingForDecoding','Patient Tracking Waiting for Decoding', 'write');
AclExtended::updateAcl($imaging_doctor_write, 'Imaging doctor', 'client_app', 'Client Application', 'PatientTrackingFinished','Patient Tracking Finished', 'write');
//AclExtended::updateAcl($imaging_doctor_write, 'Imaging doctor', 'client_app', 'Client Application', 'PatientAdmission','Patient Admission', 'write');
//AclExtended::updateAcl($imaging_doctor_write, 'Imaging doctor', 'client_app', 'Client Application', 'AddPatient','Add Patient', 'write');
AclExtended::updateAcl($imaging_doctor_view,  'Imaging doctor', 'client_app', 'Client Application', 'AppointmentsAndEncounters','Appointments And Encounters', 'view');
AclExtended::updateAcl($imaging_doctor_write, 'Imaging doctor', 'client_app', 'Client Application', 'EncounterSheet','Encounter Sheet', 'write');
AclExtended::updateAcl($imaging_doctor_view,  'Imaging doctor', 'client_app', 'Client Application', 'SearchPatient','Search Patient', 'view');
AclExtended::updateAcl($imaging_doctor_write,  'Imaging doctor', 'client_app', 'Client Application', 'Calendar','Calendar', 'write');
AclExtended::updateAcl($imaging_doctor_write,  'Imaging doctor', 'client_app', 'Client Application', 'AppointmentDetails','Appointment Details', 'write');

//Imaging representative ACL
//AclExtended::updateAcl($imaging_call_center_representative_write, 'Imaging representative', 'client_app', 'Client Application', 'PatientTrackingInvited','Patient Tracking Invited', 'write');
//AclExtended::updateAcl($imaging_call_center_representative_write, 'Imaging representative', 'client_app', 'Client Application', 'PatientTrackingWaitingForExamination','Patient Tracking Waiting for Examination', 'write');
//AclExtended::updateAcl($imaging_call_center_representative_write, 'Imaging representative', 'client_app', 'Client Application', 'PatientTrackingWaitingForDecoding','Patient Tracking Waiting for Decoding', 'write');
//AclExtended::updateAcl($imaging_call_center_representative_write, 'Imaging representative', 'client_app', 'Client Application', 'PatientTrackingFinished','Patient Tracking Finished', 'write');
//AclExtended::updateAcl($imaging_call_center_representative_write, 'Imaging representative', 'client_app', 'Client Application', 'PatientAdmission','Patient Admission', 'write');
AclExtended::updateAcl($imaging_call_center_representative_write, 'Imaging representative', 'client_app', 'Client Application', 'AddPatient','Add Patient', 'write');
AclExtended::updateAcl($imaging_call_center_representative_view,  'Imaging representative', 'client_app', 'Client Application', 'AppointmentsAndEncounters','Appointments And Encounters', 'view');
//AclExtended::updateAcl($imaging_call_center_representative_write, 'Imaging representative', 'client_app', 'Client Application', 'EncounterSheet','Encounter Sheet', 'write');
AclExtended::updateAcl($imaging_call_center_representative_view,  'Imaging representative', 'client_app', 'Client Application', 'SearchPatient','Search Patient', 'view');
AclExtended::updateAcl($imaging_call_center_representative_write,  'Imaging representative', 'client_app', 'Client Application', 'Calendar','Calendar', 'write');
AclExtended::updateAcl($imaging_call_center_representative_write,  'Imaging representative', 'client_app', 'Client Application', 'AppointmentDetails','Appointment Details', 'write');


//Insert the 'notes' object from the 'patients' section
//AclExtended::updateAcl($receptionist_write, 'Vaccine receptionists', 'patients', 'Patients', 'notes', 'Patient Notes (write,addonly optional)', 'write');

AclExtended::updateAcl($admin_write, 'Administrators', 'fhir_api', 'FHIR API', 'patient','Patient', 'write');
AclExtended::updateAcl($admin_write, 'Administrators', 'fhir_api', 'FHIR API', 'appointment','Appointment', 'write');
AclExtended::updateAcl($admin_write, 'Administrators', 'fhir_api', 'FHIR API', 'encounter','Encounter', 'write');
AclExtended::updateAcl($admin_write, 'Administrators', 'fhir_api', 'FHIR API', 'practitioner','Practitioner', 'write');
AclExtended::updateAcl($admin_write, 'Administrators', 'fhir_api', 'FHIR API', 'organization','Organization', 'write');
AclExtended::updateAcl($admin_write, 'Administrators', 'fhir_api', 'FHIR API', 'healthcareservice','Healthcareb Service', 'write');
AclExtended::updateAcl($admin_write, 'Administrators', 'fhir_api', 'FHIR API', 'valueset','Value Set', 'write');
AclExtended::updateAcl($admin_write, 'Administrators', 'fhir_api', 'FHIR API', 'relatedperson','Related Person', 'write');
AclExtended::updateAcl($admin_write, 'Administrators', 'fhir_api', 'FHIR API', 'documentreference','Document Reference', 'write');
AclExtended::updateAcl($admin_write, 'Administrators', 'fhir_api', 'FHIR API', 'questionnaire','Questionnaire', 'write');
AclExtended::updateAcl($admin_write, 'Administrators', 'fhir_api', 'FHIR API', 'questionnaireresponse','Questionnaire Response', 'write');
AclExtended::updateAcl($admin_write, 'Administrators', 'fhir_api', 'FHIR API', 'condition','Condition', 'write');
AclExtended::updateAcl($admin_write, 'Administrators', 'fhir_api', 'FHIR API', 'medicationstatement','Medication Statement Response', 'write');

AclExtended::updateAcl($admin_write,  'Administrators', 'fhir_api', 'FHIR API', 'patient','Patient', 'view');
AclExtended::updateAcl($admin_write,  'Administrators', 'fhir_api', 'FHIR API', 'appointment','Appointment', 'view');
AclExtended::updateAcl($admin_write,  'Administrators', 'fhir_api', 'FHIR API', 'encounter','Encounter', 'view');
AclExtended::updateAcl($admin_write,  'Administrators', 'fhir_api', 'FHIR API', 'practitioner','Practitioner', 'view');
AclExtended::updateAcl($admin_write,  'Administrators', 'fhir_api', 'FHIR API', 'organization','Organization', 'view');
AclExtended::updateAcl($admin_write,  'Administrators', 'fhir_api', 'FHIR API', 'healthcareservice','Healthcareb Service', 'view');
AclExtended::updateAcl($admin_write,  'Administrators', 'fhir_api', 'FHIR API', 'valueset','Value Set', 'view');
AclExtended::updateAcl($admin_write,  'Administrators', 'fhir_api', 'FHIR API', 'relatedperson','Related Person', 'view');
AclExtended::updateAcl($admin_write,  'Administrators', 'fhir_api', 'FHIR API', 'documentreference','Document Reference', 'view');
AclExtended::updateAcl($admin_write,  'Administrators', 'fhir_api', 'FHIR API', 'questionnaire','Questionnaire', 'view');
AclExtended::updateAcl($admin_write,  'Administrators', 'fhir_api', 'FHIR API', 'questionnaireresponse','Questionnaire Response', 'view');
AclExtended::updateAcl($admin_write,  'Administrators', 'fhir_api', 'FHIR API', 'condition','Condition', 'view');
AclExtended::updateAcl($admin_write,  'Administrators', 'fhir_api', 'FHIR API', 'medicationstatement','Medication Statement Response', 'view');

/**********************************************************/

AclExtended::updateAcl($imaging_receptionist_write, 'Imaging receptionist', 'fhir_api', 'FHIR API', 'patient','Patient', 'write');
AclExtended::updateAcl($imaging_receptionist_write, 'Imaging receptionist', 'fhir_api', 'FHIR API', 'appointment','Appointment', 'write');
AclExtended::updateAcl($imaging_receptionist_write, 'Imaging receptionist', 'fhir_api', 'FHIR API', 'encounter','Encounter', 'write');
//AclExtended::updateAcl($imaging_receptionist_write, 'Imaging receptionist', 'fhir_api', 'FHIR API', 'practitioner','Practitioner', 'write');
//AclExtended::updateAcl($imaging_receptionist_write, 'Imaging receptionist', 'fhir_api', 'FHIR API', 'organization','Organization', 'write');
//AclExtended::updateAcl($imaging_receptionist_write, 'Imaging receptionist', 'fhir_api', 'FHIR API', 'healthcareservice','Healthcareb Service', 'write');
//AclExtended::updateAcl($imaging_receptionist_write, 'Imaging receptionist', 'fhir_api', 'FHIR API', 'valueset','Value Set', 'write');
AclExtended::updateAcl($imaging_receptionist_write, 'Imaging receptionist', 'fhir_api', 'FHIR API', 'relatedperson','Related Person', 'write');
AclExtended::updateAcl($imaging_receptionist_write, 'Imaging receptionist', 'fhir_api', 'FHIR API', 'documentreference','Document Reference', 'write');
AclExtended::updateAcl($imaging_receptionist_write, 'Imaging receptionist', 'fhir_api', 'FHIR API', 'questionnaire','Questionnaire', 'write');
AclExtended::updateAcl($imaging_receptionist_write, 'Imaging receptionist', 'fhir_api', 'FHIR API', 'questionnaireresponse','Questionnaire Response', 'write');
AclExtended::updateAcl($imaging_receptionist_write, 'Imaging receptionist', 'fhir_api', 'FHIR API', 'condition','Condition', 'write');
AclExtended::updateAcl($imaging_receptionist_write, 'Imaging receptionist', 'fhir_api', 'FHIR API', 'medicationstatement','Medication Statement Response', 'write');

AclExtended::updateAcl($imaging_receptionist_view,  'Imaging receptionist', 'fhir_api', 'FHIR API', 'patient','Patient', 'view');
AclExtended::updateAcl($imaging_receptionist_view,  'Imaging receptionist', 'fhir_api', 'FHIR API', 'appointment','Appointment', 'view');
AclExtended::updateAcl($imaging_receptionist_view,  'Imaging receptionist', 'fhir_api', 'FHIR API', 'encounter','Encounter', 'view');
AclExtended::updateAcl($imaging_receptionist_view,  'Imaging receptionist', 'fhir_api', 'FHIR API', 'practitioner','Practitioner', 'view');
AclExtended::updateAcl($imaging_receptionist_view,  'Imaging receptionist', 'fhir_api', 'FHIR API', 'organization','Organization', 'view');
AclExtended::updateAcl($imaging_receptionist_view,  'Imaging receptionist', 'fhir_api', 'FHIR API', 'healthcareservice','Healthcareb Service', 'view');
AclExtended::updateAcl($imaging_receptionist_view,  'Imaging receptionist', 'fhir_api', 'FHIR API', 'valueset','Value Set', 'view');
AclExtended::updateAcl($imaging_receptionist_view,  'Imaging receptionist', 'fhir_api', 'FHIR API', 'relatedperson','Related Person', 'view');
AclExtended::updateAcl($imaging_receptionist_view,  'Imaging receptionist', 'fhir_api', 'FHIR API', 'documentreference','Document Reference', 'view');
AclExtended::updateAcl($imaging_receptionist_view,  'Imaging receptionist', 'fhir_api', 'FHIR API', 'questionnaire','Questionnaire', 'view');
AclExtended::updateAcl($imaging_receptionist_view,  'Imaging receptionist', 'fhir_api', 'FHIR API', 'questionnaireresponse','Questionnaire Response', 'view');
AclExtended::updateAcl($imaging_receptionist_view, 'Imaging receptionist', 'fhir_api', 'FHIR API', 'condition','Condition', 'view');
AclExtended::updateAcl($imaging_receptionist_view, 'Imaging receptionist', 'fhir_api', 'FHIR API', 'medicationstatement','Medication Statement Response', 'view');


/**********************************************************/

AclExtended::updateAcl($imaging_clinic_manager_write, 'Imaging manager', 'fhir_api', 'FHIR API', 'patient','Patient', 'write');
AclExtended::updateAcl($imaging_clinic_manager_write, 'Imaging manager', 'fhir_api', 'FHIR API', 'appointment','Appointment', 'write');
AclExtended::updateAcl($imaging_clinic_manager_write, 'Imaging manager', 'fhir_api', 'FHIR API', 'encounter','Encounter', 'write');
//AclExtended::updateAcl($imaging_clinic_manager_write, 'Imaging manager', 'fhir_api', 'FHIR API', 'practitioner','Practitioner', 'write');
//AclExtended::updateAcl($imaging_clinic_manager_write, 'Imaging manager', 'fhir_api', 'FHIR API', 'organization','Organization', 'write');
//AclExtended::updateAcl($imaging_clinic_manager_write, 'Imaging manager', 'fhir_api', 'FHIR API', 'healthcareservice','Healthcareb Service', 'write');
//AclExtended::updateAcl($imaging_clinic_manager_write, 'Imaging manager', 'fhir_api', 'FHIR API', 'valueset','Value Set', 'write');
AclExtended::updateAcl($imaging_clinic_manager_write, 'Imaging manager', 'fhir_api', 'FHIR API', 'relatedperson','Related Person', 'write');
AclExtended::updateAcl($imaging_clinic_manager_write, 'Imaging manager', 'fhir_api', 'FHIR API', 'documentreference','Document Reference', 'write');
AclExtended::updateAcl($imaging_clinic_manager_write, 'Imaging manager', 'fhir_api', 'FHIR API', 'questionnaire','Questionnaire', 'write');
AclExtended::updateAcl($imaging_clinic_manager_write, 'Imaging manager', 'fhir_api', 'FHIR API', 'questionnaireresponse','Questionnaire Response', 'write');
AclExtended::updateAcl($imaging_clinic_manager_write, 'Imaging manager', 'fhir_api', 'FHIR API', 'condition','Condition', 'write');
AclExtended::updateAcl($imaging_clinic_manager_write, 'Imaging manager', 'fhir_api', 'FHIR API', 'medicationstatement','Medication Statement Response', 'write');

AclExtended::updateAcl($imaging_clinic_manager_view,  'Imaging manager', 'fhir_api', 'FHIR API', 'patient','Patient', 'view');
AclExtended::updateAcl($imaging_clinic_manager_view,  'Imaging manager', 'fhir_api', 'FHIR API', 'appointment','Appointment', 'view');
AclExtended::updateAcl($imaging_clinic_manager_view,  'Imaging manager', 'fhir_api', 'FHIR API', 'encounter','Encounter', 'view');
AclExtended::updateAcl($imaging_clinic_manager_view,  'Imaging manager', 'fhir_api', 'FHIR API', 'practitioner','Practitioner', 'view');
AclExtended::updateAcl($imaging_clinic_manager_view,  'Imaging manager', 'fhir_api', 'FHIR API', 'organization','Organization', 'view');
AclExtended::updateAcl($imaging_clinic_manager_view,  'Imaging manager', 'fhir_api', 'FHIR API', 'healthcareservice','Healthcareb Service', 'view');
AclExtended::updateAcl($imaging_clinic_manager_view,  'Imaging manager', 'fhir_api', 'FHIR API', 'valueset','Value Set', 'view');
AclExtended::updateAcl($imaging_clinic_manager_view,  'Imaging manager', 'fhir_api', 'FHIR API', 'relatedperson','Related Person', 'view');
AclExtended::updateAcl($imaging_clinic_manager_view,  'Imaging manager', 'fhir_api', 'FHIR API', 'documentreference','Document Reference', 'view');
AclExtended::updateAcl($imaging_clinic_manager_view,  'Imaging manager', 'fhir_api', 'FHIR API', 'questionnaire','Questionnaire', 'view');
AclExtended::updateAcl($imaging_clinic_manager_view,  'Imaging manager', 'fhir_api', 'FHIR API', 'questionnaireresponse','Questionnaire Response', 'view');
AclExtended::updateAcl($imaging_clinic_manager_view,  'Imaging manager', 'fhir_api', 'FHIR API', 'condition','Condition', 'view');
AclExtended::updateAcl($imaging_clinic_manager_view,  'Imaging manager', 'fhir_api', 'FHIR API', 'medicationstatement','Medication Statement Response', 'view');


/**********************************************************/

//AclExtended::updateAcl($imaging_doctor_write, 'Imaging doctor', 'fhir_api', 'FHIR API', 'patient','Patient', 'write');
//AclExtended::updateAcl($imaging_doctor_write, 'Imaging doctor', 'fhir_api', 'FHIR API', 'appointment','Appointment', 'write');
AclExtended::updateAcl($imaging_doctor_write, 'Imaging doctor', 'fhir_api', 'FHIR API', 'encounter','Encounter', 'write');
//AclExtended::updateAcl($imaging_doctor_write, 'Imaging doctor', 'fhir_api', 'FHIR API', 'practitioner','Practitioner', 'write');
//AclExtended::updateAcl($imaging_doctor_write, 'Imaging doctor', 'fhir_api', 'FHIR API', 'organization','Organization', 'write');
//AclExtended::updateAcl($imaging_doctor_write, 'Imaging doctor', 'fhir_api', 'FHIR API', 'healthcareservice','Healthcareb Service', 'write');
//AclExtended::updateAcl($imaging_doctor_write, 'Imaging doctor', 'fhir_api', 'FHIR API', 'valueset','Value Set', 'write');
AclExtended::updateAcl($imaging_doctor_write, 'Imaging doctor', 'fhir_api', 'FHIR API', 'relatedperson','Related Person', 'write');
AclExtended::updateAcl($imaging_doctor_write, 'Imaging doctor', 'fhir_api', 'FHIR API', 'documentreference','Document Reference', 'write');
AclExtended::updateAcl($imaging_doctor_write, 'Imaging doctor', 'fhir_api', 'FHIR API', 'questionnaire','Questionnaire', 'write');
AclExtended::updateAcl($imaging_doctor_write, 'Imaging doctor', 'fhir_api', 'FHIR API', 'questionnaireresponse','Questionnaire Response', 'write');
AclExtended::updateAcl($imaging_doctor_write, 'Imaging doctor', 'fhir_api', 'FHIR API', 'condition','Condition', 'write');
AclExtended::updateAcl($imaging_doctor_write, 'Imaging doctor', 'fhir_api', 'FHIR API', 'medicationstatement','Medication Statement Response', 'write');

AclExtended::updateAcl($imaging_doctor_write, 'Imaging doctor', 'fhir_api', 'FHIR API', 'patient','Patient', 'view');
AclExtended::updateAcl($imaging_doctor_view,  'Imaging doctor', 'fhir_api', 'FHIR API', 'appointment','Appointment', 'view');
AclExtended::updateAcl($imaging_doctor_view,  'Imaging doctor', 'fhir_api', 'FHIR API', 'encounter','Encounter', 'view');
AclExtended::updateAcl($imaging_doctor_view,  'Imaging doctor', 'fhir_api', 'FHIR API', 'practitioner','Practitioner', 'view');
AclExtended::updateAcl($imaging_doctor_view,  'Imaging doctor', 'fhir_api', 'FHIR API', 'organization','Organization', 'view');
AclExtended::updateAcl($imaging_doctor_view,  'Imaging doctor', 'fhir_api', 'FHIR API', 'healthcareservice','Healthcareb Service', 'view');
AclExtended::updateAcl($imaging_doctor_view,  'Imaging doctor', 'fhir_api', 'FHIR API', 'valueset','Value Set', 'view');
AclExtended::updateAcl($imaging_doctor_view,  'Imaging doctor', 'fhir_api', 'FHIR API', 'relatedperson','Related Person', 'view');
AclExtended::updateAcl($imaging_doctor_view,  'Imaging doctor', 'fhir_api', 'FHIR API', 'documentreference','Document Reference', 'view');
AclExtended::updateAcl($imaging_doctor_view,  'Imaging doctor', 'fhir_api', 'FHIR API', 'questionnaire','Questionnaire', 'view');
AclExtended::updateAcl($imaging_doctor_view,  'Imaging doctor', 'fhir_api', 'FHIR API', 'questionnaireresponse','Questionnaire Response', 'view');
AclExtended::updateAcl($imaging_doctor_view,  'Imaging doctor', 'fhir_api', 'FHIR API', 'condition','Condition', 'view');
AclExtended::updateAcl($imaging_doctor_view,  'Imaging doctor', 'fhir_api', 'FHIR API', 'medicationstatement','Medication Statement Response', 'view');

/**********************************************************/

//AclExtended::updateAcl($imaging_technician_write, 'Imaging technician', 'fhir_api', 'FHIR API', 'patient','Patient', 'write');
//AclExtended::updateAcl($imaging_technician_write, 'Imaging technician', 'fhir_api', 'FHIR API', 'appointment','Appointment', 'write');
AclExtended::updateAcl($imaging_technician_write, 'Imaging technician', 'fhir_api', 'FHIR API', 'encounter','Encounter', 'write');
//AclExtended::updateAcl($imaging_technician_write, 'Imaging technician', 'fhir_api', 'FHIR API', 'practitioner','Practitioner', 'write');
//AclExtended::updateAcl($imaging_technician_write, 'Imaging technician', 'fhir_api', 'FHIR API', 'organization','Organization', 'write');
//AclExtended::updateAcl($imaging_technician_write, 'Imaging technician', 'fhir_api', 'FHIR API', 'healthcareservice','Healthcareb Service', 'write');
//AclExtended::updateAcl($imaging_technician_write, 'Imaging technician', 'fhir_api', 'FHIR API', 'valueset','Value Set', 'write');
AclExtended::updateAcl($imaging_technician_write, 'Imaging technician', 'fhir_api', 'FHIR API', 'relatedperson','Related Person', 'write');
AclExtended::updateAcl($imaging_technician_write, 'Imaging technician', 'fhir_api', 'FHIR API', 'documentreference','Document Reference', 'write');
AclExtended::updateAcl($imaging_technician_write, 'Imaging technician', 'fhir_api', 'FHIR API', 'questionnaire','Questionnaire', 'write');
AclExtended::updateAcl($imaging_technician_write, 'Imaging technician', 'fhir_api', 'FHIR API', 'questionnaireresponse','Questionnaire Response', 'write');
AclExtended::updateAcl($imaging_technician_write, 'Imaging technician', 'fhir_api', 'FHIR API', 'condition','Condition', 'write');
AclExtended::updateAcl($imaging_technician_write, 'Imaging technician', 'fhir_api', 'FHIR API', 'medicationstatement','Medication Statement Response', 'write');

AclExtended::updateAcl($imaging_technician_view,  'Imaging technician', 'fhir_api', 'FHIR API', 'patient','Patient', 'view');
AclExtended::updateAcl($imaging_technician_view,  'Imaging technician', 'fhir_api', 'FHIR API', 'appointment','Appointment', 'view');
AclExtended::updateAcl($imaging_technician_view,  'Imaging technician', 'fhir_api', 'FHIR API', 'encounter','Encounter', 'view');
AclExtended::updateAcl($imaging_technician_view,  'Imaging technician', 'fhir_api', 'FHIR API', 'practitioner','Practitioner', 'view');
AclExtended::updateAcl($imaging_technician_view,  'Imaging technician', 'fhir_api', 'FHIR API', 'organization','Organization', 'view');
AclExtended::updateAcl($imaging_technician_view,  'Imaging technician', 'fhir_api', 'FHIR API', 'healthcareservice','Healthcareb Service', 'view');
AclExtended::updateAcl($imaging_technician_view,  'Imaging technician', 'fhir_api', 'FHIR API', 'valueset','Value Set', 'view');
AclExtended::updateAcl($imaging_technician_view,  'Imaging technician', 'fhir_api', 'FHIR API', 'relatedperson','Related Person', 'view');
AclExtended::updateAcl($imaging_technician_view,  'Imaging technician', 'fhir_api', 'FHIR API', 'documentreference','Document Reference', 'view');
AclExtended::updateAcl($imaging_technician_view,  'Imaging technician', 'fhir_api', 'FHIR API', 'questionnaire','Questionnaire', 'view');
AclExtended::updateAcl($imaging_technician_view,  'Imaging technician', 'fhir_api', 'FHIR API', 'questionnaireresponse','Questionnaire Response', 'view');
AclExtended::updateAcl($imaging_technician_view, 'Imaging technician', 'fhir_api', 'FHIR API', 'condition','Condition', 'view');
AclExtended::updateAcl($imaging_technician_view, 'Imaging technician', 'fhir_api', 'FHIR API', 'medicationstatement','Medication Statement Response', 'view');
/**********************************************************/

AclExtended::updateAcl($imaging_call_center_representative_write, 'Imaging representative', 'fhir_api', 'FHIR API', 'patient','Patient', 'write');
AclExtended::updateAcl($imaging_call_center_representative_write, 'Imaging representative', 'fhir_api', 'FHIR API', 'appointment','Appointment', 'write');

AclExtended::updateAcl($imaging_call_center_representative_view,  'Imaging representative', 'fhir_api', 'FHIR API', 'patient','Patient', 'view');
AclExtended::updateAcl($imaging_call_center_representative_view,  'Imaging representative', 'fhir_api', 'FHIR API', 'appointment','Appointment', 'view');
AclExtended::updateAcl($imaging_call_center_representative_view,  'Imaging representative', 'fhir_api', 'FHIR API', 'practitioner','Practitioner', 'view');
AclExtended::updateAcl($imaging_call_center_representative_view,  'Imaging representative', 'fhir_api', 'FHIR API', 'organization','Organization', 'view');
AclExtended::updateAcl($imaging_call_center_representative_view,  'Imaging representative', 'fhir_api', 'FHIR API', 'healthcareservice','Healthcareb Service', 'view');
AclExtended::updateAcl($imaging_call_center_representative_view,  'Imaging representative', 'fhir_api', 'FHIR API', 'valueset','Value Set', 'view');
AclExtended::updateAcl($imaging_call_center_representative_view,  'Imaging representative', 'fhir_api', 'FHIR API', 'relatedperson','Related Person', 'view');
AclExtended::updateAcl($imaging_call_center_representative_view,  'Imaging representative', 'fhir_api', 'FHIR API', 'documentreference','Document Reference', 'view');
AclExtended::updateAcl($imaging_call_center_representative_view,  'Imaging representative', 'fhir_api', 'FHIR API', 'questionnaire','Questionnaire', 'view');
AclExtended::updateAcl($imaging_call_center_representative_view,  'Imaging representative', 'fhir_api', 'FHIR API', 'questionnaireresponse','Questionnaire Response', 'view');
AclExtended::updateAcl($imaging_call_center_representative_view,  'Imaging representative', 'fhir_api', 'FHIR API', 'condition','Condition', 'view');
AclExtended::updateAcl($imaging_call_center_representative_view,  'Imaging representative', 'fhir_api', 'FHIR API', 'medicationstatement','Medication Statement Response', 'view');

/**********************************************************/


AclExtended::updateAcl($admin_write,  'Administrators',                                    'clinikal_api', 'Clinikal API', 'general_settings','General settings', 'view');
AclExtended::updateAcl($imaging_receptionist_view,  'Imaging receptionist',               'clinikal_api', 'Clinikal API', 'general_settings','General settings', 'view');
AclExtended::updateAcl($imaging_clinic_manager_view,  'Imaging manager',                  'clinikal_api', 'Clinikal API', 'general_settings','General settings', 'view');
AclExtended::updateAcl($imaging_doctor_view,  'Imaging doctor',                           'clinikal_api', 'Clinikal API', 'general_settings','General settings', 'view');
AclExtended::updateAcl($imaging_technician_view,  'Imaging technician',                   'clinikal_api', 'Clinikal API', 'general_settings','General settings', 'view');
AclExtended::updateAcl($imaging_call_center_representative_view,'Imaging representative', 'clinikal_api', 'Clinikal API', 'general_settings','General settings', 'view');

AclExtended::updateAcl($admin_write,  'Administrators',                                    'clinikal_api', 'Clinikal API', 'lists','lists', 'view');
AclExtended::updateAcl($imaging_receptionist_view,  'Imaging receptionist',               'clinikal_api', 'Clinikal API', 'lists','lists', 'view');
AclExtended::updateAcl($imaging_clinic_manager_view,  'Imaging manager',                  'clinikal_api', 'Clinikal API', 'lists','lists', 'view');
AclExtended::updateAcl($imaging_doctor_view,  'Imaging doctor',                           'clinikal_api', 'Clinikal API', 'lists','lists', 'view');
AclExtended::updateAcl($imaging_technician_view,  'Imaging technician',                   'clinikal_api', 'Clinikal API', 'lists','lists', 'view');
AclExtended::updateAcl($imaging_call_center_representative_view,'Imaging representative', 'clinikal_api', 'Clinikal API', 'lists','lists', 'view');


?>
<html>
<head>
    <title>Imaging ACL Setup</title>
    <link rel=STYLESHEET href="interface/themes/style_blue.css">
</head>
<body>
<b>OpenEMR Imaging ACL Setup</b>
<br>
All done configuring and installing access controls (php-GACL)!
</body>
</html>
