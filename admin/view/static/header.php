<!doctype html>
<html lang="en">
<head>


	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

	<meta charset="UTF-8">
	<title>Document</title>

	<!--styles-->
	<link rel="stylesheet" href="<?= admin_public_url('styles/main.css?v=' . time()) ?>">

	<!--scripts-->
	<script src="<?= admin_public_url('scripts/jquery-1.12.2.min.js') ?>"></script>
	<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://cdn.ckeditor.com/4.5.7/basic/ckeditor.js"></script>
	<script src="<?= admin_public_url('scripts/admin.js') ?>"></script>


	<style>
      .menu-container .handle {
          width: 15px;
          height: 15px;
          background: #ffffaa;
          position: absolute;
          top: 15px;
          right: -15px;
      }

      .menu-container form > ul li {
          background: #ffffee;
          overflow: inherit;
          cursor: move;
      }

      .menu-container form > ul li.ui-sortable-helper {
          box-shadow: 0 0 10px 0 rgb(0, 0, 0.2);
      }

      .ui-sortable-placeholder {
          background: #f7ecb4 !important;
          visibility: visible !important;
      }

	</style>
</head>
<body>

<?php if (session('user_rank') && session('user_rank') != 3): ?>

<!--navbar-->
<div class="navbar">
	<ul dropdown>
		<li>
			<a href="#">
				<span class="fa fa-home"></span>
				<span class="title">
					<?=setting('title')?>
				</span>
			</a>
		</li>
		<li>
			<a href="<?= admin_url('logout') ?>">
				Çıxış
			</a>


<!--		<li>-->
<!--			<a href="#">-->
<!--				<span class="fa fa-comment"></span>-->
<!--				1-->
<!--			</a>-->
<!--		</li>-->
<!--		<li>-->
<!--			<a href="#">-->
<!--				<span class="fa fa-plus"></span>-->
<!--				<span class="title">Yeni</span>-->
<!--			</a>-->
<!--			<ul>-->
<!--				<li>-->
<!--					<a href="#">-->
<!--						Yeni Post-->
<!--					</a>-->
<!--				</li>-->
<!--				<li>-->
<!--					<a href="#">-->
<!--						Yeni Səifə-->
<!--					</a>-->
<!--				</li>-->
<!--				<li>-->
<!--					<a href="#">-->
<!--						Yeni kategori-->
<!--					</a>-->
<!--				</li>-->
<!--			</ul>-->
<!--		</li>-->
	</ul>
</div>

<!--sidebar-->
<div class="sidebar">

	<ul>
		<?php foreach ($menus as $mainUrl => $menu): if (!permissions($mainUrl, 'show', false)) continue; ?>
			<li class="<?= (route(1) == $mainUrl) || isset($menu['submenu'][route(1)]) ? 'active' : null ?> ">
				<a href="<?= admin_url($mainUrl) ?>">
					<span class="fa fa-<?= $menu['icon'] ?>"></span>
					<span class="title">
                    <?= $menu['title'] ?>
					</span>
				</a>

				<?php if (isset($menu['submenu'])): ?>
					<ul class="sub-menu">
						<?php foreach ($menu['submenu'] as $url => $submenu) : ?>
							<li class="active">
								<a href="<?= admin_url($url) ?>">
									<span class="fa fa-<?= $submenu['icon'] ?>"></span>

									<?= $submenu['title'] ?>
								</a>
							</li>
						<?php endforeach; ?>

					</ul>
				<?php endif ?>

			</li>
		<?php endforeach; ?>
		<li class="line">
			<span></span>
		</li>
	</ul>
	<a href="#" class="collapse-menu">
		<span class="fa fa-arrow-circle-left"></span>
		<span class="title">
            Collapse menu
		</span>
	</a>
</div>

<!--content-->
<div class="content">
	<?php if (isset($error)): ?>
		<div class="message error box-">
			<?= $error ?>
		</div>
	<?php endif; ?>

	<?php endif; ?>
