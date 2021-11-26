<?php

return [
    'singular' => 'Supporter',
    'plural' => 'Supporters',
    'empty' => 'There are no supporters yet.',
    'count' => 'Supporters Count.',
    'search' => 'Search',
    'select' => 'Select Supporter',
    'permission' => 'Manage supporters',
    'trashed' => 'supporters Trashed',
    'perPage' => 'Results Per Page',
    'filter' => 'Search for supporter',
    'actions' => [
        'list' => 'List All',
        'create' => 'Create a new supporter',
        'show' => 'Show supporter',
        'edit' => 'Edit supporter',
        'delete' => 'Delete supporter',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The supporter has been created successfully.',
        'updated' => 'The supporter has been updated successfully.',
        'deleted' => 'The supporter has been deleted successfully.',
        'restored' => 'The supporter has been restored successfully.',
    ],
    'attributes' => [
        'name' => 'Supporter name',
        '%name%' => 'Supporter name',
        
            "name" => "Supporter",
            "%name%" => "Supporter",
        'created_at' => 'Created At',
        'deleted_at' => 'Deleted At',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the supporter?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'restore' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to restore the supporter?',
            'confirm' => 'Restore',
            'cancel' => 'Cancel',
        ],
        'forceDelete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to force delete the supporter?',
            'confirm' => 'Force',
            'cancel' => 'Cancel',
        ],
    ],
];
