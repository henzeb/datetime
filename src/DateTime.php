<?php

namespace Henzeb\DateTime;

use DateTime as OriginalDateTime;
use Henzeb\DateTime\Concerns\DateTimeMethods;

class DateTime extends OriginalDateTime
{
    public const DEFAULT = 'Y-m-d H:i:s.u';

    use DateTimeMethods;
}
