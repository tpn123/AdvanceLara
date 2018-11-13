<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
class ResetPasswordController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Password Reset Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling password reset requests
	| and uses a simple trait to include this behavior. You're free to
	| explore this trait and override any methods you wish to tweak.
	|
	*/
	use ResetsPasswords;
	/**
	 * Where to redirect users after resetting their password.
	 *
	 * @var string
	 */
	protected $redirectTo = 'admin/home';
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest:admin');
	}
	//defining which password broker to use, in our case its the admins
	protected function guard()
	{
		return Auth::guard('admin');
	}

	//defining which guard to use in our case, it's the admin guard
	protected function broker() {
		return Password::broker('admins');
	}

	public function showResetForm(Request $request, $token = null)
	{
		return view('admin.passwords.reset')->with(
			['token' => $token, 'email' => $request->email]
		);
	}
}