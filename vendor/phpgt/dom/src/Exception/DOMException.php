<?php

namespace Gt\Dom\Exception;

use Gt\PropFunc\MagicProp;
use RuntimeException;


/**
 * The DOMException interface represents an abnormal event (called an exception) that occurs as a result of calling
 * a method or accessing a property of a web API. This is basically how error conditions are described in web APIs.
 *
 * Each exception has a name, which is a short "PascalCase"-style string identifying the error or abnormal condition.
 * @property-read string $name Returns a DOMString that contains one of the strings associated with an error name.
 * @link https://developer.mozilla.org/en-US/docs/Web/API/DOMException
 */
class DOMException extends RuntimeException {
	use MagicProp;

	protected string $name;

	public function __prop_get_name():string {
		return $this->name;
	}
}
