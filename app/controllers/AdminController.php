<?php

class AdminController extends BaseController{

    public function __construct()
    {
        $this->beforeFilter('adminAuth');
    }
    public function getIndex(){

         return View::make('admin.home')->withUser(Auth::user());
    }
    public function getSettings(){

            return View::make('admin.settings');
    }
    public function postSettings(){

            return $this->updateSettings();
    }
    public function getLocal()
    {
        return View::make('admin.local');
    }
    public function postLocal()
    {
        $data = Local::all();
        foreach ($data as $key => $value) {
            if(Input::has($key))
                $data[$key] = Input::get($key);
        }
        Local::update($data);
        return Redirect::action('AdminController@getLocal')->withMessage('Successfully Updated!');
    }
    public function getProfile(){

        $user = Auth::user();

            return View::make('admin.adminprofile')->withUser($user);
    }
    public function postProfile(){
            return $this->updateProfile();
    }
    public function getDeletesnippet()
    {
        if(Input::has('id'))
            Snipper::delete(Input::get('id'));
    }
    public function getChkupdate(){

        $ver = file_get_contents('http://codlax.com/vheck.php');
        if ($ver > Config::get('script.version')) {
            $vers = Config::get('script');
            
            $update = "<?php 
            return array(
                'version' => '" . $vers['version'] . "',
                'info' => '" . $vers['info'] . "',
                'lastCheck' => '" . date("l jS \of F Y h:i:s A") . " [UTC]',
                'outdated' => true
                ) 
            ?>";
            file_put_contents(app_path() . '/config/script.php', $update);
        } else {
            $vers = Config::get('script');
            
            $update = "<?php 
            return array(
                'version' => '$ver',
                'info' => '" . $vers['info'] . "',
                'lastCheck' => '" . date("l jS \of F Y h:i:s A") . "[UTC]',
                'outdated' =>  false
                ) 
            ?>";
            file_put_contents(app_path() . '/config/script.php', $update);
            
        }
        return Redirect::to('admin');
    }
    public function getSnippetslist()
    {
        return View::make('admin.snippets');
    }
    public function getSnippets()
    {
        return Snipper::getTables(array('id','title','category','public'),'snippets');
    }
    private function updateSettings(){

        $rules = array(
            'SiteName' => 'required',
            'disqus' => 'required',
            'Url' => 'required',
            'snippetTitle' => 'required',
            'title' => 'required|min:5'
        );
        
        $validator = Validator::make(Input::all(), $rules);
        
        if ($validator->fails())
            return Redirect::to('admin/settings')->withErrors($validator);
        
        DB::table('config')->where('key','SiteName')->update(
            array(
                'value' => Input::get('SiteName')
                ));
        DB::table('config')->where('key','disqus')->update(array('value'   => Input::get('disqus')));
        DB::table('config')->where('key','Url')->update(array('value'      => Input::get('Url')));
        DB::table('config')->where('key','snippetTitle')->update(array('value'      => Input::get('snippetTitle')));
        DB::table('config')->where('key','adsense')->update(array('value'      => htmlentities(Input::get('adsense'))));
        DB::table('config')->where('key','title')->update(array('value'      => Input::get('title')));
        DB::table('config')->where('key','googleanalystics')->update(array('value'      => Input::get('googleanalystics')));
        DB::table('config')->where('key','homedesc')->update(array('value'      => Input::get('homedesc')));
        DB::table('config')->where('key','homeviewDesc')->update(array('value'      => Input::get('homeviewDesc')));
        DB::table('config')->where('key','copyright')->update(array('value'      => Input::get('copyright')));
        DB::table('config')->where('key','inlineAds')->update(array('value'      => Input::get('inlineAds')));
        DB::table('config')->where('key','socialButtons')->update(array('value'      => Input::get('socialButtons')));
        DB::table('config')->where('key','snippetsNewestfirst')->update(array('value'      => Input::get('snippetsNewestfirst')));
            

  //       $update = "<?php 
  //       return array(

        //  'SiteName' => '" . Input::get('SiteName') . "',

        //  'disqus'  => '" . Input::get('disqus') . "',

        //  'Url' => '" . Input::get('Url') . "',

        //  'adsense' => '" . Input::get('adsense') . "',

        //  'snippetTitle' => '" . Input::get('snippetTitle') . "',
        //  'title' => '" . Input::get('title') . "',
        //  'googleanalystics' => '" . Input::get('googleanalystics') . "',
        //  'homedesc' => '" . Input::get('homedesc') . "',
        //  'homeviewDesc' => '" . Input::get('homeviewDesc') . "',
        //  'copyright' => '" . Input::get('copyright') . "',
        //  'inlineAds' => '" . Input::get('inlineAds') . "',


         
        //  ) 
        // ";
        
  //       file_put_contents(app_path() . '/config/settings.php', $update);
        
  //       if (Input::hasFile('logo')) {
  //           $mes = $this->upload();
  //           if ($mes == false)
  //               return Redirect::to('admin/settings')->withErrors(array(
  //                   'Error in uploading file. Please ensure it is in correct format and size'
  //               ));
  //       }
        
        return View::make('admin.settings')->with('message', 'Successfully Updated !');
    }
    public function upload(){
        $valid_exts = array(
            'jpeg',
            'jpg',
            'png',
            'gif'
        ); // valid extensions
        
        $max_size = 100000 * 1024; // max file size (200kb)
        
        $path = public_path() . '/images/'; // upload directory
        
        $fileName = NULL;
        
        $file = Input::file('logo');
        
        // move uploaded file from temp to uploads directory
        if ($file->move($path, 'logo.png')) {
            return true;
        } else {
            return false;
        }
        
    }
    public function updateProfile(){
        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        );
        
        $validator = Validator::make(Input::all(), $rules);
        
        if ($validator->fails())
            return Redirect::to('admin/profile')->withErrors($validator);
        
        $user           = Auth::user();
        $user->name     = Input::get('name');
        $user->password = Hash::make(Input::get('password'));
        $user->email    = Input::get('email');
        $user->save();
        
        return View::make('admin.adminprofile')->with('message', 'Successfully Updated !')->withUser($user);
        
    }
}
?>