<?php
declare(strict_types=1);

namespace App\Entity;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema()
 */
class User
{
    /**
     * @OA\Property(type="integer")
     * @var int
     */
    private $id;

    /**
     * @OA\Property(type="string")
     * @var string
     */
    private string $email;

    public function __construct(string $email)
    {
        $this->ensureIsValidEmail($email);

        $this->email = $email;
    }

    private function ensureIsValidEmail(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException(
                sprintf(
                    '"%s" is not a valid email address',
                    $email
                )
            );
        }
    }

    public static function fromString(string $email): self
    {
        return new self($email);
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function __toString(): string
    {
        return $this->email;
    }
}