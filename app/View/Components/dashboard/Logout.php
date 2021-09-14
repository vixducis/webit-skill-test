<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class Logout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Returns a string with some information about the authenticated user.
     * Format is "name <email>"
     */
    public function getIdentifierString(): string|null
    {
        $user = auth()->user();
        return $user === null 
            ? null
            : $user->name.' <'.$user->email.'>';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.logout');
    }
}
