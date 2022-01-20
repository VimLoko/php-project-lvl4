<?php

return [
    'forms' => [
        'register_form' => [
            'form_name' => 'Регистрация',
            'name' => 'Имя',
            'email' => 'Email',
            'password' => 'Пароль',
            'confirm_password' => 'Подтверждение',
            'btn_reg' => 'Зарегистрировать'
        ],
        'login_form' => [
            'form_name' => 'Вход',
            'email' => 'Email',
            'password' => 'Пароль',
            'checkbox_remember' => 'Запомнить меня',
            'btn_login' => 'Войти',
            'link_remember' => 'Забыли пароль?',
        ],
        'add_status_form' => [
            'form_name' => 'Создать статус',
            'name' => 'Имя',
            'btn_create' => 'Создать',
        ],
        'edit_status_form' => [
            'form_name' => 'Изменение статуса',
            'name' => 'Имя',
            'btn_update' => 'Обновить',
        ]
    ],
    'messages' => [
        'add_status_form_success' => 'Статус успешно добавлен',
        'add_status_form_error' => 'Не удалось добавить статус',
        'edit_status_form_success' => 'Статус успешно обновлен',
        'edit_status_form_error' => 'Не удалось обновить статус',
        'delete_status_form_success' => 'Статус успешно удален',
        'delete_status_form_error' => 'Не удалось удалить статус',
        'delete_question' => 'Вы уверены?',
    ],
    'menu' => [
        'task_statuses' => 'Статусы'
    ],
    'pages' => [
        'task_statuses' => [
            'name_page' => 'Статусы',
            'btn_create' => 'Создать статус',
            'link_delete' => 'Удалить',
            'link_edit' => 'Изменить',
            'id' => 'ID',
            'name' => 'Имя',
            'created_at' => 'Дата создания',
            'actions' => 'Действия',
        ]
    ],
    'app_name' => 'Менеджер задач',
    'login' => 'Вход',
    'register' => 'Регистрация',
    'logout' => 'Выход',
];
