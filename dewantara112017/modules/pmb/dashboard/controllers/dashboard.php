<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



/**

* 

*/

class Dashboard extends MX_Controller {

	function __construct(){

		parent::__construct();

        $this->lang->load('auth');

        if ( !$this->ion_auth->logged_in()): 

            redirect('../auth/pmb/login', 'refresh');

        // else:

            // redirect($this->session->userdata('lihat'),'refresh');

        endif;

        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');
       }

    public function index(){

            $this->session->set_userdata("module",'pos');

           $this->template->add_js('muria.js');

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

                        'title'=>'Dashboard Keuangan Mahasiswa',

                        'subtitle'=>'Keuangan Mahasiswa',

                        'breadcrumb'=>array(

                            'Keuangan Mahasiswa'),

            ));

        // redirect('site');



	}

    

   

   

}



/* End of file dashboard.php */

/* Location: ./ */



 ?>