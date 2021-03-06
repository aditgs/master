<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



/**

* 

*/

class Dashboard extends MX_Controller {

	function __construct(){

		parent::__construct();

	   

        $this->lang->load('auth');

        if ( !$this->ion_auth->logged_in()): 
            echo pesan_login('pmb');

            redirect('../auth/login', 'refresh');

        else:
            if(!$this->ion_auth->in_group(10)){//administrasi keu/akad/pmb
                        redirect(domain('site/'), 'refresh');
                    }

            // redirect($this->session->userdata('lihat'),'refresh');

        endif;

      

       

      

        $this->template->add_js('crud.js');

        $this->template->set_layout('dashboard');



       }

    public function index(){

            $this->session->set_userdata("module",'pmb');

           $this->template->add_js('muria.js');



         /*   $this->template->add_js('

                $("body").on("click","[data-load-remote]",function(e) {

        e.preventDefault();

        

        var $this = $(this);

        var remote = $this.data("load-remote");

        var targets= $this.data("remote-target");

        var forms= $this.data("form");

        js="'.assets_url("js/modules/ptrx.01.js").'";

        alert(js);

        if(remote) {

            // $(targets).load(remote);

            $.ajax({

                url:remote,

                dataType:"html",

                beforeSend:function(){

                    $.ajaxSetup({async:true});

                    $.getScript(js);

                },

                success:function(dt,status){

                    $(targets).html(dt);

                },



            });

           

        }





    });','embed');*/

        // $this->ion_auth->get_users_groups($user->id)->result()

        if ($this->ion_auth->logged_in()):

            $user = $this->ion_auth->user()->row();

                if ( ! empty($user)):

                    $userid=$user->id;

                    // $usergroup=$this->ion_auth->get_users_groups($user->id)->row()->id();

                    // $this->ion_auth->get_users_groups($userid)->row()->id

                    // echo $usergroup;



            endif;

        endif;

        

        if($this->ion_auth->in_group(array(1))):

            

        else:

        

        endif;



        $this->template->load_view('dashboard_view',array(

                        'title'=>'Dashboard PMB',
                        'stat'=>$this->getstat(),
                        'lastpmb'=>$this->getlastpmb(),

                        'subtitle'=>'PMB',

                        'breadcrumb'=>array(

                            'PMB'),

            ));

        // redirect('site');



	}
    function getstat(){
        // $this->load->datatabase();
        $result=$this->db->get('001-view-stat-pmb');
        return $this->__resultdb($result);
    }
    function getlastpmb(){
        $this->db->select('id,nm_cmhs,tgl_reg_pmb,memo')->from('siakad_mhs_pmb');
        $result=$this->db->get();
        return $this->__resultdb($result);
        
    }
    function __resultdb($result){
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else{
            return array();
        }
    }

    

   

   

}



/* End of file dashboard.php */

/* Location: ./ */



 ?>