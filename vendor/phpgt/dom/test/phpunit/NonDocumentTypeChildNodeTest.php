<?php

namespace Gt\Dom\Test;

use Gt\Dom\Test\TestFactory\NodeTestFactory;
use PHPUnit\Framework\TestCase;


class NonDocumentTypeChildNodeTest extends TestCase
{
    public function testNextElementSibling(): void
    {
        $parent = NodeTestFactory::createNode("parent");
        $c1 = NodeTestFactory::createNode("child", $parent->ownerDocument);
        $sut = NodeTestFactory::createNode("child", $parent->ownerDocument);
        $txt = 'non Element';
        $c2 = NodeTestFactory::createNode("child", $parent->ownerDocument);

        $parent->append($c1, $sut, $txt, $c2);
        self::assertSame($c2, $sut->nextElementSibling);
    }

    public function testNextElementSiblingNone(): void
    {
        $sut = NodeTestFactory::createNode("example");
        self::assertNull($sut->nextElementSibling);
    }

    public function testPreviousElementSibling(): void
    {
        $parent = NodeTestFactory::createNode("parent");
        $c1 = NodeTestFactory::createNode("child", $parent->ownerDocument);
        $txt = 'non Element';
        $sut = NodeTestFactory::createNode("child", $parent->ownerDocument);
        $c2 = NodeTestFactory::createNode("child", $parent->ownerDocument);

        $parent->append($c1, $txt, $sut, $c2);
        self::assertSame($c1, $sut->previousElementSibling);
    }

    public function testPreviousElementSiblingNone(): void
    {
        $sut = NodeTestFactory::createNode("example");
        self::assertNull($sut->previousElementSibling);
    }
}