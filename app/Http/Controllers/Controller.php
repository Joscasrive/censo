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
    
        if ($fechaActual->format('m') < $fechaNacimiento->format('m')) {
            $edad--;
        } elseif ($fechaActual->format('m') == $fechaNacimiento->format('m') && $fechaActual->format('d') < $fechaNacimiento->format('d')) {
            $edad--;
        }
    
        return $edad;
    }
}
