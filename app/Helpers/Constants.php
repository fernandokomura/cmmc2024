<?php

namespace App\Helpers;

abstract class Constants
{
    const NiveisInstrucao = [
        '0' => 'Fundamental - Incompleto',
        '1' => 'Fundamental - Completo',
        '2' => 'Médio - Incompleto',
        '3' => 'Médio - Completo',
        '4' => 'Superior - Incompleto',
        '5' => 'Superior - Completo',
        '6' => 'Pós-graduação (Lato senso) - Incompleto',
        '7' => 'Pós-graduação (Lato senso) - Completo',
        '8' => 'Pós-graduação (Stricto sensu, nível mestrado) - Completo',
        '9' => 'Pós-graduação (Stricto sensu, nível mestrado) - Incompleto',
        '10' => 'Pós-graduação (Stricto sensu, nível doutor) - Completo',
        '11' => 'Pós-graduação (Stricto sensu, nível doutor) - Incompleto',
    ];

    const EstadosCivis = [
        '0' => 'Solteiro(a)',
        '1' => 'Casado(a)',
        '2' => 'Separado(a)',
        '3' => 'Divorciado(a)',
        '4' => 'Viuvo(a)',
    ];
}


