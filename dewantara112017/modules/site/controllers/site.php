<?php 

class Site extends MX_Controller{
	function __construct(){
		parent::__construct();
		 if ($this->session->userdata("login") != TRUE) {
            $this->session->set_flashdata('login_notif','<p>You must be logged in</p>');
            //redirect('login', 'refresh');
        }
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables','template','Ion_auth/Ion_auth'));
        $this->load->model('site_model','sitedb',TRUE);
        $this->load->library('form_validation');
        $this->load->helper('url','form');
        
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $this->load->helper('language');
        
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
        

	}
	function index(){
        // echo frontend_url();
		$this->template->set_title('SIKA Dewantara');
        $this->template->set_layout('home');
        $this->template->load_view('site',array());

	}
    function loadmenu(){
        $div="";
        if ($this->ion_auth->logged_in()):
                        $user = $this->ion_auth->user()->row();
                            if ( ! empty($user)):
                                $userid=$user->id;
                            $usergroup=$this->ion_auth->get_users_groups($user->id)->result();
                        // $this->ion_auth->get_users_groups($userid)->row()->id
                        foreach ($usergroup as $k => $v) {
                            # code...
                            // print_r($v->id);
                            $group[]=$v->id;

                        }
                        // print_r($group);

                        endif;
                    endif;

                        $module=$this->session->userdata('module');
                        
                        $mainmenu=$this->menu_model->getmenus(0,$group,$module);

                        if(!empty($mainmenu)): 
                            // echo domain();
                            foreach ($mainmenu as $key => $value) {
                                    # code...
                                $child=$this->menu_model->getchild($value['id']);
                                $isajax=$value['is_ajax_url'];
                                $isactive=$value['is_active'];
                                    if($isactive=='1'):
                                        $div.="<li><a href='".domain().$value['module']."/".$value['url']."' title='".$value['title']."'><i class='".$value['icon']."'></i>";
                                    else:
                                        $div.="<li class='disabled'><a href='#' title='".$value['title'].$value['is_active']."'><i class='".$value['icon']."'></i>";
                                    endif;
                                if(empty($child)){
                                    $div.="".$value['title']."</a></li>";
  
                                }elseif(!empty($child)||$child!=null){
                                    $div.="<span class='nav-label'>".$value['title']."</span><span class='fa arrow'></span></a>";
                                    $div.="<ul class='nav nav-second-level'>";
                                    foreach ($child as $k => $v){
                                        // $div.="<li><a href='".$v['url']."'>".$v['title']."</a>";
                                        $grandchild=$this->menu_model->getchild($v['id']);
                                            $url3=domain().$v['module']."/".$v['url']."/";
                                             $isajax=$v['is_ajax_url'];
                                             $isactive=$v['is_active'];
                                             // print_r($isactive);
                                            if($isajax=='0'):
                                                if($isactive=='1'):
                                                    $div.="<li><a href='".$url3."' title='".$v['title']."'>".$v['title'];
                                                else:
                                                    $div.="<li class='disabled'><a href='#' title='".$v['title']."'>".$v['title'];
                                                endif;
                                            else:
                                                if($isactive=='1'):
                                                    $div.='<li><a class="" href="#" title="'.$v['title'].'" data-load="'.$url3.'getdatatables" data-table="'.$url3.'tables" data-remote-target="#ajax-remote">'.$v['title'].'</a>';
                                                else:
                                                    $div.='<li class="disabled"><a class="" href="#" title="'.$v['title'].'" data-load="'.$url3.'getdatatables" data-table="'.$url3.'tables" data-remote-target="#ajax-remote">'.$v['title'].'</a>';
                                                endif;
                                            endif;
                                            
                                            if(empty($grandchild)){
                                                $div.="</a></li>";
              
                                            }elseif(!empty($grandchild)||$grandchild!=null){
                                                $div.="</a>";
                                                $div.="<ul class='nav nav-third-level'>";
                                                foreach ($grandchild as $kunci => $val){
                                                    $url=domain().$val['module']."/".$val['url']."/";
                                                    $isajax=$val['is_ajax_url'];
                                                    $isactive=$val['is_active'];
                                                    if($isajax=='0'):
                                                        if($isactive=='1'):
                                                            $div.="<li><a href='".$url."' title='".$val['title']."'>".$val['title']."</a>";
                                                        else:
                                                            $div.="<li class='disabled'><a href='".$url."' title='".$val['title']."'>".$val['title']."</a>";
                                                        endif;
                                                    else:
                                                        if($isactive=='1'):
                                                            $div.='<li><a class="" title="'.$val['title'].'" href="#" data-load="'.$url.'getdatatables" data-table="'.$url.'tables" data-remote-target="#ajax-remote">'.$val['title'].'</a></li>';
                                                        else:
                                                            $div.='<li class="disabled"><a class="" title="'.$val['title'].'" href="#" data-load="'.$url.'getdatatables" data-table="'.$url.'tables" data-remote-target="#ajax-remote">'.$val['title'].'</a></li>';
                                                        endif;
                                                    endif;
                                                }
                                                $div.="</ul>";
                                                $div.="</li>";

                                            }   
                                    }
                                    $div.="</ul>";
                                    $div.="</li>";

                                }
                            }    
                        endif;
        $this->output->set_output(base64_encode($div));
        // echo json_encode($div);
    }
    
   

}

 ?>