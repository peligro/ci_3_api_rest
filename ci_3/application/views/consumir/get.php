<ol class="breadcrumb">
  <li><a href="<?php echo base_url()?>">Inicio</a></li>
  <li class="active">Consumir vía GET</li>
</ol>
<h1>Consumir vía GET</h1>
<table class="table table-bordered">
	<thead>
		<th>ID</th>
		<th>Título</th>
		<th>Bajada</th>
		<th>Fecha</th>
		<th>Foto</th>
	</thead>
	<tbody>
		<?php
		foreach($datos as $dato)
		{
			?>
			<tr>
				<td><?php echo $dato->id?></td>
				<td><?php echo $dato->titulo?></td>
				<td><?php echo $dato->bajada?></td>
				<td><?php echo $dato->fecha?></td>
				<td><?php echo $dato->foto?></td>
			</tr>
			<?php
		}
		?>
	</tbody>
</table>