<?php

return [
    'singular' => 'Profile',
    'plural' => 'Profiles',
    'empty' => 'There are no profiles yet.',
    'count' => 'Profiles Count.',
    'search' => 'Search',
    'select' => 'Select Profile',
    'permission' => 'Manage profiles',
    'trashed' => 'profiles Trashed',
    'perPage' => 'Results Per Page',
    'filter' => 'Search for profile',
    'actions' => [
        'list' => 'List All',
        'create' => 'Create a new profile',
        'show' => 'Show profile',
        'edit' => 'Edit profile',
        'delete' => 'Delete profile',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The profile has been created successfully.',
        'updated' => 'The profile has been updated successfully.',
        'deleted' => 'The profile has been deleted successfully.',
        'restored' => 'The profile has been restored successfully.',
    ],
    'attributes' => [
        'image' => 'Profile image',
        "first_name" => "First name",
        "father_name" => "Father name",
        "grandfather_name" => "Grandfather name",
        "family_name" => "Family name",
        "gender" => "Gender",
        "id_number" => "ID number",
        "social_security_number" => "Social security number",
        "social_security_number" => "Social security number",
        "phone" => "Phone",
        "email" => "email",
        "has_disability" => "Has disability",
        "has_driving_license" => "Has Driving license",
        'country_id' => 'Nationality',
        'created_at' => 'Created At',
        'deleted_at' => 'Deleted At',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the profile?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'restore' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to restore the profile?',
            'confirm' => 'Restore',
            'cancel' => 'Cancel',
        ],
        'forceDelete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to force delete the profile?',
            'confirm' => 'Force',
            'cancel' => 'Cancel',
        ],
    ],
    'gender' => [
        App\Models\Profile::MALE => 'Male',
        App\Models\Profile::FEMALE => 'Female',
    ],
];
