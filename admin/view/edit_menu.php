<?php require admin_view('static/header') ?>

	<div class="box- menu-container">

		<h2>Menyu Redakt et(#<?= $id ?>)</h2>
		<form action="" method="post">
			<div style="padding-bottom: 10px; max-width: 400px">
				<input type="text" name="menu_title" value="<?= post('menu_title') ? post('menu_title'): $row['menu_title'] ?>" placeholder="Menu Başlıqı">
			</div>

			<ul id="menu" class="menu">
				<?php foreach ($menuData as $key => $menu): ?>
				<li>
					<div class="handle"></div>
					<div class="menu-item">
						<a href="#" class="delete-menu">
							<i class="fa fa-times"></i>
						</a>
						<input type="text" name="title[]" value="<?= $menu['title'] ?>" placeholder="Menyu Adı">
						<input type="text" name="url[]" value="<?= $menu['url'] ?>" placeholder="Menyu Linki">
					</div>
					<div class="sub-menu">
						<ul class="menu">
							<?php if (isset($menu['submenu'])): ?>
								<?php foreach ($menu['submenu'] as $k => $submenu): ?>
									<li>
										<div class="handle"></div>
										<div class="menu-item">
											<a href="#" class="delete-menu">
												<i class="fa fa-times"></i>
											</a>
											<input type="text" name="sub_title_<?=$key?>[]" value="<?= $submenu['title'] ?>" placeholder="Menyu Adı">
											<input type="text" name="sub_url_<?=$key?>[]" value="<?= $submenu['url'] ?>" placeholder="Menyu Linki">
										</div>
									</li>
								<?php endforeach; ?>
							<?php endif;?>
						</ul>

					</div>
					<a href="#" class="btn add-submenu">Alt Menyu Əlavə et</a>
				</li>
				<?php endforeach; ?>
			</ul>
			<div class="menu-btn">
				<a href="#" id="add-menu" class="btn">Menyu Əlavə et</a>
				<button type="submit" value="1" name="submit">Yadda Saxla</button>
			</div>
		</form>
	</div>

	<script>
      $(function () {

          $('#add-menu').on('click', function (e) {
              $('#menu').append('<li>\n' +
                  '         <div class="handle"></div><div class="menu-item">\n' +
                  '             <a href="#" class="delete-menu">\n' +
                  '                 <i class="fa fa-times"></i>\n' +
                  '             </a>\n' +
                  '             <input type="text" name="title[]" placeholder="Menyu Adı">\n' +
                  '             <input type="text" name="url[]" placeholder="Menyu Linki">\n' +
                  '         </div>' +
                  '        <div class="sub-menu"><ul class="menu"></ul></div>\n' +
                  '               <a href="#" class="add-submenu btn">Alt Menyu Əlavə et</a>\n' +
                  '         </li>');
              $('.menu').sortable();
              e.preventDefault();
          });

          $(document.body).on('click', '.add-submenu', function (e) {
              var index = $(this).closest('li').index();
              $(this).prev('.sub-menu').find('ul').append('<li>\n' +
                  '        <div class="handle"></div><div class="menu-item">\n' +
                  '            <a href="#" class="delete-menu">\n' +
                  '                <i class="fa fa-times"></i>\n' +
                  '            </a>\n' +
                  '            <input type="text" name="sub_title_' + index + '[]" placeholder="Menyu Adı">\n' +
                  '            <input type="text" name="sub_url_' + index + '[]" placeholder="Menyu Linki">\n' +
                  '        </div>\n' +
                  '    </li>');
              e.preventDefault();
          });

          $(document.body).on('click', '.delete-menu', function (e) {
              if ($('#menu li').length === 1) {
                  alert('Ən az bir menyu olmalıdır!');
              } else {
                  $(this).closest('li').remove();
              }
              e.preventDefault();
          });

      });
	</script>

<?php require admin_view('static/footer') ?>