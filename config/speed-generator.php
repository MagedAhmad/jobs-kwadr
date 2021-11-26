<?php

/**
 * Speed generator
 *
 * To help generate new cruds
 */
return [

    /**
     * Supported database fields
     *
     * 'string', 'text', 'longText', 'tinyText', 'integer', 'tinyInteger',
     * 'float', 'bigInteger', 'decimal', 'double', 'date',
     * 'time', 'boolean', 'timestamp', 'timestamps'
     */
    'profile' => [
        /**
         * Set arabic translation
         *
         * Make sure to provide 4 words like the example
         */
        'arabic' => ['الملف التقديمي', 'الملفات التقديمية', 'ملف تقديمى', 'ملفات تقديمية'],
        /**
         * Database fields
         */
        'database_fields' => [
            [
                'name' => 'first_name',
                'type' => 'string',
                'lang' => [
                    'ar' => 'الاسم الأول',
                    'en' => 'First name',
                ],
                'options' => [
                ],
            ],
            [
                'name' => 'father_name',
                'type' => 'string',
                'lang' => [
                    'ar' => ' اسم الأب',
                    'en' => 'Father name',
                ],
                'options' => [
                ],
            ],
            [
                'name' => 'grandfather_name',
                'type' => 'string',
                'lang' => [
                    'ar' => ' اسم الجد',
                    'en' => 'Grandfather name',
                ],
                'options' => [
                ],
            ],
            [
                'name' => 'family_name',
                'type' => 'string',
                'lang' => [
                    'ar' => ' اسم العائلة',
                    'en' => 'Family name',
                ],
                'options' => [
                ],
            ],
            [
                'name' => 'gender',
                'type' => 'string',
                'lang' => [
                    'ar' => 'النوع',
                    'en' => 'Gender',
                ],
                'options' => [
                ],
            ],
            [
                'name' => 'id_number',
                'type' => 'string',
                'lang' => [
                    'ar' => 'رقم بطاقة الأحوال',
                    'en' => 'ID number',
                ],
                'options' => [
                ],
            ],
            [
                'name' => 'social_security_number',
                'type' => 'string',
                'lang' => [
                    'ar' => 'رقم الضمان الإجتماعى',
                    'en' => 'Social security number',
                ],
                'options' => [
                ],
            ],
            [
                'name' => 'phone',
                'type' => 'string',
                'lang' => [
                    'ar' => 'رقم الجوال',
                    'en' => 'Phone',
                ],
                'options' => [
                ],
            ],
            [
                'name' => 'email',
                'type' => 'string',
                'lang' => [
                    'ar' => 'البريد الإلكترونى',
                    'en' => 'email',
                ],
                'options' => [
                    'unique' => ''
                ],
            ],
            [
                'name' => 'has_disability',
                'type' => 'boolean',
                'lang' => [
                    'ar' => 'لديه إعاقة',
                    'en' => 'Has disability',
                ],
                'options' => [
                ],
            ],
            [
                'name' => 'has_driving_license',
                'type' => 'boolean',
                'lang' => [
                    'ar' => 'لديه رخصه قيادة',
                    'en' => 'Has Driving license',
                ],
                'options' => [
                ],
            ],

            // age
            // id_numb
        ],

        /**
         * Make active equal to true if you want to add translation fields
         * then add translatable fields
         */
        'translatable' => [
            'active' => false,
            'translatable_fields' => [

            ],
        ],
    ],
    'martial' => [
        /**
         * Set arabic translation
         *
         * Make sure to provide 4 words like the example
         */
        'arabic' => ['الحالة الإجتماعية', 'الحالات الإجتماعية', 'حالة إجتماعية ', 'الحالة الإجتماعية'],
        /**
         * Database fields
         */
        'database_fields' => [

        ],

        /**
         * Make active equal to true if you want to add translation fields
         * then add translatable fields
         */
        'translatable' => [
            'active' => true,
            'translatable_fields' => [
                [
                    'name' => 'name',
                    'type' => 'string',
                    'lang' => [
                        'ar' => 'اسم الحالة الاجتماعية',
                        'en' => 'martial name',
                    ],
                    'options' => [
                    ],
                ],
            ],
        ],
    ],
    'education' => [
        /**
         * Set arabic translation
         *
         * Make sure to provide 4 words like the example
         */
        'arabic' => ['المؤهل التعليمى', 'المؤهلات التعليمية', 'مؤهل تعليمى', 'مؤهلات تعليمية'],
        /**
         * Database fields
         */
        'database_fields' => [

        ],

        /**
         * Make active equal to true if you want to add translation fields
     * then add translatable fields
         */
        'translatable' => [
            'active' => true,
            'translatable_fields' => [
                [
                    'name' => 'name',
                    'type' => 'string',
                    'lang' => [
                        'ar' => 'اسم المؤهل التعليمى',
                        'en' => 'Education',
                    ],
                    'options' => [
                    ],
                ],
            ],
        ],
    ],
    'job_type' => [
        /**
         * Set arabic translation
         *
         * Make sure to provide 4 words like the example
         */
        'arabic' => ['تفضيلات العمل ', 'تفضيلات العمل', 'تفضيل العمل', 'تفضيل العمل'],
        /**
         * Database fields
         */
        'database_fields' => [

        ],

        /**
         * Make active equal to true if you want to add translation fields
     * then add translatable fields
         */
        'translatable' => [
            'active' => true,
            'translatable_fields' => [
                [
                    'name' => 'name',
                    'type' => 'string',
                    'lang' => [
                        'ar' => 'اسم تفضيل العمل',
                        'en' => 'Job type',
                    ],
                    'options' => [
                    ],
                ],
            ],
        ],
    ],
    'job_field' => [
        /**
         * Set arabic translation
         *
         * Make sure to provide 4 words like the example
         */
        'arabic' => ['مجالات العمل ', 'مجالات العمل', 'مجال العمل', 'مجال العمل'],
        /**
         * Database fields
         */
        'database_fields' => [

        ],

        /**
         * Make active equal to true if you want to add translation fields
     * then add translatable fields
         */
        'translatable' => [
            'active' => true,
            'translatable_fields' => [
                [
                    'name' => 'name',
                    'type' => 'string',
                    'lang' => [
                        'ar' => 'اسم مجال العمل',
                        'en' => 'Job Field',
                    ],
                    'options' => [
                    ],
                ],
            ],
        ],
    ],
    'skill' => [
        /**
         * Set arabic translation
         *
         * Make sure to provide 4 words like the example
         */
        'arabic' => ['المهارة', 'المهارات', 'مهارة', 'مهارات'],
        /**
         * Database fields
         */
        'database_fields' => [

        ],

        /**
         * Make active equal to true if you want to add translation fields
     * then add translatable fields
         */
        'translatable' => [
            'active' => true,
            'translatable_fields' => [
                [
                    'name' => 'name',
                    'type' => 'string',
                    'lang' => [
                        'ar' => 'اسم المهارة ',
                        'en' => 'Skill',
                    ],
                    'options' => [
                    ],
                ],
            ],
        ],
    ],
    'employer' => [
        /**
         * Set arabic translation
         *
         * Make sure to provide 4 words like the example
         */
        'arabic' => ['جهة العمل', 'جهات العمل', 'جهة العمل', 'جهة العمل'],
        /**
         * Database fields
         */
        'database_fields' => [

        ],

        /**
         * Make active equal to true if you want to add translation fields
         * then add translatable fields
         */
        'translatable' => [
            'active' => true,
            'translatable_fields' => [
                [
                    'name' => 'name',
                    'type' => 'string',
                    'lang' => [
                        'ar' => 'اسم جهة العمل ',
                        'en' => 'Employer',
                    ],
                    'options' => [
                    ],
                ],
            ],
        ],
    ],
    'supporter' => [
        /**
         * Set arabic translation
         *
         * Make sure to provide 4 words like the example
         */
        'arabic' => ['مصدر الدعم ', 'مصادر الدعم', 'مصدر الدعم', 'مصدر الدعم'],
        /**
         * Database fields
         */
        'database_fields' => [

        ],

        /**
         * Make active equal to true if you want to add translation fields
         * then add translatable fields
         */
        'translatable' => [
            'active' => true,
            'translatable_fields' => [
                [
                    'name' => 'name',
                    'type' => 'string',
                    'lang' => [
                        'ar' => 'اسم مصدر الدعم  ',
                        'en' => 'Supporter',
                    ],
                    'options' => [
                    ],
                ],
            ],
        ],
    ],
    'training_type' => [
        /**
         * Set arabic translation
         *
         * Make sure to provide 4 words like the example
         */
        'arabic' => ['نوع التدريب', 'نوع التدريب', 'نوع التدريب', 'نوع التدريب'],
        /**
         * Database fields
         */
        'database_fields' => [

        ],

        /**
         * Make active equal to true if you want to add translation fields
         * then add translatable fields
         */
        'translatable' => [
            'active' => true,
            'translatable_fields' => [
                [
                    'name' => 'name',
                    'type' => 'string',
                    'lang' => [
                        'ar' => 'اسم نوع التدريب   ',
                        'en' => 'Training type',
                    ],
                    'options' => [
                    ],
                ],
            ],
        ],
    ],
];
