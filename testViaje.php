<?php 
include 'Viaje.php'; 
include 'pasajero.php';
include 'ResponsableV.php';
include 'Aereo.php';
include 'Terrestre.php';

$viaje = null;
$opcion = 1;

//DATOS PRE CARGADOS//
//($importe,$tramos,$codigo, $desti, $capacidad,$colPasajeros,$responsable )
//$viaje= new Viaje(3450,"ida y vuelta","AA1234","China",23,[],"");
$p3= new Pasajero("Luna", "Perez", 20123123, 4465555);
    
     $p4= new Pasajero("Maria", "Saenz", 10123123, 4465444);
     //**********DATOS PRECARGADOS********** */
    $resp= new ResponsableV("Lucia", "Aguilar", 3453, 4325);
    
  
    

$viaje= new Aereo( 350, "ida","AA1234", "China", 23, [ $p3, $p4], $resp, 234, "Primera Clase", "Aerolineas Argentinas", 1);



//Menu principal
while($opcion != 0){
    $menu = "\033[1m\nMenú de opciones:\033[0m";
    echo "\033[4m$menu\033[0m";
    echo "
    \n
    0-Salir
    1-Cargar informacion de un viaje  
    2-Cargar un pasajero
    3-Modificar informacion viaje
    4-Modificar Pasajero
    5-Agregar Informacion Responsable
    6-Modificar Informacion Responsable
    7-Visualizar informacion del viaje
    8- Vender
    \n";
    $opcion = readline();
    switch($opcion){
        case 0 : echo "Saliendo del test"; break;
        case 1 : $viaje = crearViaje();break;
        case 2 :  if ($viaje !== null) {agregarPasajero($viaje);} else {echo "No se cargó un viaje.\n";};break;
        case 3 : if ($viaje !== null) {$viaje->modificarVuelo();} else {echo "No se cargó un viaje.\n";};break;
        case 4 : if ($viaje !== null) {$DNIPasajero = readline("Ingrese el DNI del pasajero a modificar: ");
            $viaje->cambiarPasajero($DNIPasajero);break;} else {echo "No se cargó un viaje.\n";};break;
        case 5:  if ($viaje !== null) {agregarResponsableV($viaje);} else {echo "No se cargó un viaje.\n";};break; 
        case 6:  if ($viaje !== null) {$viaje->modificarResponsable();} else {echo "No se cargó un viaje.\n";};break;
        case 7: if ($viaje !== null) {echo $viaje; $viaje->imprimirPasajeros();} else {echo "No se cargó un viaje.\n";};break;
        case 8: if ($viaje !== null) {$pasajero = ingresarPasajero(); $costo=$viaje->venderPasaje($pasajero); echo $costo;} else {echo "No se cargó un vender.\n";};break;
    }
}


function ingresarPasajero(){
    $nombrePasajero = readline("Ingrese Nombre del Pasajero:");
    $apellidoPasajero= readline("Ingrese Apellido del Pasajero:");
    $dniPasajero = readline("Ingrese Dni del Pasajero:");
    $telefonoPasajero= readline("Ingrese el telefono del Pasajero:");
    $nuevoPasajero=new Pasajero($nombrePasajero,$apellidoPasajero,$dniPasajero,$telefonoPasajero);
    return $nuevoPasajero;
}
//Funcion Crear viaje, Crea un Objeto de la Clase viaje, con los datos entrados por el usuario
function crearViaje(){
  $responsable= "";  
  $pasajeros = [];
  $codigo= readline("Ingrese el codigo de vuelo: ");
  $destino = readline("Ingrese el destino: ");
  $capacidad = readline("Ingrese la capacidad del vuelo: ");
  $importe = readline("Ingrese importe: ");
  $tramos = readline("Ingrese 'ida' o 'ida y vuelta': ");
  $nuevoViaje = new Viaje($importe,$tramos,$codigo, $destino, $capacidad, $pasajeros,$responsable);
  echo "Se creo correctamente un nuevo viaje.\n ";
  return $nuevoViaje;
}

function agregarPasajero($viaje){
    //**********DATOS PRECARGADOS***************/
    $pasajero1= new Pasajero("Luis","Saenz", 40123123,4465444);
    $viaje->agregarPasajeroAColeccion($pasajero1);
    $pasajero2= new Pasajero("Pepe","Rodriguez", 30123123,4465900);
    $viaje->agregarPasajeroAColeccion($pasajero2);
    $pasajero3= new Pasajero("Luna","Perez", 20123123,4465555);
    $viaje->agregarPasajeroAColeccion($pasajero3);
    $pasajero4= new Pasajero("Maria","Saenz", 10123123,4465444);
    $viaje->agregarPasajeroAColeccion($pasajero4);

    // PARA PROBAR LA FUNCION; DES COMENTARLA//

    /* $nombrePasajero = readline("Ingrese Nombre del Pasajero: ");
    $apellidoPasajero = readline("Ingrese Apellido del pasajero: ");
    $dniPasajero= readline("Ingrese Dni del pasajero: ");
    $telefonoPasajero=readline("Ingrese el telefono del pasajero:");
    $nuevoPasajero= new Pasajero($nombrePasajero,$apellidoPasajero,$dniPasajero,$telefonoPasajero);
    $viaje->agregarPasajeroAColeccion($nuevoPasajero); */

}

function agregarResponsableV($viaje){
    //**********DATOS PRECARGADOS********** */
    $responsable= new ResponsableV( "Lucia", "Aguilar",3453, 4325);
    $viaje->setResponsable($responsable);
 
    // PARA PROBAR LA FUNCION; DES COMENTARLA//

    /* $nombreResponsable = readline("Ingrese Nombre del Responsable: ");
    $apellidoResponsable = readline("Ingrese Apellido del Responsable: ");
    $numeroLicencia= readline("Ingrese numero de licencia del responsable: ");
    $numeroEmpleado=readline("Ingrese el numero de Empleado del responsable:");
    $nuevoResponsable= new ResponsableV($nombreResponsable,$apellidoResponsable,$numeroLicencia,$numeroEmpleado);
    $viaje->setResponsable($nuevoResponsable); */


}


