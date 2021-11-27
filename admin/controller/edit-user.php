<?php

if (!permissions('user', 'edit')){
	permissions_page();
}

$id = get('id');

if (!$id){
	header('Location:' . admin_url('users'));
	exit;
}

$row = $db->from('users')
	->where('user_id', $id)
	->first();

if (!$row){
	header('Location:' . admin_url('users'));
	exit;
}

if (post('submit')){
	if ($data = form_control('user_email')){

			$data['user_url'] = permalink($data['user_name']);
			$data['user_permissions'] = json_encode($_POST['user_permissions']);

			$query = $db->update('users')
				->where('user_id', $id)
				->set($data);

			if ($query){
				header('Location:' . admin_url('user'));
			} else{
				$error = 'Məlumatlar Yenilənmədi!';
			}

	} else{
		$error = 'sssssssssssss';
	}
}

$permissions = json_decode($row['user_permissions'], true);

require admin_view('edit-user');