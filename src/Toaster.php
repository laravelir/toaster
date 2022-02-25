<?php

namespace Laravelir\Toaster;

use Illuminate\Support\Facades\Session;

class Toaster
{
    private $options;

    private $session;

    private $toasts = [];

    private $levels = ['success', 'error', 'warning', 'info', 'default', 'primary'];

    public function __construct()
    {
        $this->options = $this->setOptions();
        $this->session = resolve(Session::class);
    }

    private function setOptions()
    {
        return [];
    }

    public function toast(string $type = 'alert', string $title = '', string $message = '', string $level = '', array $options = [])
    {
        //
    }

    protected function addToast()
    {
        array_push($this->toast, []);
        $this->session->flush();
    }

    private function clear()
    {
        $this->toasts = [];
        $this->session->clear();
        return $this;
    }
}
