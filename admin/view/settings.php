<?php require admin_view('static/header') ?>

<div class="box-">
	<h1>
		Tənzimləmələr
	</h1>
</div>

<div class="clear" style="height: 10px;"></div>

<div class="box-">
	<form action="" method="post" class="form label">

		<ul>
			<li>
				<label>Sayt Başlığı</label>
				<div class="form-content">
					<input type="text" name="settings[title]" value="<?= setting('title') ?>">
				</div>
			</li>

			<li>
				<label>Sayt Təsviri</label>
				<div class="form-content">
					<input type="text" name="settings[description]" value="<?= setting('description') ?>">
				</div>
			</li>

			<li>
				<label>Sayt Açar Sözləri</label>
				<div class="form-content">
					<input type="text" name="settings[keywords]" value="<?= setting('keywords') ?>">
				</div>
			</li>

			<li>
				<label>Sayt Teması</label>
				<div class="form-content">
					<select name="settings[theme]">
						<option value="">Tema seçin</option>
						<?php foreach ($themes as $theme): ?>
							<option <?= (setting('theme') == $theme ? ' selected ' : null) ?>
								value="<?= $theme ?>"><?= $theme ?> </option>
						<?php endforeach; ?>
					</select>
				</div>
			</li>
		</ul>

		<ul>
			<h1>Baxım Modu Tənzimləmələri</h1>
		</ul>

		<ul>
			<li>
				<label>Baxım modu</label>
				<div class="form-content">
					<select name="settings[maintenance_mode]">
						<option <?= setting('maintenance_mode') == 1 ? 'selected' : null ?> value="1">Açıq</option>
						<option <?= setting('maintenance_mode') == 2 ? 'selected' : null ?> value="2">Qapalı</option>
					</select>
				</div>
			</li>

			<li>
				<label>Baxım Modu Başlığı</label>
				<div class="form-content">
					<input type="text" name="settings[maintenance_mode_title]" value="<?= setting('maintenance_mode_title') ?>">
				</div>
			</li>

			<li>
				<label>Baxım Modu Açıqlaması</label>
				<div class="form-content">
					<textarea name="settings[maintenance_mode_description]" cols="30"
					          rows="5"><?= setting('maintenance_mode_description') ?></textarea>
				</div>
			</li>
		</ul>

		<h1>Tema Tənzimləmələri</h1>
		<ul>
			<li>
				<label>Logo Başlıqı</label>
				<div class="form-content">
					<input type="text" name="settings[logo]" value="<?= setting('logo') ?>">
				</div>
			</li>

			<li>
				<label>Axtarış Bölməsi</label>
				<div class="form-content">
					<input type="text" name="settings[search_placeholder]" value="<?= setting('search_placeholder') ?>">
				</div>
			</li>

			<li>
				<label>Footer Haqqında yazısı</label>
				<div class="form-content">
					<textarea name="settings[about]" cols="30" rows="5"><?= setting('about') ?></textarea>
				</div>
			</li>

			<h1>Sosyal Şəbəkə</h1>
			<li>
				<label>Facebook URL</label>
				<div class="form-content">
					<input type="text" name="settings[facebook]" value="<?= setting('facebook') ?>">
				</div>
			</li>

			<li>
				<label>Instagram URL</label>
				<div class="form-content">
					<input type="text" name="settings[instagram]" value="<?= setting('instagram') ?>">
				</div>
			</li>

			<li>
				<label>Twitter URL</label>
				<div class="form-content">
					<input type="text" name="settings[twitter]" value="<?= setting('twitter') ?>">
				</div>
			</li>

			<li>
				<label>Linkedin URL</label>
				<div class="form-content">
					<input type="text" name="settings[linkedin]" value="<?= setting('linkedin') ?>">
				</div>
			</li>

			<li>
				<label>Messenger URL</label>
				<div class="form-content">
					<input type="text" name="settings[messenger]" value="<?= setting('messenger') ?>">
				</div>
			</li>

		</ul>

		<ul>
			<li class="submit">
				<input type="hidden" name="submit" value="1">
				<button type="submit">Yadda saxla</button>
			</li>
		</ul>
	</form>
</div>


<?php require admin_view('static/footer') ?>


