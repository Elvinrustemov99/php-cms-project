<?php


$meta = [
	'title' => 'Qeydiyyat'
];

if (post('submit')) {
	$username = post('username');
	$email = post('email');
	$password = post('password');
	$password_again = post('password_again');

	if (!$username) {
		$error = 'Xaiş edirik istifadəçi adınızı daxil edin!';
	} else if (!$email) {
		$error = 'Xaiş edirik e-posta unvanını daxil edin!';
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error = 'Düzgün e-posta daxil edilməyib!';
	} else if (!$password || !$password_again) {
		$error = 'Xaiş edirik şifrənizi daxil edin!';
	} else if ($password != $password_again) {
		$error = 'Şifrənin təkrarı düzgün deyil';
	} else { //istifadeci yoxlama

		$row = User::userExist($username , $email);

		if ($row) {
			$error = 'Bu istifadəçi adı və ya e-posta istifadə olunub. Zəhmət olmasa başqa birini daxil edin!';
		} else { // YOXSA

			$result = User::Register([
				'username' => $username,
				'url' => permalink($username),
				'email' => $email,
				'password' => password_hash($password, PASSWORD_DEFAULT)
			]);


			if ($result) {
				$success = 'Qeydiyyatdan keçdiniz';
				User::Login([
					'user_id' => $db->lastInsertId(),
					'user_name' => $username
				]);

				header('Refresh:1;url=' . site_url());
			} else {
				$error = 'aaaa';
			}
		}
	}
}

require view('registration');

