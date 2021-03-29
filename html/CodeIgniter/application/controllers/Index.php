<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

    public function display($content='home'){
        if(!file_exists('application/views/'.$content.'.php')){
            show_404();
        }
        $data['content']=$content;
        $this->load->vars($data);
        $this->load->view('template');
    }
}
?>