<?php

use App\GenerateUrl;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(GenerateUrl::class, function (ModelConfiguration $model) {
    $model->setTitle('Инвайты');
    // Display
    $model->onDisplay(function () {
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('id')->setLabel('#'),
            AdminColumn::email('email')->setLabel('Email'),
            AdminColumn::text('url')->setLabel('Ссылка'),
        ]);
        $display->paginate(15);
        return $display;
    });

    $model->onCreateAndEdit(function() {
        $url = generateUrl();
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::text('email', 'Email')->required()->unique(),
            AdminFormElement::hidden('url')->required()->unique()->setDefaultValue($url)
        );
        return $form;
    });
    function generateUrl()
    {
        $publicUrl = url('/');
        $randomString = str_random(40);
        return $url = $publicUrl.'/register/'.$randomString;
    }
});
