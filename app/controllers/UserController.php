<?php

class UserController extends BaseController
{
	public function adminLogin()
	{
		Auth::logout();
		if(Auth::attempt(array('email' => Input::get('email'),'password' => Input::get('password'))) && Auth::user()->power == 1)
			{
				return Redirect::intended('admin');
			}
		else
			{
				Auth::logout();
				return Redirect::to('login')->withErrors('Entered details are invalid or You may not have Admin Power');
			}

	}
	public function postRegister()
	{
		return User::register();
	}
	public function postLogin()
	{
		Auth::logout();
		$rem =false;

		if(1 == htmlentities(Input::get('rememberme')))
			$rem = true;

		if(Auth::attempt(array('email' => Input::get('email'),'password' => Input::get('password')),$rem
			))
			return 1;
		else
			return Local::get('incorrect_login');
	}
	public function postEdit()
	{ 
		$res = 0;
		if(Input::has('name'))
			$res = User::updateName(Input::get('name'));
		if(Input::has('password'))
		{
			$val = Input::get('password');
			if($val === Input::get('password_confirmation'))
				$res = User::updatePassword(Input::get('password'));
			else
				return Response::json(array(Local::get('pass_pass_confirm_mismatch')));
		}
		return $res;
	}
}