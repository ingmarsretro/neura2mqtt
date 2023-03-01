<?php
namespace Gt\Dom\Test\HTMLElement;

use Gt\Dom\Exception\FunctionalityNotAvailableOnServerException;
use Gt\Dom\HTMLElement\HTMLImageElement;
use Gt\Dom\Test\TestFactory\NodeTestFactory;

class HTMLImageElementTest extends HTMLElementTestCase {
	public function testAlt():void {
		/** @var HTMLImageElement $sut */
		$sut = NodeTestFactory::createHTMLElement("img");
		self::assertPropertyAttributeCorrelate($sut, "alt");
	}

	public function testComplete():void {
		/** @var HTMLImageElement $sut */
		$sut = NodeTestFactory::createHTMLElement("img");
		self::assertFalse($sut->complete);
	}

	public function testCrossOrigin():void {
		/** @var HTMLImageElement $sut */
		$sut = NodeTestFactory::createHTMLElement("img");
		self::assertPropertyAttributeCorrelate($sut, "crossorigin", "crossOrigin");
	}

	public function testCurrentSrc():void {
		/** @var HTMLImageElement $sut */
		$sut = NodeTestFactory::createHTMLElement("img");
		self::expectException(FunctionalityNotAvailableOnServerException::class);
		/** @noinspection PhpUnusedLocalVariableInspection */
		$test = $sut->currentSrc;
	}

	public function testDecoding():void {
		/** @var HTMLImageElement $sut */
		$sut = NodeTestFactory::createHTMLElement("img");
		self::assertPropertyAttributeCorrelate($sut, "decoding");
	}

	public function testHeight():void {
		/** @var HTMLImageElement $sut */
		$sut = NodeTestFactory::createHTMLElement("img");
		self::assertPropertyAttributeCorrelateNumber($sut, "?int", "height");
	}

	public function testIsMap():void {
		/** @var HTMLImageElement $sut */
		$sut = NodeTestFactory::createHTMLElement("img");
		self::assertPropertyAttributeCorrelateBool($sut, "ismap", "isMap");
	}

	public function testLoading():void {
		/** @var HTMLImageElement $sut */
		$sut = NodeTestFactory::createHTMLElement("img");
		self::assertPropertyAttributeCorrelate($sut, "loading");
	}

	public function testNaturalHeight():void {
		/** @var HTMLImageElement $sut */
		$sut = NodeTestFactory::createHTMLElement("img");
		self::assertEquals(0, $sut->naturalHeight);
	}

	public function testNaturalWidth():void {
		/** @var HTMLImageElement $sut */
		$sut = NodeTestFactory::createHTMLElement("img");
		self::assertEquals(0, $sut->naturalWidth);
	}

	public function testReferrerPolicy():void {
		/** @var HTMLImageElement $sut */
		$sut = NodeTestFactory::createHTMLElement("img");
		self::assertPropertyAttributeCorrelate($sut, "referrerpolicy", "referrerPolicy");
	}

	public function testSizes():void {
		/** @var HTMLImageElement $sut */
		$sut = NodeTestFactory::createHTMLElement("img");
		self::assertPropertyAttributeCorrelate($sut, "sizes");
	}

	public function testSrc():void {
		/** @var HTMLImageElement $sut */
		$sut = NodeTestFactory::createHTMLElement("img");
		self::assertPropertyAttributeCorrelate($sut, "src");
	}

	public function testSrcset():void {
		/** @var HTMLImageElement $sut */
		$sut = NodeTestFactory::createHTMLElement("img");
		self::assertPropertyAttributeCorrelate($sut, "srcset");
	}

	public function testUseMap():void {
		/** @var HTMLImageElement $sut */
		$sut = NodeTestFactory::createHTMLElement("img");
		self::assertPropertyAttributeCorrelate($sut, "usemap", "useMap");
	}

	public function testWidth():void {
		/** @var HTMLImageElement $sut */
		$sut = NodeTestFactory::createHTMLElement("img");
		self::assertPropertyAttributeCorrelateNumber($sut, "?int", "width");
	}

	public function testX():void {
		/** @var HTMLImageElement $sut */
		$sut = NodeTestFactory::createHTMLElement("img");
		self::assertSame(0, $sut->x);
	}

	public function testY():void {
		/** @var HTMLImageElement $sut */
		$sut = NodeTestFactory::createHTMLElement("img");
		self::assertSame(0, $sut->y);
	}
}
