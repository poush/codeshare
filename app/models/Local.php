<?php

class Local
{
	public static $lang = '';

	public static function get($index)
	{
		if(!isset($lang))
		{
			$lang = DB::table('local')->get();
			foreach($lang as $value) {
				self::$lang[$value->name] = $value->value;
			}

		}

		return self::$lang[$index];
	}
	public static function all()
	{
		if(self::$lang == '')
			self::get('search');
		return self::$lang;
	}
	public static function update($data)
	{
		foreach ($data as $key => $value) {
			DB::table('local')->where('name',$key)->update(array('value' => $value));
		}
		$lang = '';
	}
}