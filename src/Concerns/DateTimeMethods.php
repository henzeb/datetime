<?php

namespace Henzeb\DateTime\Concerns;

use DateTimeZone;
use DateTimeInterface;

/**
 * @mixin \DateTime
 */
trait DateTimeMethods
{
    private static $testNow = null;

    public function __construct(?string $datetime = 'now', DateTimeZone $timezone = null)
    {
        parent::__construct(self::$testNow ?? $datetime, $timezone);
    }

    /**
     * @param $testNow string|bool|DateTimeInterface
     * @return void
     */
    public static function setTestNow($testNow = null): void
    {
        if (!$testNow) {
            static::$testNow = null;
        }

        if (is_string($testNow)) {
            static::$testNow = $testNow;
        }

        if ($testNow instanceof DateTimeInterface) {
            static::$testNow = $testNow->format('Y-m-d H:i:s.u');
        }
    }

    public static function now(DateTimeZone $dateTimeZone = null): self
    {
        return new static(null, $dateTimeZone);
    }

    public static function new(string $dateTime = 'now', DateTimeZone  $dateTimeZone = null): self
    {
        return new static($dateTime, $dateTimeZone);
    }

}
