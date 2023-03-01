<?php
namespace Gt\Dom\HTMLElement;

use Gt\Dom\Exception\IndexSizeException;
use Gt\Dom\Facade\HTMLCollectionFactory;
use Gt\Dom\HTMLCollection;

/**
 * The HTMLTableRowElement interface provides special properties and methods
 * (beyond the HTMLElement interface it also has available to it by inheritance)
 * for manipulating the layout and presentation of rows in an HTML table.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLTableRowElement
 *
 * @property-read HTMLCollection $cells Returns a live HTMLCollection containing the cells in the row. The HTMLCollection is live and is automatically updated when cells are added or removed.
 * @property-read int $rowIndex Returns a long value which gives the logical position of the row within the entire table. If the row is not part of a table, returns -1.
 * @property-read int $sectionRowIndex Returns a long value which gives the logical position of the row within the table section it belongs to. If the row is not part of a section, returns -1.
 */
class HTMLTableRowElement extends HTMLElement {
	/**
	 * Removes the cell at the given position in the row. If the given
	 * position is greater (or equal as it starts at zero) than the amount
	 * of cells in the row, or is smaller than 0, it raises a DOMException
	 * with the IndexSizeError value.
	 *
	 * @param int $index
	 * @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLTableRowElement/deleteCell
	 */
	public function deleteCell(int $index):void {
		if($index < 0 || $index >= $this->children->length) {
			throw new IndexSizeException("Index or size is negative or greater than the allowed amount");
		}

		$td = $this->getElementsByTagName("td")->item($index);
		$td->remove();
	}

	/**
	 * The HTMLTableRowElement.insertCell() method inserts a new cell (<td>)
	 * into a table row (<tr>) and returns a reference to the cell.
	 *
	 * @param ?int $index index is the cell index of the new cell. If index
	 * is -1 or equal to the number of cells, the cell is appended as the
	 * last cell in the row. If index is greater than the number of cells,
	 * an IndexSizeError exception will result. If index is omitted it
	 * defaults to -1.
	 * @return HTMLTableCellElement an HTMLTableCellElement that references
	 * the new cell.
	 * @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLTableRowElement/insertCell
	 */
	public function insertCell(int $index = null):HTMLTableCellElement {
		if(is_null($index)) {
			$index = $this->cells->length;
		}

		if($index < 0) {
			throw new IndexSizeException("Index or size is negative or greater than the allowed amount");
		}

		$insertAfter = $this->cells[$index - 1] ?? null;
		/** @var HTMLTableCellElement $td */
		$td = $this->ownerDocument->createElement("td");
		$this->insertBefore($td, $insertAfter?->nextSibling);

		return $td;
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLTableRowElement/cells */
	protected function __prop_get_cells():HTMLCollection {
		return HTMLCollectionFactory::create(
			fn() => $this->querySelectorAll("td, th")
		);
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLTableRowElement/rowIndex */
	protected function __prop_get_rowIndex():int {
		$table = $this;
		while($table = $table->parentElement) {
			if($table instanceof HTMLTableElement) {
				break;
			}
		}

		if($this->parentElement === $table) {
			foreach($table?->children ?? [] as $i => $child) {
				if($child === $this) {
					return $i;
				}
			}
		}

		$headCount = 0;
		foreach($table?->querySelectorAll("thead>tr") ?? [] as $headIndex => $headChild) {
			$headCount ++;
			if($headChild === $this) {
				return $headIndex;
			}
		}

		$bodyCount = 0;
		foreach($table?->querySelectorAll("tbody>tr") ?? [] as $bodyIndex => $headChild) {
			$bodyCount ++;
			if($headChild === $this) {
				return $headCount + $bodyIndex;
			}
		}

		foreach($table?->querySelectorAll("tfoot>tr") ?? [] as $footIndex => $headChild) {
			if($headChild === $this) {
				return $headCount + $bodyCount + $footIndex;
			}
		}

		return -1;
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLTableRowElement/sectionRowIndex */
	protected function __prop_get_sectionRowIndex():int {
		$parent = $this->parentElement;

		foreach($parent?->children ?? [] as $i => $child) {
			if($child === $this) {
				return $i;
			}
		}

		return -1;
	}
}
