<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/
$hook['post_controller'] = array(     // 'post_controller' indicated execution of hooks after controller is finished
    'class' => 'Db_log',             // Name of Class
    'function' => 'logQueries',     // Name of function to be executed in from Class
    'filename' => 'db_log.php',    // Name of the Hook file
    'filepath' => 'hooks'         // Name of folder where Hook file is stored
);
//
// CSRF Protection hooks, don't touch these unless you know what you're
// doing.
//
// THE ORDER OF THESE HOOKS IS EXTREMELY IMPORTANT!!
//
// Validates tokens pre_controller
// THIS HAS TO GO FIRST IN THE post_controller_constructor HOOK LIST.
$hook['post_controller_constructor'][] = array( // Mind the "[]", this is not the only post_controller_constructor hook
  'class'    => 'CSRF_Protection',
  'function' => 'validate_tokens',
  'filename' => 'csrf.php',
  'filepath' => 'hooks'
);
// Generates the token (MUST HAPPEN AFTER THE VALIDATION HAS BEEN MADE, BUT BEFORE THE CONTROLLER
// IS EXECUTED, OTHERWISE USER HAS NO ACCESS TO A VALID TOKEN FOR CUSTOM FORMS).
$hook['post_controller_constructor'][] = array( // Mind the "[]", this is not the only post_controller_constructor hook
  'class'    => 'CSRF_Protection',
  'function' => 'generate_token',
  'filename' => 'csrf.php',
  'filepath' => 'hooks'
);
// This injects tokens on all forms
$hook['display_override'] = array(
  'class'    => 'CSRF_Protection',
  'function' => 'inject_tokens',
  'filename' => 'csrf.php',
  'filepath' => 'hooks'
);
/*$hook['display_override'] = array(
    'class' => 'Minifyhtml',
    'function' => 'output',
    'filename' => 'Minifyhtml.php',
    'filepath' => 'hooks',
    'params' => array()
);
*/
/*$hook['display_override'][] = array(
    'class' => '',
    'function' => 'CI_Minifier_Hook_Loader',
    'filename' => '',
    'filepath' => ''
);
*/
/* End of file hooks.php */
/* Location: ./application/config/hooks.php */