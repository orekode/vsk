<?php

// Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype = 'mariadb';
$CFG->dblibrary = 'native';
$CFG->dbhost = 'mariadb';
$CFG->dbname = 'vskuul_db';
$CFG->dbuser = 'vskuuler';
$CFG->dbpass = '';
$CFG->prefix = 'mdl_';
$CFG->dboptions = [
  'dbpersist' => 0,
  'dbport' => 3306,
  'dbsocket' => '',
  'dbcollation' => 'utf8mb4_unicode_ci',
];

if (empty($_SERVER['HTTP_HOST'])) {
    $_SERVER['HTTP_HOST'] = '127.0.0.1:8080';
}
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $CFG->wwwroot = 'https://'.$_SERVER['HTTP_HOST'];
} else {
    $CFG->wwwroot = 'http://'.$_SERVER['HTTP_HOST'];
}
$CFG->dataroot = '/bitnami/moodledata';
$CFG->admin = 'admin';

$CFG->directorypermissions = 02777;

require_once __DIR__.'/lib/setup.php';

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
