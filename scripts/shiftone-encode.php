<?php
/**
 * Shift-one encodes a string.
 * 
 * Usage: jamp shiftone-encode <input>
 *
 * @author  jamp-shareable-scripts <https://github.com/jamp-shareable-scripts>
 * @license GPL-2.0
 */
jampUse('jampEcho');
if (empty($argv[1])) {
	passthru('jamp usage shiftone-encode');
	exit;
}

function shiftoneEncode($input) {
	$output = [];	
	if (function_exists('mb_str_split')) {
		foreach (mb_str_split($input) as $char) {
			array_push($output, mb_ord($char) << 1);
		}
	}
	else {
		for ($i=0; $i < strlen($input); $i++) { 
			array_push($output, ord($input[$i]) << 1);
		}
	}
	return implode(',', $output);
}

jampEcho(shiftoneEncode($argv[1]));
