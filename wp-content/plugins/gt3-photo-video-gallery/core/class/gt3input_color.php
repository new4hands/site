<?php

	/**
	 * Class gt3input_color
	 * @property string $name1
	 * @property string $name2
	 * @property string $data2
	 */
	class gt3input_color extends gt3classStd {
		protected static $fields_list = array(
			'name1' => '',
			'name2' => '',
			'data2' => '',
		);

		public function __toString() {
			$value = isset( $GLOBALS["gt3_photo_gallery"][$this->name2] ) ? 'value="' . $GLOBALS["gt3_photo_gallery"][$this->name2].'"s' : '';
			return '<input name="'.$this->name1.'" type="text" '.$value.' />
			<input type="text" class="hidden" name="'.$this->name2.'" data-setting="'.$this->data2.'" />';
		}
	}