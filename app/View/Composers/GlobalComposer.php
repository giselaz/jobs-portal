<?php

// app/View/Composers/NavbarComposer.php

namespace App\View\Composers;

use Illuminate\View\View;

class GlobalComposer
{
    public function compose(View $view): void
    {
        $user = request()->user();

        $view->with([
            'isEmployer'      => $user?->employer !== null,
            'isCandidate'     => $user?->employer == null,
            'isAuthenticated' => $user !== null,
            'authUser'        => $user,
        ]);
    }
}
