<?php

	/**
	 * Class gt3input_onoff
	 * @property string $name
	 * @property string $title
	 */
	class gt3input_onoff extends gt3classStd {
		protected static $fields_list = array(
			'name' => '',
			'title' => '',
		);

		public function __toString() {
			$checked  = isset( $GLOBALS["gt3_photo_gallery"][$this->name] ) && $GLOBALS["gt3_photo_gallery"][$this->name] == "1" ? 'checked="checked"' : '';
			$return = '
			<div class="toggle-group">
			<input
				type="hidden"
				name="'.$this->name.'"
				value="'.$GLOBALS["gt3_photo_gallery"][$this->name].'" />
			<input type="checkbox"
			       id="'.$this->name.'"
			       class="onoff-input"
				'.$checked.'
				>
			<label for="'.$this->name.'" class="onoffswitch pull-right" aria-hidden="true">
				<div class="onoffswitch-label">
					<div class="onoffswitch-inner"></div>
					<div class="onoffswitch-switch"></div>
				</div>
			</label>
						<label for="'.$this->name.'">
				'.$this->title .'
			</label>
			</div>
			';
			return $return;
		}
	}

