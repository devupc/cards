<?php

namespace Upc\Cards\Bundle\CardsBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class CardsBundle extends Bundle
{
    public static $ESTADOS = array(
        1 => 'ACTIVO',
        2 => 'INACTIVO'
    );
}
