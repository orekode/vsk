<?php

require_once "$CFG->libdir/formslib.php";

class edit extends moodleform
{
    public function definition()
    {
        global $CFG, $DB;

        $mform = $this->_form;

        $mform->addElement('text', 'name', 'School Name');
        $mform->setType('name', PARAM_NOTAGS);
        $mform->setDefault('name', "Please enter your school's full name");

        $mform->addElement('text', 'email', 'Email Address');
        $mform->setType('email', PARAM_NOTAGS);
        $mform->setDefault('email', 'Please enter your email');

        $mform->addElement('text', 'contact', 'Phone Number');
        $mform->setType('contact', PARAM_NOTAGS);
        $mform->setDefault('contact', 'Please enter your phone number');

        $regions = $DB->get_records('local_regions', [], '', 'id, name');

        $regionss = [];

        foreach ($regions as $region) {
            $regionss[$region->id] = $region->name;
        }

        $mform->addElement('select', 'region', 'Region', $regionss);
        $mform->setType('region', PARAM_NOTAGS);
        $mform->setDefault('address', 'Where is your school located');

        $mform->addElement('text', 'address', 'Physical Address');
        $mform->setType('address', PARAM_NOTAGS);
        $mform->setDefault('address', 'Where is your school located');

        $this->add_action_buttons(false);
    }

    public function validation($data, $files)
    {
        return [];
    }
}
