<?php

declare(strict_types = 1);

namespace Fyyb\Http;

class HttpRequestResponseMethods
{
    /**
     * Set Header
     * set a header if it does NOT exist
     *
     * @param String $header
     * @param String $value
     * @return void
     */
    public static function setHeader(String $header, String $value): void
    {
        if (!self::hasHeader($header)) {
            header($header . ':' . $value);
        };
    }

    /**
     * Get Header
     * returns the list of headers
     *
     * @return array
     */
    public static function getHeaders(): array
    {
        return [];
    }

    /**
     * Get Header
     * returns the value of a header if it exists
     *
     * @param String $header
     * @return String|null
     */
    public static function getHeader(String $header): ?string
    {
        $headers = self::getHeaders();
        foreach ($headers as $h => $value) {
            if ($h === $header) {
                return $value;
            };
        };
        return null;
    }

    /**
     * Has Header
     * checks if a header exists
     *
     * @param String $header
     * @return boolean
     */
    public static function hasHeader(String $header): bool
    {
        $headers = self::getHeaders();
        foreach ($headers as $h) {
            if ($h === $header) {
                return true;
            };
        };
        return false;
    }

    /**
     * Append Header
     * add values ​​to a given header if it exists
     *
     * @param String $header
     * @param String $value
     * @return void
     */
    public static function appendHeader(String $header, String $value): void
    {
        if (self::hasHeader($header)) {
            $oldValue = self::getHeader($header);
            $newValue = $oldValue . ', ' . $value;
            self::withoutHeader($header);
            self::setHeader($header, $newValue);
        }
    }

    /**
     * Without Header
     * removes a specific header if it exists
     *
     * @param String $header
     * @return void
     */
    public static function withoutHeader(String $header): void
    {
        if (self::hasHeader($header)) {
            header_remove($header);
        };
    }
}