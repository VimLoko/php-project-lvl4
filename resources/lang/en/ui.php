<?php

return [
    'forms' => [
        'register_form' => [
            'form_name' => 'Register',
            'name' => 'Name',
            'email' => 'E-Mail Address',
            'password' => 'Password',
            'confirm_password' => 'Confirm Password',
            'btn_reg' => 'Register'
        ],
        'login_form' => [
            'form_name' => 'Login',
            'email' => 'E-Mail Address',
            'password' => 'Password',
            'checkbox_remember' => 'Remember Me',
            'btn_login' => 'Login',
            'link_remember' => 'Forgot Your Password?',
        ],
        'add_status_form' => [
            'form_name' => 'Create status',
            'name' => 'Name',
            'btn_create' => 'Create',
        ],
        'edit_status_form' => [
            'form_name' => 'Edit status',
            'name' => 'Name',
            'btn_update' => 'Edit',
        ]
    ],
    'messages' => [
        'add_status_form_success' => 'Status added successfully',
        'add_status_form_error' => 'Failed to add status',
        'edit_status_form_success' => 'Status updated successfully',
        'edit_status_form_error' => 'Failed to update status',
        'delete_status_form_success' => 'Status deleted successfully',
        'delete_status_form_error' => 'Failed to delete status',
        'delete_question' => 'Are you sure?',
    ],
    'menu' => [
        'task_statuses' => 'Statuses'
    ],
    'pages' => [
        'task_statuses' => [
            'name_page' => 'Status',
            'btn_create' => 'Create status',
            'link_delete' => 'delete',
            'link_edit' => 'edit',
            'id' => 'ID',
            'name' => 'Name',
            'created_at' => 'Created at',
            'actions' => 'actions',
        ]
    ],
    'app_name' => 'Task manager',
    'login' => 'Login',
    'register' => 'Register',
    'logout' => 'Logout',
];
