<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        if ($request->user()->hasVerifiedEmail()) {
            // return redirect()->intended(route('dashboard', absolute: false));
            if(auth()->user()->role){
                return redirect()->intended(route('admin.dashboard', absolute: false));
            }else{
                return redirect()->intended(route('user.dashboard', absolute: false));
            }
        } else {
            return view('auth.verify-email');
        }

        // return $request->user()->hasVerifiedEmail()
        //             ? redirect()->intended(route('dashboard', absolute: false))
        //             : view('auth.verify-email');
    }
}
