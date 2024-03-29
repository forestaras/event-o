<?php namespace App\Http\Controllers;

use App\Models\Event;
use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminRegistersetingController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "title";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = false;
			$this->button_bulk_action = false;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "registerseting";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Eventid","name"=>"eventid"];
			$this->col[] = ["label"=>"Title","name"=>"title"];
			$this->col[] = ["label"=>"Trener","name"=>"trener"];
			$this->col[] = ["label"=>"Club","name"=>"club"];
			$this->col[] = ["label"=>"Obl","name"=>"obl"];
			$this->col[] = ["label"=>"Roz","name"=>"roz"];
			$this->col[] = ["label"=>"Si","name"=>"si"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Eventid','name'=>'eventid','type'=>'hidden','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Назва реєстрації','name'=>'title','type'=>'text','validation'=>'required|string|min:3|max:70','width'=>'col-sm-10','placeholder'=>'Вкажіть назву реєстрації'];
			$this->form[] = ['label'=>'Дата після якої прийом заявок закриється','name'=>'datestop','type'=>'datetime','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Поле тренер','name'=>'trener','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'1|✔'];
			$this->form[] = ['label'=>'Поле клуб','name'=>'club','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'1|✔'];
			$this->form[] = ['label'=>'Поле область','name'=>'obl','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'1|✔'];
			$this->form[] = ['label'=>'Поле розряд','name'=>'roz','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'1|✔'];
			$this->form[] = ['label'=>'Поле SportIdent','name'=>'si','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'1|✔'];
			$this->form[] = ['label'=>'Поле рік','name'=>'rik','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'1|✔'];
			$this->form[] = ['label'=>'Вкажіть групи які потрібні для реєстрації(групи потрібно вказувати через пробіл)','name'=>'grup','type'=>'textarea','width'=>'col-sm-10','placeholder'=>'Ч-12 Ч-14 Ч-16 Ж-12...'];
			$this->form[] = ['label'=>'Вкажіть дні учвсті у змаганнях (як роздільник використовуйте пробіл)','name'=>'dni','type'=>'textarea','width'=>'col-sm-10','placeholder'=>'1-3 1,2 2,3 1,3 1 2 3'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Eventid','name'=>'eventid','value'=>$_GET['event'],'type'=>"hidden",'validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Назва реєстрації','name'=>'title','type'=>'text','validation'=>'required|string|min:3|max:70','width'=>'col-sm-10','placeholder'=>'Вкажіть назву реєстрації'];
			//$this->form[] = ['label'=>'Дата після якої прийом заявок закриється','name'=>'datestop','type'=>'datetime','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Поле тренер','name'=>'trener','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'✓'];
			//$this->form[] = ['label'=>'Поле клуб','name'=>'club','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'✓'];
			//$this->form[] = ['label'=>'Поле область','name'=>'obl','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'✓'];
			//$this->form[] = ['label'=>'Поле розряд','name'=>'roz','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'✓'];
			//$this->form[] = ['label'=>'Поле SportIdent','name'=>'si','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'✓'];
			//$this->form[] = ['label'=>'Поле рік','name'=>'rik','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'✓'];
			//$this->form[] = ['label'=>'Вкажіть групи які потрібні для реєстрації(групи потрібно вказувати через пробіл)','name'=>'grup','type'=>'textarea','width'=>'col-sm-10','placeholder'=>'Ч-12 Ч-14 Ч-16 Ж-12...'];
			//$this->form[] = ['label'=>'Вкажіть дні учвсті у змаганнях (як роздільник використовуйте пробіл)','name'=>'dni','type'=>'textarea','width'=>'col-sm-10','placeholder'=>'1-3 1,2 2,3 1,3 1 2 3'];
			# OLD END FORM
			$this->form[] = ['label'=>'Eventid','name'=>'eventid','type'=>'hidden','validation'=>'required|integer|min:0','width'=>'col-sm-10','value'=>$_GET['event']];

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
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
	            
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        
	            
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {
	     if($column_index == 4) 
	     	{ $column_value = "<div style='text-align:right'>$column_value</div>"; } }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
		public function hook_before_add(&$postdata) {   
			// $postdata['eventid']= $_GET['event'];      
			$postdata['userid'] = CRUDBooster::myId();
		   $eventid=$postdata['eventid'];
		   $event=Event::where('id',$eventid)->first();
		   if (CRUDBooster::myId()!=$event->userid and CRUDBooster::myId()!=$event->redactorid) {
			   CRUDBooster::redirect($_SERVER['HTTP_REFERER'], $postdata['eventid']."Ви не можете додати  лінку!!!<br> Ви не є організатором цих змагань!!!<br>Увійдіть або попросіть доступу в автора","danger");
		   }

	   }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) { 
	    	$eventid=DB::table('registerseting')->where('id',$id)->first();
	    	

	    	CRUDBooster::redirect('/admin/event19/detail/'.$eventid->eventid,"Вами було додану реєстрацію на".$eventid->title,"success");

	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {  
	    $eventid=DB::table('registerseting')->where('id',$id)->first();      
	        $event=DB::table('event')->where('id',$eventid->eventid)->first();
			if (CRUDBooster::myId()!=$event->userid and CRUDBooster::myId()!=$event->redactorid) {
				CRUDBooster::redirect($_SERVER['HTTP_REFERER'],"Ви не можете редагувати цю реєстрацію!!!<br> Ви не є організатором цих змагань!!!<br>Увійдіть або попросіть доступу в автора","danger");
			}

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        $eventid=DB::table('registerseting')->where('id',$id)->first();

	    	CRUDBooster::redirect('/admin/event19/detail/'.$eventid->eventid,"Вами було змінено реєстрацію","success");

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {

	            $eventid=DB::table('registerseting')->where('id',$id)->first();      
	        $event=DB::table('event')->where('id',$eventid->eventid)->first();
			if (CRUDBooster::myId()!=$event->userid and CRUDBooster::myId()!=$event->redactorid) {
				CRUDBooster::redirect($_SERVER['HTTP_REFERER'],"Ви не можете видалити цю реєстрацію!!!<br> Ви не є організатором цих змагань!!!<br>Увійдіть або попросіть доступу в автора","danger");
			}

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }


		// public function getAdd($id) {

		// 	if(!CRUDBooster::isCreate() && $this->global_privilege==FALSE || $this->button_add==FALSE) {    
		// 		CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
		// 	}
		// 	$data = [];
		// 	return view('sites.form.registersetting_add',$data);
		// } 



	    //By the way, you can still create your own method in here... :) 


	}