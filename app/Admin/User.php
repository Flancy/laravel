<?php

use App\User;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(User::class, function (ModelConfiguration $model) {
    $model->setTitle('Пользователи');
    // Display
    $model->onDisplay(function () {
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::count('id')->setLabel('#'),
            AdminColumn::email('email')->setLabel('Email'),
            AdminColumn::text('role')->setLabel('Права'),
        ]);
        $display->paginate(15);
        return $display;
    });
});
