<?php

class table {

	/**
	*	Ecrit un tableau
	*
	* @param  Array 	$t_head	Liste des en-tetes
	* @param  String 	$id		Id du tableau
	* @return String 	Html
	*/
	public static function data_table($t_head, $id)
	{
		$title_option = '';
		foreach ($t_head as $t_title) {
			$title_option .= '<th>' . $t_title . '</th>';
		}
		$table = '<div class="panel table">
		<div class="panel-content">
		<div class="dropdown">
            <ul class="dropdown-menu">';
			foreach ($t_head as $title) {
				$table .= '<li class="columns"><a href="#"><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="' . str_replace(' ', ' ', $title) . '">
                  <input type="checkbox" id="' . str_replace(' ', ' ', $title) . '" class="mdl-checkbox__input" checked>
                  <span class="mdl-checkbox__label">' . $title . '</span>
                </label></a></li>' . PHP_EOL;
			}

        $table .= '</ul>
        </div>
		<table id="' . str_replace(' ', ' ', $id) . '" class="table table-hover table-dynamic filter-head">
		<thead>
		<tr>
		' . $title_option . '
		</tr>
		</thead>
		<tbody>';
		return $table;
	}


	/**
	*	Ecrit un tableau
	*
	* @param  Array 	$t_head	Liste des en-tetes
	* @param  String 	$id		Id du tableau
	* @return String 	Html
	*/
	public static function simple_table($t_head, $id)
	{
		$title_option = '';
		foreach ($t_head as $t_title) {
			$title_option .= '<th>' . $t_title . '</th>';
		}
		$table = '<div class="panel table">
		<div class="panel-content">
		<div class="dropdown">
            <ul class="dropdown-menu">';
			foreach ($t_head as $title) {
				$table .= '<li class="columns"><a href="#"><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="' . str_replace(' ', '_', $title) . '">
                  <input type="checkbox" id="' . str_replace(' ', '_', $title) . '" class="mdl-checkbox__input" checked>
                  <span class="mdl-checkbox__label">' . $title . '</span>
                </label></a></li>' . PHP_EOL;
			}

        $table .= '</ul>
        </div>
		<table id="' . str_replace(' ', ' ', $id) . '" class="table table-hover table-dynamic">
		<thead>
		<tr>
		' . $title_option . '
		</tr>
		</thead>
		<tbody>';
		return $table;
	}
}
