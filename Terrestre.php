<?php
class Terrestre extends Viaje{
    private $tipoAsiento;

    public function __construct($importe,$tramos,$codigo, $desti, $capacidad,$colPasajeros,$responsable,$tipoAsiento)//acordate parametros
    {
        parent::__construct($importe,$tramos,$codigo, $desti, $capacidad,$colPasajeros,$responsable);
        $this->tipoAsiento = $tipoAsiento;
    }
    public function getTipoAsiento()
    {  
        return $this->tipoAsiento;
    }
    public function setTipoAsiento($tipoAsiento){
       $this->tipoAsiento= $tipoAsiento;
    }
    public function __toString()
    {
        $cadena= parent::__toString();  
        $cadena.="TipoAsiento: ".$this->getTipoAsiento();
        return $cadena;
    }

    public function haypasajesdisponible(){
    $A=count($this->getColeccionPasajeros());
    if ($A <= $this->getCantidadPasajeros()){
      $hayPasajes = true;
    }else{
        $hayPasajes = false;
    }
    return $hayPasajes;
    }
    
    public function venderPasaje($pasajero)
    {
        $importeViaje=parent:: venderPasaje($pasajero);
           if($importeViaje!=0){
               //Hay lugar
                if($this->getTipoAsiento()== "cama"){
                    $incremento=$importeViaje*25/100;//25% de incremento
                    $importeViaje= $importeViaje+$incremento;                  
                }
           return $importeViaje;
    }
}
}