<?php

namespace App\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

final class OrderStatus extends Enum
{
    const Pending = 0;
    const Accepted = 1;
    const Rejected = 2;
}
