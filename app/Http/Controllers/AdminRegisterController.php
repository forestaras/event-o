<?php

namespace App\Http\Controllers;

use Session;
use Request;
use DB;
use CRUDBooster;

class AdminRegisterController extends \crocodicstudio\crudbooster\controllers\CBController
{

	public function cbInit()
	{

		# START CONFIGURATION DO NOT REMOVE THIS LINE
		$this->title_field = "id";
		$this->limit = "20";
		$this->orderby = "id,desc";
		$this->global_privilege = false;
		$this->button_table_action = true;
		$this->button_bulk_action = true;
		$this->button_action_style = "button_icon";
		$this->button_add = true;
		$this->button_edit = true;
		$this->button_delete = true;
		$this->button_detail = true;
		$this->button_show = true;
		$this->button_filter = true;
		$this->button_import = false;
		$this->button_export = false;
		$this->table = "register";
		# END CONFIGURATION DO NOT REMOVE THIS LINE

		# START COLUMNS DO NOT REMOVE THIS LINE
		$this->col = [];
		$this->col[] = ["label" => "Імя", "name" => "name"];

		# END COLUMNS DO NOT REMOVE THIS LINE

		# START FORM DO NOT REMOVE THIS LINE
		$this->form = [];
		$this->form[] = ['label' => 'Name', 'name' => 'name', 'type' => 'text', 'validation' => 'required', 'width' => 'col-sm-9'];
		$this->form[] = ['label' => 'Trener', 'name' => 'trener', 'type' => 'text', 'width' => 'col-sm-9'];
		$this->form[] = ['label' => 'Club', 'name' => 'club', 'type' => 'text', 'width' => 'col-sm-9'];
		$this->form[] = ['label' => 'Obl', 'name' => 'obl', 'type' => 'text', 'width' => 'col-sm-9'];
		$this->form[] = ['label' => 'eventid', 'name' => 'eventid', 'type' => 'text', 'width' => 'col-sm-9'];
		$this->form[] = ['label' => 'Roz', 'name' => 'roz', 'type' => 'text', 'width' => 'col-sm-9'];
		$this->form[] = ['label' => 'Si', 'name' => 'si', 'type' => 'text', 'width' => 'col-sm-9'];
		$this->form[] = ['label' => 'Rik', 'name' => 'rik', 'type' => 'text', 'width' => 'col-sm-9'];
		$this->form[] = ['label' => 'Grup', 'name' => 'grup', 'type' => 'text', 'width' => 'col-sm-9'];
		$this->form[] = ['label' => 'Dni', 'name' => 'dni', 'type' => 'text', 'width' => 'col-sm-9'];
		$this->form[] = ['label' => 'Dni', 'name' => 'peopleid', 'type' => 'text', 'width' => 'col-sm-9'];
		# END FORM DO NOT REMOVE THIS LINE

		# OLD START FORM
		//$this->form = [];
		//$this->form[] = ['label'=>'Name','name'=>'name','type'=>'text','validation'=>'required','width'=>'col-sm-9'];
		//$this->form[] = ['label'=>'Trener','name'=>'trener','type'=>'text','width'=>'col-sm-9'];
		//$this->form[] = ['label'=>'Club','name'=>'club','type'=>'text','width'=>'col-sm-9'];
		//$this->form[] = ['label'=>'Obl','name'=>'obl','type'=>'text','width'=>'col-sm-9'];
		//$this->form[] = ['label'=>'eventid','name'=>'eventid','type'=>'text','width'=>'col-sm-9'];
		# OLD END FORM

		/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
		$this->sub_module = array();


		/* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
		$this->addaction = array();


		/* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
		$this->button_selected = array();


		/* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
		$this->alert        = array();



		/* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
		$this->index_button = array();



		/* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
		$this->table_row_color = array();


		/*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
		$this->index_statistic = array();



		/*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
		$this->script_js = NULL;


		/*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
		$this->pre_index_html = null;



		/*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
		$this->post_index_html = null;



		/*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
		$this->load_js = array();



		/*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
		$this->style_css = NULL;



		/*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
		$this->load_css = array();
	}


	/*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	public function actionButtonSelected($id_selected, $button_name)
	{
		//Your code here

	}


	/*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	public function hook_query_index(&$query)
	{
		//Your code here

	}

	/*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */
	public function hook_row_index($column_index, &$column_value)
	{
		//Your code here
	}

	/*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	public function hook_before_add(&$postdata)
	{
		$postdata['userid'] = CRUDBooster::myId();  //Мій ID
		$postdata['userid'] = CRUDBooster::myId();  //Мій ID
		$club = DB::table('club')->where('title', $postdata['club'])->first();
		if (!$club->title) {
			DB::insert('insert into club (userid,title) values (?,?)', [CRUDBooster::myId(), $postdata['club']]);
		}

		$valid = DB::table('register')->where('eventid', $postdata['eventid'])->where('name', $postdata['name'])->first();
		if ($valid->name) {
			CRUDBooster::redirect($_SERVER['HTTP_REFERER'], $valid->name . " Такий користувач вже зареєстрований на даних змаганнях", "success");
		}
		$si = DB::table('register')->where('eventid', $postdata['eventid'])->where('si', $postdata['si'])->first();
		if ($si->si) {
			CRUDBooster::redirect($_SERVER['HTTP_REFERER'], $si->si . " Такий чіп вже зареєстрований на даних змаганнях", "success");
		}
	}

	/* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	public function hook_after_add($id)
	{
		$register = DB::table('register')->where('id', $id)->first();
		$club = DB::table('club')->where('title', $register->club)->first();
		$obl = DB::table('obl')->where('title', $register->obl)->first();



		if (!$register->peopleid) {
			DB::insert('insert into people (name,roz,si,rik,grup,club,trener,userid,clubid,oblid) values (?, ?,?,?,?,?,?,?,?,?)', [$register->name, $register->roz, $register->si, $register->rik, $register->grup, $register->club, $register->trener, CRUDBooster::myId(), $club->id, $obl->id]);
		}
		if ($register->peopleid) {
			DB::update("UPDATE people
				SET name='$register->name', roz='$register->roz',si='$register->si',rik='$register->rik',grup='$register->grup',club='$register->club',trener='$register->trener',clubid='$club->id',oblid='$obl->id'
				WHERE id='$register->peopleid'");
		}


		$postdata['userid'] = CRUDBooster::myId();  //Мій ID
		CRUDBooster::redirect($_SERVER['HTTP_REFERER'], "Заявку додано", "success");
	}

	/* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	public function hook_before_edit(&$postdata, $id)
	{
		//Your code here
		$register = DB::table('register')->where('id', $id)->first();
		$cms_user = DB::table('cms_users')->where('id', CRUDBooster::myId())->first();
		$club = DB::table('club')->where('id', $cms_user->clubid)->first();
		if (CRUDBooster::myId() != $register->userid and $register->clyb != $club->title and $cms_user->id_cms_privileges != 4) {
			CRUDBooster::redirect($_SERVER['HTTP_REFERER'], "Ви хочете нас наїбати!!!", "danger");
		}
	}

	/* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	public function hook_after_edit($id)
	{


		$register = DB::table('register')->where('id', $id)->first();

		if ($register->peopleid) {
			$club = DB::table('club')->where('title', $register->club)->first();
			$obl = DB::table('obl')->where('title', $register->obl)->first();
			DB::update("UPDATE people
				SET name='$register->name', roz='$register->roz',si='$register->si',rik='$register->rik',grup='$register->grup',club='$register->club',trener='$register->trener',clubid='$club->id',oblid='$obl->id'
				WHERE id='$register->peopleid'");
		}
		CRUDBooster::redirect('/admin/register/add/?&registerid=' . $register->eventid . '&show=' . $_GET['show'], "Вами було змінено реєстрацію для " . $register->name, "success");  // на сторінку з повідомленням   // на сторінку з повідомленням  // на сторінку з повідомленням 

	}

	/* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	public function hook_before_delete($id)
	{
		//Your code here

	}

	/* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	public function hook_after_delete($id)
	{
		//Your code here

	}



	//By the way, you can still create your own method in here... :) 

	public function getAdd($id = 0)
	{
		//Create an Auth
		if (!CRUDBooster::isCreate() && $this->global_privilege == FALSE || $this->button_add == FALSE) {
			CRUDBooster::redirect(CRUDBooster::adminPath(), trans("crudbooster.denied_access"));
		}
		// $registerseting=DB::table('registerseting')->where('id',$regid)->first();
		$data = [];
		$data['registerseting'] = DB::table('registerseting')->where('id', $_GET['registerid'])->first();

		$cms_user = DB::table('cms_users')->where('id', CRUDBooster::myId())->first();
		if ($cms_user->id_cms_privileges == 4) {
			$data['dozvil'] = $cms_user->clubid;
		}
		if ($_GET['clubid']) {
			$club = DB::table('club')->where('id', $data['dozvil'])->first();
			$obl = DB::table('obl')->where('id', $data['dozvil'])->first();
			$data['registers'] = DB::table('register')->where('eventid', $_GET['registerid'])->where('club', $club->title)->get();
		} else {

			$data['registers'] = DB::table('register')->where('eventid', $_GET['registerid'])->where('userid', CRUDBooster::myId())->get(); //Зареєстровані 
		}

		if ($data['registerseting']->userid == CRUDBooster::myId()) {
			$data['show'] = 'admin';
			if ($_GET['show'] == 'admin') {
				$data['registers'] = DB::table('register')->where('eventid', $_GET['registerid'])->get(); // для адміна  змагань	

			}
		}
		$data['page_title'] = $data['registerseting']->title;  // Назва



		if ($_GET['editid']) {
			$data['readonly'] = 'readonly';
			$data['row'] = DB::table('register')->where('id', $_GET['editid'])->first();
		}

		if ($data['registerseting']->dni) $data['registerseting']->dni = explode(' ', $data['registerseting']->dni); // розділяє дні на масив

		if ($data['registerseting']->grup) $data['registerseting']->grup = explode(' ', $data['registerseting']->grup); //Розділяє групи на масви

		//Please use cbView method instead view method from laravel
		return view('site.addregister', $data);
	}



	function exportmeos($id)
	{
		$registerseting = DB::table('registerseting')->where('id', $id)->first();
		// $dnis=$registerseting->dni;
		$dnis = $_GET['g'];
		$dniss = explode("/", $dnis);
		if ($registerseting->userid == CRUDBooster::myId()) {
			$registers = DB::table('register')->where('eventid', $id)->get();
			foreach ($registers as $register) {
				if ($_GET['c'] == 'obl') {
					$register->club = $register->obl;
				}
				if ($_GET['c'] == 'all') {
					$register->club = $register->obl . ',' . $register->club;
				}
				foreach ($dniss as $dni) {
					if ($dni == $register->dni or !$dni) {
						$register->kk = 458;
					}
				}
			}

			return view('site.export.meos', compact('registers'));
		}
	}

	function pexportmeos($id)
	{
		// $registerseting = DB::table('registerseting')->where('id', $id)->first();
		// $dnis=$registerseting->dni;
		// $dnis = $_GET['g'];
		// $dniss = explode("/", $dnis);
		// if ($registerseting->userid == CRUDBooster::myId()) {
		// 	$registers = DB::table('register')->where('eventid', $id)->get();
			// foreach ($registers as $register) {
			// 	if ($_GET['c'] == 'obl') {
			// 		$register->club = $register->obl;
			// 	}
			// 	if ($_GET['c'] == 'all') {
			// 		$register->club = $register->obl . ',' . $register->club;
			// 	}
			// 	foreach ($dniss as $dni) {
			// 		if ($dni == $register->dni) {
			// 			$register->kk = 458;
			// 		}
			// 	}
			// }

			return view('site.export.pmeos', compact('id'));
		// }
	}
}
