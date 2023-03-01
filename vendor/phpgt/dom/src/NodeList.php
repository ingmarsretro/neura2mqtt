<?php
namespace Gt\Dom;

use ArrayAccess;
use Countable;
use Gt\Dom\Exception\NodeListImmutableException;
use Gt\Dom\Facade\NodeListFactory;
use Gt\PropFunc\MagicProp;
use Iterator;
use Traversable;

/**
 * NodeList objects are collections of nodes, usually returned by properties
 * such as Node.childNodes and methods such as document.querySelectorAll().
 *
 * Although NodeList is not an Array, it is possible to iterate over it with
 * forEach(). It can also be converted to a real Array using Array.from().
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/API/NodeList
 *
 * @property-read int $length The number of nodes in the NodeList.
 * @implements Iterator<int, Node|Element>
 * @implements ArrayAccess<int, Node|Element>
 */
class NodeList implements ArrayAccess, Countable, Iterator {
	use MagicProp;

	/** @var Node[] */
	private array $nodeList;
	/** @var callable():NodeList */
	private $callback;
	private int $iteratorKey;

	/**
	 * A NodeList can, confusingly, be both "live" OR "static" using the
	 * same class. To differentiate, PHP.Gt sets EITHER a $nodeList
	 * OR a $callback property. When a $nodeList is set, the list is deemed
	 * "static". When a $callback is set, the list is deemed "live" and
	 * behaves similarly to HTMLCollection (which is ALWAYS live).
	 * @see HTMLCollection
	 */
	protected function __construct(Node|callable...$representation) {
		if(isset($representation[0]) && is_callable($representation[0])) {
			$this->callback = $representation[0];
		}
		else {
			$this->nodeList = $representation;
		}

		$this->iteratorKey = 0;
	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/NodeList/length */
	protected function __prop_get_length():int {
		return $this->count();
	}

	/**
	 * Returns a node from a NodeList by index. This method doesn't throw
	 * exceptions as long as you provide arguments. A value of null is
	 * returned if the index is out of range, and a TypeError is thrown if
	 * no argument is provided.
	 *
	 * @param int $index
	 * @return ?Node
	 * @link https://developer.mozilla.org/en-US/docs/Web/API/NodeList/item
	 */
	public function item(int $index):Node|Element|null {
		if(isset($this->nodeList)) {
			if(isset($this->nodeList[$index])) {
				return $this->nodeList[$index];
			}

			return null;
		}

		/** @var NodeList $nodeArray */
		$nodeArray = call_user_func($this->callback);
		return $nodeArray[$index] ?? null;
	}

	/**
	 * The NodeList.entries() method returns an iterator allowing to go
	 * through all key/value pairs contained in this object. The values are
	 * Node objects.
	 *
	 * @return Traversable<int, Node>
	 * @link https://developer.mozilla.org/en-US/docs/Web/API/NodeList/entries
	 */
	public function entries():Traversable {
		foreach($this as $key => $node) {
			yield $key => $node;
		}
	}

	/**
	 * The forEach() method of the NodeList interface calls the callback
	 * given in parameter once for each value pair in the list, in
	 * insertion order.
	 *
	 * @param callable $callback
	 * @link https://developer.mozilla.org/en-US/docs/Web/API/NodeList/forEach
	 */
	public function forEach(callable $callback):void {
		foreach($this as $node) {
			call_user_func($callback, $node);
		}
	}

	/**
	 * The NodeList.keys() method returns an iterator allowing to go
	 * through all keys contained in this object. The keys are unsigned
	 * integer.
	 *
	 * @return Traversable<int>
	 * @link https://developer.mozilla.org/en-US/docs/Web/API/NodeList/keys
	 */
	public function keys():Traversable {
		foreach($this as $key => $value) {
			yield $key;
		}
	}

	/**
	 * The NodeList.values() method returns an iterator allowing to go
	 * through all values contained in this object. The values are Node
	 * objects.
	 *
	 * @return Traversable<Node>
	 * @link https://developer.mozilla.org/en-US/docs/Web/API/NodeList/values
	 */
	public function values():Traversable {
		foreach($this as $node) {
			yield $node;
		}
	}

	public function count():int {
		if(isset($this->nodeList)) {
			return count($this->nodeList);
		}

		/** @var NodeList $nodeArray */
		$nodeArray = call_user_func($this->callback);
		return count($nodeArray);
	}

	public function offsetExists($offset):bool {
		if(isset($this->nodeList)) {
			return isset($this->nodeList[$offset]);
		}

		/** @var NodeList $nodeArray */
		$nodeArray = call_user_func($this->callback);
		return isset($nodeArray[$offset]);
	}

	public function offsetGet($offset):Node|Element|null {
		if(isset($this->nodeList)) {
			return $this->nodeList[$offset] ?? null;
		}

		/** @var NodeList $nodeList */
		$nodeList = call_user_func($this->callback);
		return $nodeList[$offset];
	}

	public function offsetSet($offset, $value):void {
		throw new NodeListImmutableException();
	}

	public function offsetUnset($offset):void {
		throw new NodeListImmutableException();
	}

	public function current():Node|Element {
		if(isset($this->nodeList)) {
			return $this->nodeList[$this->iteratorKey];
		}

		/** @var NodeList|array<int, Node> $nodeList */
		$nodeList = call_user_func($this->callback);

		if(is_array($nodeList)) {
			$nodeList = NodeListFactory::create(...$nodeList);
		}

		while($nodeList->key() < $this->iteratorKey) {
			$nodeList->next();
		}

		return $nodeList->current();
	}

	public function next():void {
		$this->iteratorKey++;
	}

	public function key():int {
		return $this->iteratorKey;
	}

	public function valid():bool {
		if(isset($this->nodeList)) {
			return isset($this->nodeList[$this->iteratorKey]);
		}

		/** @var NodeList|array<int, Node> $nodeList */
		$nodeList = call_user_func($this->callback);

		if(is_array($nodeList)) {
			$nodeList = NodeListFactory::create(...$nodeList);
		}

		while($nodeList->key() < $this->iteratorKey) {
			$nodeList->next();
		}

		return $nodeList->valid();
	}

	public function rewind():void {
		$this->iteratorKey = 0;
	}
}
