<?php namespace App\Http\Controllers;

use App\Models\Protocol;
use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminProtocolsController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "name1";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon_text";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = false;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "protocols";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Id","name"=>"id"];
			$this->col[] = ["label"=>"Дата","name"=>"inf_data"];
			$this->col[] = ["label"=>"Назва1","name"=>"name1"];
			$this->col[] = ["label"=>"Назва2","name"=>"name2"];
			$this->col[] = ["label"=>"Дистанція","name"=>"namedist"];
			$this->col[] = ["label"=>"Локація","name"=>"inf_local"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Userid','name'=>'userid','type'=>'hidden','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Організація 1 строка','name'=>'col1','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Організація 2 строка','name'=>'col2','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Організація 3 строка','name'=>'col3','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Назва змагаань 1 строка','name'=>'name1','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Назва змагаань 2 строка','name'=>'name2','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Назва змагаань 3 строка','name'=>'name3','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Дистанція назва(середня,довга,спринт','name'=>'namedist','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Дата проведення','name'=>'inf_data','type'=>'date','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Місце проведення','name'=>'inf_local','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Начальник дистанції','name'=>'nd','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Головний секретар','name'=>'gse','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Головний суддя','name'=>'gsu','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Контрольний час','name'=>'con','type'=>'time','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Клас дистанції для дітей(юнацькі розряди)','name'=>'cld','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Клас дистанції для дорослих(дорослих розрядів)','name'=>'cldr','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Скопіюйте сюди протокол з меоs','name'=>'prot','type'=>'textarea','validation'=>'required|string','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Формула','name'=>'formula','type'=>'select','width'=>'col-sm-6','dataenum'=>'Б=100*(Чп/Чу);Пліч о пліч;0|Не потрібно рахувати бали','default'=>'Не потрібно рахувати бали'];
			$this->form[] = ['label'=>'Максимальний розряд','name'=>'max','type'=>'select','validation'=>'required','width'=>'col-sm-6','dataenum'=>'0|Виконуються всі розряди;1|КМСУ;2|I;3|II;4|III;5|Не виконуються дорослі розряди'];
			$this->form[] = ['label'=>'Поля','type'=>'header','width'=>'col-sm-9'];
			$this->form[] = ['label'=>'Рік народження','name'=>'pol_rik','type'=>'checkbox','width'=>'col-sm-3','dataenum'=>'1|Вкл'];
			$this->form[] = ['label'=>'Команда','name'=>'pol_com','type'=>'checkbox','width'=>'col-sm-3','dataenum'=>'1|Вкл'];
			$this->form[] = ['label'=>'Тренер','name'=>'pol_tren','type'=>'checkbox','width'=>'col-sm-3','dataenum'=>'1|Вкл'];
			$this->form[] = ['label'=>'Розряд','name'=>'pol_roz','type'=>'checkbox','width'=>'col-sm-3','dataenum'=>'1|Вкл'];
			$this->form[] = ['label'=>'Виконаний розряд','name'=>'pol_roz_vik','type'=>'checkbox','width'=>'col-sm-3','dataenum'=>'1|Вкл'];
			$this->form[] = ['label'=>'Бали','name'=>'pol_ball','type'=>'checkbox','width'=>'col-sm-3','dataenum'=>'1|Вкл'];
			$this->form[] = ['label'=>'Командні','name'=>'kom','type'=>'header','width'=>'col-sm-9'];
			$this->form[] = ['label'=>'Створити командний протокол','name'=>'kom','type'=>'checkbox','width'=>'col-sm-9','dataenum'=>'1|Вкл'];
			$this->form[] = ['label'=>'Кількість учасників команди що іде в залік','name'=>'kom_count','type'=>'number','width'=>'col-sm-9'];
			$this->form[] = ['label'=>'Показувати в протоколі тільки тих хто попав в залік','name'=>'kom_count_views','type'=>'checkbox','width'=>'col-sm-9','dataenum'=>'1|Вкл'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Userid','name'=>'userid','type'=>'hidden','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Організація 1 строка','name'=>'col1','type'=>'text','width'=>'col-sm-10','value'=>'0'];
			//$this->form[] = ['label'=>'Організація 2 строка','name'=>'col2','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Організація 3 строка','name'=>'col3','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Назва змагаань 1 строка','name'=>'name1','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Назва змагаань 2 строка','name'=>'name2','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Назва змагаань 3 строка','name'=>'name3','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Дистанція назва(середня,довга,спринт','name'=>'namedist','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Дата проведення','name'=>'inf_data','type'=>'date','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Місце проведення','name'=>'inf_local','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Начальник дистанції','name'=>'nd','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Головний секретар','name'=>'gse','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Головний суддя','name'=>'gsu','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Контрольний час','name'=>'con','type'=>'time','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Клас дистанції для дітей(юнацькі розряди)','name'=>'cld','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Клас дистанції для дорослих(дорослих розрядів)','name'=>'cldr','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Скопіюйте сюди протокол з меоs','name'=>'prot','type'=>'textarea','validation'=>'required|string','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Формула','name'=>'formula','type'=>'select','width'=>'col-sm-6','dataenum'=>'Б=100*(Чп/Чу);Пліч о пліч;0|Не потрібно рахувати бали','default'=>'Не потрібно рахувати бали'];
			//$this->form[] = ['label'=>'Максимальний розряд','name'=>'max','type'=>'select','validation'=>'required','width'=>'col-sm-6','dataenum'=>'0|Виконуються всі розряди;1|КМСУ;2|I;3|II;4|III;5|Не виконуються дорослі розряди'];
			//$this->form[] = ['label'=>'Поля','type'=>'header','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'Рік народження','name'=>'pol_rik','type'=>'checkbox','width'=>'col-sm-3','dataenum'=>'1|Вкл'];
			//$this->form[] = ['label'=>'Команда','name'=>'pol_com','type'=>'checkbox','width'=>'col-sm-3','dataenum'=>'1|Вкл'];
			//$this->form[] = ['label'=>'Тренер','name'=>'pol_tren','type'=>'checkbox','width'=>'col-sm-3','dataenum'=>'1|Вкл'];
			//$this->form[] = ['label'=>'Розряд','name'=>'pol_roz','type'=>'checkbox','width'=>'col-sm-3','dataenum'=>'1|Вкл'];
			//$this->form[] = ['label'=>'Виконаний розряд','name'=>'pol_roz_vik','type'=>'checkbox','width'=>'col-sm-3','dataenum'=>'1|Вкл'];
			//$this->form[] = ['label'=>'Бали','name'=>'pol_ball','type'=>'checkbox','width'=>'col-sm-3','dataenum'=>'1|Вкл'];
			//$this->form[] = ['label'=>'Командні','name'=>'kom','type'=>'header','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'Створити командний протокол','name'=>'kom','type'=>'checkbox','width'=>'col-sm-9','dataenum'=>'1|Вкл'];
			//$this->form[] = ['label'=>'Кількість учасників команди що іде в залік','name'=>'kom_count','type'=>'number','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'Показувати в протоколі тільки тих хто попав в залік','name'=>'kom_count_views','type'=>'checkbox','width'=>'col-sm-9','dataenum'=>'1|Вкл'];
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
	        $this->addaction[] = ['label'=>'Переглянути протокол','url'=>'/protocols/[id]','icon'=>'fa fa-newspaper-o','color'=>'info'];
	        $this->addaction[] = ['label'=>'ТЕСТ Переглянути протокол','url'=>'/livess/rezult/protocol_finish_test/[id]','icon'=>'fa fa-newspaper-o','color'=>'warning'];
			// if (Protocol::find($this->col::)) {
			// 	# code...
			// }
	        $this->addaction[] = ['label'=>'ТЕСТ Переглянути командний протокол','url'=>'/livess/rezult/protocol_comand/[id]','icon'=>'fa fa-newspaper-o','color'=>'warning'];

			
			// $this->addaction[] = ['label'=>'Деталі' ,'url'=>'/admin/event19/detail/[id]','icon'=>'fa fa-cogs','color'=>'success'];
			// $this->addaction[] = ['label'=>'Редагувати','url'=>'/admin/event19/edit/[id]','icon'=>'fa fa-pencil-square-o','color'=>'success'];


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
			$this->index_button[] = ['target'=>'_blank','label'=>'Скачати файл для Meos','url'=>'https://drive.google.com/file/d/1OlTU1EPq8A2Arxd4gyZr4M03VmHuBlHn/view?usp=drive_link',"icon"=>"fa fa-download",'color'=>'success'];



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
			// $this->index_statistic[] = ['label'=>'Файл конвертації для Meos','count'=>"Скачати",'icon'=>'fa fa-download','color'=>'success'];



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
			$query->where('protocols.userid',CRUDBooster::myId());
	            
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        $postdata['userid'] = CRUDBooster::myId();
			if (!$postdata['kom']) $postdata['kom']=NULL;
	        // if (!$postdata['kom_count']) $postdata['kom_count']=NULL;
	        if (!$postdata['kom_count_views']) $postdata['kom_count_views']=NULL;

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {        
	      

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
			if (CRUDBooster::myId() != $postdata['userid']) {
				CRUDBooster::redirect($_SERVER['HTTP_REFERER'], "Ви не можете редагувати ці протоколи!!!<br> Ви не є власником цих протоколів!!!<br>Увійдіть або попросіть доступу в автора", "danger");
			}      
			
			
	        if (!$postdata['col1']) $postdata['col1']=NULL; 
	        if (!$postdata['col2']) $postdata['col2']=NULL; 
	        if (!$postdata['col3']) $postdata['col3']=NULL; 
	        if (!$postdata['name1']) $postdata['name1']=NULL; 
	        if (!$postdata['name2']) $postdata['name2']=NULL; 
	        if (!$postdata['name3']) $postdata['name3']=NULL; 
	        if (!$postdata['namedist']) $postdata['namedist']=NULL; 
	        if (!$postdata['inf_data']) $postdata['inf_data']=NULL; 
	        if (!$postdata['inf_local']) $postdata['inf_local']=NULL; 
	        if (!$postdata['nd']) $postdata['nd']=NULL; 
	        if (!$postdata['gse']) $postdata['gse']=NULL; 
	        if (!$postdata['gsu']) $postdata['gsu']=NULL; 
	        if (!$postdata['con']) $postdata['con']=NULL; 
	        if (!$postdata['cld']) $postdata['cld']=NULL; 
	        if (!$postdata['cldr']) $postdata['cldr']=NULL; 
	        if (!$postdata['pol_rik']) $postdata['pol_rik']=NULL; 
	        if (!$postdata['pol_com']) $postdata['pol_com']=NULL;
	        if (!$postdata['pol_tren']) $postdata['pol_tren']=NULL;
	        if (!$postdata['pol_roz']) $postdata['pol_roz']=NULL;
	        if (!$postdata['pol_roz_vik']) $postdata['pol_roz_vik']=NULL;
	        if (!$postdata['pol_ball']) $postdata['pol_ball']=NULL;
	        if (!$postdata['kom']) $postdata['kom']=NULL;
	        if (!$postdata['kom_count']) $postdata['kom_count']=NULL;
	        if (!$postdata['kom_count_views']) $postdata['kom_count_views']=NULL;

			

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here 

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here

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



	    //By the way, you can still create your own method in here... :) 


	}