<?php
namespace Gt\Dom\HTMLElement;

use Gt\Dom\ClientSide\ValidityState;
use Gt\Dom\Facade\HTMLCollectionFactory;
use Gt\Dom\HTMLCollection;
use Gt\Dom\NodeList;

/**
 * The HTMLFieldSetElement interface provides special properties and methods
 * (beyond the regular HTMLElement interface it also has available to it by
 * inheritance) for manipulating the layout and presentation of <fieldset>
 * elements.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLFieldSetElement
 *
 * @property-read HTMLCollection $elements The elements belonging to this field set.
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
class HTMLFieldSetElement extends HTMLElement {
	use HTMLUIElement;

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLFieldSetElement/elements */
	protected function __prop_get_elements():HTMLCollection {
		return HTMLCollectionFactory::create(
			// List of elements from: https://html.spec.whatwg.org/multipage/forms.html#category-listed
			fn() => $this->querySelectorAll("button, fieldset, input, object, output, select, textarea, [name], [disabled]")
		);
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLFieldSetElement/type */
	protected function __prop_get_type():string {
		return "fieldset";
	}
}
