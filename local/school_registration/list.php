<?php

// error_reporting(E_ALL); error_reporting(-1); ini_set('error_reporting', E_ALL);

require_once __DIR__ . '/../../config.php';

global $DB;


$PAGE->set_url( new moodle_url('/local/school_registration/list.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title('SCHOOL REGISTRATION');

$schools = $DB->get_records('local_schools');

echo $OUTPUT->header();

$template_context = (object)[
    'schools' => array_values($schools)
];


echo $OUTPUT->render_from_template('local_school_registration/register', $template_context);




echo $OUTPUT->footer();