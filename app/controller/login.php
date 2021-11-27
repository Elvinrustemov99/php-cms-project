<?php


$meta = [
	'title' => 'Daxil ol'
];

if (post('submit')) {

	$username = post('username');
	$password = post('password');

	if (!$username) {
		$error = 'İstifadəçi adı daxil edin.';
	} elseif (!$password) {
		$error = 'Şifrə daxil edin';
	} else {

		// üye var mı kontrol et
		$row = User::userExist($username);
		if ($row){
			// parola kontrolü yap
			$password_verify = password_verify($password, $row['user_password']);

			if ($password_verify){

				$success = 'Daxil oldunuz';
				User::Login($row);
				header('Refresh:1;url=' . site_url());

			} else {
				$error = 'Şifrə səhfdir!';
			}

		} else {
			$error = 'İstifadəçi mövcud deyil!';
		}

	}

}

require view('login');





/*
$meta = [
	'title' => 'Daxil ol'
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
		$query = $db->prepare('SELECT * FROM users WHERE user_name = :username || user_email= :email');
		$query->execute([
			'username' => $username,
			'email' => $email
		]);

		$row = $query->fetch(PDO::FETCH_ASSOC);

		if ($row) {
			$error = 'Bu istifadəçi adı və ya e-posta istifadə olunub. Zəhmət olmasa başqa birini daxil edin!';
		} else { // YOXSA
			$query = $db->prepare('INSERT INTO users SET user_name=:username, user_url=:url, user_email=:email, user_password=:password');
			$result = $query->execute([
				'username' => $username,
				'url' => permalink($username),
				'email' => $email,
				'password' => password_hash($password, PASSWORD_DEFAULT)
			]);

			if ($result) {
				$success = 'Qeydiyyatdan keçdiniz';
				header('Refresh:1;url=' . site_url());
			} else {
				$error = 'aaaa';
			}
		}
	}
}

require view('login');*/

