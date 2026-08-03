<?php

namespace App\Enums;

enum HabitFrequency: string
{
    case Daily = 'daily';
    case Weekly = 'weekly';
    case Monthly = 'monthly';
    case Bimonthly = 'bimonthly';
    case Quarterly = 'quarterly';
    case Biannual = 'biannual';
    case Annual = 'annual';
}
