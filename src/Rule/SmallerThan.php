<?php
declare(strict_types=1);

namespace PrinsFrank\PhpStrictModels\Rule;

use PrinsFrank\PhpStrictModels\Enum\Type;

class SmallerThan implements Rule
{
    public function __construct(private float|int $smallerThan){}

    public function applicableToTypes(): array
    {
        return [Type::float, Type::int, Type::array];
    }

    /**
     * @param int|float|mixed[] $value
     */
    public function isValid(mixed $value): bool
    {
        if (is_array($value)) {
            $nrOfItemsInArray = count($value);

            return $nrOfItemsInArray < $this->smallerThan;
        }

        return $value < $this->smallerThan;
    }
}
