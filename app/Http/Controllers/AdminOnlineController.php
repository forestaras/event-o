<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Online;
use Session;

use DB;
use CRUDBooster;

class AdminOnlineController extends \crocodicstudio\crudbooster\controllers\CBController
{

	public function cbInit()
	{

		# START CONFIGURATION DO NOT REMOVE THIS LINE
		$this->title_field = "name";
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
		$this->table = "online";
		# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Id онлайну","name"=>"eventid"];
			$this->col[] = ["label"=>"Пароль для meos","name"=>"cod"];
			$this->col[] = ["label"=>"Створено","name"=>"userid","join"=>"cms_users,name"];
			$this->col[] = ["label"=>"Назва події","name"=>"name"];
			$this->col[] = ["label"=>"Назва в meos","name"=>"id","join"=>"mopcompetition,name"];
			$this->col[] = ["label"=>"Приєднано до події","name"=>"eventid","join"=>"event,title"];
			$this->col[] = ["label"=>"Стартові","name"=>"starovi"];
			$this->col[] = ["label"=>"Командні","name"=>"comandni"];
			$this->col[] = ["label"=>"Результати","name"=>"rezult"];
			$this->col[] = ["label"=>"Спліти","name"=>"split"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Пусте для вибору змагант','type'=>'hidden','validation'=>'required','width'=>'col-sm-9'];
			$this->form[] = ['label'=>'Назва','name'=>'name','type'=>'text','validation'=>'required|string|min:3|max:70','width'=>'col-sm-10','help'=>'Minimum 4 characters. Please leave empty if you did not change the password.'];
			$this->form[] = ['label'=>'Пароль','name'=>'cod','type'=>'text','validation'=>'min:4|max:32','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Дата старту','name'=>'datestart','type'=>'date','validation'=>'required|required','width'=>'col-sm-9'];
			$this->form[] = ['label'=>'Показувати','name'=>'active','type'=>'checkbox','width'=>'col-sm-9','dataenum'=>'✓'];
			$this->form[] = ['label'=>'Стартові','name'=>'starovi','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'✓'];
			$this->form[] = ['label'=>'Результати','name'=>'rezult','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'✓'];
			$this->form[] = ['label'=>'Спліти','name'=>'split','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'✓'];
			$this->form[] = ['label'=>'Графік сплітів','name'=>'split_grafic','type'=>'checkbox','width'=>'col-sm-9','dataenum'=>'✓'];
			$this->form[] = ['label'=>'Стартовий годинник','name'=>'startclok','type'=>'checkbox','width'=>'col-sm-9','dataenum'=>'✓'];
			$this->form[] = ['label'=>'ааппаіп','type'=>'header','validation'=>'required','width'=>'col-sm-9'];
			$this->form[] = ['label'=>'Розклад дня','name'=>'detali','type'=>'wysiwyg','width'=>'col-sm-9','help'=>'Додатква інформація така як розклад дня і.т.д'];
			$this->form[] = ['label'=>'Інформація про дистанцію','name'=>'inf','type'=>'wysiwyg','width'=>'col-sm-9'];
			$this->form[] = ['label'=>'Спонсор','name'=>'sponsor','type'=>'upload','width'=>'col-sm-9'];
			$this->form[] = ['label'=>'Командні','name'=>'comandni','type'=>'header','width'=>'col-sm-9'];
			$this->form[] = ['label'=>'Командні результати','name'=>'comandni','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'✓'];
			$this->form[] = ['label'=>'Формула нарахування балів','name'=>'rezult_formula_ball','type'=>'select','validation'=>'max:255','width'=>'col-sm-10','dataenum'=>'Б=100*(Чп/Чу)'];
			$this->form[] = ['label'=>'Іде в залік','name'=>'cill','type'=>'number','validation'=>'numeric','width'=>'col-sm-9'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Пусте для вибору змагант','type'=>'hidden','validation'=>'required','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'Назва','name'=>'name','type'=>'text','validation'=>'required|string|min:3|max:70','width'=>'col-sm-10','help'=>'Minimum 4 characters. Please leave empty if you did not change the password.'];
			//$this->form[] = ['label'=>'Пароль','name'=>'cod','type'=>'text','validation'=>'min:4|max:32','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Дата старту','name'=>'datestart','type'=>'date','validation'=>'required|required','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'Показувати','name'=>'active','type'=>'checkbox','width'=>'col-sm-9','dataenum'=>'✓'];
			//$this->form[] = ['label'=>'Стартові','name'=>'starovi','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'✓'];
			//$this->form[] = ['label'=>'Результати','name'=>'rezult','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'✓'];
			//$this->form[] = ['label'=>'Спліти','name'=>'split','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'✓'];
			//$this->form[] = ['label'=>'Графік сплітів','name'=>'split_grafic','type'=>'checkbox','width'=>'col-sm-9','dataenum'=>'✓'];
			//$this->form[] = ['label'=>'Стартовий годинник','name'=>'startclok','type'=>'checkbox','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'ааппаіп','type'=>'header','validation'=>'required','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'Розклад дня','name'=>'detali','type'=>'wysiwyg','width'=>'col-sm-9','help'=>'Додатква інформація така як розклад дня і.т.д'];
			//$this->form[] = ['label'=>'Інформація про дистанцію','name'=>'inf','type'=>'wysiwyg','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'Спонсор','name'=>'sponsor','type'=>'upload','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'Командні','name'=>'comandni','type'=>'header','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'Командні результати','name'=>'comandni','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'✓'];
			//$this->form[] = ['label'=>'Формула нарахування балів','name'=>'rezult_formula_ball','type'=>'select','validation'=>'max:255','width'=>'col-sm-10','dataenum'=>'Б=100*(Чп/Чу)'];
			//$this->form[] = ['label'=>'Іде в залік','name'=>'cill','type'=>'number','validation'=>'numeric','width'=>'col-sm-9'];
			# OLD END FORM

			$this->form[0] = ['label'=>'Виберіть або створіть змагання','name'=>'eventid','type'=>'select2','width'=>'col-sm-10','datatable'=>'event,title','value'=>$_GET['event'],'datatable_where'=>'userid =  '. CRUDBooster::myId() . '' ];
			$this->form[] = ['label'=>'Userid','name'=>'userid','type'=>'hidden','width'=>'col-sm-10'];

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
		$this->index_statistic[] = ['label'=>'Ваші події','count'=>Online::where('userid', CRUDBooster::myId())->count(),'icon'=>'fa fa-check','color'=>'success'];




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
		$query->where('online.userid',CRUDBooster::myId())->orWhere('event.redactorid',CRUDBooster::myId());

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
		$eventid = $postdata['eventid'];
		$postdata['userid'] = CRUDBooster::myId();
		if ($postdata['eventid'] == 0) {
			$event = new Event();
			$event->title = $postdata['name'];
			$event->datastart = $postdata['datestart'];
			$event->userid = CRUDBooster::myId();
			$event->save();
			$postdata['eventid']=Event::where('title',$postdata['name'])->value('id');

		}
		else {
			$events = Event::where('id', $eventid)->first();
		if (CRUDBooster::myId() != $events->userid and CRUDBooster::myId() != $events->redactorid) {
			CRUDBooster::redirect($_SERVER['HTTP_REFERER'], $postdata['eventid'] . "Ви не можете додати  лінку!!!<br> Ви не є організатором цих змагань!!!<br>Увійдіть або попросіть доступу в автора", "danger");
		}
		}
		// $postdata['eventid'] = 34;
		
		
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
		$eventid = DB::table('online')->where('id', $id)->first();


		CRUDBooster::redirect('/admin/event19/detail/' . $eventid->eventid, "Вами було доданий онлайн " . $eventid->name, "success");
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
		if (!$postdata['starovi']) $postdata['starovi']=NULL; 
	        if (!$postdata['comandni']) $postdata['comandni']=NULL;
	        if (!$postdata['rezult']) $postdata['rezult']=NULL;
	        if (!$postdata['startclok']) $postdata['startclok']=NULL;
	        if (!$postdata['split']) $postdata['split']=NULL;
	        if (!$postdata['split_grafic']) $postdata['split_grafic']=NULL;
	        if (!$postdata['active']) $postdata['active']=NULL;
		$eventid = DB::table('online')->where('id', $id)->first();
		$event = DB::table('event')->where('id', $eventid->eventid)->first();
		if (CRUDBooster::myId() != $event->userid and CRUDBooster::myId() != $event->redactorid) {
			CRUDBooster::redirect($_SERVER['HTTP_REFERER'], "Ви не можете редагувати цю лінку!!!<br> Ви не є організатором цих змагань!!!<br>Увійдіть або попросіть доступу в автора", "danger");
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
		$eventid = DB::table('online')->where('id', $id)->first();

		CRUDBooster::redirect('/admin/event19/detail/' . $eventid->eventid, "Вами було змінено лінку", "success");
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
		$eventid = DB::table('online')->where('id', $id)->first();
		$event = DB::table('event')->where('id', $eventid->eventid)->first();
		if (CRUDBooster::myId() != $event->userid and CRUDBooster::myId() != $event->redactorid) {
			CRUDBooster::redirect($_SERVER['HTTP_REFERER'], "Ви не можете видалити цю лінку!!!<br> Ви не є організатором цих змагань!!!<br>Увійдіть або попросіть доступу в автора", "danger");
		}
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


}