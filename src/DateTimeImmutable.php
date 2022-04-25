<?php

namespace Henzeb\DateTime;

use Henzeb\DateTime\Concerns\DateTimeMethods;
use DateTimeImmutable as OriginalDateTimeImmutable;

class DateTimeImmutable extends OriginalDateTimeImmutable
{
    use DateTimeMethods;
}
