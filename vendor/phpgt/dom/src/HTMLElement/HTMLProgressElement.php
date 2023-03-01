<?php
namespace Gt\Dom\HTMLElement;

use Gt\Dom\NodeList;

/**
 * The HTMLProgressElement interface provides special properties and methods
 * (beyond the regular HTMLElement interface it also has available to it by
 * inheritance) for manipulating the layout and presentation of <progress>
 * elements.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLProgressElement
 *
 * @property ?float $max Is a double value reflecting the content attribute of the same name, limited to numbers greater than zero. Its default value is 1.0.
 * @property-read float $position Returns a double value returning the result of dividing the current value (value) by the maximum value (max); if the progress bar is an indeterminate progress bar, it returns -1.
 */
class HTMLProgressElement extends HTMLElement {
	use HTMLUIElement;

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLProgressElement/max */
	protected function __prop_get_max():?float {
		if($this->hasAttribute("max")) {
			return (float)$this->getAttribute("max");
		}

		return null;
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLProgressElement/max */
	protected function __prop_set_max(float $value):void {
		$this->setAttribute("max", (string)$value);
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLProgressElement/position */
	protected function __prop_get_position():float {
		if(!$this->max) {
			return -1;
		}

		return min($this->value / $this->max, 1);
	}
}
