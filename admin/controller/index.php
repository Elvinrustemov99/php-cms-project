<?php

if (!permissions('index', 'show')){
	permissions_page();
}

require admin_view('index');