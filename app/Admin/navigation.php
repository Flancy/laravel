<?php

use SleepingOwl\Admin\Navigation\Page;

return [
    [
        'title' => 'Заявки',
        'icon' => 'fa fa-phone',
        'pages' => [
            (new Page(\App\Lead::class))
                ->setIcon('fa fa-bullseye')
                ->setPriority(0)
        ]
    ],
    [
        'title' => 'Панель',
        'icon'  => 'fa fa-dashboard',
        'url'   => route('admin.dashboard'),
    ],
    [
        'title' => 'Информация',
        'icon'  => 'fa fa-exclamation-circle',
        'url'   => route('admin.information'),
    ],
    [
        'title' => 'Пользователи',
        'icon' => 'fa fa-group',
        'pages' => [
            (new Page(\App\User::class))
                ->setIcon('fa fa-user')
                ->setPriority(0),
            (new Page(\App\GenerateUrl::class))
                ->setIcon('fa fa-user-plus')
                ->setPriority(1),
            (new Page(\App\Debit::class))
                ->setIcon('fa fa-money')
                ->setPriority(2)
        ]
    ]
];
