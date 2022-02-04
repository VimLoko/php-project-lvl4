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
        ],
        'edit_task_form' => [
            'form_name' => 'Changing a task',
            'name' => 'Name',
            'description' => 'Description',
            'status' => 'Status',
            'assigned_to' => 'Executor',
            'btn_update' => 'Update',
        ],
        'add_task_form' => [
            'form_name' => 'Create task',
            'name' => 'Name',
            'description' => 'Description',
            'status' => 'Status',
            'assigned_to' => 'Executor',
            'labels' => 'Labels',
            'btn_create' => 'Create',
        ],
        'view_task_form' => [
            'form_name' => 'Task view',
            'name' => 'Name',
            'status' => 'Status',
            'description' => 'Description',
            'labels' => 'Labels',
        ],
        'add_label_form' => [
            'form_name' => 'Create label',
            'name' => 'Name',
            'description' => 'Description',
            'btn_create' => 'Create',
        ],
        'edit_label_form' => [
            'form_name' => 'Edit label',
            'name' => 'Name',
            'description' => 'Description',
            'btn_update' => 'Update',
        ],
    ],
    'messages' => [
        'add_status_form_success' => 'Status added successfully',
        'add_status_form_error' => 'Failed to add status',
        'edit_status_form_success' => 'Status updated successfully',
        'edit_status_form_error' => 'Failed to update status',
        'delete_status_form_success' => 'Status deleted successfully',
        'delete_status_form_error' => 'Failed to delete status',
        'add_task_form_success' => 'Task created successfully',
        'add_task_form_error' => 'Failed to add task',
        'edit_task_form_success' => 'Task updated successfully',
        'edit_task_form_error' => 'Failed to update task',
        'delete_task_form_success' => 'Task deleted successfully',
        'delete_task_form_error' => 'Failed to delete status',
        'delete_question' => 'Are you sure?',
    ],
    'menu' => [
        'task_statuses' => 'Statuses',
        'tasks' => 'Tasks'
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
