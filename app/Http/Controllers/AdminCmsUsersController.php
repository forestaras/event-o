<?php namespace App\Http\Controllers;

use Session;
use Request;
use DB;
use CRUDbooster;
use crocodicstudio\crudbooster\controllers\CBController;

class AdminCmsUsersController extends CBController {


	public function cbInit() {
		# START CONFIGURATION DO NOT REMOVE THIS LINE
		$this->table               = 'cms_users';
		$this->primary_key         = 'id';
		$this->title_field         = "name";
		$this->button_action_style = 'button_icon';	
		$this->button_import 	   = FALSE;	
		$this->button_export 	   = FALSE;	
		# END CONFIGURATION DO NOT REMOVE THIS LINE
	
		# START COLUMNS DO NOT REMOVE THIS LINE
		$this->col = array();
		$this->col[] = array("label"=>"Імя","name"=>"name");
		$this->col[] = array("label"=>"Email","name"=>"email");
		$this->col[] = array("label"=>"Privilege","name"=>"id_cms_privileges","join"=>"cms_privileges,name");
		$this->col[] = array("label"=>"Фото","name"=>"photo","image"=>1);		
		# END COLUMNS DO NOT REMOVE THIS LINE

		# START FORM DO NOT REMOVE THIS LINE
		$this->form = array(); 		
		$this->form[] = array("label"=>"Імя","name"=>"name",'required'=>true,'validation'=>'required|alpha_spaces|min:3');
		$this->form[] = array("label"=>"Email","name"=>"email",'required'=>true,'type'=>'email','validation'=>'required|email|unique:cms_users,email,'.CRUDBooster::getCurrentId());		
		$this->form[] = array("label"=>"Фото","name"=>"photo","type"=>"upload","help"=>"Recommended resolution is 200x200px",'validation'=>'image|max:1000');											
		$this->form[] = array("label"=>"Privilege","name"=>"id_cms_privileges","type"=>"select","datatable"=>"cms_privileges,name",'required'=>true);	
		// $this->form[] = ['label'=>'Спорсмен','name'=>'peopleid','type'=>'select2','width'=>'col-sm-10','datatable'=>'people,name'];					
		// $this->form[] = ['label'=>'Спорсмен','name'=>'peopleid','type'=>'select2','width'=>'col-sm-10','datatable'=>'club,name'];					
		// $this->form[] = ['label'=>'Спорсмен','name'=>'peopleid','type'=>'select2','width'=>'col-sm-10','datatable'=>'obl,title'];					
		// $this->form[] = array("label"=>"Password","name"=>"password","type"=>"password","help"=>"Please leave empty if not change");
		$this->form[] = array("label"=>"Пароль","name"=>"password","type"=>"password","help"=>"Будь ласка, залиште порожнім, якщо не змінюєте");
		$this->form[] = array("label"=>"Повторити пароль","name"=>"password_confirmation","type"=>"password","help"=>"Будь ласка, залиште порожнім, якщо не змінюєте");
		# END FORM DO NOT REMOVE THIS LINE
				
	}

	public function getProfile() {		 	

		$this->button_addmore = FALSE;
		$this->button_cancel  = FALSE;
		$this->button_show    = FALSE;			
		$this->button_add     = FALSE;
		$this->button_delete  = FALSE;	
		$this->hide_form 	  = ['id_cms_privileges'];
		
		$data['page_title'] = trans("crudbooster.label_button_profile");
		$data['row']        = CRUDBooster::first('cms_users',CRUDBooster::myId());		
		// $data = array_merge($data, get_object_vars($this));
		return $this->view('crudbooster::default.form',$data);			
	}
	public function hook_before_edit(&$postdata,$id) { 
		unset($postdata['password_confirmation']);
	}
	public function hook_before_add(&$postdata) {      
	    unset($postdata['password_confirmation']);
	}
}
