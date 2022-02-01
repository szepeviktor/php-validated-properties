<?php
declare(strict_types=1);

namespace PrinsFrank\PhpStrictModels\Rule;

use Attribute;
use PrinsFrank\PhpStrictModels\Enum\Type;

#[Attribute]
class SmallerThanOrEquals implements Rule
{
    public function __construct(private float|int $smallerThanOrEquals){}

    public function applicableToTypes(): array
    {
        return [Type::float, Type::int, Type::array, Type::string];
    }

    /**
     * @param int|float|string|mixed[] $value
     */
    public function isValid(mixed $value): bool
    {
        if (is_array($value)) {
            return count($value) <= $this->smallerThanOrEquals;
        }

        if (is_string($value)) {
            return mb_strlen($value) <= $this->smallerThanOrEquals;
        }

        return $value <= $this->smallerThanOrEquals;
    }

    public function getMessage(): string
    {
        return 'Should be smaller than or equal to ' . $this->smallerThanOrEquals;
    }
}
