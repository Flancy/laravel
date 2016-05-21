<?php

use App\Lead;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(Lead::class, function (ModelConfiguration $model) {
    $model->setTitle('Заявки');
    // Display
    $model->onDisplay(function () {
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::count('id')->setLabel('#'),
            AdminColumn::text('name_task')->setLabel('Название'),
            AdminColumn::text('fio')->setLabel('ФИО')
        ]);
        $display->paginate(15);
        return $display;
    });
});
