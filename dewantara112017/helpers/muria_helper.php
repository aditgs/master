<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('tanggalindo')){
function tanggalindo($tanggal, $cetak_hari = false)
{
    $hari = array ( 1 =>    'Senin',
                'Selasa',
                'Rabu',
                'Kamis',
                'Jumat',
                'Sabtu',
                'Minggu'
            );
            
    $bulan = array (1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
    $split    = explode('-', date('Y-m-n',strtotime($tanggal)));
    $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
    
    if ($cetak_hari) {
        $num = date('N', strtotime($tanggal));
        return $hari[$num] . ', ' . $tgl_indo;
    }
    return $tgl_indo;
}
}
if(!function_exists('getstatus')){
    function getstatus($id,$tables){
        $ci = & get_instance(); 
        // $tables=
        // $stat=$ci->tagihdb->getstatus($id);
        $stat=$ci->$tables->getstatus($id);
        if(!empty($stat['status'])){
            if($stat['status']=='open'){
                $checked="checked='checked'";
            }else{
                $checked="";
            }
        }else{
                $checked="";
        }
        return '<label id="datatoggle" class="switch small switchtoggle" data-id="'.$id.'"><input id="toggle" type="checkbox" '.$checked.' class="input-toggle" onclick="switchtoggle('.$id.')"><span class="slider small round"></span></label>';
        
    }

    
}

if ( ! function_exists('getmultipaket')){
function getmultipaket($id,$isdetail=FALSE){
 // function getmultipaket($id=null){
        $ci = & get_instance(); 
        $data=$ci->tagihdb->getmultipaket($id);
        // if($data['multipaket']!=='false'||is_null($data['multipaket'])||!empty($data['multipaket'])){
        if(!empty($data['multipaket'])){
            if($data['multipaket']!=='false'){
                $multi=json_decode($data['multipaket']);
                // print_r($multi);
                $total=0;
                foreach ($multi as $value) {
                    # code...
                    $datapaket=$ci->tagihdb->getpaket($value);
                    $paket[]="";
                    $paket[].="<li>".$datapaket['nama']. "(".$datapaket['kode'].")";
                    if($isdetail==TRUE){
                        $detail=$ci->tagihdb->getdetailmultipaket($datapaket['id']);
                        $paket[].="<ul>";
                        $biaya=0;
                        foreach ($detail as $k => $v) {
                            $paket[].="<li>".$v['nm_tagihan']." (".rp($v['nominal_biaya']).")</li>";
                            $biaya=$biaya+$v['nominal_biaya'];
                        }

                        $paket[].="</ul>";
                        // $paket[].="<h4 class='text-right'>".rp($biaya)."</h4>";

                        $total=$total+$biaya;
                    }
                    $paket[].="</li>";
                    // $paket[].="<h3 class='text-right'>".rp($total)."</h3>";
                }
                $output=implode(" ",$paket);
                if($isdetail==TRUE){
                    return "<ul>".$output."</ul><h3 class='text-right'>".rp($total)."</h3>";
                }else{
                    return "<ul>".$output."</ul>";
                }
                // echo "<pre>";
                // print_r($output);
                // echo "</pre>";
            }else{
                return " ";
            }
                return " ";
        }
    // }

    }
}

if ( ! function_exists('bacatarif')){
 
function bacatarif($kode){
        $ci = & get_instance(); 
        $angkatan=substr($kode,0,2);
        // print_r($angkatan);
        $prodi=substr($kode,2,2);
        // print_r($prodi);
        $jenis=substr($kode,4,2);
        // print_r($jenis);
        $kelompok=substr($kode,6,1);
        // print_r($kelompok);
        $tahun=substr($kode,7,4);
        // print_r($tahun);
        $semester=substr($kode,-1);
        // print_r($semester);

        $bcjenis=$ci->tarifdb->bacajenis($jenis);
        $bckelmhs=$ci->tarifdb->bacakelompokmhs($kelompok);
        $bcprodi=$ci->tarifdb->bacaprodi($prodi);
        // print_r($bcjenis);
        // print_r($bcprodi);
        if((!empty($bcjenis) || $bcjenis!=null) && (!empty($bcprodi) || $bcprodi!=null) && (!empty($bckelmhs) || $bckelmhs!=null)){
            return ($bcjenis['Jenis']." ".$bcprodi['Prodi']." ".$bckelmhs['Kelompok']);
        }else{
            return '<span class="label label-warning">Kode tidak lengkap atau tidak dapat dikenali</span>';
        }

    }
    } 
if ( ! function_exists('terbilang')){
    function terbilang($number){
        $words = "";
        $arr_number = array(
        "",
        "SATU",
        "DUA",
        "TIGA",
        "EMPAT",
        "LIMA",
        "ENAM",
        "TUJUH",
        "DELAPAN",
        "SEMBILAN",
        "SEPULUH",
        "SEBELAS");

        if($number<12)
        {
            $words = " ".$arr_number[$number];
        }
        else if($number<20)
        {
            $words = terbilang($number-10)." BELAS";
        }
        else if($number<100)
        {
            $words = terbilang($number/10)." PULUH ".terbilang($number%10);
        }
        else if($number<200)
        {
            $words = "SERATUS ".terbilang($number-100);
        }
        else if($number<1000)
        {
            $words = terbilang($number/100)." RATUS ".terbilang($number%100);
        }
        else if($number<2000)
        {
            $words = "SERIBU ".terbilang($number-1000);
        }
        else if($number<1000000)
        {
            $words = terbilang($number/1000)." RIBU ".terbilang($number%1000);
        }
        else if($number<1000000000)
        {
            $words = terbilang($number/1000000)." JUTA ".terbilang($number%1000000);
        }else if($number>=1000000000)
        {
            $words = terbilang($number/1000000000)." MILYAR ".terbilang($number%1000000000);
        }
        else
        {
            $words = "undefined";
        }
        return $words;
    }
}  
if ( ! function_exists('rp')){
    function rp($data){
        return(number_format($data,2,',','.'));
    }
}  
if ( ! function_exists('kali')){
    function kali($x,$y){
        $z=$x*$y;
        return(number_format($z,2,',','.'));
    }
}  
if ( ! function_exists('uang')){
    function uang($data){
        return(number_format($data,2));
    }
} 
if ( ! function_exists('angka')){
    function angka($data){
        return(number_format($data,2,',','.'));
    }
}if ( ! function_exists('cektipe')){
     function cektipe($noacc){
        // return substr($noacc,0,5);
       $noaccx=str_replace(".","",$noacc);
        if(substr($noaccx,0,4)=='2300'){
            return "Supplier";
        }elseif(substr($noaccx,0,4)=='1700'){
            return "Karyawan";
        }else{
            return "Customer";
        }
    }
} 
if(!function_exists('left')){
    
    function left($str, $length) {
         return substr($str, 0, $length);
    }
}

if(!function_exists('right')){
    
    function right($str, $length) {
         return substr($str, -$length);
    }
}
//digunakan pada datatables kartuhutang/kartupiutang
if ( ! function_exists('isbeli')){
    function isbeli($data){

        return substr($data,0,2)=="PT"?"btn btn-xs btn-warning":"disabled btn btn-xs btn-default'";
    }
} 
if ( ! function_exists('userid')){
    function userid(){
        $ci = & get_instance();  //get instance, access the CI superobject
        $userid=$ci->session->userdata('user_id');
        // print_r($userid);
        return($userid);
    }
} 
if ( ! function_exists('getlihat')){
    function getlihat(){
        $ci = & get_instance();  //get instance, access the CI superobject
        $lihat=$ci->session->userdata('lihat');
        // print_r($lihat);
        return($lihat);
    }
} 
if ( ! function_exists('getsess')){
    function getsess(){
        $ci = & get_instance();  //get instance, access the CI superobject
        $lihat=$ci->session->userdata('session_id');
        // print_r($lihat);
        return($lihat);
    }
} 
if(!function_exists('getuser')){
    function getuser(){
        $ci=& get_instance();
        if ($ci->ion_auth->logged_in()):
            $user = $ci->ion_auth->user()->row();
            if (!empty($user)):
                // $userid=$user->id;
                // return $userid;
                return $user;
            else:
                return array();
            endif;
        endif;
    }
}
if ( ! function_exists('enkrip')){
    function enkrip($text){
        $ci = & get_instance();  //get instance, access the CI superobject
        // $userid=$ci->session->userdata('user_id');
        $enkrip= $ci->encrypt->encode($text);
        // $edit = $this->encrypt->encode("edit");
        // print_r($userid);
        return($enkrip);
    }
}
if ( ! function_exists('dekrip')){
    function dekrip($text){
        $ci = & get_instance();  //get instance, access the CI superobject
        // $userid=$ci->session->userdata('user_id');
        $dekrip= $ci->encrypt->decode($text);
        // $edit = $this->encrypt->encode("edit");
        // print_r($userid);
        return($dekrip);
    }
} 
if ( ! function_exists('encodeuri')){
    function encodeuri($string, $key="", $url_safe=TRUE)
    {
        if($key==null || $key=="")
        {
            $key="tyz_mydefaulturlencryption";
        }
          $CI =& get_instance();
        $ret = $CI->encrypt->encode($string, $key);

        if ($url_safe)
        {
            $ret = strtr(
                    $ret,
                    array(
                        '+' => '.',
                        '=' => '-',
                        '/' => '~'
                    )
                );
        }

        return $ret;
    }
}
if ( ! function_exists('decodeuri')){
    function decodeuri($string, $key="")
    {
         if($key==null || $key=="")
        {
            $key="tyz_mydefaulturlencryption";
        }
            $CI =& get_instance();
        $string = strtr(
                $string,
                array(
                    '.' => '+',
                    '-' => '=',
                    '~' => '/'
                )
            );

        return $CI->encrypt->decode($string, $key);
    }
}
if(!function_exists('safe_b64encode')){
    function safe_b64encode($string) {
    
        $data = base64_encode($string);
        $data = str_replace(array('+','/','='),array('-','_',''),$data);
        return $data;
    }
} 
if(!function_exists('safe_b64decode')){
    function safe_b64decode($string) {
        $data = str_replace(array('-','_'),array('+','/'),$string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }
}    
if(!function_exists('encode64')){
    function encode64($value){ 
        $ci =& get_instance();
        if(!$value){return false;}
        $text = $value;
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        // $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->skey, $text, MCRYPT_MODE_ECB, $iv);
        $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $ci->config->item('encryption_key'), $text, MCRYPT_MODE_ECB, $iv);
        return trim(safe_b64encode($crypttext)); 
} }
    
if(!function_exists('decode64')){
    function decode64($value){
        $ci =& get_instance();
        if(!$value){return false;}
        $crypttext = safe_b64decode($value); 
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        // $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->skey, $crypttext, MCRYPT_MODE_ECB, $iv);
        $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256,$ci->config->item('encryption_key'), $crypttext, MCRYPT_MODE_ECB, $iv);
        return trim($decrypttext);
}}
if ( ! function_exists('adminonly')){
    function adminonly(){
        $ci = & get_instance();  //get instance, access the CI superobject
        // $userid=$ci->session->userdata('user_id');
        // $adminonly= $ci->encrypt->decode($text);
        if($ci->ion_auth->in_group(5)){
            redirect(domain().'frontend', 'refresh');
        }else{
            redirect('/site', 'refresh');
        }
        // $edit = $this->encrypt->encode("edit");
        // print_r($userid);
        // return($adminonly);
    }
} 
if ( ! function_exists('now')){
    function now(){
        $now=date('Y-m-d H:i:s');
        return($now);
    }
}        
if (!function_exists('codegen_nama')){
    function codegen_nama($string){
        // $string=$this->input->post('string');
        $vokal=array('a','e','i','o','u','A','E','I','O','U','y','Y',' ');
        $jmlkata=str_word_count($string);
        if($jmlkata==1){
        
            if((preg_match_all('/[aeiouy]/i',substr($string,0,1),$matches))==1){
                $vo=strtoupper($matches[0][0]);
                $kon=substr(strtoupper(str_replace($vokal,"",$string)),0,2);
                $v=$vo.$kon;
            }else{
                $v=substr(strtoupper(str_replace($vokal,"",$string)),0,3);
            }
            
        }elseif($jmlkata==2){
            $words = preg_split("/[\s,_-]+/", $string);
            $kedua=substr((str_replace($vokal,"",$words[1])),0,2);
            if(preg_match_all('/\b(\w)/',strtoupper($string),$m)) {
                $satu=($m[0][0]);
            }
            $v=strtoupper($satu.$kedua);
        }elseif($jmlkata>=3){
        //dapatkan singkatan/inisial nama
            if(preg_match_all('/\b(\w)/',strtoupper($string),$m)) {
                // print_r($m);
                $v = implode('',$m[1]); // $v is now SOQTU
            }
        }
        return $v;
    }
}
    
if ( ! function_exists('thedate'))
{
    function thedate($data){
        return date("d/m/Y", strtotime($data));
    }
}
if ( ! function_exists('genfaktur_stok'))
{
    function genfaktur_stok($last){
        // $last=$this->stokdb->get_last();
            // print_r($last);
            if(!empty($last)):
                $first=substr($last['faktur'],0,2);
                if($first==''||$first==null){
                    $first='KS';
                }
                $left=substr($last['faktur'],2,4);
                $right=substr($last['faktur'],-5);
                $nopt=number_format($right); 

                $newpo=strval($nopt+1);
                $newpo2=substr(strval("00000$newpo"),-5);

                $tahun=substr($left,0,2);
                $bulan=substr($left,2,4);
            
                if($tahun<>date('y')):
                    $tahun=date('y');
                    if($bulan==date('m')):
                        $gen=strval($first.$tahun.$bulan."00001");
                    elseif($bulan<>date('m')):
                        $bulan=date('m');
                        $gen=strval($first.$tahun.$bulan."00001");
                    endif;
                elseif($tahun==date('y')):
                    if(intval($bulan)<>date('m')):
                        $bulan=date('m');
                        $gen=strval($first.$tahun.$bulan."00001"); 
                    elseif($bulan==date('m')):
                        $gen=strval($first.$tahun.$bulan.$newpo2);
                    endif;
                endif;
            else:
                // $gen="PT151100001";
                $gen="KS".date('ym')."00001";
            endif;
            
            return $gen;
        
    }
}
if ( ! function_exists('genfaktur_jurnal'))
{
    function genfaktur_jurnal($last){
        // $last=$this->stokdb->get_last();
            // print_r($last);
            if(!empty($last)):
                $first=substr($last['no_jurnal'],0,2);
                if($first==''||$first==null){
                    $first='JR';
                }
                $left=substr($last['no_jurnal'],2,4);
                $right=substr($last['no_jurnal'],-5);
                $nopt=number_format($right); 

                $newpo=strval($nopt+1);
                $newpo2=substr(strval("00000$newpo"),-5);

                $tahun=substr($left,0,2);
                $bulan=substr($left,2,4);
            
                if($tahun<>date('y')):
                    $tahun=date('y');
                    if($bulan==date('m')):
                        $gen=strval($first.$tahun.$bulan."00001");
                    elseif($bulan<>date('m')):
                        $bulan=date('m');
                        $gen=strval($first.$tahun.$bulan."00001");
                    endif;
                elseif($tahun==date('y')):
                    if(intval($bulan)<>date('m')):
                        $bulan=date('m');
                        $gen=strval($first.$tahun.$bulan."00001"); 
                    elseif($bulan==date('m')):
                        $gen=strval($first.$tahun.$bulan.$newpo2);
                    endif;
                endif;
            else:
                // $gen="PT151100001";
                $gen="JR".date('ym')."00001";
            endif;
            
            return $gen;
        
    }
}
if ( ! function_exists('genfaktur'))
{
    function genfaktur($last=null,$kode,$num=2){
        // $last=$this->stokdb->get_last();
            // print_r($last);
            // $field=$last[$field];
            if(!empty($last)||count($last)>0):
                $first=substr($last,0,$num);
                if($first==''||$first==null){
                    $first=$kode;
                }
                $left=substr($last,$num,4);
                $right=substr($last,-4);
                $nopt=number_format($right); 

                $newpo=strval($nopt+1);
                $newpo2=substr(strval("0000$newpo"),-4);

                $tahun=substr($left,0,2);
                $bulan=substr($left,2,4);
            
                if($tahun<>date('y')):
                    $tahun=date('y');
                    if($bulan==date('m')):
                        $gen=strval($first.$tahun.$bulan."0001");
                    elseif($bulan<>date('m')):
                        $bulan=date('m');
                        $gen=strval($first.$tahun.$bulan."0001");
                    endif;
                elseif($tahun==date('y')):
                    if(intval($bulan)<>date('m')):
                        $bulan=date('m');
                        $gen=strval($first.$tahun.$bulan."0001"); 
                    elseif($bulan==date('m')):
                        $gen=strval($first.$tahun.$bulan.$newpo2);
                    endif;
                endif;
            else:
                // $gen="PT151100001";
                $gen=$kode.date('ym')."0001";
            endif;
            
            return $gen;
        
    }
}
if ( ! function_exists('generate_code'))
{
    function generate_code($data){
        $first=substr($data['Faktur'],0,2);
        $left=substr($data['Faktur'],2,4);
        $right=substr($data['Faktur'],-5);
        $number=number_format($right); 
        
        
        $new=strval($number+1);
        $new2=substr(strval("00000$new"),-5);
        
        $tahun=substr($left,0,2);
        $bulan=substr($left,2,4);
 
        if($tahun<>date('y')):
            $tahun=date('y');
            if($bulan==date('m')):
                $new_gen=strval($first.$tahun.$bulan."00001");
            elseif($bulan<>date('m')):
                $bulan=date('m');
                $new_gen=strval($first.$tahun.$bulan."00001");
            endif;
        elseif($tahun==date('y')):
            if(intval($bulan)<>date('m')):
                $bulan=date('m');
                $new_gen=strval($first.$tahun.$bulan."00001"); 
            elseif($bulan==date('m')):
                $new_gen=strval($first.$tahun.$bulan.$new2);
            endif;
        endif;
        return $new_gen;
    }
}

if(!function_exists('ceksaldohutang')):
    function ceksaldohutang($akun=null,$faktur=null){
         $CI = get_instance();

            // You may need to load the model if it hasn't been pre-loaded
        $CI->load->model('kartuhutang_model','hutangdb',TRUE);
        $dt=array('akun_hutang'=>$akun,'faktur_ref'=>$faktur);
        $data=$CI->hutangdb->ceksaldokreditbyfakturx($dt);
        if(count($data)>0){
            if(($data['mutasidebet']>0)&&($data['realsaldokredit']==0)){
                $return="disabled";
            }else{
                $return="";
            }
        }else{
            $return="";
        }
        return $return;
    }
endif;

if(!function_exists('dropbarang')):


    function dropbarang($kategori=null){
        // Get a reference to the controller object
            $CI = get_instance();

            // You may need to load the model if it hasn't been pre-loaded
            $CI->load->model('my_model');


        $result = array();
        if(!empty($kategori)):
            $array_keys_values = $this->db->query('select id,Kode,Nama from `00-00-01-06-view-barang-kategori` where id_golongan='.$kategori.' order by id asc');
        else:
            $array_keys_values = $this->db->query('select id,Kode,Nama from `00-00-01-06-view-barang-kategori` order by id asc');
        endif;
        $result[0]="-- Pilih Barang --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->Kode." (".$row->Nama.")";
        }
        return $result;
    }
endif;

if(!function_exists('dropkandang')):

    function dropkandang($mitra=null){
        $result = array();
        if(!empty($mitra)):
            $array_keys_values = $this->db->query('select id,kode,NmMitra from kandang where Mitra="'.$mitra.'" order by id asc');
        endif;
        $result[0]="-- Pilih Kandang --";
        if(!empty($array_keys_values)):
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->kode." (".$row->NmMitra.")";
        }
        else:
            $result=array('0'=>'-- Data Kandang --');
        endif;
        return $result;
    }
endif;

if(!function_exists('dropmitra')):

    function dropmitra(){
        $result = array();
        $array_keys_values = $this->db->query('select id,kode,Nama from customer where golongan="MT" order by id asc');
        $result[0]="-- Pilih Mitra --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->kode]= $row->kode." (".$row->Nama.")";
        }
        return $result;
    }
endif;

if(!function_exists('dropgudang')):

    function dropgudang($mitra=null){
        $result = array();
        if(!empty($mitra)):
        $array_keys_values = $this->db->query('select id,kd_gudang,nama from gudang where kode_mitra="'.$mitra.'" or id_mitra="0" order by id asc');
        else:
        $array_keys_values = $this->db->query('select id,kd_gudang,nama from gudang where id_mitra="0" order by id asc');
        endif;
        $result[0]="-- Pilih Gudang --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->kd_gudang." (".$row->nama.")";
        }
        return $result;
    }
endif;
if(!function_exists('dropsupplier')):
    function dropsupplier(){
            $result = array();
            $array_keys_values = $this->db->query('select id,kode,nama from `00-00-02-02-view-supplier-kode` order by id asc');
            $result[0]="-- Pilih Supplier --";
            foreach ($array_keys_values->result() as $row)
            {
                $result[$row->id]= $row->kode." (".$row->nama.")";
            }
            return $result;
        }
endif;
if(!function_exists('dropbarangid')):

    function dropbarangid($id_supplier=null){
        $result = array();
        if(!empty($id_supplier)):
            $array_keys_values = $this->db->query('select id,Kode,Nama from `00-00-01-05-drop-barang-supplier` where id_supplier='.$id_supplier.' order by id asc');
        else:
            $array_keys_values = $this->db->query('select id,Kode,Nama from `00-00-01-05-drop-barang-supplier` order by id asc');
        endif;
        $result[0]="-- Pilih Barang --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->Kode." (".$row->Nama.")";
        }
        return $result;
    } 
endif;
if(!function_exists('dropsatuan')):
    function dropsatuan($id_barang=null){
        $result = array();
        $sql="select idsatuan,value,descrip,kode
            from(
            select id, id_barang,kode,'1' idsatuan,Satuan1 VALUE,'Satuan1' descrip from `00-00-01-05-view-barang-satuan` where id_barang='$id_barang'
            union all
            select id, id_barang,kode,'2' idsatuan,Satuan2 VALUE,'Satuan2' descrip from `00-00-01-05-view-barang-satuan` where id_barang='$id_barang'
            union all
            select id, id_barang,kode,'3' idsatuan,Satuan3 VALUE,'Satuan3' descrip from `00-00-01-05-view-barang-satuan` where id_barang='$id_barang'
            ) src group by descrip ";
        // $array_keys_values = $this->db->query('select id,Kode,Nama from supplier order by id asc');
        $array_keys_values = $this->db->query($sql);
        $jml=count($array_keys_values->result());
        $result[0]="-- Pilih Supplier --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->idsatuan]= $row->value." (".$row->descrip.")".$jml;
        }
        return $result;
    }
endif;
if(!function_exists('genweek')):
    function genweek($date){
        return ( dateRange( $date, NOW(),'+1 week') );
    }
endif;
if(!function_exists('gendate')):
    function gendate($date){
        return ( dateRange( $date, NOW(),'+1 day') );
    }
endif;
if(!function_exists('genmonth')):
    function genmonth($date){
        return ( dateRange( $date, NOW(),'+1 day') );
    }
endif;
if(!function_exists('dateRange')):
    function dateRange( $first, $last, $step = '+1 day', $format = 'Y-m-d' ) {

        $dates = array();
        $current = strtotime( $first );
        $last = strtotime( $last );
        $i=1;
        // while( ($current <= $last)  && ($i<=(84)*7) ) {
        while( ($current <= $last)) {

            $dates[] = date( $format, $current );
            $current = strtotime( $step, $current );
            $i++;
        }

        return $dates;
    }
endif;
if(!function_exists('sendarray')):
    function sendarray(array $arr){

        return json_encode($arr);
    }
endif;
