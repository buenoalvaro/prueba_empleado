<?php 
include_once 'conexionbd.php';

		
		$fecha=date("m-d-Y H:i:s"); 
		
		
		
		$valido1="";
		$v9="";
		$valido2="";
		$valido3="";
		$mensaje1="";
        $mensaje2="";
		 $mensaje3="";
		$codigo=1;
		
		
		
		if(!$_POST){

	$caja1="";
$caja2="";	

	$caja3="";
$caja4="";	

	$caja5="";
$caja6="";	
	


	
}else{

	$caja1=$_POST["caja1"];
$caja2=$_POST["caja2"];		
	
	$caja3=$_POST["caja3"];
$caja4=$_POST["caja4"];		

	$caja5=$_POST["caja5"];
 $caja6=$_POST["caja6"];		


	



}



	

						$sqlcel7="select * from   empleado where email='".$caja2."'  ";	
$registros1us67=mysqli_query($conn,$sqlcel7);

while($row1us67=mysqli_fetch_array($registros1us67)){
	
	$v9=$row1us67['email'];	
		
	}
	
	
			$sql1us="select * from  empleado  order by id  desc limit 1 ";	
$registros1us=mysqli_query($conn,$sql1us);

while($row1us=mysqli_fetch_array($registros1us)){

  $codigo=$codigo+$row1us['id'];	

		
	}	

	
	
	
	if(isset($_POST["guardar"])){
		
		$valido1=0;

$valido2=0;
		
		   
		  if(preg_match('/^[a-z ]+$/i', $caja1)){
		 


 
	$valido1=1;
}else{ 
    
$mensaje1="Solo letras";

//echo'<script type="text/javascript"> alert("Solo letras");</script>';

}	


  
	if (strcmp($caja2, $v9) !== 0) {
    $valido2=1;
}else{
 $mensaje2='Ya existe' ;

}



    if ($caja6=="" or count($caja6)<1){
		 $mensaje3='Selecciona un rol' ;
		
       
	} else{
      $valido3=1;  
}


		   
		 if( $valido1==1 and $valido2==1 and  $valido3==1){ 
		
	$si="insert into    empleado values('".$codigo."','".$caja1."','".$caja2."','".$caja3."','".$caja4."','1','".$caja5."')";

$regi=mysqli_query($conn,$si); 



foreach ($caja6 as $llave=>$valor) {
	
		$si1="insert into    empleado_rol set 	 empleado_id ='".$codigo."' ,rol_id='".$valor."'  ";

$regi1=mysqli_query($conn,$si1); 
	
    
}


/* 	$si1="insert into    empleado_rol values('".$codigo."','".$caja6."')";

$regi1=mysqli_query($conn,$si1); */ 
	
	
	 echo '<script> alert("Se han registrado los datos de manera correcta ");</script>';
	
	echo '<meta http-equiv="Refresh" content="0.2;url=index.php ">';
	
	
	
	 }else{
		
		 
	 }
		
	}
	
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>NEXURA INTERNACIONAL </title>
	
	<style>
	.negrilla{
	font-weight: bold;	
		
	}
	
	.checkbox{
		label:before 
			border-radius: 3px
		input[type="checkbox"]
			display: none
			&:checked + label:before 
				display: none
			&:checked + label
				background: $primario
				color: #fff
				padding: 5px 15px
	}
	</style>
</head>
<body>

 <form method="POST" name="formu"    enctype="multipart/form-data">
  <div class="container">  
      <h4> Nuevo Empleado </h4>
	  
	  
	  
	  <div class="alert alert-primary" role="alert">
los campos con asteriscos (*) son obligatorios  
</div>


<table width="100%">

<tr>

<td width="20%">


<font class="negrilla"> Nombre completo *</font> 
 <small><font color="#b30000"> 

	
<?php 
    
echo $mensaje1;


?>	 </font> </small>
</td>

<td width="80%">
<input type="text" name="caja1"   class="form-control" placeholder="Nombre completo del empleado"  value="<?php echo $caja1; ?>"  required  maxlength="255" >

</td>

</tr>

</table> 

<br>

<table width="100%">

<tr>

<td width="20%">
<font class="negrilla"> Correo electrónico *</font> 
 <small><font color="#b30000"> <?php 	

echo  $mensaje2 ;

   ?> </font> </small> 
</td>

<td width="80%">
<input type="email" name="caja2"   class="form-control" placeholder="Correo electrónico "  value="<?php echo $caja2; ?>"  required  maxlength="255" >

</td>

</tr>

</table> 

<br>

<table width="100%">

<tr>

<td width="20%">
<font class="negrilla"> Sexo *</font> 
</td>
<td>
<div>
  <input type="radio" id="caja3" name="caja3" value="M"
         checked>
  <label for="Masculino">Masculino</label>
</div>

<div>
  <input type="radio" id="caja3" name="caja3" value="F">
  <label for="Femenino">Femenino</label>
</div>

</td>

</tr>

</table> 


<br>

<table width="100%">

<tr>

<td width="20%">
<font class="negrilla"> Area *</font> 
</td>
<td>




<select name="caja4" id="caja4" class="form-control">

		 	<?php  	$sql1="select * from   areas ";	
	$registros1= mysqli_query($conn, $sql1);



while($row1=mysqli_fetch_array($registros1)){  




?>
  <option value="<?php  echo $row1['id'] ; ?>"><?php  echo $row1['nombre'] ; ?></option>
  
  
    <?php } ?>
</select>

		

</td>

</tr>

</table>




<br>

<table width="100%">

<tr>

<td width="20%">
<font class="negrilla"> Descripción *</font> 
</td>
<td>


<textarea  maxlength="255" name="caja5"   class="form-control" required rows="5" placeholder="Descripción de la experiencia del empleado" cols="50"><?php echo $caja5; ?></textarea>




		

</td>

</tr>

</table>


<br>

<table width="100%">

<tr>

<td width="20%">
<font class="negrilla"> Roles * <small><font color="#b30000"> <?php 	

echo  $mensaje3 ;

   ?> </font> </small></font> 
</td>
<td>


		 	<?php  	$sql1="select * from   roles ";	
	$registros1= mysqli_query($conn, $sql1);



while($row1=mysqli_fetch_array($registros1)){  




?>

<div>

<label><input type="checkbox" id="caja6" name="caja6[]" value="<?php  echo $row1['id'] ; ?>" > <?php  echo $row1['nombre'] ; ?></label><br>
<!--  <input type="radio" class="checkbox" id="caja6" name="caja6" value="<?php  echo $row1['id'] ; ?>"        required >
  <label for="roles">  <?php  echo $row1['nombre'] ; ?></label>-->
</div>






<?php }   ?>
		

</td>

</tr>

</table>




      


       <!-- <small><font color="#b30000"> <?php echo $mensaje_caja1;   ?> </font> </small>-->




<div class="form-group">
    <br>
    <input type="submit" value="guardar"  id='btn1' name="guardar" class="btn btn-primary"/>
    <input type="reset" value="cancelar" class="btn btn-danger"/>

    <a href="javascript:history.back()">Ir al listado</a>
</div>

  

     </div>
     </form>
</body>
</html>
