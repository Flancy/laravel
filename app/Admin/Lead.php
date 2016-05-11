<?php

use App\Lead;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(Lead::class, function (ModelConfiguration $model) {
    $model->setTitle('Заявки');
    // Display
    $model->onDisplay(function () {
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('name_task')->setLabel('Название')->setWidth('100px'),
            AdminColumn::relatedLink('url')->setLabel('Url')->setWidth('200px'),
            AdminColumn::text('fio')->setLabel('ФИО')->setWidth('200px')
        ]);
        $display->paginate(15);
        return $display;
    });
});
