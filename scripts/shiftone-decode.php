<?php
/**
 * Shift-one decodes a string.
 * 
 * Usage: jamp shiftone-decode <input>
 *
 * @author  jamp-shareable-scripts <https://github.com/jamp-shareable-scripts>
 * @license GPL-2.0
 */
jampUse('jampEcho');
if (empty($argv[1])) {
	passthru('jamp usage shiftone-decode');
	exit;
}

function shiftoneDecode($input) {
	$shiftedCharCodes = is_array($input) ? $input : explode(',', $input);
	$output = '';
	if (function_exists('mb_chr')) {
		foreach ($shiftedCharCodes as $charCode) {
			if (!is_numeric($charCode)) {
				throw new Error('Non-numeric value encountered.');
			}
			$code = intval($charCode);
			$output .= mb_chr($code >> 1);
		}
	}
	else {
		foreach ($shiftedCharCodes as $charCode) {
			if (!is_numeric($charCode)) {
				throw new Error('Non-numeric value encountered.');
			}
			$code = intval($charCode);
			$output .= chr($code >> 1);
		}
	}
	return $output;
}

$input = NULL;
if (isset($argv[2])) {
	$input = array_slice($argv, 1);
}
else {
	$input = $argv[1];
}

jampEcho(shiftoneDecode($input));
