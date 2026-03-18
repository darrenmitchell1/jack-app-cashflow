<?php

namespace App\Enums;

enum RecurringPeriod: string
{
    case DAILY = 'daily';

    case WEEKLY = 'weekly';

    case MONTHLY = 'monthly';
}
