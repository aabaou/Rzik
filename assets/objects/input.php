<?php

class section_form {

	/**
	* Cette Fonction renvoie un block html
	* correspondant à un paragraphe accompagné d'une icone
	*
	* @param  Int 	$section_desktop	Section de 1 à 12 (version Desktop)
	* @param  Int 	$section_mobile		Section de 1 à 12 (version Mobile)
	* @param  String $icon	   			Classe de l'icone
	* 										http://getbootstrap.com/components/#glyphicons
	* 										http://fontawesome.io/icons/
	* @param  String $icon		Nom du label
	* @param  String $text		Text retourné
	* @return String HTML
	*/
	public static function output($section_desktop, $section_mobile, $icon, $text) {
		return '
		<div class="col-md-' . $section_desktop . ' col-sm-' . $section_mobile . '">
			<div class="col-md-12 iform">
				<i class="' . $icon . '"></i>
				<label class="form-label">' . $name . '</label>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<p>
					' . $text . '
					</p>
				</div>
			</div>
		</div>';
	}



	/**
	* Cree un input
	*
	* @param  int 		$section_desktop [TODO]
	* @param  int 		$section_mobile  [TODO]
	* @param  String 	$icon            [TODO]
	* @param  String 	$name            [TODO]
	* @param  String 	$attr_name       Attribut name
	* @param  String 	$attr_value      Valeur de l'input
	* @return String HTML
	*/

	public static function input_alone($section_desktop, $section_mobile, $icon, $name, $attr_name, $label, $attr_value, $type = 'text' , $disabled = 0, $tab_select = "") {

		switch ($type) {
			case 'text':
				$champs = '<div class="col-md-12">
				<div class="form-group">
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label block">
						<input class="mdl-textfield__input width_all" type="text" id="' . $attr_name . '" name="' . $attr_name . '" value="' . $attr_value . '" '.($disabled ? 'disabled' : '').'>
						<label class="mdl-textfield__label" for="' . $attr_name . '">'. $label .'</label>
						</div>
					</div>
				</div>' ;
				break;

			case 'select':
				if (empty($option))
					$option = '';

					$option = '<li class="mdl-menu__item"></li>';
					foreach ($tab_select as $val_select) {
						$option .= '<li class="mdl-menu__item">' . $val_select . '</li>';
					}
					$champs = '
							<div class="col-md-' . $section . ' col-sm-12 col-xs-12">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
									<input class="mdl-textfield__input" type="text" id="'.$id.'" name=' . $attr_name . ' value="'.$attr_value.'" readonly tabIndex="-1" '.($disabled ? 'disabled' : '').'>
									<label for="'.$id.'" class="mdl-textfield__label">' . $name . '</label>
									<ul for="'.$id.'" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
									' . $option . '
									</ul>
								</div>
							</div>
							';
				break;

		}

			return '
			<div class="col-md-' . $section_desktop . ' col-sm-' . $section_mobile . '">
			<div class="col-md-12 iform">
			<i class="' . $icon . '"></i>
			<label class="form-label">' . $name . '</label>
			</div>
			' . $champs . '
			</div>';
	}




	/**
	* 	Cree un input de type Option
	*
	* @param  Int 		$section 	Section de 1 à 12
	* @param  String   	$name		Nom du select
	* @param  String 	$attr_name 	Attribut name
	* @param  Array		$tab_select Liste des valeurs
	* @return String HTML
	*/

	public static function select($section, $name, $attr_name, $tab_select, $id, $value) {
		if (empty($option))
			$option = '';

		$option = '<li class="mdl-menu__item"></li>';
		foreach ($tab_select->data as $val_select) {
			$option .= '<li class="mdl-menu__item">' . $val_select->fr . '</li>';
		}
		return '
				<div class="col-md-' . $section . ' col-sm-12 col-xs-12">
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
						<input class="mdl-textfield__input" type="text" id="'.$id.'" name=' . $attr_name . ' value="'.$value.'" readonly tabIndex="-1" >
						<label for="'.$id.'" class="mdl-textfield__label">' . $name . '</label>
						<ul for="'.$id.'" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
						' . $option . '
						</ul>
					</div>
				</div>
				';
	}


	public static function checkbox($section_desktop, $section_mobile, $icon, $name, $name_form, $label, $attr_value, $attr_name, $disabled = 0) {

		$champs = '';

		if (is_array($section_desktop)) {
			// initialisation des variables
			$disabled = isset($disabled) ? $disabled : 0;
		}

		if (sizeof($attr_name) == sizeof($label))	{

			for ($i = 0; $i < sizeof($attr_name); $i++) {

				if (sizeof($attr_name) <= 3)
					$section_champs = intval(12 / sizeof($attr_name));
				else
					$section_champs = 4;

				$check = (empty($attr_value[$i])) ? '' : 'checked';

				$champs .= '
				<div class="col-md-'.$section_champs.'">
					<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="cb-'.$i.'-'.$attr_name[$i].'" >
					  <input type="checkbox" '.($disabled ? 'disabled' : '').' value="1" name="'.$attr_name[$i].'" id="cb-'.$i.'-'.$attr_name[$i].'" class="mdl-checkbox__input" '.$check.'>
					  <span class="mdl-checkbox__label">'.$label[$i].'</span>
					</label>
				</div>
				' ;
			}
		}
		else
			$champs =  '<h4><b>Erreur</b> Les tableaux ne sont pas égaux</h4>';

		return '
		<div class="mcb_rad col-md-' . $section_desktop . ' col-sm-' . $section_mobile . '">
		<div class="col-md-12 iform">
		<i class="' . $icon . '"></i>
		<label class="form-label">' . $name . '</label>
		</div>
		<div class="middle">
		' . $champs . '
		</div>
		</div>';
	}

	public static function checkbox_auto($section_desktop, $section_mobile, $icon, $name, $name_form, $tab_label, $attr_value, $attr_name, $other = '', $disabled = 0) {

		$champs = '';
		$label = array();
		$other_value = (empty($other)) ? 0 : 1;

		if (is_array($section_desktop)) {
			// initialisation des variables
			$disabled = isset($disabled) ? $disabled : 0;
		}

		foreach ($tab_label->data as $val_select) {
			array_push($label, $val_select->fr);
		}


		switch ($other_value) {
			case '1':
				for ($i = 0; $i < sizeof($label); $i++) {
					$section_champs = (sizeof($label) < 3) ?  intval(12 / sizeof($label)) :  4;

					$check = ($attr_value[$i] == 1) ? 'checked' : '';

					if ($i != sizeof($label) - 1) {

						$champs .= '
						<div class="col-md-'.$section_champs.'">
							<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="cb-'.$i.'-'.$attr_name[$i].'" >
							  <input type="checkbox" '.($disabled ? 'disabled' : '').' verif="'. $attr_name[$i] .'" other="" value="1" name="'.$attr_name[$i].'" id="cb-'.$i.'-'.$attr_name[$i].'" class="mdl-checkbox__input" '.$check.'>
							  <span class="mdl-checkbox__label">'.$label[$i].'</span>
							</label>
						</div>
						' ;
					}
					else{
						$champs .= '
						<div class="col-md-'.$section_champs.'">
							<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="cb-'.$i.'-'.$attr_name[$i].'" >
							  <input type="checkbox" '.($disabled ? 'disabled' : '').' verif="'.$attr_name[$i].'" other="autre" value="1" name="'.$attr_name[$i].'" id="cb-'.$i.'-'.$attr_name[$i].'" class="mdl-checkbox__input" '.$check.'>
							  <span class="mdl-checkbox__label">'.$label[$i].'</span>
							</label>
						</div>
						<div id="other-'.$attr_name[$i].'" class="col-md-12 secret">
						<div class="form-group">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label block">
								<input class="mdl-textfield__input width_all" type="text" id="' . $attr_name[$i] . '" name="' . $other[0] . '" value="' . $other[1] . '" '.($disabled ? 'disabled' : '').'>
								<label class="mdl-textfield__label" for="' . $attr_name[$i]. '">Autre</label>
							</div>
						</div>
						</div>';
					}
				}

				break;

			default:
				for ($i = 0; $i < sizeof($label); $i++) {

					$check = ($attr_value[$i] == 1) ? 'checked' : '';

					$section_champs = (sizeof($label) < 3) ?  intval(12 / sizeof($label)) :  4;
					$champs .= '
					<div class="col-md-'.$section_champs.'">
						<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="cb-'.$i.'-'.$attr_name[$i].'" >
						  <input type="checkbox" '.($disabled ? 'disabled' : '').' value="1" name="'.$attr_name[$i].'" id="cb-'.$i.'-'.$attr_name[$i].'" class="mdl-checkbox__input" '.$check.'>
						  <span class="mdl-checkbox__label">'.$label[$i].'</span>
						</label>
					</div>
					' ;
				}
				break;
		}






		return '
		<div class="mcb_rad col-md-' . $section_desktop . ' col-sm-' . $section_mobile . '">
		<div class="col-md-12 iform">
		<i class="' . $icon . '"></i>
		<label class="form-label">' . $name . '</label>
		</div>
		<div class="middle">
		' . $champs . '
		</div>
		</div>';


	}


	/**
	 * [radio description]
	 * @param  [type] $section_desktop [description]
	 * @param  [type] $section_mobile  [description]
	 * @param  [type] $icon            [description]
	 * @param  [type] $name            [description]
	 * @param  [type] $name_form       [description]
	 * @param  [type] $label           [description]
	 * @param  [type] $attr_value      [description]
	 * @param  [type] $attr_name       [description]
	 * @return [type]                  [description]
	 */

	public static function radio($section_desktop, $section_mobile, $icon, $name, $name_form, $label, $attr_value, $attr_name) {

		$champs = '';

		if (sizeof($attr_name) == sizeof($label))	{

			for ($i = 0; $i < sizeof($attr_name); $i++) {

				if (sizeof($attr_name) <= 4)
					$section_champs = intval(12 / sizeof($attr_name));
				else
					$section_champs = 4;

				$champs .= '
				<div class="col-md-'.$section_champs.'">
					<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="radio-'.$i.'-'.$attr_name[$i].'" >
					  <input type="radio" value="'.$attr_value[$i].'" name="'.$name_form.'" id="radio-'.$i.'-'.$attr_name[$i].'" class="mdl-radio__button">
					  <span class="mdl-radio__label">'.$label[$i].'</span>
					</label>
				</div>
				' ;
			}
		}
		else
			$champs =  '<h4><b>Erreur</b> Les tableaux ne sont pas égaux</h4>';

		return '
		<div class="mcb_rad col-md-' . $section_desktop . ' col-sm-' . $section_mobile . '">
		<div class="col-md-12 iform">
		<i class="' . $icon . '"></i>
		<label class="form-label">' . $name . '</label>
		</div>
		<div class="middle">
		' . $champs . '
		</div>
		</div>';
	}

	/**
	 * [radio_auto description]
	 * @param  [type] $section_desktop [description]
	 * @param  [type] $section_mobile  [description]
	 * @param  [type] $icon            [description]
	 * @param  [type] $name            [description]
	 * @param  [type] $name_form       [description]
	 * @param  [type] $tab_label       [description]
	 * @param  [type] $attr_value      [description]
	 * @param  [type] $attr_name       [description]
	 * @return [type]                  [description]
	 */
	public static function radio_auto($section_desktop, $section_mobile, $icon, $name, $name_form, $tab_label, $attr_name, $checked = '', $other = '', $disabled = 0) {

		$champs = '';
		$label = array();
		$value = array();
		$other_value = (empty($other)) ? 0 : 1;

		if (is_array($section_desktop)) {
			// initialisation des variables
			$disabled = isset($disabled) ? $disabled : 0;
		}
		foreach ($tab_label->data as $val_select) {
			array_push($label, $val_select->fr);
			array_push($value, $val_select->id);
		}


		switch ($other_value) {
			case '1':
				for ($i = 0; $i < sizeof($label); $i++) {

					$section_champs = (sizeof($label) < 3) ?  intval(12 / sizeof($label)) :  4;

					$check = ($value[$i] == $checked) ? 'checked' : '';

					if ($i != sizeof($label) - 1) {

						$champs .= '
						<div class="col-md-'.$section_champs.'">
							<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="radio-'.$i.'-'.$attr_name.'" >
							  <input '.($disabled ? 'disabled' : '').' type="radio" other="" value="'.$value[$i].'" name="'.$name_form.'" id="radio-'.$i.'-'.$attr_name.'" class="mdl-radio__button" '.$check.'>
							  <span class="mdl-radio__label">'.$label[$i].'</span>
							  <div class="mdl-tooltip" data-mdl-for="radio-'.$i.'-'.$attr_name.'">'.$label[$i].'</div>
							</label>
						</div>
						' ;
					}
					else{
						$champs .= '
						<div class="col-md-'.$section_champs.'">
							<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="radio-'.$i.'-'.$attr_name.'" >
							  <input '.($disabled ? 'disabled' : '').' type="radio" other="autre" value="'.$value[$i].'" name="'.$name_form.'" id="radio-'.$i.'-'.$attr_name.'" class="mdl-radio__button" '.$check.'>
							  <span class="mdl-radio__label">'.$label[$i].'</span>
							  <div class="mdl-tooltip" data-mdl-for="radio-'.$i.'-'.$attr_name.'">'.$label[$i].'</div>
							</label>
						</div>
						<div id="other-'.$name_form.'" class="col-md-12 secret">
						<div class="form-group">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label block">
								<input class="mdl-textfield__input width_all" type="text" id="' . $attr_name . '" name="' . $other[0] . '" value="' . $other[1] . '" '.($disabled ? 'disabled' : '').'>
								<label class="mdl-textfield__label" for="' . $attr_name . '">Autre</label>
							</div>
						</div>
						</div>';
					}
				}

				break;

			default:
				for ($i = 0; $i < sizeof($label); $i++) {

					$section_champs = (sizeof($label) < 3) ?  intval(12 / sizeof($label)) :  4;

					$check = ($value[$i] == $checked) ? 'checked' : '';

					$champs .= '
					<div class="col-md-'.$section_champs.'">
						<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="radio-'.$i.'-'.$attr_name.'" >
						  <input '.($disabled ? 'disabled' : '').' type="radio" value="'.$value[$i].'" name="'.$name_form.'" id="radio-'.$i.'-'.$attr_name.'" class="mdl-radio__button" '.$check.'>
						  <span class="mdl-radio__label">'.$label[$i].'</span>
						  <div class="mdl-tooltip" data-mdl-for="radio-'.$i.'-'.$attr_name.'">'.$label[$i].'</div>
						</label>
					</div>
					' ;
				}
				break;
		}


		return '
		<div class="mcb_rad col-md-' . $section_desktop . ' col-sm-' . $section_mobile . '">
		<div class="col-md-12 iform">
		<i class="' . $icon . '"></i>
		<label class="form-label">' . $name . '</label>
		</div>
		<div class="middle">
		' . $champs . '
		</div>
		</div>';
	}


	public static function input_hide($id, $label, $attr_name, $attr_value){
		$input = '
		<div id="'.$id.'"class="col-md-12 secret">
		<div class="form-group">
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label block">
				<input class="mdl-textfield__input width_all" type="text" id="' . $attr_name . '" name="' . $attr_name . '" value="' . $attr_value . '">
				<label class="mdl-textfield__label" for="' . $attr_name . '">'.$label.'</label>
			</div>
		</div>
		</div>';

		return $input;
	}


	/**
	 * [field description]
	 * @param  mixed $section_desktop [description] Par defaut 12
	 * @param  [type] $section_mobile  [description]
	 * @param  [type] $icon            [description]
	 * @param  [type] $name            [description]
	 * @param  [type] $label           [description]
	 * @param  [type] $attr_name       [description]
	 * @param  [type] $attr_value      Valeur de l'input
	 * @param  [type] $type            Type de l'input (text/password/etc), par defaut input
	 * @param  [type] $tab_select      [description]
	 * @return [type]                  [description]
	 */
	public static function field($section_desktop, $section_mobile = '', $icon = '', $name = '', $label = [''], $attr_name = [''], $attr_value = [''], $type = ['input'], $tab_select = '', $value_inputHide = '', $disabled = 0) {

		if (is_array($section_desktop)) {
			// initialisation des variables
			$d = $section_desktop;
			$section_desktop = isset($d['section_desktop']) ? $d['section_desktop'] : 12;
			$section_mobile = isset($d['section_mobile']) ? $d['section_mobile'] : $section_desktop;
			$icon = isset($d['icon']) ? $d['icon'] : '';
			$name = isset($d['name']) ? $d['name'] : '';
			$label = isset($d['label']) ? is_string($d['label']) ? [$d['label']] : $d['label'] : '';
			$attr_name = isset($d['attr_name']) ? is_string($d['attr_name']) ? [$d['attr_name']] : $d['attr_name'] : $label;
			$attr_value = isset($d['value']) ? is_string($d['value']) ? [$d['value']] : $d['value'] : '';
			$type = isset($d['type']) ? is_string($d['type']) ? [$d['type']] : $d['type'] : ['input'];
			$tab_select = isset($d['select']) ? $d['select'] : [];
			$disabled = isset($d['disabled']) ? $d['disabled'] : 0;
		}

		$champs = '';

		if (empty($x))
			$x = 0;

		if (empty($y))
			$y = 0;

		if (empty($value_inputHide))
			$value_inputHide = 0;

		if (sizeof($attr_name) == sizeof($attr_value))	{

			$section_champs = (sizeof($attr_name) < 5) ? intval(12 / sizeof($attr_name)) : 4;

			for ($i = 0; $i < sizeof($attr_name); $i++) {
				if (empty($type[$i]))
					$type[$i] = 'text';
				switch ($type[$i]) {
					case 'select':
						$option = '';
						// $option = '<li class="mdl-menu__item"></li>';

						foreach ($tab_select[$x] as $key_select => $val_select) {
								$option .= '<li class="mdl-menu__item" data-val="'.$key_select.'">' . $val_select . '</li>';
						}
						$x++;
				        $champs .='<div class="col-md-' . $section_champs . '">
				        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
				            <input class="mdl-textfield__input select" type="text" id="' . $attr_name[$i] . '" name="' . $attr_name[$i] . '" value="' . $attr_value[$i] . '" readonly tabIndex="-1" '.($disabled ? 'disabled' : '').' value="$attr_value">
				            <i class="fa fa-caret-down" aria-hidden="true" style="margin-right: 10px;"></i>
				            <label for="' . $attr_name[$i] . '" class="mdl-textfield__label">'.$label[$i].'</label>
				            <ul for="' . $attr_name[$i] . '" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
				            ' . $option . '
				            </ul>
				          </div>
				          </div>';
						break;

					case 'selectOld':
						$option = '';
						$option = '<li class="mdl-menu__item"></li>';

						foreach ($tab_select as $key_select => $val_select) {
								$option .= '<li class="mdl-menu__item" data-val="'.$key_select.'">' . $val_select . '</li>';
						}

						$x++;
				        $champs .='<div class="col-md-' . $section_champs . '">
				        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
				            <input class="mdl-textfield__input select"   type="text" id="' . $attr_name[$i] . '" name="' . $attr_name[$i] . '" value="' . $attr_value[$i] . '" readonly tabIndex="-1" '.($disabled ? 'disabled' : '').'>
				            <i class="fa fa-caret-down" aria-hidden="true" style="margin-right: 10px;"></i>
				            <label for="' . $attr_name[$i] . '" class="mdl-textfield__label">'.$label[$i].'</label>
				            <ul for="' . $attr_name[$i] . '" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
				            ' . $option . '
				            </ul>
				          </div>
				          </div>';
						break;

					case 'select_search':
						$option = '';

						foreach ($tab_select[$x] as $key_select => $val_select) {
							if (!empty($attr_value[0]) && $attr_value[0] == $key_select)
								$option .= '<option selected value="' . $key_select . '">' . $val_select . '</option>';
							else
								$option .= '<option value="' . $key_select . '">' . $val_select . '</option>';
						}

						$x++;
					    $champs .='<div class="col-md-' . $section_champs . '">
							<div class="select_search">
							  <label for="' . $attr_name[$i] . '" class="mdl-textfield__label">' . $label[$i] . '</label>
							  <select value="' . $attr_value[$i] . '" name="' . $attr_name[$i] . '"  id="' . $attr_name[$i] . '" class="selectpicker" data-show-subtext="true" data-live-search="true" '.($disabled ? 'disabled' : '').'>
							  ' . $option . '
							  </select>
							</div>
							<input type="hidden" name="id' . $attr_name[$i] . '" i_hide="' . $attr_name[$i] . '" value="'. $value_inputHide .'"/>
					      </div>';

						break;
					case 'select_search_input':
						$option = '';
						$option = '<option> </option>';
						foreach ($tab_select[$x]->data as $key_select => $val_select) {
							if (!empty($attr_value) && $attr_value == $key_select)
								$option .= '<option selected value="'.$key_select.'">' . $val_select . '</option>';
							else
								$option .= '<option value="'.$key_select.'">' . $val_select . '</option>';
						}

						$x++;

					    $champs .='<div class="col-md-' . $section_champs . '">
							<div class="select_search">
							  <label for="' . $attr_name[$i] . '" class="mdl-textfield__label">' . $label[$i] . '</label>
							  <select value="' . $attr_value[$i] . '" name="' . $attr_name[$i] . '"  id="' . $attr_name[$i] . '" class="selectpicker" data-show-subtext="true" data-live-search="true" '.($disabled ? 'disabled' : '').'>
							  ' . $option . '
							  </select>
							</div>
							<input type="hidden" name="id' . $attr_name[$i] . '" i_hide="' . $attr_name[$i] . '" value="'. $value_inputHide .'"/>
					      </div>';

						break;
					case 'select_input':
						$option = '';
						$option = '<li class="mdl-menu__item"></li>';

						foreach ($tab_select[$x] as $key_select => $val_select) {
								$option .= '<li class="mdl-menu__item" data-val="'.$key_select.'">' . $val_select . '</li>';
						}
						$x++;

				        $champs .='<div class="col-md-' . $section_champs . '">
				        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
				            <input class="mdl-textfield__input i_hide select"   type="text" id="' . $attr_name[$i] . '" name="' . $attr_name[$i] . '" value="' . $attr_value[$i] . '" readonly tabIndex="-1" '.($disabled ? 'disabled' : '').'>
            					<i class="fa fa-caret-down" aria-hidden="true" style="margin-right: 10px;"></i>
				            <label for="' . $attr_name[$i] . '" class="mdl-textfield__label">'.$label[$i].'</label>
				            <ul for="' . $attr_name[$i] . '" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
				            ' . $option . '
				            </ul>
				          </div>
				          <input type="hidden" name="id' . $attr_name[$i] . '" i_hide="' . $attr_name[$i] . '" value="'. $value_inputHide .'"/>
				          </div>';
						break;

					case 'input':
						$champs .= '<div class="col-md-' . $section_champs . '">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label block">
							<input ' . ($disabled ? 'disabled' : '') . ' class="mdl-textfield__input width_all" type="text" id="' . $attr_name[$i] . '" name="' . $attr_name[$i] . '" value="' . $attr_value[$i] . '">
							<label class="mdl-textfield__label" for="' . $attr_name[$i] . '">'.$label[$i].'</label>
							</div>
						</div>' ;
						$y++;

						break;
					case 'text':
						$champs .= '<div class="col-md-' . $section_champs . '">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label block">
							<input ' . ($disabled ? 'disabled' : '') . ' class="mdl-textfield__input width_all" type="text" id="' . $attr_name[$i] . '" name="' . $attr_name[$i] . '" value="' . $attr_value[$i] . '" pattern="^[a-zA-Z]+$">
							<label class="mdl-textfield__label" for="' . $attr_name[$i] . '">'.$label[$i].'</label>
							</div>
						</div>' ;
						$y++;

						break;
					case 'num':
					case 'number':
						$champs .= '<div class="col-md-' . $section_champs . '">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label block">
							<input ' . ($disabled ? 'disabled' : '') . ' class="mdl-textfield__input width_all" type="number" id="' . $attr_name[$i] . '" name="' . $attr_name[$i] . '" value="' . $attr_value[$i] . '">
							<label class="mdl-textfield__label" for="' . $attr_name[$i] . '">'.$label[$i].'</label>
							</div>
						</div>' ;
						$y++;
						break;
						case 'cp':
							$champs .= '<div class="col-md-' . $section_champs . '">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label block">
								<input ' . ($disabled ? 'disabled' : '') . ' class="mdl-textfield__input width_all" type="text" id="' . $attr_name[$i] . '" name="' . $attr_name[$i] . '" value="' . $attr_value[$i] . '" pattern="^(([0-8][0-9])|(9[0-5])|(2[ab]))[0-9]{3}$" ">
								<label class="mdl-textfield__label" for="' . $attr_name[$i] . '">'.$label[$i].'</label>
							</div>
							</div>' ;
							break;
						case 'pass':
						case 'password':
							$champs .= '<div class="col-md-' . $section_champs . '">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label block">
								<input ' . ($disabled ? 'disabled' : '') . ' class="mdl-textfield__input width_all" type="password" id="' . $attr_name[$i] . '" name="' . $attr_name[$i] . '" value="' . $attr_value[$i] . '" pattern="^(([0-8][0-9])|(9[0-5])|(2[ab]))[0-9]{3}$" ">
								<label class="mdl-textfield__label" for="' . $attr_name[$i] . '">'.$label[$i].'</label>
							</div>
							</div>' ;
							break;
						case 'tel':
							$champs .= '<div class="col-md-' . $section_champs . '">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label block">
								<input ' . ($disabled ? 'disabled' : '') . ' class="mdl-textfield__input width_all" type="tel" id="' . $attr_name[$i] . '" name="' . $attr_name[$i] . '" value="' . $attr_value[$i] . '" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" ">
								<label class="mdl-textfield__label" for="' . $attr_name[$i] . '">'.$label[$i].'</label>
							</div>
							</div>' ;
							break;
						case 'email':
							$champs .= '<div class="col-md-' . $section_champs . '">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label block">
								<input ' . ($disabled ? 'disabled' : '') . ' class="mdl-textfield__input width_all" type="email" id="' . $attr_name[$i] . '" name="' . $attr_name[$i] . '" value="' . $attr_value[$i] . '" >
								<label class="mdl-textfield__label" for="' . $attr_name[$i] . '">'.$label[$i].'</label>
							</div>
							</div>' ;
							break;
						case 'date':
							$champs .= '<div class="col-md-' . $section_champs . '">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label block">
								<input ' . ($disabled ? 'disabled' : '') . ' class="mdl-textfield__input width_all" type="text" date="datepicker" id="' . $attr_name[$i] . '" name="' . $attr_name[$i] . '" value="' . $attr_value[$i] . '" >
								<label class="mdl-textfield__label" for="' . $attr_name[$i] . '">'.$label[$i].'</label>
							</div>
							</div>' ;
							break;
						case 'majorDate':
							$champs .= '<div class="col-md-' . $section_champs . '">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label block">
								<input ' . ($disabled ? 'disabled' : '') . ' class="mdl-textfield__input width_all" type="text" date="major_datepicker" id="' . $attr_name[$i] . '" name="' . $attr_name[$i] . '" value="' . $attr_value[$i] . '" >
								<label class="mdl-textfield__label" for="' . $attr_name[$i] . '">'.$label[$i].'</label>
							</div>
							</div>' ;
							break;
				}
			}

			$res = '<div class="col-md-' . $section_desktop . ' col-sm-' . $section_mobile . '">';
			if (!empty($name)) {
				$res .= '<div class="col-md-12 iform">
			<i class="' . $icon . '"></i>
			<label class="form-label">' . $name . '</label>
			</div>';
			}
			$res .= $champs . '
			</div>';

			return $res;
		} else {
			return '<h4><b>Erreur</b> Les tableaux ne sont pas égaux</h4>';
		}
	}

	/**
	* 	Cree un select avec un champ recherche
	*
	* @param  Array		$params Liste des parametres
	*					id 			Id du select
	*					col 		Classe bootstrap, entre 1 et 12, par defaut 6
	*					data		List des options, sous la forme [value => option, ...]
	*					defaultV 	Valeur par defaut, par defaut vide
	*					disabled 	Defini l'attribut, par defaut false
	*					label		Label, par defaut vide
	*					name		Name du select, par defaut egal a id
	* @return String HTML
	*/
	public static function select_search(Array $params)
	{
		error_log('!!!!!!!!!!!!!!!!!!!!! UTILISATION DE SELECT_SEARCH OBSOLETE !!!!!!!!!!!!!!!!!!!');
		if (empty($params['col']))
			$params['col'] = 6;
		if (empty($params['name']))
			$params['name'] = $params['id'];
		if (empty($params['disabled']))
			$params['disabled'] = false;

		$html = '<div class="form-group">' . PHP_EOL;
		if (!empty($params['label']))
			$html .= '<label class="col-md-'. $params['col'] .' control-label" for="' . $params['id'] . '">' . $params['label'] . '</label>';
		$html .= '<div class="col-md-'. $params['col'] .'">';
		$html .= '<select id="' .  $params['id'] . '" name="' . $params['name'] . '" class="selectpicker" data-live-search="true"  data-width="100%" ' . ($params['disabled'] ? 'disabled' : '') .'>';
		foreach ($params['data'] as $k => $v) {
			if (!empty($params['defaultV']) && $params['defaultV'] == $k)
				$html .= "<option selected value=\"$k\">$v</option>";
			else
				$html .= "<option value=\"$k\">$v</option>";
		}
		$html .= '</select>
		</div>
		</div>';
		return $html;
	}

	/**
	*	Cette fonction renvoi un input de type file
	*
	* @param  Int 		Section de 1 à 12
	* @param  String   Nom de la section
	* @return HTML
	*/
	public static function file($section, $name, $id, $disabled = 0) {

		if (is_array($section)) {
			// initialisation des variables
			$disabled = isset($disabled) ? $disabled : 0;
		}

		return '
		<div class="col-lg-' . $section . ' col-md-12 ">
			<p class="title_docs">' . $name . '</p>
			<input id="'.$id.'" name="'.$id.'" ' . ($disabled ? 'disabled' : '') . '  type="file">
		</div>';
	}


	/**
	*	Cette fonction renvoi un bouton (submit ou button)
	*
	* @param  Int 		Section de 1 à 12
	* @param  String   Position: left,center et right
	* @param  String   Type de bouton
	* @param  String   Couleur: blue
	* @param  String   Text
	* @return HTML
	*/

	public static function button($section, $position = '', $type = '', $color = '', $text = '', $link = '', $id = '', $style = '') {
		if (is_array($section)) {
			// initialisation des variables
			$params = $section;
			$id = isset($params['id']) ? $params['id'] : '';
			$section = isset($params['section']) ? $params['section'] : 12;
			$position = isset($params['align']) ? $params['align'] : 'center';
			$type = isset($params['type']) ? $params['type'] : 'button';
			$color = isset($params['color']) ? $params['color'] : 'blue';
			$text = isset($params['text']) ? $params['text'] : '';
			$link = isset($params['link']) ? $params['link'] : '';
			$style = isset($params['style']) ? $params['style'] : '';
		}
		if (empty($link)) {
			$btn = '
			<div class="col-md-' . $section . '">
				<div class="' . $position . '">
					<button id="' . $id . '" type="' . $type . '" class="hvr-horizontal ' . $color . '" style="' . $style . '">
					' . $text . '
					</button>
				</div>
			</div>';

		} else {
			$btn = '
			<div class="col-md-' . $section . '">
				<div class="' . $position . '">
					<a href="' . $link . '" >
						<button id="' . $id . '" type="' . $type . '" class="hvr-horizontal ' . $color . '" style="' . $style . '">
						' . $text . '
						</button>
					</a>
				</div>
			</div>';
		}

		return $btn;
	}

	/**
	*	Cette fonction renvoi un textarea
	*
	* @param  Int 		Section de 1 à 12
	* @param  String   Attribut name
	* @return HTML
	*/
	public static function comment($section, $attrname, $value, $disabled = 0) {
		return '
		<div class="col-md-' . $section . '">
			<textarea ' . ($disabled ? 'disabled' : '') . ' name="' . $attrname . '" id="Commentaire" class="textar" onchange="" rows="3">'.$value.'</textarea>
		</div>';
	}


	public static function form_top($action, $method) {
		return '<form action="' . $action . '" method="' . $method . '">';
	}

	public static function form_bottom() {
		return '</form>';
	}

}

?>
