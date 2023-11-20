
<?php
	include_once("../DBConexion.php");
	
	$Op = "";
	$Resp = False;
	
		
		if(isset($_POST["Guardar"]))
		{
			$Sql = "INSERT INTO mercado(nombre, tipo, provincia, canton, telefono, ubicacion) ";
			$Sql .= "VALUES('".$_POST["txtTiendaNom"]."','".$_POST["txtTipo"]."','".$_POST["txtProvincia"]."','".$_POST["txtCantón"]."','".$_POST["txtTelefono"]."','".$_POST["txtUbicacion"]."')" ;
			
			$Resul = @mysqli_query($Conexion,$Sql);
			
			if(@mysqli_errno($Conexion)==0)
			{
				$Resp = TRUE;
			}
		}
		
		
		
	$Sql = "SELECT * ";	
	$Sql .= "FROM mercado";	
	
	$Resul = @mysqli_query($Conexion,$Sql);
	
	$Tabla = "<table class='tablaMercado' align='center' width='800px' height='100%'>";
	$Tabla .= "<tr class='thTabla'>";
	$Tabla .= "<th>Tienda</th>";
	$Tabla .= "<th>Tipo</th>";
	$Tabla .= "<th>Provincia</th>";
	$Tabla .= "<th>Cantón</th>";
	$Tabla .= "<th>Teléfono</th>";
	$Tabla .= "<th>Dirección</th>";
	$Tabla .= "</tr>";
	
	while($Fila = mysqli_fetch_array($Resul,MYSQLI_ASSOC))
	{
		$Tabla .="<tr>";
		$Tabla .="<td>".$Fila["nombre"]."</td>";
		$Tabla .="<td>".$Fila["tipo"]."</td>";
		$Tabla .="<td>".$Fila["provincia"]."</td>";
		$Tabla .="<td>".$Fila["canton"]."</td>";
		$Tabla .="<td>".$Fila["telefono"]."</td>";
		$Tabla .="<td>".$Fila["ubicacion"]."</td>";
		$Tabla .="</tr>";
	}
	
	$Tabla .= "</table>";

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../Estilos.css"/>
		<title></title>
	</head>
	<body>
		<div id="tituloSec" align="center">
			<h2>Mercado</h2>
		</div>
		
		<?php
		
			echo($Tabla);
		
		?>
		
		
		<br/>
		<br/>
		<br/>
		
		<div align="center">
			<h3>Ingresa las tiendas de tú localidad</h3>
		</div>
		
		<form id="frmMercado" name="frmMercado" method="post" action="Mercado.php">
			
			<div align="center">
				
				<div id="formulario">
					Nombre:<br>
					<input type="text" id="txtTiendaNom" name="txtTiendaNom">
				</div>
				<div id="formulario">
					Tipo:<br>
					<input type="text" id="txtTipo" name="txtTipo">
				</div>
				<div id="formulario">
					Provincia:<br>
					<input type="text" id="txtProvincia" name="txtProvincia">
				</div>
				<div id="formulario">
					Cantón:<br>
					<input type="text" id="txtCantón" name="txtCantón">
				</div>
				<div id="formulario">
					Teléfono:<br>
					<input type="text" id="txtTelefono" name="txtTelefono">
				</div>
				<div id="formulario">
					Ubicación:<br>
					<input type="text" id="txtUbicacion" name="txtUbicacion">
				</div>
				<br/>
				<div id="formulario">
					<input class="boton" type="submit" id="Guardar" name="Guardar" value="Guardar">
				</div>
				
				
			</div>
			
		</form>
		
		<?php
		
			if($Resp)
			{
				echo("<script>alert('Información guardada correctamente')</script>");	
			}
		?>
		
		
	</body>
</html>