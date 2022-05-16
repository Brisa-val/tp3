<?php
class Aereo extends Viaje{
    private $numeroVuelo;//1
    private $catAsiento;//2
    private $nombreAerolinea;//3
    private $cantEscalas;//4


    public function __construct($importe,$tramos,$codigo, $desti, $capacidad,$colPasajeros,$responsable,$numeroVuelo,$catAsiento,$nombreAerolinea,$cantEscalas,)
    {
        parent::__construct ($importe,$tramos,$codigo, $desti, $capacidad,$colPasajeros,$responsable);
        $this->cantEscalas=$cantEscalas;
        $this->numeroVuelo=$numeroVuelo;
        $this->catAsiento=$catAsiento;
        $this->nombreAerolinea=$nombreAerolinea;
    }
    public function getCantEscalas()
    {  
        return $this->cantEscalas;
    }
    public function setCantEscalas($cantEscalas){
       $this->cantEscalas = $cantEscalas;
    }
    public function getNumeroVuelo(){
        
        return $this->numeroVuelo;
    }
    public function setNumeroVuelo($numeroVuelo){
        
        $this->numeroVuelo =$numeroVuelo;
    }
    public function getCatAsiento(){
        
        return $this->catAsiento;
    }
    public function setNombreAerolinea($nombreAerolinea){
        
        $this->nombreAerolinea =$nombreAerolinea;
    }
    public function getNombreAerolinea(){
        
        return $this->nombreAerolinea;
    }


    public function __toString()
    {
        $cadena= parent::__toString(); 
        $cadena.="numeroVuelo: ".$this->getNumeroVuelo();
        $cadena.="CatAsiento: ".$this->getCatAsiento();
        $cadena.="nombreAerolinea: ".$this->getNombreAerolinea();
        $cadena.="CantEscalas: ".$this->getCantEscalas();
        return $cadena;
    }

    public function venderPasaje($pasajero)
    {
        $importeViaje=parent:: venderPasaje($pasajero);
        //echo $this->getCatAsiento();
           if($importeViaje!==0){
               //Hay lugar
                if($this->getCatAsiento()=="Primera Clase"){
                   
                    if($this->getCantEscalas() == 0){
                        //Sin escalas
                        $incremento=$importeViaje*40/100;//40% de incremento
                        $importeViaje=$importeViaje+$incremento;
                    }else{
                        //Con escalas
                        $incremento=$importeViaje*60/100;//60% de incremento
                        $importeViaje=$importeViaje+$incremento;

                    }
                }
                else {
                    $importeViaje= $importeViaje;
                }
           }else{
               //No hay mas lugar
           }
        return $importeViaje;
    }
    

}