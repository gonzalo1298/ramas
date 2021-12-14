<?php
require_once "conexion.php";
include "menu.php";
$total = 0;

$sql = "SELECT * 
		FROM orderdetails 
		LIMIT 0,20";
//echo $sql;

$res = consulta($conn, $sql);

?>
<table border="1">
	<tr>
		<th>Cod Produc</th>
		<th>Cantidad</th>
		<th>Prec c/u</th>
		<th>Subtotal</th>
	</tr>
	<?php 
		while($fila = mysqli_fetch_assoc($res)){ 
			$subTotal = ($fila['priceEach'] * $fila['quantityOrdered']);
			$total += $subTotal;
	?>
	<tr>
		<td><?php echo $fila['productCode']; ?></td>
		<td><?php echo $fila['quantityOrdered']; ?></td>
		<td><?php echo $fila['priceEach']; ?></td>
		<td><?php echo $subTotal; ?></td>
	</tr>
	<?php } ?>
	<tr>
		<th colspan="3">Total</th>
		<th><?php echo $total; ?></th>
	</tr>
</table>