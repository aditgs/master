<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/*
* Information
*
* both left and right delimiters can be changed
* to whatever delimiters you want e.g {{, {% , [[, and ]],%},}}
* the default for the TBS are [[ and ]].
* 
* !IMPORTANT!
*   spaces before and after the delimiters are also parsed. For example, {% content.title %} is not the same as {%content.title%}
*   theme_path_tbs is the location of the template files for the TBS.
*
*/


$config = array(
		'left_delimiter' => '{% ',
		'right_delimiter' => ' %}',
		'theme_path_tbs' => APPPATH.'views/'
);

/*
* file : application/config/tbs.php
*
*/
