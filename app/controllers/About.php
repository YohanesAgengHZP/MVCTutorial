<?php

class About extends Controller
{
    public function index($nama = 'Kartika',$pekerjaan = 'Mahasiswa')
    {
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['judul'] = 'About';
        
        $this->view('templates/header', $data);
        $this->view('templates/footer');
        $this->view('about/index', $data);
        
    }

    public function page()
    {
        $data['judul'] = 'Page';

        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}