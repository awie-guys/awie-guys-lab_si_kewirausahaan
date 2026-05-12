<?php

class Validator
{
    public static function required(mixed $value): bool
    {
        if (is_array($value)) {
            return count($value) > 0;
        }

        return trim((string) $value) !== '';
    }

    public static function numeric(mixed $value): bool
    {
        return is_numeric($value);
    }

    public static function email(mixed $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function min(mixed $value, int $length): bool
    {
        return self::length($value) >= $length;
    }

    public static function max(mixed $value, int $length): bool
    {
        return self::length($value) <= $length;
    }

    private static function length(mixed $value): int
    {
        if (is_array($value)) {
            return count($value);
        }

        $value = trim((string) $value);

        if (function_exists('mb_strlen')) {
            return mb_strlen($value);
        }

        return strlen($value);
    }
}