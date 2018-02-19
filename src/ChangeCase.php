<?php

namespace ChangeCase;

final class ChangeCase
{
    public static function camel(
        string $string,
        bool $mergeNumbers = false
    ): string {
        return self::camelCase($string, $mergeNumbers);
    }

    public static function camelCase(
        string $string,
        bool $mergeNumbers = false
    ): string {
        return CamelCase::convert($string, $mergeNumbers);
    }

    public static function constant(string $string): string
    {
        return self::constantCase($string);
    }

    public static function constantCase(string $string): string
    {
        return ConstantCase::convert($string);
    }

    public static function dot(string $string): string
    {
        return self::dotCase($string);
    }

    public static function dotCase(string $string): string
    {
        return DotCase::convert($string);
    }

    public static function header(string $string): string
    {
        return self::headerCase($string);
    }

    public static function headerCase(string $string): string
    {
        return HeaderCase::convert($string);
    }

    public static function lower(string $string): string
    {
        return self::lowerCase($string);
    }

    public static function lowerCase(string $string): string
    {
        return LowerCase::convert($string);
    }

    public static function lcFirst(string $string): string
    {
        return self::lowerCaseFirst($string);
    }

    public static function lowerCaseFirst(string $string): string
    {
        return LowerCaseFirst::convert($string);
    }

    public static function no(string $string, string $replacement = ' '): string
    {
        return self::noCase($string, $replacement);
    }

    public static function noCase(
        string $string,
        string $replacement = ' '
    ): string {
        return NoCase::convert($string, $replacement);
    }

    public static function param(string $string): string
    {
        return self::paramCase($string);
    }

    public static function paramCase(string $string): string
    {
        return ParamCase::convert($string);
    }

    public static function pascal(string $string, bool $mergeNumbers = false)
    {
        return self::pascalCase($string, $mergeNumbers);
    }

    public static function pascalCase(
        string $string,
        bool $mergeNumbers = false
    ): string {
        return PascalCase::convert($string, $mergeNumbers);
    }

    public static function path(string $string): string
    {
        return self::pathCase($string);
    }

    public static function pathCase(string $string): string
    {
        return PathCase::convert($string);
    }

    public static function sentence(string $string): string
    {
        return self::sentenceCase($string);
    }

    public static function sentenceCase(string $string): string
    {
        return SentenceCase::convert($string);
    }

    public static function snake(string $string): string
    {
        return self::snakeCase($string);
    }

    public static function snakeCase(string $string): string
    {
        return SnakeCase::convert($string);
    }

    public static function swap(string $string): string
    {
        return self::swapCase($string);
    }

    public static function swapCase(string $string): string
    {
        return SwapCase::convert($string);
    }

    public static function title(string $string): string
    {
        return self::titleCase($string);
    }

    public static function titleCase(string $string): string
    {
        return TitleCase::convert($string);
    }

    public static function upper(string $string): string
    {
        return self::upperCase($string);
    }

    public static function upperCase(string $string): string
    {
        return UpperCase::convert($string);
    }

    public static function ucFirst(string $string): string
    {
        return self::upperCaseFirst($string);
    }

    public static function upperCaseFirst(string $string): string
    {
        return UpperCaseFirst::convert($string);
    }

    public static function isLower(string $string): bool
    {
        return self::isLowerCase($string);
    }

    public static function isLowerCase(string $string): bool
    {
        return IsCase::lowerCase($string);
    }

    public static function isUpper(string $string): bool
    {
        return self::isUpperCase($string);
    }

    public static function isUpperCase(string $string): bool
    {
        return IsCase::upperCase($string);
    }
}