<?php
namespace Gt\Dom;

use Countable;

class DOMStringMap implements Countable {
	/** @var callable */
	private $getterCallback;
	/** @var callable */
	private $setterCallback;

	/**
	 * @param callable $getterCallback Returns an associative array of
	 * key-value-pairs, no parameters.
	 * @param callable $setterCallback Takes an associative array of
	 * key-value-pairs as the only parameter.
	 */
	public function __construct(
		callable $getterCallback,
		callable $setterCallback
	) {
		$this->getterCallback = $getterCallback;
		$this->setterCallback = $setterCallback;
	}

	public function __get(string $name):?string {
		$keyValuePairs = call_user_func($this->getterCallback);
		return $keyValuePairs[$name] ?? null;
	}

	public function __set(string $name, string $value):void {
		$keyValuePairs = call_user_func($this->getterCallback);
		$keyValuePairs[$name] = $value;
		call_user_func($this->setterCallback, $keyValuePairs);
	}

	public function count():int {
		$keyValuePairs = call_user_func($this->getterCallback);
		return count($keyValuePairs);
	}
}
