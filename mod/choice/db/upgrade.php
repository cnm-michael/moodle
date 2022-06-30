<?php
// This file keeps track of upgrades to
// the choice module
//
// Sometimes, changes between versions involve
// alterations to database structures and other
// major things that may break installations.
//
// The upgrade function in this file will attempt
// to perform all the necessary actions to upgrade
// your older installation to the current version.
//
// If there's something it cannot do itself, it
// will tell you what you need to do.
//
// The commands in here will all be database-neutral,
// using the methods of database_manager class
//
// Please do not forget to use upgrade_set_timeout()
// before any action that may take longer time to finish.

defined('MOODLE_INTERNAL') || die();

function xmldb_choice_upgrade($oldversion) {
    global $CFG, $DB;

    // Automatically generated Moodle v3.5.0 release upgrade line.
    // Put any upgrade step following this.

    // Automatically generated Moodle v3.6.0 release upgrade line.
    // Put any upgrade step following this.

    // Automatically generated Moodle v3.7.0 release upgrade line.
    // Put any upgrade step following this.

    // Automatically generated Moodle v3.8.0 release upgrade line.
    // Put any upgrade step following this.

    // Automatically generated Moodle v3.9.0 release upgrade line.
    // Put any upgrade step following this.

    $dbman = $DB->get_manager();

    if ($oldversion < 2020061504) {
        // Define table choice_responses to be created.
        $table = new xmldb_table('choice_responses');

        // Adding fields to table choice_responses.
        $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('choiceid', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null);
        $table->add_field('optionid', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null);
        $table->add_field('text', XMLDB_TYPE_TEXT, null, null, null, null, null);
        $table->add_field('timemodified', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null);

        // Adding keys to table tool_dataprivacy_ctxexpired.
        $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));
        $table->add_key('choiceid', XMLDB_KEY_FOREIGN, array('choiceid'), 'choice', array('id'));
        $table->add_key('optionid', XMLDB_KEY_FOREIGN, array('optionid'), 'choice_options', array('id'));

        // Conditionally launch create table for tool_dataprivacy_ctxexpired.
        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }

        // Define field lawfulbases to be added to tool_dataprivacy_purpose.
        $table = new xmldb_table('choice');

        // It is a required field. We initially define and add it as null and later update it to XMLDB_NOTNULL.
        $field = new xmldb_field('showresponse', XMLDB_TYPE_INTEGER, '2', null, XMLDB_NOTNULL, null, 0, 'limitanswers');

        // Conditionally launch add field showresponse.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Dataprivacy savepoint reached.
        upgrade_plugin_savepoint(true, 2020061503, 'mod', '2020061503');
    }

    return true;
}
