<?php require admin_view('static/header') ?>

<div class="box-">
	<h1>
		İstifadəçilər...
		<!--<a href="#">Əlavə et</a>-->
	</h1>
</div>

<div class="clear" style="height: 10px;"></div>

<div class="table">
	<table>
		<thead>
		<tr>
			<th>İstifadəçi Adı</th>
			<th class="hide">E-posta Ünvanı</th>
			<th class="hide">Qeydiyyat Tarixi</th>
			<th class="hide">Dərəcə</th>

			<?php if(permissions('user','edit') || permissions('user','delete')): ?>
				<th>Əməliyyatlar</th>
			<?php endif; ?>

		</thead>
		<tbody>

		<?php foreach ($query as $row): ?>
			<tr>
				<td>
					<a href="<?= admin_url('edit-user?id=' . $row['user_id']) ?>" class="title">
						<?= $row['user_name'] ?>
					</a>
				</td>

				<td class="hide">
					<?= $row['user_email'] ?>
				</td>

				<td class="hide">
					<?= $row['user_date'] ?>
				</td>

				<td class="hide">
					<?= user_ranks($row['user_rank']) ?>
				</td>

				<td>
					<?php if(permissions('user','edit')): ?>
						<a href="<?= admin_url('edit-user?id=' . $row['user_id']) ?>" class="btn">Redakt</a>
					<?php endif; ?>

					<?php if(permissions('user','delete')): ?>
						<a onclick="return confirm('İstifadəçi Silinsinmi?')"
					   href="<?= admin_url('delete_menu?table=users&column=user_id&id=' . $row['user_id']) ?>" class="btn">Sil</a>
					<?php endif; ?>

				</td>
			</tr>
		<?php endforeach; ?>

		</tbody>
	</table>
</div>

<?php if ($totalRecord > $pageLimit): ?>
	<div class="pagination">
		<ul>
			<?= $db->showPagination(admin_url(route(1) . '?' . $pageParam . '=[page]')); ?>
		</ul>
	</div>
<?php endif; ?>

<?php require admin_view('static/footer') ?>


