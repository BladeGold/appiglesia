<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public  $categorias = [
        "Diezmo_Total" => "Total de diezmos recibidos en la iglesia local",
        "Diezmo_Pastor" => "Diezmo pastor local",
        "Diezmo_Ministros" => "Diezmo otros ministros licenciados",
        "Damas" => "Ofrenda ministerio de Damas",
        "Jovenes" => "Ofrendas ministerio de Jovenes",
        "Ninos" => "Ofrenda ministerio de Niños",
        "DLD" => "Ofrenda Dept. de Liderazgo y Discipulado",
        "Caballeros" => "Ofrenda ministerio de Caballeros",
        "Patrimonio_Historico" =>"Ofrenda ministerio Patrimonio Historico",
        "Domingo_2" =>"Ofrenda segundo Domingo",
        "Domingo_3" => "Ofrenda tercer Domingo",
        "Domingo_4" =>"Ofrenda cuarto Domingo",
        "Impulso_Mundial" =>"Ofrenda Impulso Misionero Mundial",
        "Impulso_Nacional" =>"Ofrenda Impulso Misionero Nacional",
        "Tabernaculo_Nacional" =>"Ayuda al Tabernaculo Nacional",
        "Pago_Prestamos" =>"Pago de Prestamos",
        "Otros_Propositos" =>"Dinero para Otros Propósitos",
        "Fondo_Local" =>"Fondo de la Iglesia Local",
        "Diezmo_Restante" => "Diezmo restante de la Iglesia Local"
    ];
}
