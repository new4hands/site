<?php

	/**
	 * Class gt3input
	 *
	 * @property string    $name
	 * @property string    $type
	 * @property gt3attr[] $attr
	 */
	class gt3input extends gt3classStd {
		protected static $fields_list = array(
			'name' => '',
//			'value' => '',
			'type' => 'text',
			'attr' => array(),
		);

		public function __construct( array $new_data = array() ) {
			$this->attr = new ArrayObject();
			parent::__construct( $new_data );
		}

		public function __toString() {
			$return = '';
			$return .= '<input type="' . $this->type . '" name="' . $this->name . '"';
			if ( isset( $GLOBALS["gt3_photo_gallery"] )
			     && isset( $GLOBALS["gt3_photo_gallery"][ $this->name ] ) ) {
				$return .= ' value="' . $GLOBALS["gt3_photo_gallery"][ $this->name ] . '"';
			}
			if ( count( $this->attr ) ) {
				foreach ( $this->attr as $attr ) {
					/* @var gt3attr $attr */
					$return .= ' ' . $attr->name . '="' . $attr->value . '"';
				}
			}
			$return .= ' />';
			return $return;
		}
	}
