<?php

namespace local_gamecreator\game\form;

defined('MOODLE_INTERNAL') || die;

require_once($CFG->libdir.'/formslib.php');

use moodleform;

class spiderlove_form extends moodleform {
	protected function definition() {
		global $CFG;

		$mform = $this->_form;

		$mform->addElement('text', 'foldername', get_string('foldername', 'local_gamecreator'));
		$mform->setType('foldername', PARAM_TEXT);
		$mform->addRule('foldername', get_string('required'), 'required', null);

		$mform->addElement('header', 'leftheader', get_string('leftheader', 'local_gamecreator'));

		$mform->addElement('filepicker', 'left1', get_string('leftimage', 'local_gamecreator').' 1', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.png', '.jpg')));
		$mform->addElement('filepicker', 'left2', get_string('leftimage', 'local_gamecreator').' 2', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.png', '.jpg')));
		$mform->addElement('filepicker', 'left3', get_string('leftimage', 'local_gamecreator').' 3', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.png', '.jpg')));
		$mform->addElement('filepicker', 'left4', get_string('leftimage', 'local_gamecreator').' 4', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.png', '.jpg')));
		$mform->addElement('filepicker', 'left5', get_string('leftimage', 'local_gamecreator').' 5', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.png', '.jpg')));
		$mform->addRule('left1', get_string('required'), 'required', null);
		$mform->addRule('left2', get_string('required'), 'required', null);
		$mform->addRule('left3', get_string('required'), 'required', null);
		$mform->addRule('left4', get_string('required'), 'required', null);
		$mform->addRule('left5', get_string('required'), 'required', null);


		$mform->addElement('header', 'rightheader', get_string('rightheader', 'local_gamecreator'));

		$mform->addElement('filepicker', 'right1', get_string('rightimage', 'local_gamecreator').' 1', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.png', '.jpg')));
		$mform->addElement('filepicker', 'right2', get_string('rightimage', 'local_gamecreator').' 2', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.png', '.jpg')));
		$mform->addElement('filepicker', 'right3', get_string('rightimage', 'local_gamecreator').' 3', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.png', '.jpg')));
		$mform->addElement('filepicker', 'right4', get_string('rightimage', 'local_gamecreator').' 4', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.png', '.jpg')));
		$mform->addElement('filepicker', 'right5', get_string('rightimage', 'local_gamecreator').' 5', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.png', '.jpg')));
		$mform->addRule('right1', get_string('required'), 'required', null);
		$mform->addRule('right2', get_string('required'), 'required', null);
		$mform->addRule('right3', get_string('required'), 'required', null);
		$mform->addRule('right4', get_string('required'), 'required', null);
		$mform->addRule('right5', get_string('required'), 'required', null);

		$this->add_action_buttons(true, get_string('creategame', 'local_gamecreator'));
	}

	public function validation($data, $files) {
		global $CFG;
		global $SESSION;

		$errors = parent::validation($data, $files);

		$foldername = $data['foldername'];
		$filename = $CFG->dirroot . '/_LOR/games/spiderlove/versions/' . $foldername;

		// Check if the folder already exists AND we aren't editing the game we just created.
		if (file_exists($filename) && $SESSION->last_created_folder_name != $foldername) {
			$errors['foldername'] = get_string('versionexists', 'local_gamecreator');
		} else {
			// The folder will be created, store the foldername in case we need to edit the game and allow overwriting it.
			$SESSION->last_created_folder_name = $foldername;
		}

		return $errors;
	}
}
