<?php


defined('MOODLE_INTERNAL') || die;

require_once($CFG->libdir.'/formslib.php');

class initial_form extends moodleform {
	protected function definition() {
		global $CFG;

		$initialform = $this->_form;

		$initialform->addElement('select', 'gametype', get_string('gametype_select', 'local_gamecreator'), local_gamecreator\game\handler::get_all_game_names());

		$this->add_action_buttons(false, get_string('next', 'local_gamecreator'));
	}
}
