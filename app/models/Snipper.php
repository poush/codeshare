<?php

class Snipper{

	public static function getTitle(){
		if(Request::path() !== '/')
			return self::snipTitle(Request::path());
		else
			return Config::get('settings.title');
	}
	public static function snipTitle($str){

		$str = str_replace('{Snippet}', DB::table('snippets')->where('slug',$str)->pluck('title'), Config::get('settings.snippetTitle'));
		return str_replace('{SiteName}', Config::get('settings.SiteName'), $str);
	}
	public static function addView($slug){

		DB::table('snippets')->where('slug',$slug)->update(array('views' => DB::raw('views + 1')));
	}
	public static function addSnippet($slug){
		$author = Auth::check()?Auth::user()->id:0;
		if(DB::table('snippets')->insert(array('title' => htmlentities(Input::get('title')),'description' => htmlentities(Input::get('description')),'code'=> htmlentities(Input::get('code')),'authorId'=>0,'category'=>htmlentities(Input::get('lang')),'slug'=>$slug,'authorId' => $author,'public'=>htmlentities(Input::get('type')),'created_at' => Carbon\Carbon::now())))
			return true;
		else
			return false;
	}
	public static function showSnippets($user = false)
	{

		if($user==true && Auth::check())
			return DB::table('snippets')->where('authorId',Auth::user()->id)->orderBy('created_at',(1==Config::get('settings.snippetsNewestfirst'))?'desc':'asc')->paginate('10');
		else
			return DB::table('snippets')->where('public',1)->orderBy('created_at',(1==Config::get('settings.snippetsNewestfirst'))?'desc':'asc')->paginate('10');
	}
	public static function search($q){
		return DB::table('snippets')->select('title','slug','category')->where('public',1)->where('title','LIKE','%'.$q.'%')->get();
	}
	public static function totalViews(){
		return @(DB::select('select sum(views) as sum from snippets')[0]->sum);
	}
	public static function totalSnippets(){
		return @DB::select('select count(*) as c from snippets')[0]->c;
	}
	public static function highestView(){
		return @DB::select('select title,slug from snippets order by views LIMIT 1')[0]->title;
	}
	public static function getSnippet($q){
		self::addView($q);
		return DB::table('snippets')->where('slug',$q)->first();
	}
	public static function countSnippetsfromSlug($s){
		return (DB::select("select count(*) as c from snippets where slug = '$s'")[0]->c);
	}
	public static function userSnippets($user)
	{
		return DB::table('snippets')->where('authorId',$user)->where('public','1')->orderBy('created_at',(1==Config::get('settings.snippetsNewestfirst'))?'desc':'asc')->paginate(10);
	} 
	public static function delete($id)
	{
		return DB::table('snippets')->where('id',$id)->delete();
	}   
	public static function getTables($columns,$table)
    {
    	
    	$aColumns = $columns;
	
		/* Indexed column (used for fast and accurate table cardinality) */
		$sIndexColumn = "id";
	
		/* DB table to use */
		$sTable = $table;


        /* 
         * Paging
         */
        $sLimit = "";
        if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
            $sLimit = "LIMIT " . intval($_GET['iDisplayStart']) . ", " . intval($_GET['iDisplayLength']);
        }
        
        
        /*
         * Ordering
         */
        $sOrder = "";
        if (isset($_GET['iSortCol_0'])) {
            $sOrder = "ORDER BY  ";
            for ($i = 0; $i < intval($_GET['iSortingCols']); $i++) {
                if ($_GET['bSortable_' . intval($_GET['iSortCol_' . $i])] == "true") {
                    $sOrder .= "`" . $aColumns[intval($_GET['iSortCol_' . $i])] . "` " . ($_GET['sSortDir_' . $i] === 'asc' ? 'asc' : 'desc') . ", ";
                }
            }
            
            $sOrder = substr_replace($sOrder, "", -2);
            if ($sOrder == "ORDER BY") {
                $sOrder = "";
            }
        }
        
        
        $sWhere = "";
        if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
            $sWhere = "WHERE (";
            for ($i = 0; $i < count($aColumns); $i++) {
                $sWhere .= "`" . $aColumns[$i] . "` LIKE '%" . $_GET['sSearch']. "%' OR ";
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ')';
        }
        
        /* Individual column filtering */
        for ($i = 0; $i < count($aColumns); $i++) {
            if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true" && $_GET['sSearch_' . $i] != '') {
                if ($sWhere == "") {
                    $sWhere = "WHERE ";
                } else {
                    $sWhere .= " AND ";
                }
                $sWhere .= "`" . $aColumns[$i] . "` LIKE '%" . $_GET['sSearch_' . $i] . "%' ";
            }
        }
        
        
        /*
         * SQL queries
         * Get data to display
         */
        $sQuery = "
			SELECT SQL_CALC_FOUND_ROWS `" . str_replace(" , ", " ", implode("`, `", $aColumns)) . "`
			FROM   $sTable
			$sWhere
			$sOrder
			$sLimit
			";

        $rResult = DB::select($sQuery);
        
        /* Data set length after filtering */
        $sQuery = "
			SELECT FOUND_ROWS() as found
		";
        $aResultFilterTotal = DB::select($sQuery);
        $iFilteredTotal     = $aResultFilterTotal[0]->found;
        
        /* Total data set length */
        $sQuery = "
			SELECT COUNT(`" . $sIndexColumn . "`) as count
			FROM   $sTable
		";
        $aResultTotal = DB::select($sQuery);
        $iTotal       = $aResultTotal[0]->count;
        
        
        /*
         * Output
         */
        $output = array(
            "sEcho" => @intval($_GET['sEcho']),
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );
        
        foreach($rResult as $aRow) {
            $row = array();
            for ($i = 0; $i < count($aColumns); $i++) {
                if ($aColumns[$i] == "version") {
                    /* Special output formatting for 'version' column */
                    $row[] = ($aRow[$aColumns[$i]] == "0") ? '-' : $aRow[$aColumns[$i]];
                } else if ($aColumns[$i] != ' ') {
                    /* General output */
                    $row[] = $aRow->$aColumns[$i];
                }

            }

            $output['aaData'][] = $row;
        }
        return json_encode($output);
    }
}