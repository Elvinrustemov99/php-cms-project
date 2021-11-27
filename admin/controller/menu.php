<?php

if (!permissions('menu', 'show')){
	permissions_page();
}

$query = $db->prepare('SELECT * FROM add_menu ORDER BY menu_id DESC');
$query->execute();
$rows = $query->fetchAll(PDO::FETCH_ASSOC);

require admin_view('menu');