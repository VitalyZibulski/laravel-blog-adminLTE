<?php

namespace App\Http\Controllers;

use App\Mail\SubscribeEmail;


use Illuminate\Http\Request;
use App\Subscription;

class SubsController extends Controller
{
    public function subscribe(Request $request)
        {
            $this->validate($request, [
                'email' => 'required|email|unique:subscriptions'
            ]);

            $subs = Subscription::add($request->get('email'));
            \Mail::to($subs)->send(new SubscribeEmail($subs));

            return redirect()->back()->with('status', 'Проверьте Вашу почту');
        }

        public function verify($token)
        {
        $subs = Subscription::where('token', $token)->firstOrFail();
        $subs->token = null;
        $subs->save();

        return redirect('/')->with('status', 'Ваша почта подтверждена');
        }

}
