PROYECTO: SISTEMA DE ENVIO DE TARJETAS ELECTRONICAS DIFERIDAS
========================

CONSISTE DESARROLLAR UN SISTEMA QUE ENVIE TARJETAS ELECTRONICAS
ORIENTADO A UN PUBLICO ADULTO, ADEMAS, CONTARÁ CON LA CAPACIDAD 
DE PROGRAMAR LOS ENVIOS CON HASTA UN MES DE ANTICIPACION.
ADICIONALMENTE, PERMITIRA GESTIONAR UNA LIBRETA DE CONTACTOS Y SINCRONIZACION CON FACEBOOK.

1) Installing the Standard Edition
----------------------------------
   
    php composer.phar install

2) Checking your System Configuration
-------------------------------------

Before starting coding, make sure that your local system is properly
configured for Symfony.

Execute the `check.php` script from the command line:

    php app/check.php

The script returns a status code of `0` if all mandatory requirements are met,
`1` otherwise.

Access the `config.php` script from a browser:

    http://localhost/path/to/symfony/app/web/config.php

If you get any warnings or recommendations, fix them before moving on.