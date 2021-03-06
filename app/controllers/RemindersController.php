<?php

class RemindersController extends Controller {


	/**
	 * Handle a POST request to remind a user of their password.
	 *
	 * @return Response
	 */
	public function postRemind()
	{
		switch($response = Password::remind(Input::only('email'),function($message)
		{
			$message->subject(Config::get('settings.SiteName'));
		}))
		{
			case Password::INVALID_USER:
				return Response::json(array('message' =>Local::get('invalid_user_email'),'status' => 0));

			case Password::REMINDER_SENT:
				return Response::json(array('message' =>Local::get('reminder_sent'),'status' =>1));
		}
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function getReset($token = null)
	{
		if (is_null($token)) App::abort(404);

		return Redirect::to('/')->with('resetToken',$token);
	}

	/**
	 * Handle a POST request to reset a user's password.
	 *
	 * @return Response
	 */
	public function postReset()
	{
		$credentials = Input::only(
			'email', 'password', 'password_confirmation', 'token'
		);

		$response = Password::reset($credentials, function($user, $password)
		{
			$user->password = Hash::make($password);

			$user->save();
		});

		switch ($response)
		{
			case Password::INVALID_PASSWORD:
			case Password::INVALID_TOKEN:
			case Password::INVALID_USER:
				return Lang::get($response);

			case Password::PASSWORD_RESET:
				return 1;
		}
	}

}
