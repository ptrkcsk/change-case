<?php

/**
 * UpperCaseFirst
 */

namespace ChangeCase;

/**
 * UpperCaseFirst
 */
class UpperCaseFirst
{
    /**
     * Upper case the first character of a string.
     *
     * @example upper-case-first-convert.php
     * @see https://github.com/blakeembrey/upper-case-first
     *
     * @param string $string The string to convert
     * @param string $locale Supports the following locales: `'az'`, `'lt'`,
     *                       `'tr'`
     *
     * @return string
     */
    public static function convert(
        string $string,
        string $locale = null
    ): string {
        if ( ! $string) {
            return '';
        }

        $first = mb_substr($string, 0, 1);
        $rest = mb_substr($string, mb_strlen($first));

        return UpperCase::convert($first, $locale) . $rest;
    }
}
