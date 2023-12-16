<?php

namespace App\Enums;

enum QuestionCategory: string
{
    case EASY = 'easy';
    case MEDIUM = 'medium';
    case HARD = 'hard';

    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function toArray(): array
    {
        return array_combine(self::names(), self::values());
    }

    public static function toArrayWithLabels(): array
    {
        $items = [];

        foreach (self::values() as $value) {
            $items[$value] = trans("enum.payment.$value");
        }

        return $items;
    }

    public function getStatusLabel(): string
    {
        return trans("enum.payment.$this->value");
    }

    public function isEasy(): bool
    {
        return $this === self::EASY;
    }

    public function isMedium(): bool
    {
        return $this === self::MEDIUM;
    }

    public function isHard(): bool
    {
        return $this === self::HARD;
    }

    public static function fromUserInput(string $input): ?self
    {
        $lowercaseInput = strtolower($input);

        switch ($lowercaseInput) {
            case 'easy':
                return self::EASY;
            case 'medium':
                return self::MEDIUM;
            case 'hard':
                return self::HARD;
            default:
                return null;
        }
    }
}
