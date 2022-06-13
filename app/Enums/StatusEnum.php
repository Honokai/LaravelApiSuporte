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
    const Aberto =   0;
    const Em_andamento =   1;
    const Fechado = 2;
    const Reaberto = 3;
}
