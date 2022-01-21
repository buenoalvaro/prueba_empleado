<?php 
include_once 'conexionbd.php';




if(!$_GET){
	
	$codigo_us="";
	$abri_modal="";
	$borrar="";
	
}else{
 
$codigo_us=$_GET['codigo_us'];



	$abri_modal=$_GET['abri_modal'];
	
	$borrar=$_GET['borrar'];
}


if($borrar!=""){
	$s2c="DELETE FROM empleado WHERE id=$borrar";
	
	$regic=mysqli_query($conn,$s2c);
	
	$s3c="DELETE FROM  empleado_rol WHERE empleado_id=$borrar";
	
	$regic3=mysqli_query($conn,$s3c);
}
	
	
	
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>NEXURA INTERNACIONAL</title>

   <style>
   /* modal par ainformacion del producto*/


/*modal descripcion producto*/




.modalprueba {
	width: 100%;
	height: 100vh;
	background: rgba(0,0,0,0.0);
    word-wrap: break-word;
	position: absolute;
	top: 0;
	left: 0;
	
	display: flex;
	
	animation: modalprueba 0s 0s forwards;
	visibility: hidden;
	opacity: 0;
	
	
	
	
	z-index:5;
	
}

.contenidomodal{
	
	
margin: auto;
	background:#B4B1B1;
	height:250px;
	padding: 5px 20px 13px 20px;
	border-radius: 5px;
	
}



#cerrar {
	display: none;
}

#cerrar + label {
	position: fixed;
	
	font-size: 25px;
	z-index: 6;
	 margin-left: 49%;
	height: 40px;
	width: 40px;
	line-height: 40px;
	
	
	margin-top: 10%;
	cursor: pointer;
	
	animation: modalprueba 0s 0s forwards;
	visibility: hidden;
	opacity: 0;
	  text-align: center;
	
	background: #606061;
	color: #FFFFFF;
	
		text-decoration: none;
	font-weight: bold;
	-webkit-border-radius: 12px;
	-moz-border-radius: 12px;
	border-radius: 50%;
	-moz-box-shadow: 1px 1px 3px #000;
	-webkit-box-shadow: 1px 1px 3px #000;
	box-shadow: 1px 1px 3px #000;
	
}

#cerrar:checked + label, #cerrar:checked ~ .modalprueba {
	display: none;
}

@keyframes modalprueba {
	100% {
		visibility: visible;
		opacity: 1;
	}
}

  	.caja_area {
  border: 0;

  width: 90%;
  height:120px;
  
  color:black;
}



/*basurita boton*/
.borrar_boton{
background-image:url(img/basura.png);
              background-color: #662483 ;
             background-repeat:no-repeat;
             height:28px;
             width:28px;
             border-top-left-radius:15px;
           
             text-align: center;
           
           border-top-right-radius:15px;
           
           border-bottom-left-radius:15px;
           border-bottom-right-radius:15px;
             border:1;
                  border-color:#FFF;
               
              background-size: 18px 19px;
             background-position:center;
             color: transparent;
}

/*     sin decoracion       */

.sin{
text-decoration: none;
font-size:20px;
color:black; 	
}



	/*modal descripcion producto*/




.modalprueba {
	width: 100%;
	height: 100vh;
	background: rgba(0,0,0,0.5);
	position: absolute;
	top: 0;
	left: 0;
	
	display: flex;
	
	animation: modalprueba 0s 0s forwards;
	visibility: hidden;
	opacity: 0;
	
	overflow-y: auto;
	
	
	z-index:5;
	
}

.contenidomodal{
	overflow-y: auto;
	
margin: auto;
	background: white;
	
	height:200px;
	padding: 5px 20px 13px 20px;
	border-radius: 5px;
	
}



#cerrar {
	display: none;
}

#cerrar + label {
	position: fixed;
	
	font-size: 25px;
	z-index: 6;
	 margin-left:auto;
	height: 40px;
	width: 40px;
	line-height: 40px;
	
	
	margin-top:200px;
	cursor: pointer;
	
	animation: modalprueba 0s 0s forwards;
	visibility: hidden;
	opacity: 0;
	  text-align: center;
	
	background: #606061;
	color: #FFFFFF;
	
		text-decoration: none;
	font-weight: bold;
	-webkit-border-radius: 12px;
	-moz-border-radius: 12px;
	border-radius: 50%;
	-moz-box-shadow: 1px 1px 3px #000;
	-webkit-box-shadow: 1px 1px 3px #000;
	box-shadow: 1px 1px 3px #000;
	
}

#cerrar:checked + label, #cerrar:checked ~ .modalprueba {
	display: none;
}

@keyframes modalprueba {
	100% {
		visibility: visible;
		opacity: 1;
	}
}

  	.caja_area {
  border: 0;

  width: 90%;
  height:120px;
  
  color:black;
}	
	
	




  .cajatextouu{
  

  border: 0;

  color: white;
  background-color: transparent;

 
width:100%;
   
}

	.caja {
  border: none;
  border-bottom: 1px solid #C5C5C5;
  width: 100%;
}

   </style>
</head>
<body>
<form method="POST" name="formu"   enctype="multipart/form-data">
    <div class="container">  

      <h4> Lista de  Empleados  </h4>

     <!-- @if(Session::has('success'))
      <div class="alert-box success">
        <div class="alert alert-success col-md-4">  <h2>{{ Session::get('success') }}</h2></div>
      </div>
  @endif-->
  <br>
<div style="  text-align: right;">
    <a href="registrar_empleado.php"   class="btn btn-primary"><img src="iconos/img0.png"  width="15px" height="15px"> Nuevo</a>
</div>





    <div class="col-lx-12">
      <div class="table-responsive" >
    <center>
    <table class="table table-striped" >
      <thead>
        <th><img src="iconos/img1.png"  width="12px" height="12px"> Nombre</th>
		  <th><img src="iconos/img2.png"  width="12px" height="12px"> Email</th>
        <th><img src="iconos/img3.png"  width="12px" height="12px"> Sexo</th>
        <th><img src="iconos/img4.png"  width="12px" height="12px"> Área</th>
          <th><img src="iconos/img2.png"  width="12px" height="12px"> Boletin</th>
         <th>Modificar</th>
        <th>Eliminar</th>
      </thead>
      <?php $saber=""; ?>
     
	 <?php
	 
	 
	 		$sqlcel7="select * from   empleado   ";	
	$registroscel7= mysqli_query($conn, $sqlcel7);



while($rowcel7=mysqli_fetch_array($registroscel7)){

		
	
	 
	 
	 
	 
	 $number=0;
  
		 $number++;
		 $area=$rowcel7['area_id'];
		 
		 
     ?>
	 
      <?php $saber=1; ?>

      <tr>
        <td>
		<?php   echo $rowcel7['nombre'] ;  ?>
		
	</td>
	
	
	<td>
	
	<?php   echo $rowcel7['email'] ;  ?>
	
	</td>
		
	     <td>
		
		<?php  
if($rowcel7['sexo']=="M"){

		echo "Masculino" ; 

}else{
	
echo "Femenino" ; 	
}

		?>
	</td>
	
	
	<td>
	
		 	<?php  	$sql1e="select areas.nombre from   areas where   areas.id='".$rowcel7['area_id']."'  ";	
	$registros1e= mysqli_query($conn, $sql1e);



while($row1e=mysqli_fetch_array($registros1e)){  


echo $row1e['0'] ; 

}?>
	
	</td>	
		
     <td>
	<?php if($rowcel7['boletin']=="1"){

		echo "Si" ; 

}else{
	
echo "No" ; 	
}
?>		
	</td>
	
	
	<td>
	
	<a href="modificar_empleado.php?codigo_us=<?php echo $rowcel7['id'];  ?>"  ><img src="iconos/modificar.png"  width="20px" height="20px"></a>
	
	</td>
	
		<td>
	
		<a href="index.php?codigo_us=<?php echo $rowcel7['id'];  ?>& abri_modal=1 & borrar='' "  ><img src="iconos/eliminar.png"  width="20px" height="20px"></a>
	
	</td>

    </tr>
     <?php  } ?>
     
    </table>


	

	
<?php if($abri_modal==1 ){?>
<center>

<!--<input type="checkbox" id="cerrar">
		<<label for="cerrar" id="btn-cerrar">X</label>-->
		<div class="modalprueba">
		
		
			<div class="contenidomodal" >
			
		  
   <CENTER>

    
	 
	  <a class="btn btn-primary" href="index.php">X</a>
	  <br><br>
	<!-- <a    href="registrar_odontologo.php " >  <font style="font-size: 18pt; font-weight: bold;color:#000;"> X</font></a>-->


   <div class="container">  

<font style="font-weight: bold;">¿Deseas borrar al empleado ? </font>
    <br>
		 	<?php  	$sql1="select * from  empleado where id=$codigo_us ";	
	$registros1= mysqli_query($conn, $sql1);



while($row1=mysqli_fetch_array($registros1)){  


echo $row1['nombre'] ; 

}?>

<br><br>

<a href="index.php"   class="btn btn-primary btn-sm">Cerrar</a>
<a href="index.php?borrar=<?php echo $codigo_us;  ?> & abri_modal='' & codigo_us='' "   class="btn btn-danger btn-sm">Borrar</a>


        </div>
    </div>
        
    </div>


<?php  } ?>






  
	
	


</form>












</body>
</html>