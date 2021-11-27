<?php require admin_view('static/header') ?>

<div class="box-">
	<h1>
		Menyu İdarəetməsi

		<?php if (permissions('menu', 'add')): ?>
			<a href="<?= admin_url('add_menu') ?>">Əlavə et!</a>
		<?php endif; ?>

	</h1>
</div>

<div class="clear" style="height: 10px;"></div>

<div class="table">
	<table>
		<thead>
		<tr>
			<th>Menyu Başlıqı</th>
			<th class="hide">Tarix</th>

			<?php if (permissions('menu', 'edit') || permissions('menu', 'delete')): ?>
				<th>Əməliyyatlar</th>
			<?php endif; ?>

		</tr>
		</thead>
		<tbody>

		<?php foreach ($rows as $row): ?>

			<tr>

				<td>
					<?= $row['menu_title'] ?>
				</td>
				<td>
					<?= $row['menu_date'] ?>
				</td>

				<td>
					<?php if (permissions('menu', 'edit')): ?>
						<a href="<?= admin_url('edit_menu?id=' . $row['menu_id']) ?>" class="btn">Redakt et</a>
					<?php endif; ?>

					<?php if (permissions('menu', 'delete')): ?>
						<a onclick="return confirm('İstifadəçi Silinsinmi?')"
						   href="<?= admin_url('delete_menu?table=add_menu&column=menu_id&id=' . $row['menu_id']) ?>" class="btn">Sil</a>
					<?php endif; ?>

				</td>

			</tr>

		<?php endforeach; ?>

		</tbody>
	</table>
</div>

<?php require admin_view('static/footer') ?>


