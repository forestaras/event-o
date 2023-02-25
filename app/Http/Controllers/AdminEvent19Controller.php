<?php namespace App\Http\Controllers;

use Session;
use Request;
use App\Models\Event;
use DB;
use CRUDBooster;
use Cookie;

class AdminEvent19Controller extends \crocodicstudio\crudbooster\controllers\CBController {

	public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
		$this->title_field = "title";
		$this->limit = "20";
		$this->orderby = "datastart,desc";
		$this->global_privilege = false;
		$this->button_table_action = true;
		$this->button_bulk_action = false;
		$this->button_action_style = "button_icon";
		$this->button_add = false;
		$this->button_edit = false;
		$this->button_delete = true;
		$this->button_detail = false;
		$this->button_show = false;
		$this->button_filter = true;
		$this->button_import = false;
		$this->button_export = false;
		$this->table = "event";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
		$this->col = [];
			// $this->col[] = ["label"=>"Id","name"=>"id"];
		$this->col[] = ["label"=>"Початок","name"=>"datastart"];
		$this->col[] = ["label"=>"Закінчення","name"=>"datafinish"];
		$this->col[] = ["label"=>"Назва","name"=>"title"];
		$this->col[] = ["label"=>"Локація","name"=>"location"];
		
		$this->col[] = ["label"=>"Область","name"=>"oblid","join"=>"obl,title"];
		$this->col[] = ["label"=>"Організатори","name"=>"org"];
		$this->col[] = ["label"=>"Клуб","name"=>"clubid","join"=>"club,title"];
		$this->col[] = ["label"=>"Створено","name"=>"userid","join"=>"cms_users,name"];
		
		
		// $x=["name"=>"id"];
		$this->col[] = ["label"=>"Переглядів","name"=>"id","callback_php"=>'DB::table("statistic")->where("url","/event/".($row->id))->count()'];
		
		
			// $this->col[] = ["label"=>"Редактор","name"=>"redactorid","join"=>"cms_users,name"];
			// $this->col[] = ["label"=>"секретар","name"=>"secretarid","join"=>"cms_users,name"];
			// $this->col[] = ["label"=>"Головний суддя","name"=>"golsudid","join"=>"cms_users,name"];
		// $this->col[] = ["label"=>"Лого","name"=>"logo","image"=>true];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
		$this->form = [];
		$this->form[] = ['label'=>'Назва','name'=>'title','type'=>'text','validation'=>'required|string|min:3','width'=>'col-sm-10'];
		$this->form[] = ['label'=>'Локація','name'=>'location','type'=>'text','validation'=>'required|string|min:3|max:70','width'=>'col-sm-10'];
		$this->form[] = ['label'=>'Короткий опис','name'=>'text','type'=>'textarea','width'=>'col-sm-9'];
		$this->form[] = ['label'=>'Дата початку','name'=>'datastart','type'=>'date','validation'=>'required|date','width'=>'col-sm-10'];
		$this->form[] = ['label'=>'Дата закіечення','name'=>'datafinish','type'=>'date','validation'=>'required|date|min:1','width'=>'col-sm-10'];
		$this->form[] = ['label'=>'Організатор','name'=>'org','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
		$this->form[] = ['label'=>'Область','name'=>'oblid','type'=>'select2','validation'=>'required|min:1','width'=>'col-sm-10','datatable'=>'obl,title'];
		$this->form[] = ['label'=>'Клуб','name'=>'clubid','type'=>'select2','width'=>'col-sm-10','datatable'=>'club,title'];
		$this->form[] = ['label'=>'Редактор','name'=>'redactorid','type'=>'select2','width'=>'col-sm-10','datatable'=>'cms_users,name'];
		$this->form[] = ['label'=>'Секретар','name'=>'secretarid','type'=>'select2','width'=>'col-sm-10','datatable'=>'cms_users,name'];
		$this->form[] = ['label'=>'Головний суддя','name'=>'golsudid','type'=>'select2','width'=>'col-sm-10','datatable'=>'cms_users,name'];
		$this->form[] = ['label'=>'Активність','name'=>'activ','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'1'];
		$this->form[] = ['label'=>'Лого','name'=>'logo','type'=>'file','width'=>'col-sm-9'];
		$this->form[] = ['name'=>'contact_fb'];
		$this->form[] = ['name'=>'contact_phone'];
		$this->form[] = ['name'=>'contact_name'];
		$this->form[] = ['name'=>'contact_email'];
		$this->form[] = ['name'=>'contact_website'];
			// $this->form[] = ['label'=>'Бюлетень','name'=>'bul','type'=>'text','width'=>'col-sm-9'];
			// $this->form[] = ['label'=>'Інформація','name'=>'inf','type'=>'text','width'=>'col-sm-9'];
			// $this->form[] = ['label'=>'Результат','name'=>'rez','type'=>'text','width'=>'col-sm-9'];
			// $this->form[] = ['label'=>'Онлайн результати','name'=>'onlineid','type'=>'text','width'=>'col-sm-9'];
			// $this->form[] = ['label'=>'Реєстрація','name'=>'registerid','type'=>'text','width'=>'col-sm-9'];
		
		$columns[] = ['label'=>'Назва посилання','name'=>'titlesilka','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
		$columns[] = ['label'=>'Силка','name'=>'text','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
		// $this->form[] = ['label'=>'Orders Detail','name'=>'eventdop','type'=>'child','columns'=>$columns,'table'=>'eventdop','foreign_key'=>'eventid'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Назва','name'=>'title','type'=>'text','validation'=>'required|string|min:3|max:70','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Короткий опис','name'=>'text','type'=>'textarea','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'Дата початку','name'=>'datastart','type'=>'date','validation'=>'required|date','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Дата закіечення','name'=>'datafinish','type'=>'date','validation'=>'required|date','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Організатор','name'=>'org','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'obl,title'];
			//$this->form[] = ['label'=>'Область','name'=>'oblid','type'=>'select2','validation'=>'required|integer','width'=>'col-sm-10','datatable'=>'club,title'];
			//$this->form[] = ['label'=>'Клуб','name'=>'clubid','type'=>'select2','width'=>'col-sm-10','datatable'=>'cms_users,name'];
			//$this->form[] = ['label'=>'Редактор','name'=>'redactorid','type'=>'select2','width'=>'col-sm-10','datatable'=>'cms_users,name'];
			//$this->form[] = ['label'=>'Секретар','name'=>'secretarid','type'=>'select2','width'=>'col-sm-10','datatable'=>'cms_users,name'];
			//$this->form[] = ['label'=>'Головний суддя','name'=>'golsudid','type'=>'select2','width'=>'col-sm-10','dataenum'=>'1'];
			//$this->form[] = ['label'=>'Активність','name'=>'activ','type'=>'checkbox','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Лого','name'=>'logo','type'=>'upload','validation'=>'required|image','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'Бюлетень','name'=>'bul','type'=>'text','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'Інформація','name'=>'inf','type'=>'text','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'Результат','name'=>'rez','type'=>'text','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'Онлайн результати','name'=>'onlineid','type'=>'text','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'Реєстрація','name'=>'registerid','type'=>'text','width'=>'col-sm-9','table'=>'eventdop','foreign_key'=>'eventid'];
			//$columns[] = ['label'=>'Назва посилання','name'=>'titlesilka','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$columns[] = ['label'=>'Силка','name'=>'text','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Orders Detail','name'=>'eventdop','type'=>'child','columns'=>$columns,'table'=>'eventdop','foreign_key'=>'eventid'];
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
			// function count_reg($x){
			// 	$count=DB::table("registerseting")->where("eventid",$x)->count();
			// 	return $count;
			// }
			
			$this->addaction[] = ['label'=>'Сторінка','url'=>'/event/[id]','icon'=>'fa fa-newspaper-o','color'=>'info'];
			$this->addaction[] = ['label'=>'Деталі' ,'url'=>'/admin/event19/detail/[id]','icon'=>'fa fa-cogs','color'=>'success'];
			$this->addaction[] = ['label'=>'Редагувати','url'=>'/admin/event19/edit/[id]','icon'=>'fa fa-pencil-square-o','color'=>'success'];

			


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
		
			$this->index_button[] = ['label'=>'Створити змагання','url'=>'/admin/event19/add',"icon"=>"fa fa-plus-square",'color'=>'success'];



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
$this->index_statistic[] = ['label'=>'Ваші події','count'=>Event::where('userid', CRUDBooster::myId())->count(),'icon'=>'fa fa-check','color'=>'success'];



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
			$query->where('event.userid',CRUDBooster::myId())->orWhere('event.redactorid',CRUDBooster::myId());
			
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
			$club = DB::table('club')->where('title', $postdata['clubid'])->first();
			$postdata['clubid'] = $club->id;
			$obl = DB::table('obl')->where('title', $postdata['oblid'])->first();
			$postdata['oblid'] = $obl->id;
			$golsud = DB::table('cms_users')->where('name', $postdata['golsudid'])->first();
			$postdata['golsudid'] = $golsud->id;
			$secretar = DB::table('cms_users')->where('name', $postdata['secretarid'])->first();
			$postdata['secretarid'] = $secretar->id;
			$redactor = DB::table('cms_users')->where('name', $postdata['redactorid'])->first();
			$postdata['redactorid'] = $redactor->id;
		}

		/* 
		| ---------------------------------------------------------------------- 
		| Hook for execute command after add public static function called 
		| ---------------------------------------------------------------------- 
		| @id = last insert id
		| 
		*/
		public function hook_after_add($id) {        
			CRUDBooster::redirect('/admin/event19/detail/'.$id,"Вами було створено змагання","success");

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
			$club = DB::table('club')->where('title', $postdata['clubid'])->first();
			$postdata['clubid'] = $club->id;
			$obl = DB::table('obl')->where('title', $postdata['oblid'])->first();
			$postdata['oblid'] = $obl->id;
			$golsud = DB::table('cms_users')->where('name', $postdata['golsudid'])->first();
			$postdata['golsudid'] = $golsud->id;
			$secretar = DB::table('cms_users')->where('name', $postdata['secretarid'])->first();
			$postdata['secretarid'] = $secretar->id;
			$redactor = DB::table('cms_users')->where('name', $postdata['redactorid'])->first();
			$postdata['redactorid'] = $redactor->id;




			$event=Event::where('id',$id)->first();
			$cms_user=DB::table('cms_users')->where('id',CRUDBooster::myId())->first();
			if (CRUDBooster::myId()!=$event->userid and CRUDBooster::myId()!=$event->redactorid) {
				CRUDBooster::redirect($_SERVER['HTTP_REFERER'],"Ви не можете редагувати ці змагання!!!<br> Ви не є організатором цих змагань!!!<br>Увійдіть або попросіть доступу в автора","danger");
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
			CRUDBooster::redirect('/admin/event19/detail/'.$id,"Вами було змінено змагання","success");

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
	        $event=Event::where('id',$eventid->eventid)->first();
			if (CRUDBooster::myId()==$event->userid) {
				CRUDBooster::redirect($_SERVER['HTTP_REFERER'],"Ви не можете видалити ці змагання!!!<br> Ви не є організатором цих змагань!!!<br>Увійдіть або попросіть доступу в автора","danger");
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
			CRUDBooster::redirect('/admin/event19',"Змагання було видалено","danger");

		}
		



		//By the way, you can still create your own method in here... :)
		public function getAdd($id=0) {

			if(!CRUDBooster::isCreate() && $this->global_privilege==FALSE || $this->button_add==FALSE) {    
				CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
			}
			$data = [];
			$data['obl']=DB::table('obl')->get();
			$data['club']=DB::table('club')->get();
			$data['user']=DB::table('cms_users')->get();
			return view('site.add_event',$data);
		} 






		public function getEdit($id) {
  //Create an Auth
			if(!CRUDBooster::isUpdate() && $this->global_privilege==FALSE || $this->button_edit==FALSE) {    
				CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
			}
			
			$data = [];
			$data['dani']=Event::where('id',$id)->first();
			$data['clubb']=DB::table('club')->where('id',$data['dani']->clubid)->first();
			$data['obll']=DB::table('obl')->where('id',$data['dani']->oblid)->first();
			$data['golsud']=DB::table('cms_users')->where('id',$data['dani']->golsudid)->first();
			$data['secretar']=DB::table('cms_users')->where('id',$data['dani']->secretarid)->first();
			$data['redactor']=DB::table('cms_users')->where('id',$data['dani']->redactorid)->first();

			

			$data['obl']=DB::table('obl')->get();
			$data['club']=DB::table('club')->get();
			$data['user']=DB::table('cms_users')->get();

			
			
  //Please use cbView method instead view method from laravel
  return view('site.add_event',$data);
		}

		public function getDetail($id) {
  //Create an Auth
			if(!CRUDBooster::isRead() && $this->global_privilege==FALSE || $this->button_edit==FALSE) {    
				CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
			}
			
			$data = [];
			$data['page_title'] = 'Деталі';
			
			$data['dani']=Event::where('id',$id)->first();
			$data['club']=DB::table('club')->where('id',$data['dani']->clubid)->first()->title;
			$data['obl']=DB::table('obl')->where('id',$data['dani']->oblid)->first()->title;
			$data['golsud']=DB::table('cms_users')->where('id',$data['dani']->golsudid)->first()->name;
			$data['secretar']=DB::table('cms_users')->where('id',$data['dani']->secretarid)->first()->name;
			$data['redactor']=DB::table('cms_users')->where('id',$data['dani']->redactorid)->first()->name;
			$data['stvoreno']=DB::table('cms_users')->where('id',$data['dani']->userid)->first()->name;


			$data['registersetings']=DB::table('registerseting')->where('eventid',$id)->get();
			$data['links']=DB::table('eventdop')->where('eventid',$id)->get();
			$data['onlines']=DB::table('online')->where('eventid',$id)->get();
			
			
			
  //Please use cbView method instead view method from laravel
  return view('site.detail_event',$data);
		}
		




		


	}