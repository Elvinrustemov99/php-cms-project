<?php
if (!permissions('user', 'show')){
	permissions_page();
}

$totalRecord = $db->from('users')
	->select('count(user_id) as total')
	->total();

$pageLimit = 10;
$pageParam = 'page';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

$query = $db->from('users')
	->orderby('user_id', 'DESC')
	->limit($pagination['start'], $pagination['limit'])
	->all();



//$query = $db->from('users')
//	->orderBy('user_id', 'DESC')
//	->all();
//print_r($query);


require admin_view('user');
