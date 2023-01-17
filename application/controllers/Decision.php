<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Decision extends CI_Controller {
    
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
        $data['data'] = $this->m_dataproses->getHasilPrediksi();
        $this->load->view('v_decision',$data); 
    }

    function filter(){
        $tgl1 = $this->input->get('dari');
        $tgl2 = $this->input->get('sampai');

        $data['data'] = $this->m_dataproses->getFilter($tgl1,$tgl2);
        $this->load->view('v_decision', $data);
    }

    function insertPrediksi(){
        $id = $this->input->post('id');
        $tanggal = $this->input->post('tanggal');
        $permintaan = $this->input->post('permintaan');
        $persediaan = $this->input->post('persediaan');
        $produksi = $this->input->post('produksi');

        $this->m_dataproses->insertPrediksi($id, $tanggal, $permintaan, $persediaan, $produksi);
    }

    function cron(){
        $dateNow = date('Y-m-d');

        // Dapatkan data persediaan di hari kemarin 
        $temp_persediaan = $this->m_dataproses->getPersediaan();
        if($temp_persediaan->num_rows() > 0 ){
            $result = $temp_persediaan->result_array();
            foreach($result as $row){
                $persediaan = $row['persediaan'];
            }
        } else {
            $persediaan = 0;
        }
        
        // Dapatkan data permintaan untuk hari ini
        $temp_permintaan = $this->m_dataproses->getPermintaanToday();
        if($temp_permintaan->num_rows() > 0 ){
            $result = $temp_permintaan->result_array();
            foreach($result as $row){
                $permintaan = $row['permintaan'];
                $tanggal = $row['tanggal'];
            }
        } else {
            $permintaan = 0;
        }

        // print $permintaan ."-". $persediaan;

        $max_permintaan_temp = $this->m_dataproses->getMaxPermintaan();
        if($max_permintaan_temp->num_rows() > 0){
            $result = $max_permintaan_temp->result_array();
            foreach($result as $row){
                $max_permintaan = $row['a'];
            }

        }

        $min_permintaan_temp = $this->m_dataproses->getMinPermintaan();
        if($min_permintaan_temp->num_rows() > 0){
            $result = $min_permintaan_temp->result_array();
            foreach($result as $row){
                $min_permintaan = $row['a'];
            }

        }

        $max_persediaan_temp = $this->m_dataproses->getMaxPersediaan();
        if($max_persediaan_temp->num_rows() > 0){
            $result = $max_persediaan_temp->result_array();
            foreach($result as $row){
                $max_persediaan = $row['a'];
            }

        }

        $min_persediaan_temp = $this->m_dataproses->getMinPersediaan();
        if($min_persediaan_temp->num_rows() > 0){
            $result = $min_persediaan_temp->result_array();
            foreach($result as $row){
                $min_persediaan = $row['a'];
            }

        }

        $max_produksi_temp = $this->m_dataproses->getMaxProduksi();
        if($max_produksi_temp->num_rows() > 0){
            $result = $max_produksi_temp->result_array();
            foreach($result as $row){
                $max_produksi = $row['a'];
            }

        }

        $min_produksi_temp = $this->m_dataproses->getMinProduksi();
        if($min_produksi_temp->num_rows() > 0){
            $result = $min_produksi_temp->result_array();
            foreach($result as $row){
                $min_produksi = $row['a'];
            }

        }   
 
        // Mulai Perhitungan
        $xt=($max_permintaan+$min_permintaan)/2; 
        $yt=($max_persediaan+$min_persediaan)/2; 
        $zt=($max_produksi+$min_produksi)/2; 
        $x=$permintaan; 
        $y=$persediaan;  
        //Permintaan 
        if ($x<=$min_permintaan){ 
        $miu_pmt_turun=1; 
        $miu_pmt_tetap=0; 
        $miu_pmt_naik=0; 
        } 
        else if (($x>=$min_permintaan) and ($x<=$max_permintaan)){ 
        $miu_pmt_turun=($max_permintaan-$x)/($max_permintaan-$min_permintaan); 
        $miu_pmt_naik=($x-$min_permintaan)/($max_permintaan-$min_permintaan); 
        
        if ($x==$xt){ 
        $miu_pmt_tetap=1; 
        } 
        else if (($x>$min_permintaan) and ($x<$xt)){ 
        $miu_pmt_tetap=($x-$min_permintaan)/($xt-$min_permintaan); 
        } 
        else if(($x>$xt) and ($xt<$max_permintaan)){ 
        $miu_pmt_tetap=($max_permintaan-$x)/($max_permintaan-$xt); 
        } 
        else if (($x<=$min_permintaan) or ($x>=$max_permintaan)){ 
        $miu_pmt_tetap=0; 
        } 
        } 
        else if ($x>=$max_permintaan){ 
        $miu_pmt_turun=0; 
        $miu_pmt_tetap=0; 
        $miu_pmt_naik=1; 
        } 
        //Persediaan Barang 
        If ($y<=$min_persediaan){ 
        $miu_psd_sedikit=1; 
        $miu_psd_sedang=0; 
        $miu_psd_banyak=0; 
        } 
        else if (($y>=$min_persediaan) and ($y<=$max_persediaan)){ 
        $miu_psd_sedikit=($max_persediaan-$y)/($max_persediaan-$min_persediaan);

        $miu_psd_banyak=($y-$min_persediaan)/($max_persediaan-$min_persediaan); 
        
        if ($y==$yt){ 
        $miu_psd_sedang=1; 
        } 
        else if (($y>$min_persediaan) and ($y<$yt)){ 
        $miu_psd_sedang=($y-$min_persediaan)/($yt-$min_persediaan); 
        } 
        else if(($y>$yt) and ($yt<$max_persediaan)){ 
        $miu_psd_sedang=($max_persediaan-$y)/($max_persediaan-$yt); 
        } 
        else if (($y<=$min_persediaan) or ($y>=$max_persediaan)){ 
        $miu_psd_sedang=0; 
        } 
        } 
        else if ($y>=$max_persediaan){ 
        $miu_psd_sedikit=0; 
        $miu_psd_sedang=0; 
        $miu_psd_banyak=1; 
        } 
        //Produksi barang 
        $z= '';
        if ($z<=$min_produksi){ 
        $miu_pr_berkurang=1; 
        $miu_pr_tetap=0; 
        $miu_pr_bertambah=0; 
        } 
        else if (($z>=$min_produksi) and ($z<=$max_produksi)){ 
        $miu_pr_berkurang=($max_produksi-$z)/($max_produksi-$min_produksi); 
        $miu_pr_bertambah=($z-$min_produksi)/($max_produksi-$min_produksi); 
        
        if ($z==$zt){ 
        $miu_pr_tetap=1; 
        } 
        else if (($z>$min_produksi) and ($z<$zt)){ 
        $miu_pr_tetap=($z-$min_produksi)/($zt-$min_produksi); 
        } 
        else if(($z>$zt) and ($zt<$max_produksi)){ 
        $miu_pr_tetap=($max_produksi-$z)/($max_produksi-$zt); 
        } 
        else if (($z<=$min_produksi) or ($z>=$max_produksi)){ 
        $miu_pr_tetap=0; 
        } 
        } 
        else if ($z>=$max_produksi) { 
        $miu_pr_berkurang=0; 
        $miu_pr_tetap=0; 
        $miu_pr_bertambah=1; 
        };
        //aturan 
        //[R1] IF Permintaan TURUN AND Persediaan BANYAK THEN Produksi Barang BERKURANG 
        $alfa_satu=min($miu_pmt_turun,$miu_psd_banyak); 
        $z1=$max_produksi-($max_produksi-$min_produksi)*$alfa_satu; 

        //[R2] IF Permintaan TURUN AND Persediaan SEDANG THEN Produksi Barang BERKURANG 
        $alfa_dua=min($miu_pmt_turun,$miu_psd_sedang); 
        $z2=$max_produksi-($max_produksi-$min_produksi)*$alfa_dua; 

        //[R3] IF Permintaan TURUN AND Persediaan SEDIKIT THEN Produksi Barang BERKURANG 
        $alfa_tiga=min($miu_pmt_turun,$miu_psd_sedikit); 
        $z3=$max_produksi-($max_produksi-$min_produksi)*$alfa_tiga; 

        //[R4] IF Permintaan TETAP AND Persediaan BANYAK THEN Produksi Barang BERKURANG 
        $alfa_empat=min($miu_pmt_tetap,$miu_psd_banyak); 
        $z4=$max_produksi-($max_produksi-$min_produksi)*$alfa_empat; 

        //[R5] IF Permintaan TETAP AND Persediaan SEDANG THEN Produksi Barang TETAP 
        $alfa_lima=min($miu_pmt_tetap,$miu_psd_sedang); 
        $z5=$zt; 

        //[R6] IF Permintaan TETAP AND Persediaan SEDIKIT THEN Produksi Barang BERTAMBAH 
        $alfa_enam=min($miu_pmt_tetap,$miu_psd_sedikit); 
        $z6=$alfa_enam*($max_produksi-$min_produksi)+$min_produksi; 

        //[R7]IF Permintaan NAIK AND Persediaan BANYAK THEN Produksi Barang BERTAMBAH 
        $alfa_tujuh=min($miu_pmt_naik,$miu_psd_banyak); 
        $z7=$alfa_tujuh*($max_produksi-$min_produksi)+$min_produksi; 

        //[R8] IF Permintaan NAIK AND Persediaan SEDANG THEN Produksi Barang BERTAMBAH 
        $alfa_delapan=min($miu_pmt_naik,$miu_psd_sedang); 
        $z8=$alfa_delapan*($max_produksi-$min_produksi)+$min_produksi; 

        //[R9]IF Permintaan NAIK AND Persediaan SEDIKIT THEN Produksi Barang BERTAMBAH 
        $alfa_sembilan=min($miu_pmt_naik,$miu_psd_sedikit); 
        $z9=$alfa_sembilan*($max_produksi-$min_produksi)+$min_produksi; 

        // Data Alpha
        $alfaz1=$alfa_satu*$z1; 
        $alfaz2=$alfa_dua*$z2; 
        $alfaz3=$alfa_tiga*$z3; 
        $alfaz4=$alfa_empat*$z4; 
        $alfaz5=$alfa_lima*$z5; 
        $alfaz6=$alfa_enam*$z6; 
        $alfaz7=$alfa_tujuh*$z7; 
        $alfaz8=$alfa_delapan*$z8; 
        $alfaz9=$alfa_sembilan*$z9; 
        $alfaz_total=$alfaz1+$alfaz2+$alfaz3+$alfaz4+$alfaz5+$alfaz6+$alfaz7+$alfaz8+$alfaz9; 
        $alfa_total=$alfa_satu+$alfa_dua+$alfa_tiga+$alfa_empat+$alfa_lima+$alfa_enam+
        $alfa_tujuh+$alfa_delapan+$alfa_sembilan; 

        //Jumlah barang yang harus diproduksi 
        $Zcari=($alfa_satu*$z1+$alfa_dua*$z2+$alfa_tiga*$z3+$alfa_empat*$z4+$alfa_lima*$z5+$alfa_enam*$z6+$alfa_tujuh*$z7+$alfa_delapan*$z8+$alfa_sembilan*$z9
        )/($alfa_satu+$alfa_dua+$alfa_tiga+$alfa_empat+$alfa_lima+$alfa_enam+$alfa_tujuh+$alfa_delapan+$alfa_sembilan);

        $data['max_permintaan'] = $max_permintaan;
        $data['min_permintaan'] = $min_permintaan;
        $data['tengah_permintaan'] = $xt;
        $data['max_persediaan'] = $max_persediaan;
        $data['min_persediaan'] = $min_persediaan;
        $data['tengah_persediaan'] = $yt;
        $data['max_produksi'] = $max_produksi;
        $data['min_produksi'] = $min_produksi;
        $data['tengah_produksi'] = $zt;
        $data['permintaan'] = $x;
        $data['persediaan'] = $y;
        $data['miu_pmt_turun'] = $miu_pmt_turun;
        $data['miu_pmt_tetap'] = $miu_pmt_tetap;
        $data['miu_pmt_naik'] = $miu_pmt_naik;
        $data['miu_psd_sedikit'] = $miu_psd_sedikit;
        $data['miu_psd_sedang'] = $miu_psd_sedang;
        $data['miu_psd_banyak'] = $miu_psd_banyak;
        $data['alfa_satu'] = $alfa_satu;
        $data['alfa_dua'] = $alfa_dua;
        $data['alfa_tiga'] = $alfa_tiga;
        $data['alfa_empat'] = $alfa_empat;
        $data['alfa_lima'] = $alfa_lima;
        $data['alfa_enam'] = $alfa_enam;
        $data['alfa_tujuh'] = $alfa_tujuh;
        $data['alfa_delapan'] = $alfa_delapan;
        $data['alfa_sembilan'] = $alfa_sembilan;
        $data['alfaz_total'] = $alfaz_total;
        $data['alfa_total'] = $alfa_total;
        $data['z1'] = $z1;
        $data['z2'] = $z2;
        $data['z3'] = $z3;
        $data['z4'] = $z4;
        $data['z5'] = $z5;
        $data['z6'] = $z6;
        $data['z7'] = $z7;
        $data['z8'] = $z8;
        $data['z9'] = $z9;
        $data['alfaz1'] = $alfaz1;
        $data['alfaz2'] = $alfaz2;
        $data['alfaz3'] = $alfaz3;
        $data['alfaz4'] = $alfaz4;
        $data['alfaz5'] = $alfaz5;
        $data['alfaz6'] = $alfaz6;
        $data['alfaz7'] = $alfaz7;
        $data['alfaz8'] = $alfaz8;
        $data['alfaz9'] = $alfaz9;

        $bulat = round($Zcari);
        $produksi = $bulat;
        $data['prediksi'] = $Zcari;
        // $bulat = round($Zcari);
        $adonan_temp = $bulat/120;
        $adonan = round($adonan_temp);
        $data['adonan'] = $adonan;

        // $data['x'] = 'y-content';
        // $data['y'] = 'form-hilang';

        $id = $this->input->post('id');
        $user_id = $this->session->userdata('ses_id');
        $created_at = date('Y-m-d H:i:s');


        if ($dateNow == $tanggal) {
            $this->m_permintaan->deletePermintaan($tanggal);
            $this->m_dataproses->insertDataset($tanggal, $permintaan, $persediaan, $produksi);
            $this->m_dataproses->insertPrediksi($tanggal, $permintaan, $persediaan, $produksi, $adonan, $user_id, $created_at);
            // print $tanggal;

            // kirim notifikasi 
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
        
        $this->email->from($email_from, 'Produksi Harian');
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
                <td>".$tanggal."</td>
                </tr>
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
        }else {
            print "Tidak ada data";
        }

        // $this->m_dataproses->deletePermintaan($id);
        // $this->m_dataproses->insertDataset($tanggal, $permintaan, $persediaan, $produksi);
        // $this->m_dataproses->insertPrediksi($tanggal, $permintaan, $persediaan, $produksi, $adonan, $user_id, $created_at);
        // $this->load->view('v_createData', $data);


    }

}

/* End of file Decision.php */


?>