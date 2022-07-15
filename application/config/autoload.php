<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('database', 'session', 'form_validation');

$autoload['drivers'] = array();

$autoload['helper'] = array('url', 'form', 'ci_helper', 'text', 'dateindo_helper');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array('Mod_menu' => 'menu', 'Mod_admin' => 'admin');
