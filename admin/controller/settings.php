<?php
if (!permissions('settings', 'show')){
	permissions_page();
}

$themes = [];
foreach (glob(PATH . '/app/view/*/') as $folder){
	$folder = explode( '/', rtrim($folder, '/'));
	$themes[] = end($folder);
}

if (post('submit')){
	if (!permissions('settings', 'edit')){
		$error = 'Tənzimləmələri redakt etmək üçün icazəniz yoxdur!';
	} else {

		permissions('settings', 'edit');

		$html = '<?php' . "\n" . "\n";
		foreach (post('settings') as $key => $val) {
			$html .= '$settings["' . $key . '"] = "' . $val . '";' . "\n";
		}
		file_put_contents(PATH . '/app/settings.php', $html);
		header('Location' . admin_url('settings'));
	}
}

require admin_view('settings');