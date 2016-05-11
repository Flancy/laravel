<?php

Route::get('', ['as' => 'admin.dashboard', function () {
	if(Gate::denies('admin')){
		abort(403);
	}
	$content = 'Административная панель.';
	return AdminSection::view($content, 'Админка');
}]);

Route::get('information', ['as' => 'admin.information', function () {
	if(Gate::denies('admin')){
		abort(403);
	}
	$content = 'Информация.';
	return AdminSection::view($content, 'Информация');
}]);
