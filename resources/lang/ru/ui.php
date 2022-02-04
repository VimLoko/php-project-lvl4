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
        ],
        'edit_task_form' => [
            'form_name' => 'Изменение задачи',
            'name' => 'Имя',
            'description' => 'Описание',
            'status' => 'Статус',
            'assigned_to' => 'Исполнитель',
            'btn_update' => 'Обновить',
        ],
        'add_task_form' => [
            'form_name' => 'Создать задачу',
            'name' => 'Имя',
            'description' => 'Описание',
            'status' => 'Статус',
            'assigned_to' => 'Исполнитель',
            'labels' => 'Метки',
            'btn_create' => 'Создать',
        ],
        'view_task_form' => [
            'form_name' => 'Просмотр задачи',
            'name' => 'Имя',
            'status' => 'Статус',
            'description' => 'Описание',
            'labels' => 'Метки',
        ],
        'add_label_form' => [
            'form_name' => 'Создать метку',
            'name' => 'Имя',
            'description' => 'Описание',
            'btn_create' => 'Создать',
        ],
        'edit_label_form' => [
            'form_name' => 'Изменение метки',
            'name' => 'Имя',
            'description' => 'Описание',
            'btn_update' => 'Обновить',
        ],
    ],
    'messages' => [
        'add_status_form_success' => 'Статус успешно создан',
        'add_status_form_error' => 'Не удалось добавить статус',
        'edit_status_form_success' => 'Статус успешно изменён',
        'edit_status_form_error' => 'Не удалось обновить статус',
        'delete_status_form_success' => 'Статус успешно удалён',
        'delete_status_form_error' => 'Не удалось удалить статус',
        'add_task_form_success' => 'Задача успешно создана',
        'add_task_form_error' => 'Не удалось добавить задачу',
        'edit_task_form_success' => 'Задача успешно изменена',
        'edit_task_form_error' => 'Не удалось обновить задачу',
        'delete_task_form_success' => 'Задача успешно удалена',
        'delete_task_form_error' => 'Не удалось удалить задачу',
        'add_label_form_success' => 'Метка успешно создана',
        'add_label_form_error' => 'Не удалось добавить метку',
        'edit_label_form_success' => 'Метка успешно изменена',
        'edit_label_form_error' => 'Не удалось обновить метку',
        'delete_label_form_success' => 'Метка успешно удалена',
        'delete_label_form_error' => 'Не удалось удалить метку',
        'delete_question' => 'Вы уверены?',
    ],
    'menu' => [
        'task_statuses' => 'Статусы',
        'tasks' => 'Задачи',
        'labels' => 'Метки'
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
        ],
        'tasks' => [
            'name_page' => 'Задачи',
            'btn_create' => 'Создать задачу',
            'link_delete' => 'Удалить',
            'link_edit' => 'Изменить',
            'id' => 'ID',
            'status' => 'Статус',
            'name' => 'Имя',
            'author' => 'Автор',
            'assigned_to' => 'Исполнитель',
            'created_at' => 'Дата создания',
            'actions' => 'Действия',
            'btn_apply' => 'Применить',
        ],
        'labels' => [
            'name_page' => 'Метки',
            'btn_create' => 'Создать метку',
            'link_delete' => 'Удалить',
            'link_edit' => 'Изменить',
            'id' => 'ID',
            'name' => 'Имя',
            'description' => 'Описание',
            'created_at' => 'Дата создания',
            'actions' => 'Действия',
        ],
    ],
    'app_name' => 'Менеджер задач',
    'login' => 'Вход',
    'register' => 'Регистрация',
    'logout' => 'Выход',
];
