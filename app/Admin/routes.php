<?php

Route::get('', ['as' => 'admin.dashboard', function () {
	if(Gate::denies('admin')){
		abort(403);
	}
	$content = 'Define your dashboard here.';
	return AdminSection::view($content, 'Dashboard');
}]);

Route::get('information', ['as' => 'admin.information', function () {
	if(Gate::denies('admin')){
		abort(403);
	}
	$content = 'Define your information here.';
	return AdminSection::view($content, 'Information');
}]);
