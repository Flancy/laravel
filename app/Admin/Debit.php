<?php

use App\Debit;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(Debit::class, function (ModelConfiguration $model) {
    $model->setTitle('Счета');
    // Display
    $model->onDisplay(function () {
        $display = AdminDisplay::table()->with('users')->setColumns([
            AdminColumn::link('id')->setLabel('#')->setWidth('10px'),
            AdminColumn::text('debit')->setLabel('Счет')->setWidth('200px'),
            AdminColumn::text('users.email')->setLabel('Email')->setWidth('200px')
        ]);
        $display->paginate(15);
        return $display;
    });
});
