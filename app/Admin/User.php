<?php

use App\User;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(User::class, function (ModelConfiguration $model) {
    $model->setTitle('Пользователи');
    // Display
    $model->onDisplay(function () {
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::link('fio')->setLabel('Username')->setWidth('200px'),
            AdminColumn::email('email')->setLabel('Email')->setWidth('200px'),
            AdminColumn::text('policy')->setLabel('Права')->setWidth('200px'),
        ]);
        $display->paginate(15);
        return $display;
    });
});
