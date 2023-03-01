<?php
namespace Gt\Dom\HTMLElement;

use Gt\Dom\ClientSide\ValidityState;
use Gt\Dom\NodeList;

/**
 * The HTML <meter> elements expose the HTMLMeterElement interface, which
 * provides special properties and methods (beyond the HTMLElement object
 * interface they also have available to them by inheritance) for manipulating
 * the layout and presentation of <meter> elements.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLMeterElement
 *
 * @property ?float $high A double representing the value of the high boundary, reflecting the high attribute.
 * @property ?float $low A double representing the value of the low boundary, reflecting the lowattribute.
 * @property ?float $max A double representing the maximum value, reflecting the max attribute.
 * @property ?float $min A double representing the minimum value, reflecting the min attribute.
 * @property ?float $optimum A double representing the optimum, reflecting the optimum attribute.
 *
 * Imported from HTMLUIElement:
 * @property bool $autofocus Is a Boolean indicating whether or not the control should have input focus when the page loads, unless the user overrides it, for example by typing in a different control. Only one form-associated element in a document can have this attribute specified.
 * @property bool $disabled Is a Boolean indicating whether or not the control is disabled, meaning that it does not accept any clicks.
 * @property-read ?HTMLFormElement $form Is a HTMLFormElement reflecting the form that this element is associated with.
 * @property-read NodeList $labels Is a NodeList that represents a list of <label> elements that are labels for this HTMLUIElement.
 * @property string $name Is a DOMString representing the name of the object when submitted with a form. If specified, it must not be the empty string.
 * @property bool $readOnly Returns / Sets the element's readonly attribute, indicating that the user cannot modify the value of the control.
 * @property bool $required Returns / Sets the element's required attribute, indicating that the user must fill in a value before submitting a form.
 * @property string $type Is a DOMString indicating the behavior of the button.
 * @property-read bool $willValidate Is a Boolean indicating whether the button is a candidate for constraint validation. It is false if any conditions bar it from constraint validation, including: its type property is reset or button; it has a <datalist> ancestor; or the disabled property is set to true.
 * @property-read string $validationMessage Is a DOMString representing the localized message that describes the validation constraints that the control does not satisfy (if any). This attribute is the empty string if the control is not a candidate for constraint validation (willValidate is false), or it satisfies its constraints.
 * @property-read ValidityState $validity Is a ValidityState representing the validity states that this button is in.
 * @property string $value Is a DOMString representing the current form control value of the HTMLUIElement.
 */
class HTMLMeterElement extends HTMLElement {
	use HTMLUIElement;

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLMeterElement/high */
	protected function __prop_get_high():?float {
		if($this->hasAttribute("high")) {
			return (float)$this->getAttribute("high");
		}

		return null;
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLMeterElement/high */
	protected function __prop_set_high(float $value):void {
		$this->setAttribute("high", (string)$value);
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLMeterElement/low */
	protected function __prop_get_low():?float {
		if($this->hasAttribute("low")) {
			return (float)$this->getAttribute("low");
		}

		return null;
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLMeterElement/low */
	protected function __prop_set_low(float $value):void {
		$this->setAttribute("low", (string)$value);
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLMeterElement/max */
	protected function __prop_get_max():?float {
		if($this->hasAttribute("max")) {
			return (float)$this->getAttribute("max");
		}

		return null;
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLMeterElement/max */
	protected function __prop_set_max(float $value):void {
		$this->setAttribute("max", (string)$value);
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLMeterElement/min */
	protected function __prop_get_min():?float {
		if($this->hasAttribute("min")) {
			return (float)$this->getAttribute("min");
		}

		return null;
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLMeterElement/min */
	protected function __prop_set_min(float $value):void {
		$this->setAttribute("min", (string)$value);
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLMeterElement/optimum */
	protected function __prop_get_optimum():?float {
		if($this->hasAttribute("optimum")) {
			return (float)$this->getAttribute("optimum");
		}

		return null;
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLMeterElement/optimum */
	protected function __prop_set_optimum(float $value):void {
		$this->setAttribute("optimum", (string)$value);
	}
}
