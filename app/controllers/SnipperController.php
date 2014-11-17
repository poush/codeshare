<?php

class SnipperController extends BaseController{
	
	public function show($my = false){

		if(Input::has('fork'))
			return Redirect::to('/')->withFork(Snipper::getSnippet(Input::get('fork'))->code);
		if($my !== false)
			return View::make('front.home')->with('snippets',Snipper::showSnippets(true));	
		return View::make('front.home')->with('snippets',Snipper::showSnippets());
	}
	public function viewSnippet($query){
		if(Input::has('raw'))
			return '<pre>'.Snipper::getSnippet($query)->code.'</pre>';
		if(Input::has('print'))
			return View::make('print')->with('snippet',Snipper::getSnippet($query));
		
		return View::make('front.view')->with('snippet',Snipper::getSnippet($query));
	}
	public function search($query){
		Snipper::addView($query);
		return Response::json(Snipper::search($query));
	}
	public function create(){
		$slug = rand(0,20).chr(rand(65,122)).rand(0,20).chr(rand(65,122)).rand(0,20);

		if(Snipper::countSnippetsfromSlug($slug))
			$this->create();
		if(Snipper::addSnippet($slug))
			return $slug;
		else
			return 'error';
	}
	public function createSlug($str){
		$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $str);
		$clean = strtolower(trim($clean, '-'));
		$clean = preg_replace("/[\/_|+ -]+/", '-', $clean);

		return $clean;
	}
	public function userSnippets($id)
	{
		return View::make('front.home')->with('snippets',Snipper::userSnippets($id))->withUser(User::name($id));
	}	
}
?>