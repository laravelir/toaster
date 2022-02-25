<?php

if (!function_exists('toaster')) {
    function toaster(string $title = '', string $message = '', string $level = 'info', array $options = [])
    {
        $toaster = app('toaster');
        return $toaster->toast();
    }
}
