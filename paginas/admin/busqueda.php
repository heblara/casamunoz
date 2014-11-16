<?php 
ob_start();
session_start(); ?>
<?php
include_once ('../DBManager.class.php'); //Clase de Conexión a las Base de Datos
include('../notariado.class.php');
//include("conexion.php");
//echo "<a style='text-align:left;' title='Cerrar esta ventana' href='#' onclick=\"document.getElementById('resultado').style.display='none'\"><img src='img/elim.png' width='16' /></a><br>";
if (isset($_GET["usuario"])) { 
sleep(1);
$_GET["usuario"];
$opc=$_GET["opc"];
$inscrito=$_GET["inscrito"];
$objBuscar=new Notariado;
//$condicion=" AND (SELECT COUNT(*) FROM borrados b WHERE b.idNotificacion=n.idNotificacion)  = 0 ";
if($inscrito=="no"){
	if($_GET["opc"]=="2"){
	  $consulta="SELECT * FROM DATOS_PERSONALES_INVESTIGACION WHERE CARNET_ABOGADO='".$_GET["usuario"]."'";
	  }
	else if($_GET["opc"]=="3"){ //Busqueda por titular
	  $consulta="SELECT * FROM DATOS_PERSONALES_INVESTIGACION WHERE CONCAT_WS(' ',NOMBRES,APELLIDOS) LIKE'%".$_GET["usuario"]."%'";
	}
	if($_GET["opc"]=="1"){
		$consulta="SELECT * FROM DATOS_PERSONALES_INVESTIGACION WHERE DUI='".$_GET["usuario"]."'";
	//	echo $consulta;
	}
}else{
	if($_GET["opc"]=="2"){
	  $consulta="SELECT * FROM DATOS_PERSONALES WHERE CARNET_ABOGADO='".$_GET["usuario"]."'";
    }
	else if($_GET["opc"]=="3"){ //Busqueda por titular
	  $consulta="SELECT * FROM DATOS_PERSONALES WHERE CONCAT_WS(' ',NOMBRES,APELLIDOS) LIKE'%".$_GET["usuario"]."%'";
	}
	if($_GET["opc"]=="1"){
		$consulta="SELECT * FROM DATOS_PERSONALES WHERE DUI='".$_GET["usuario"]."'";
	//	echo $consulta;
	}
}
echo $consulta;
$tamanopag=15;
$pagina=1;
$inicio=0;
if(isset($_GET["pagina"])){
	if($_GET["pagina"]>1){
		$pagina=$_GET["pagina"];
		$inicio=($pagina - 1)*$tamanopag;
	}else{
		$inicio = 0;
		$pagina=1;
	}
}
$con1=$objBuscar->buscar($consulta);
$total=$con1->rowCount();
$limit=" limit " .$inicio.",".$tamanopag;
$total_paginas = ceil($total / $tamanopag);
echo "<br>".$total." resultados encontrados<br>";
//echo "Se muestran paginas de " . $tamanopag . " registros cada una<br>"; 
echo "P&aacute;gina " . $pagina . " de " . $total_paginas . "";
$con2=$objBuscar->buscar($consulta.$limit);
$total=$con2->rowCount();
  if ($total > 0) { 
  echo "<table align='center' width='100%' style='font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px'>";
  echo "<tr>";
  echo "<td colspan='13'>";
	if ($total_paginas > 1){ 
			echo "Paginas: ";
			for ($i=1;$i<=$total_paginas;$i++){ 
				 if ($pagina == $i) {
					 //si muestro el índice de la página actual, no coloco enlace 
					 echo "&nbsp;".$pagina . "&nbsp;"; 
				 }else {
					 //si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página 
					 ?>
                     &nbsp;
					 <a href="#" onclick="leerDatosPag('<?php echo $_GET["usuario"] ?>',<?php echo $opc ?>,<?php echo $i ?>)"><?php echo $i; ?></a>&nbsp;
                     <?php
				 }
			} 
		}	  
  echo "</td>";
  echo "</tr>";
  echo "<tr><th class='title' colspan='5' width='20%'>Tarjeta</th><th class='title' width='40%'>Nombre</th>";
  echo "<th class='title' width='30%'>DUI</th><th class='title'>Opcion</th></tr>";
  $i=0;
  while($row=$con2->fetch(PDO::FETCH_OBJ)){
  	$i++;
  	//echo "Not ".$row->IdNotificacion;
  	if($i%2==0){
		$estilo="background-color:silver;color:black;";
	}else{
		$estilo="background-color:white;color:black;";
	}
	  echo "<tr>";
	  echo "<td colspan='5' style='$estilo'>".$row->CARNET_ABOGADO."</td>";
	  echo "<td style='$estilo'>".$row->NOMBRES." ".$row->APELLIDOS."</td>";
	  echo "<td align='center' style='$estilo'>".$row->DUI."</td>";
	  if(isset($_SESSION["autenticado"])){
		  if($_SESSION["autenticado"]=="si"){
		  	if($inscrito=='si'){
		  		echo "<td align='center' style='$estilo'><a href='?mod=modificarinscripcion&id=".base64_encode($row->ID_CODIGO)."'><img src='img/edit.png' width='32' title='Editar Inscripcion' /></a>&nbsp;&nbsp;&nbsp;";
		  	}else{
		  		echo "<td align='center' style='$estilo'><a href='?mod=modificarregistro&id=".base64_encode($row->COD)."'><img src='img/edit.png' width='32' title='Editar Inscripcion' /></a>&nbsp;&nbsp;&nbsp;";
		  	}
		  }
	  }else{
		  if($inscrito=='si'){
		  		echo "<td align='center' style='$estilo'><a href='?mod=modificarinscripcion&id=".base64_encode($row->ID_CODIGO)."'><img src='img/edit.png' width='32' title='Editar Inscripcion' /></a>&nbsp;&nbsp;&nbsp;";
		  	}else{
		  		echo "<td align='center' style='$estilo'><a href='?mod=modificarregistro&id=".base64_encode($row->COD)."'><img src='img/edit.png' width='32' title='Editar Inscripcion' /></a>&nbsp;&nbsp;&nbsp;";
		  	}
	  }
	  /*echo "<td align='center'>";
	  echo "<a href='#'>Seleccionar</a>";
	  echo "</td>";*/
	  echo "</tr>";
  }
  echo "<tr>";
  echo "<td colspan='13'>";
  if ($total_paginas > 1){ 
			echo "Paginas: ";
			for ($i=1;$i<=$total_paginas;$i++){ 
				 if ($pagina == $i) {
					 //si muestro el índice de la página actual, no coloco enlace 
					 echo "&nbsp;".$pagina . "&nbsp;"; 
				 }else {
					 //si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página 
					 ?>
                     &nbsp;
					 <a href="#" onclick="leerDatosPag('<?php echo $_GET["usuario"] ?>',<?php echo $opc ?>,<?php echo $i ?>)"><?php echo $i; ?></a>&nbsp;
                     <?php
				 }
			} 
		}
		echo "</td></tr>";	
  echo "</table>";
  }//fin de if que verifica que existan datos
  else { ?>
 <center><b style="font:Verdana, Arial, Helvetica, sans-serif:; font-size:12px;">No hay datos</b></center><?php }
  exit();
}
ob_end_flush();
?>