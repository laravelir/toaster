<?php

// config file for laravel/toaster
return [
    'style' => 'tabler',

    /**
     * enable close button
     */
    'close_btn' => true,

    /**
     * auto close modal in milliseconds
     */
    'auto_close' => 4,

    'show_confirm_button' => env('SWEET_ALERT_CONFIRM_BUTTON', true),

    'timer_progress_bar' => env('SWEET_ALERT_TIMER_PROGRESS_BAR', false),


    /**
     * position: center , 'top-start', 'top-end', 'center', 'center-start', 'top' 'center-end', 'bottom', 'bottom-start', or 'bottom-end'
     */
    'toast' => [
        'width' => '30rem',
        'direction' => 'rtl',

        'position' => 'center'
    ],

    /**
     * default animation for modals
     * uses animate.css
     */
    'animations' => [
        'enabled' => true,
        'animation' => '',
    ],

    /** custom styles */
    'styles' => []
];
