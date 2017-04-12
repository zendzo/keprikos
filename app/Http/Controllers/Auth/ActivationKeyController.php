<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ActivationKey;
use App\Traits\ActivationKeyTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class ActivationKeyController extends Controller
{
	use ActivationKeyTrait;

	public function __construct()
	{
		$this->middleware('guest');

    }

    protected function validator(array $data)
    {

        $validator = Validator::make($data,
            [
                'email'                 => 'required|email',
            ],
            [
                'email.required'        => 'Email is required',
                'email.email'           => 'Email is invalid',
            ]
        );

        return $validator;

    }

    public function showKeyResendForm()
    {
        return view('auth.resend_key');
    }

    public function activateKey($activation_key)
    {
        // determine if the user is logged-in already
        if (Auth::check()) {
            if (auth()->user()->activated) {

                return redirect()->route('admin.dashboard')
                    ->with('message', 'Email Anda Sudah Aktif!.')
                    ->with('status', 'success');
            }

        }

        // get the activation key and chck if its valid
        $activationKey = ActivationKey::where('activation_key', $activation_key)
            ->first();

        if (empty($activationKey)) {

            return redirect()->route('front.home')
                ->with('message', 'Kode aktivasi yang tersedia tampaknya tidak valid')
                ->with('status', 'warning');

        }
        // process the activation key we're received
        $this->processActivationKey($activationKey);

        // redirect to the login page after a successful activation
        return redirect()->route('login')
            ->with('message', 'Anda berhasil mengaktivasi email Anda! Sekarang Anda dapat Login!')
            ->with('status', 'success');


    }

    public function resendKey(Request $request)
    {

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $email      = $request->get('email');

        // get the user associated to this activation key
        $user = User::where('email', $email)
            ->first();

        if (empty($user)) {
            return redirect()->route('activation_key_resend')
                ->with('message', 'Kami tidak dapat menemukan email ini di sistem kami')
                ->with('status', 'warning');
        }

        if ($user->activated) {
            return redirect()->route('login')
                ->with('message', 'Alamat email ini sudah diaktifkan!')
                ->with('status', 'success');
        }

        // queue up another activation email for the user
        $this->queueActivationKeyNotification($user);

        return redirect()->route('front.home')
            ->with('message', 'Email aktivasi telah dikirim kembali.')
            ->with('status', 'success');
    }
}
