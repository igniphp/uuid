<?php declare(strict_types=1);

namespace IgniTest\Unit\Util;

use Igni\Util\UuidGenerator;
use PHPUnit\Framework\TestCase;

class UuidGeneratorTest extends TestCase
{
    public function testGenerate(): void
    {
        for ($i = 0; $i < 1000; $i++) {
            $uuid = UuidGenerator::generate();
            self::assertSame(36, strlen($uuid));
            self::assertEquals(1, preg_match('#^\w{8}-\w{4}-\w{4}-\w{4}-\w{12}$#', $uuid));
        }
    }

    public function testGenerateShort(): void
    {
        for ($i = 0; $i < 1000; $i++) {
            $uuid = UuidGenerator::generateShort();
            self::assertLessThanOrEqual(22, strlen($uuid));
            self::assertGreaterThanOrEqual(21, strlen($uuid));
        }
    }

    public function testFromShortToShort(): void
    {
        for ($i = 0; $i < 10000; $i++) {
            $long = UuidGenerator::generate();
            $short = UuidGenerator::toShort($long);

            self::assertSame($long, UuidGenerator::fromShort($short));
            self::assertSame($short, UuidGenerator::toShort($long));
        }
    }
}

