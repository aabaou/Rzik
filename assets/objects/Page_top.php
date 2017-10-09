<?php

class page_top {

	/**
	*	Ajoute le haut de corps de la page
	*
	* @param String $name 	     Nom de la page
	* @param String $select_name [TODO]
	* @param Array	$tab_select	 [TODO]
	* @return String Html
	*/
	public static function add($name, $select_name, $tab_select) {
		if (empty($tab_select)) {
			$top = '
			<div class="col-md-12">
			<div class="panel">
			<div class="panel-header bg-dark">
			<h2 class="panel-title">' . $name . '</h2>
			</div>
			<div class="panel-heading">
			<div class="panel-over">';
		} else {
			if (empty($option))
			$option = '';
			foreach ($tab_select as $value) {
				$option .= '<li class="mdl-menu__item">' . $value . '</li>';
			}

			$top = '<div class="col-md-12">
			<div class="panel">
			<div class="panel-header bg-dark">
			<h2 class="panel-title">' . $name . '</h2>
			<div id="input_select">
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth right">
			<input class="mdl-textfield__input" type="text" id="sample1" value="" readonly tabIndex="-1">
			<label for="sample1" class="mdl-textfield__label">' . $select_name . '</label>
			<ul for="sample1" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
			' . $option . '
			</ul>
			</div>
			</div>
			</div>
			<div class="panel-heading">
			<div class="panel-over">';
		}		
		return $top;
	}
}

?>
