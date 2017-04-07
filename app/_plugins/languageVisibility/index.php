<?php 
$language = new Database("language", array(
	"method"=>"selectAll"
));
$query = $language->getter();
?>

<table class="highlight">
	<thead>
		<tr>
			<th data-field="id" width="50">ს.კ</th>
			<th data-field="name" width="530">დასახელება</th>
			<th data-field="action">მოქმედება</th>
		</tr>
	</thead>

	<tbody>
		<?php 
		foreach ($query as $key => $value) {
			?>

			<tr>
				<td><?=$value['id']?></td>
				<td><?=$value['outername']?></td>
				<td>
					<?php 
					$visibility = ($value['visibility']!=2) ? "visibility" : "visibility_off";
					$action = ($value['visibility']!=2) ? 2 : 1;
					?>
					<a href="javascript:void(0)" onclick="changeLanguageVisibility(<?=$action?>,<?=$value['id']?>)">
						<i class="material-icons"><?=$visibility?></i>
					</a>
				</td>
			</tr>

			<?php
		}
		?>
	</tbody>
</table>