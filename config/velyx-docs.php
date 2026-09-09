<?php

declare(strict_types=1);

return [
    'site_name' => 'Velyx',
    'site_description' => 'Laravel-first UI components you can copy, adapt, and ship without losing control of your codebase.',

    'github_repo' => 'velyx-labs/velyx',

    'links' => [
        'github' => 'https://github.com/velyx-labs/velyx',
        'twitter' => 'https://x.com/velyxdev',
        'support' => 'https://gvcjmaad.mychariow.shop/velyx-dev',
    ],

    'navigation' => [
        'Getting Started' => [
            'url' => 'docs/installation',
            'children' => [
                'Quick Start' => 'docs/quick-start',
                'CLI Reference' => 'docs/cli-reference',
                'Configuration' => 'docs/configuration',
            ],
        ],
        'Components' => [
            'url' => 'docs/components',
            'children' => [
                'Accordion' => 'docs/components/accordion',
                'Alert' => 'docs/components/alert',
                'Avatar' => 'docs/components/avatar',
                'Avatar Group' => 'docs/components/avatar-group',
                'Badge' => 'docs/components/badge',
                'Breadcrumbs' => 'docs/components/breadcrumbs',
                'Button' => 'docs/components/button',
                'Card' => 'docs/components/card',
                'Checkbox' => 'docs/components/checkbox',
                'Command Palette' => 'docs/components/command-palette',
                'Date Picker' => 'docs/components/date-picker',
                'Dialog' => 'docs/components/dialog',
                'Drawer' => 'docs/components/drawer',
                'Dropdown Menu' => 'docs/components/dropdown-menu',
                'Empty' => 'docs/components/empty',
                'Field' => 'docs/components/field',
                'File Upload' => 'docs/components/file-upload',
                'Input' => 'docs/components/input',
                'KBD' => 'docs/components/kbd',
                'Label' => 'docs/components/label',
                'Markdown Viewer' => 'docs/components/markdown-viewer',
                'Popover' => 'docs/components/popover',
                'Progress Bar' => 'docs/components/progress-bar',
                'Progress Steps' => 'docs/components/progress-steps',
                'Range Slider' => 'docs/components/range-slider',
                'Rating' => 'docs/components/rating',
                'Separator' => 'docs/components/separator',
                'Skeleton' => 'docs/components/skeleton',
                'Sortable List' => 'docs/components/sortable-list',
                'Stepper' => 'docs/components/stepper',
                'Table' => 'docs/components/table',
                'Tabs' => 'docs/components/tabs',
                'Timeline' => 'docs/components/timeline',
                'Toast' => 'docs/components/toast',
                'Toggle' => 'docs/components/toggle',
                'Tooltip' => 'docs/components/tooltip',
            ],
        ],
        'Design' => [
            'url' => 'docs/theming',
            'children' => [
                'Colors' => 'docs/design/colors',
                'Typography' => 'docs/design/typography',
                'Spacing' => 'docs/design/spacing',
            ],
        ],
    ],
];
