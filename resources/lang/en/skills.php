<?php

return [
    'singular' => 'Skill',
    'plural' => 'Skills',
    'empty' => 'There are no skills yet.',
    'count' => 'Skills Count.',
    'search' => 'Search',
    'select' => 'Select Skill',
    'permission' => 'Manage skills',
    'trashed' => 'skills Trashed',
    'perPage' => 'Results Per Page',
    'filter' => 'Search for skill',
    'actions' => [
        'list' => 'List All',
        'create' => 'Create a new skill',
        'show' => 'Show skill',
        'edit' => 'Edit skill',
        'delete' => 'Delete skill',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The skill has been created successfully.',
        'updated' => 'The skill has been updated successfully.',
        'deleted' => 'The skill has been deleted successfully.',
        'restored' => 'The skill has been restored successfully.',
    ],
    'attributes' => [
        'name' => 'Skill name',
        '%name%' => 'Skill name',
        
            "name" => "Skill",
            "%name%" => "Skill",
        'created_at' => 'Created At',
        'deleted_at' => 'Deleted At',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the skill?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'restore' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to restore the skill?',
            'confirm' => 'Restore',
            'cancel' => 'Cancel',
        ],
        'forceDelete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to force delete the skill?',
            'confirm' => 'Force',
            'cancel' => 'Cancel',
        ],
    ],
];
