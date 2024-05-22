<?php

namespace App\Http\Controllers;

use DateTime;

abstract class Controller
{
    protected function calcularEdad($fechaNacimiento)
    {
        $fechaNacimiento = new DateTime($fechaNacimiento);
        $fechaActual = new DateTime();
        $intervalo = $fechaActual->diff($fechaNacimiento);
        $edad = $intervalo->y;
    
        return $edad;
    }
}
