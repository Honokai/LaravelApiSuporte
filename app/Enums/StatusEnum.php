<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class StatusEnum extends Enum
{
    const ABERTO =   0;
    const EM_ANDAMENTO =   1;
    const FECHADO = 2;
    const REABERTO = 3;
}
