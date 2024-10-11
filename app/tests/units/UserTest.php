<?php
declare(strict_types=1);
//require __DIR__ . '/../../config/bootstrap.php';

use PHPUnit\Framework\TestCase;
use App\Entity\User;
use InvalidArgumentException;

final class UserTest extends TestCase
{
    public function testCanBeCreatedFromValidEmailAddress(): void
    {
        $this->assertInstanceOf(
            User::class,
            User::fromString('user@example.com')
        );
    }

    public function testCannotBeCreatedFromInvalidEmailAddress(): void
    {
        $this->expectException(InvalidArgumentException::class);

        User::fromString('invalid');
    }

    public function testCanBeUsedAsString(): void
    {
        $this->assertEquals(
            'user@example.com',
            User::fromString('user@example.com')
        );
    }
}