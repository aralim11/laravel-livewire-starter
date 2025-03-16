<?php

return [
    'permissions' => [
        'users' => [
            'label' => 'user permissions',
            'list' => [
                ['name' => 'users.index'],
                ['name' => 'users.create'],
                ['name' => 'users.edit'],
                ['name' => 'users.delete'],
                ['name' => 'users.import'],
                ['name' => 'users.export'],
            ],
        ],
        'roles' => [
            'label' => 'roles permissions',
            'list' => [
                ['name' => 'roles.index'],
                ['name' => 'roles.create'],
                ['name' => 'roles.edit'],
                ['name' => 'roles.delete'],
            ],
        ],
        'logs' => [
            'label' => 'logs permissions',
            'list' => [
                ['name' => 'activity.index'],
                ['name' => 'auth.index'],
            ],
        ],
        'profiles' => [
            'label' => 'profile permissions',
            'list' => [
                ['name' => 'profile.edit'],
            ],
        ],
    ],
];
