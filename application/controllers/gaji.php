<?php
Class gaji extends CI_Controller{
    
    var $API ="";
    
    function __construct() {
        parent::__construct();
        $this->API="http://localhost:8080/matrikulasi_server/index.php";
    }
    
    // menampilkan data gaji
    function index(){
        $data['gaji'] = json_decode($this->curl->simple_get($this->API.'/gaji'));
        $this->load->view('gaji/list',$data);
    }
    
    // insert data gaji
    function create(){
        if(isset($_POST['submit'])){
            $data = array(
                // 'id_gaji'       =>  $this->input->post('id_gaji'),
                'nama_karyawan' =>  $this->input->post('nama_karyawan'),
                'lama_kerja'    =>  $this->input->post('lama_kerja'),
                'total_gaji'    =>  $this->input->post('total_gaji'));
            $insert =  $this->curl->simple_post($this->API.'/gaji', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('gaji');
        }else{
            $this->load->view('gaji/create');
        }
    }
    
    // edit data gaji
    function edit(){
        if(isset($_POST['submit'])){
            $data = array(
                'id_gaji'       =>  $this->input->post('id_gaji'),
                'nama_karyawan'      =>  $this->input->post('nama_karyawan'),
                'lama_kerja'=>  $this->input->post('lama_kerja'),
                'total_gaji'    =>  $this->input->post('total_gaji'));
            $update =  $this->curl->simple_put($this->API.'/gaji', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('gaji');
        }else{
            
            $params = array('id_gaji'=>  $this->uri->segment(3));
            $data['gaji'] = json_decode($this->curl->simple_get($this->API.'/gaji',$params));
            $this->load->view('gaji/edit',$data);
        }
    }
    
    // delete data gaji
    function delete($id_gaji){
        if(empty($id_gaji)){
            redirect('gaji');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/gaji', array('id_gaji'=>$id_gaji), array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('gaji');
        }
    }
}
