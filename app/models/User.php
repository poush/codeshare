<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public static $rules = array(
    'name'=>'required|alpha|min:2',
    'email'=>'required|email|unique:users',
    'password'=>'required|alpha_num|min:6|confirmed',
    'password_confirmation'=>'required|alpha_num|min:6'
    );

    public static function register() {
	    $validator = Validator::make(Input::all(), User::$rules);
	 
	    if ($validator->passes()) {
			$user = new User;
		    $user->name = htmlentities(Input::get('name'));
		    $user->email = htmlentities(Input::get('email'));
		    $user->password = Hash::make(Input::get('password'));
		    $user->power = 0;
		    $user->save();

		    return 1;

	    } else {

	      	   return Response::json(User::registerationErrors($validator->messages()));
	    }
	}
	public static function registerationErrors($errors)
	{
		$toreturn = array();

			foreach ($errors->all() as $value) {
							
			if($value == 'The name may only contain letters.')
				$toreturn[]  = Local::get('name_validation');
			if($value == 'The name must be at least 2 characters.')
				$toreturn[] = Local::get('name_length');

			if($value == 'The email must be a valid email address.')
				$toreturn[]  = Local::get('email_validation');
			if($value == 'The email has already been taken.')
				$toreturn[] = Local::get('email_taken');	
			

		
			if($value == 'The password must be at least 6 characters.')
				$toreturn[] = Local::get('pass_length');
			if($value == 'The password confirmation does not match.')
				$toreturn[] = Local::get('pass_pass_confirm_mismatch');
		
			
			}
		return $toreturn;
	}
	public static function name($id)
	{
		if($id == 0)
			return 'Guest';
		else
			return User::findOrfail($id)->name;
	}
	public static function updateName($name)
	{
		$user = Auth::user();
		$user->name = htmlentities($name);
		$user->save();
		return 1;
	}
	public static function updatePassword($pass)
	{
		$user = Auth::user();
		$user->password = Hash::make($pass);
		$user->save();
		return 1;
	}
}



