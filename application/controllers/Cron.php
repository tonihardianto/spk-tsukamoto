<?php
 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Cron extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('loggedin') != true) {
            $url = base_url().'login';
            redirect($url);
        }
        //Do your magic here
        $this->load->model('m_dataproses');
        $this->load->model('m_permintaan');
        
    }
 
    public function index()
    {
        $tanggal = date('Y-m-d');
        $permintaan = mt_rand(0, 500);
        $persediaan = mt_rand(0, 100);
        $produksi = mt_rand(2100, 2500);

        $email_from = "cron@codereview.my.id";
        $email_to = "toni.hrd28@gmail.com";

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://mail.codereview.my.id',
            'smtp_port' => 465,
            'smtp_user' => 'cron@codereview.my.id',
            'smtp_pass' => '@hardyanto28',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1'
        );

        $this->load->library('email',$config);
        $this->email->set_newline("\r\n");
        
        $this->email->from($email_from, 'no-reply-information');
        $this->email->to($email_to);
        $this->email->subject('Cron Execution Information');
        $dn = date('Y-m-d H:i:s');


        $message =  "

        <!DOCTYPE html>
        <html lang='en'>
        <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <style type='text/css'>
            .text-danger {
            color: red;
            }
            .text-center {
            text-align: center;
            }
            .jumbotron {
            background-color: grey;
            }   
        </style>
        </head>
        <body>
        <div class='container'>
            <div class='card-body text-center'>
                <p><b>Berikut ini adalah informasi auto data sample :</b></p>
            </div>
            <p>Hallo, selamat pagi. berikut ini adalah data produksi hari ini:</p>
            <table>
                <tr>
                <td>Permintaan</td>
                <td>:</td>
                <td>".$permintaan."</td>
                </tr>
                <tr>
                <td>Persediaan</td>
                <td>:</td>
                <td>".$persediaan."</td>
                </tr>
                <tr>
                <td>Produksi</td>
                <td>:</td>
                <td>".$produksi."</td>
                </tr>
            </table>
        </div>
        </body>
        </html>
        ";

        $this->email->message($message);
        if ($this->email->send()) {
            // $this->m_dataproses->insertDataset($tanggal, $permintaan, $persediaan, $produksi);
            print "Email sent";
         }else{
            // $this->m_dataproses->insertDataset($tanggal, $permintaan, $persediaan, $produksi);
            print "Tidak dapat mengirim email";
         }

        // $this->m_dataproses->insertDataset($tanggal, $permintaan, $persediaan, $produksi);

        
    }
 
 }
 
 /* End of file Cron.php */
 

?>