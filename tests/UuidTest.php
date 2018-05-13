<?php declare(strict_types=1);

namespace IgniTest\Unit\Utils;

use Igni\Utils\Uuid;
use PHPUnit\Framework\TestCase;

class UuidTest extends TestCase
{
    public function testGenerate(): void
    {
        for ($i = 0; $i < 1000; $i++) {
            $uuid = Uuid::generate();
            self::assertSame(36, strlen($uuid));
            self::assertEquals(1, preg_match('#^\w{8}-\w{4}-\w{4}-\w{4}-\w{12}$#', $uuid));
        }
    }

    public function testGenerateShort(): void
    {
        for ($i = 0; $i < 1000; $i++) {
            $uuid = Uuid::generateShort();
            self::assertLessThanOrEqual(22, strlen($uuid));
            self::assertGreaterThanOrEqual(21, strlen($uuid));
        }
    }

    public function testFromShortToShort(): void
    {
        for ($i = 0; $i < 10000; $i++) {
            $long = Uuid::generate();
            $short = Uuid::toShort($long);

            self::assertSame($long, Uuid::fromShort($short));
            self::assertSame($short, Uuid::toShort($long));
        }
    }
}

