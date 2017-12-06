<?php

namespace local_gamecreator\game\generator;

defined('MOODLE_INTERNAL') || die;

use moodle_url;

class arrange {
	public static function generate($data, $game_form = null) {
		global $CFG;

		mkdir($CFG->dirroot . '/LOR/games/arrange/versions/' . $foldername);

		$arrangeform->save_file('image1', $CFG->dirroot . '/LOR/games/arrange/versions/'.$foldername.'/4.jpg');
		$arrangeform->save_file('image2', $CFG->dirroot . '/LOR/games/arrange/versions/'.$foldername.'/3.jpg');
		$arrangeform->save_file('image3', $CFG->dirroot . '/LOR/games/arrange/versions/'.$foldername.'/2.jpg');
		$arrangeform->save_file('image4', $CFG->dirroot . '/LOR/games/arrange/versions/'.$foldername.'/1.jpg');

		$link = new moodle_url("/LOR/games/arrange/arrange.php?title=" . rawurlencode($foldername));
		$link = str_replace("http:", "https:", $link);

		return $link;
	}
}