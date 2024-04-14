<?php

// error_reporting(E_ALL); error_reporting(-1); ini_set('error_reporting', E_ALL);

require_once __DIR__.'/../../config.php';
require_once $CFG->dirroot.'/local/school_registration/classes/form/edit.php';

global $DB;

$PAGE->set_url(new moodle_url('/local/school_registration/register.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title('SCHOOL REGISTRATION');

$template_context = (object) [
    'texttodisplay' => 'This is an example text',
];

$mform = new edit();

if ($formdata = $mform->get_data()) {
    $school = (object) [
        'name' => $formdata->name,
        'email' => $formdata->email,
        'contact' => $formdata->contact,
        'region_id' => $formdata->region,
        'address' => $formdata->address,
    ];

    $DB->insert_record('local_schools', $school);

    redirect(
        $CFG->wwwroot . '/local/school_registration/list.php', 
        $message= $formdata->name . ' Registered Successfully',
        $messagetype=\core\output\notification::NOTIFY_SUCCESS
    );
}

echo $OUTPUT->header();

$mform->display();
// var_dump($school);

echo $OUTPUT->footer();
