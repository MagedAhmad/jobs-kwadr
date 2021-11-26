<?php

return [
    'singular' => 'Employer',
    'plural' => 'Employers',
    'empty' => 'There are no employers yet.',
    'count' => 'Employers Count.',
    'search' => 'Search',
    'select' => 'Select Employer',
    'permission' => 'Manage employers',
    'trashed' => 'employers Trashed',
    'perPage' => 'Results Per Page',
    'filter' => 'Search for employer',
    'actions' => [
        'list' => 'List All',
        'create' => 'Create a new employer',
        'show' => 'Show employer',
        'edit' => 'Edit employer',
        'delete' => 'Delete employer',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The employer has been created successfully.',
        'updated' => 'The employer has been updated successfully.',
        'deleted' => 'The employer has been deleted successfully.',
        'restored' => 'The employer has been restored successfully.',
    ],
    'attributes' => [
        'name' => 'Employer name',
        '%name%' => 'Employer name',
        
            "name" => "Employer",
            "%name%" => "Employer",
        'created_at' => 'Created At',
        'deleted_at' => 'Deleted At',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the employer?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'restore' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to restore the employer?',
            'confirm' => 'Restore',
            'cancel' => 'Cancel',
        ],
        'forceDelete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to force delete the employer?',
            'confirm' => 'Force',
            'cancel' => 'Cancel',
        ],
    ],
];
