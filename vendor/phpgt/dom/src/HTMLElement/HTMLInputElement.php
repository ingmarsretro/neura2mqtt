<?php
namespace Gt\Dom\HTMLElement;

use DateTimeImmutable;
use DateTimeInterface;
use Exception;
use Gt\Dom\ClientSide\FileList;
use Gt\Dom\ClientSide\ValidityState;
use Gt\Dom\Exception\ClientSideOnlyFunctionalityException;
use Gt\Dom\Exception\FunctionalityNotAvailableOnServerException;
use Gt\Dom\Facade\NodeListFactory;
use Gt\Dom\NodeList;

/**
 * The HTMLInputElement interface provides special properties and methods for
 * manipulating the options, layout, and presentation of <input> elements.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLInputElement
 *
 * Properties that apply only to elements of type `checkbox` or `radio`:
 * @property bool $checked Returns / Sets the current state of the element when type is checkbox or radio.
 * @property bool $defaultChecked Returns / Sets the default state of a radio button or checkbox as originally specified in HTML that created this object.
 * @property bool $indeterminate Returns whether the checkbox or radio button is in indeterminate state. For checkboxes, the effect is that the appearance of the checkbox is obscured/greyed in some way as to indicate its state is indeterminate (not checked but not unchecked). Does not affect the value of the checked attribute, and clicking the checkbox will set the value to false.
 *
 * Properties that apply only to elements of type `image`:
 * @property string $alt Returns / Sets the element's alt attribute, containing alternative text to use when type is image.
 * @property ?int $height Returns / Sets the element's height attribute, which defines the height of the image displayed for the button, if the value of type is image.
 * @property string $src Returns / Sets the element's src attribute, which specifies a URI for the location of an image to display on the graphical submit button, if the value of type is image; otherwise it is ignored.
 * @property ?int $width Returns / Sets the document's width attribute, which defines the width of the image displayed for the button, if the value of type is image.
 *
 * Properties that apply only to elements of type `file`:
 * @property string $accept Returns / Sets the element's accept attribute, containing comma-separated list of file types accepted by the server when type is file.
 * @property FileList $files Returns/accepts a FileList object, which contains a list of File objects representing the files selected for upload.
 *
 * Properties that only apply to elements of type `submit` or `image`:
 * @property string $formAction Is a DOMString reflecting the URI of a resource that processes information submitted by the HTMLUIElement. If specified, this attribute overrides the action attribute of the <form> element that owns this element.
 * @property string $formEncType Is a DOMString reflecting the type of content that is used to submit the form to the server. If specified, this attribute overrides the enctype attribute of the <form> element that owns this element.
 * @property string $formMethod Is a DOMString reflecting the HTTP method that the browser uses to submit the form. If specified, this attribute overrides the method attribute of the <form> element that owns this element.
 * @property bool $formNoValidate Is a Boolean indicating that the form is not to be validated when it is submitted. If specified, this attribute overrides the novalidate attribute of the <form> element that owns this element.
 * @property string $formTarget Is a DOMString reflecting a name or keyword indicating where to display the response that is received after submitting the form. If specified, this attribute overrides the target attribute of the <form> element that owns this element.
 *
 * Properties that apply only to text/number-containing or elements:
 * @property string $max Returns / Sets the element's max attribute, containing the maximum (numeric or date-time) value for this item, which must not be less than its minimum (min attribute) value.
 * @property int $maxLength Returns / Sets the element's maxlength attribute, containing the maximum number of characters (in Unicode code points) that the value can have. (If you set this to a negative number, an exception will be thrown.)
 * @property string $min Returns / Sets the element's min attribute, containing the minimum (numeric or date-time) value for this item, which must not be greater than its maximum (max attribute) value.
 * @property int $minLength Returns / Sets the element's minlength attribute, containing the minimum number of characters (in Unicode code points) that the value can have. (If you set this to a negative number, an exception will be thrown.)
 * @property string $pattern Returns / Sets the element's pattern attribute, containing a regular expression that the control's value is checked against. Use the title attribute to describe the pattern to help the user. This attribute applies when the value of the type attribute is text, search, tel, url or email; otherwise it is ignored.
 * @property string $placeholder Returns / Sets the element's placeholder attribute, containing a hint to the user of what can be entered in the control. The placeholder text must not contain carriage returns or line-feeds. This attribute applies when the value of the type attribute is text, search, tel, url or email; otherwise it is ignored.
 * @property ?int $size Returns / Sets the element's size attribute, containing visual size of the control. This value is in pixels unless the value of type is text or password, in which case, it is an integer number of characters. Applies only when type is set to text, search, tel, url, email, or password; otherwise it is ignored.
 *
 * Properties not yet categorized:
 * @property bool $multiple Returns / Sets the element's multiple attribute, indicating whether more than one value is possible (e.g., multiple files).
 * @property string $step Returns / Sets the element's step attribute, which works with min and max to limit the increments at which a numeric or date-time value can be set. It can be the string any or a positive floating point number. If this is not set to any, the control accepts only values at multiples of the step value greater than the minimum.
 * @property ?DateTimeInterface $valueAsDate Returns / Sets the value of the element, interpreted as a date, or null if conversion is not possible.
 * @property int|float|null $valueAsNumber Returns the value of the element, interpreted as one of the following, in order: A time value, A number, NaN if conversion is impossible.
 * @property string $autocapitalize Defines the capitalization behavior for user input. Valid values are none, off, characters, words, or sentences.
 * @property string $inputMode Provides a hint to browsers as to the type of virtual keyboard configuration to use when editing this element or its contents.
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
class HTMLInputElement extends HTMLElement {
	use HTMLUIElement;

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLInputElement#checked */
	protected function __prop_get_checked():bool {
		return $this->hasAttribute("checked");
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLInputElement#checked */
	protected function __prop_set_checked(bool $value):void {
		if($value) {
			$this->setAttribute("checked", "");
		}
		else {
			$this->removeAttribute("checked");
		}
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLInputElement#defaultChecked */
	protected function __prop_get_defaultChecked():bool {
		return $this->checked;
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLInputElement#defaultChecked */
	protected function __prop_set_defaultChecked(bool $value):void {
		$this->checked = $value;
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLInputElement#indeterminate */
	protected function __prop_get_indeterminate():bool {
		throw new FunctionalityNotAvailableOnServerException("indeterminate");
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLInputElement#indeterminate */
	protected function __prop_set_indeterminate(bool $value):void {
		throw new FunctionalityNotAvailableOnServerException("indeterminate");
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLInputElement#alt */
	protected function __prop_get_alt():string {
		return $this->getAttribute("alt") ?? "";
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLInputElement#alt */
	protected function __prop_set_alt(string $value):void {
		$this->setAttribute("alt", $value);
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLInputElement#height */
	protected function __prop_get_height():?int {
		if($this->hasAttribute("height")) {
			return (int)$this->getAttribute("height");
		}

		return null;
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLInputElement#height */
	protected function __prop_set_height(int $value):void {
		$this->setAttribute("height", (string)$value);
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLInputElement#src */
	protected function __prop_get_src():string {
		return $this->getAttribute("src") ?? "";
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLInputElement#src */
	protected function __prop_set_src(string $value):void {
		$this->setAttribute("src", $value);
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLInputElement#width */
	protected function __prop_get_width():?int {
		if($this->hasAttribute("width")) {
			return (int)$this->getAttribute("width");
		}

		return null;
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLInputElement#width */
	protected function __prop_set_width(int $value):void {
		$this->setAttribute("width", (string)$value);
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLInputElement#accept */
	protected function __prop_get_accept():string {
		return $this->getAttribute("accept") ?? "";
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLInputElement#accept */
	protected function __prop_set_accept(string $value):void {
		$this->setAttribute("accept", $value);
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLInputElement#files */
	protected function __prop_get_files():FileList {
		return new FileList();
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLInputElement#files */
	protected function __prop_set_files(FileList $value):void {
		throw new ClientSideOnlyFunctionalityException();
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-formaction */
	protected function __prop_get_formAction():string {
		if($this->hasAttribute("formaction")) {
			return $this->getAttribute("formaction");
		}

		while($parent = $this->parentElement) {
			if($parent instanceof HTMLFormElement) {
				break;
			}
		}

		if(!$parent) {
			return "";
		}

		return $parent->getAttribute("action") ?? "";
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLSelectElement/formAction */
	protected function __prop_set_formAction(string $value):void {
		$this->setAttribute("formaction", $value);
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-formenctype */
	protected function __prop_get_formEncType():string {
		if($this->hasAttribute("formenctype")) {
			return $this->getAttribute("formenctype");
		}

		while($parent = $this->parentElement) {
			if($parent instanceof HTMLFormElement) {
				break;
			}
		}

		if(!$parent) {
			return "";
		}

		return $parent->getAttribute("enctype") ?? "";
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-formenctype */
	protected function __prop_set_formEncType(string $value):void {
		$this->setAttribute("formenctype", $value);
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-formmethod */
	protected function __prop_get_formMethod():string {
		if($this->hasAttribute("formmethod")) {
			return $this->getAttribute("formmethod");
		}

		while($parent = $this->parentElement) {
			if($parent instanceof HTMLFormElement) {
				break;
			}
		}

		if(!$parent) {
			return "";
		}

		return $parent->getAttribute("method") ?? "";
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-formmethod */
	protected function __prop_set_formMethod(string $value):void {
		$this->setAttribute("formmethod", $value);
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-formnovalidate */
	protected function __prop_get_formNoValidate():bool {
		return $this->hasAttribute("formnovalidate");
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-formnovalidate */
	protected function __prop_set_formNoValidate(bool $value):void {
		if($value) {
			$this->setAttribute("formnovalidate", "");
		}
		else {
			$this->removeAttribute("formnovalidate");
		}
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-formtarget */
	protected function __prop_get_formTarget():string {
		if($this->hasAttribute("formtarget")) {
			return $this->getAttribute("formtarget");
		}

		while($parent = $this->parentElement) {
			if($parent instanceof HTMLFormElement) {
				break;
			}
		}

		if(!$parent) {
			return "";
		}

		return $parent->getAttribute("target") ?? "";
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-formtarget */
	protected function __prop_set_formTarget(string $value):void {
		$this->setAttribute("formtarget", $value);
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-max */
	protected function __prop_get_max():string {
		return $this->getAttribute("max") ?? "";
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-max */
	protected function __prop_set_max(string $value):void {
		$this->setAttribute("max", $value);
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-maxlength */
	protected function __prop_get_maxLength():int {
		if($this->hasAttribute("maxlength")) {
			return (int)$this->getAttribute("maxlength");
		}

		return 0;
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-maxlength */
	protected function __prop_set_maxLength(int $value):void {
		$this->setAttribute("maxlength", (string)$value);
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-min */
	protected function __prop_get_min():string {
		return $this->getAttribute("min") ?? "";
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-min */
	protected function __prop_set_min(string $value):void {
		$this->setAttribute("min", $value);
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-minlength */
	protected function __prop_get_minLength():int {
		if($this->hasAttribute("minlength")) {
			return (int)$this->getAttribute("minlength");
		}

		return 0;
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-minlength */
	protected function __prop_set_minLength(int $value):void {
		$this->setAttribute("minlength", (string)$value);
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-pattern */
	protected function __prop_get_pattern():string {
		return $this->getAttribute("pattern") ?? "";
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-pattern */
	protected function __prop_set_pattern(string $value):void {
		$this->setAttribute("pattern", $value);
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-placeholder */
	protected function __prop_get_placeholder():string {
		return $this->getAttribute("placeholder") ?? "";
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-placeholder */
	protected function __prop_set_placeholder(string $value):void {
		$this->setAttribute("placeholder", $value);
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-readonly */
	protected function __prop_get_readOnly():bool {
		return $this->hasAttribute("readonly");
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-readonly */
	protected function __prop_set_readOnly(bool $value):void {
		if($value) {
			$this->setAttribute("readonly", "");
		}
		else {
			$this->removeAttribute("readonly");
		}
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-size */
	protected function __prop_get_size():?int {
		if($this->hasAttribute("size")) {
			return (int)$this->getAttribute("size");
		}

		return null;
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-size */
	protected function __prop_set_size(int $value):void {
		$this->setAttribute("size", (string)$value);
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-multiple */
	protected function __prop_get_multiple():bool {
		return $this->hasAttribute("multiple");
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-multiple */
	protected function __prop_set_multiple(bool $value):void {
		if($value) {
			$this->setAttribute("multiple", "");
		}
		else {
			$this->removeAttribute("multiple");
		}
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-step */
	protected function __prop_get_step():string {
		return $this->getAttribute("step") ?? "";
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attr-step */
	protected function __prop_set_step(string $value):void {
		$this->setAttribute("step", $value);
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLInputElement#property-valueAsDate */
	protected function __prop_get_valueAsDate():?DateTimeInterface {
		if(empty($this->value)) {
			return null;
		}

		if(is_numeric($this->value)) {
			$dateTime = new DateTimeImmutable();
			return $dateTime->setTimestamp((int)$this->value);
		}

		try {
			$dateTime = new DateTimeImmutable($this->value);
		}
		catch(Exception) {
			return null;
		}

		return $dateTime;
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLInputElement#property-valueAsDate */
	protected function __prop_set_valueAsDate(DateTimeInterface $value):void {
// See here for why we're using this format:
// https://developer.mozilla.org/en-US/docs/Web/HTML/Date_and_time_formats#local_date_and_time_strings
		$this->value = $value->format("Y-m-d\TH:i:s");
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLInputElement#property-valueAsNumber */
	protected function __prop_get_valueAsNumber():int|float|null {
		if(str_starts_with($this->type, "date")) {
			$dateTime = $this->valueAsDate;
			if($dateTime) {
				return $dateTime->getTimestamp();
			}

			return null;
		}

		if(is_numeric($this->value)) {
			return (float)$this->value;
		}

		return null;
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLInputElement#property-valueAsNumber */
	protected function __prop_set_valueAsNumber(int|float $value):void {
		if(str_starts_with($this->type, "date")) {
			$dateTime = new DateTimeImmutable();
			$this->valueAsDate = $dateTime->setTimestamp($value);
		}
		else {
			$this->value = (string)$value;
		}
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLInputElement#attr-autocapitalize */
	protected function __prop_get_autocapitalize():string {
		return $this->getAttribute("autocapitalize") ?? "";
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLInputElement#attr-autocapitalize */
	protected function __prop_set_autocapitalize(string $value):void {
		$this->setAttribute("autocapitalize", $value);
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLInputElement#attr-inputmode */
	protected function __prop_get_inputMode():string {
		return $this->getAttribute("inputmode") ?? "";
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLInputElement#attr-inputmode */
	protected function __prop_set_inputMode(string $value):void {
		$this->setAttribute("inputmode", $value);
	}
}
