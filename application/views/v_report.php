<html lang="en" moznomarginboxes mozdisallowselectionprint>

<head>
    <title>Laporan Produksi Donat</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url().'/assets/images/favicon.png'?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css')?>" />
</head>

<body onload="window.print()">
    <div id="laporan">
        <!-- <table align="center"
            style="width:900px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:20px;margin-bottom:20px;">
            <tr>
            <td><img height="50" src="<?php echo base_url().'assets/images/icon.png'?>"/></td>
            </tr>
        </table> -->

        <table border="0" align="center" style="width:800px; border:none;margin-top:50px;margin-bottom:0px;">
            <tr>
                <td colspan="2" style="width:800px;padding-left:20px;">
                    <center>
                        <h3>LAPORAN HASIL PRODUKSI</h3>
                        <p>KALIS DONAT YOGYAKARTA</p>
                    </center><br />
                </td>
            </tr>

        </table>

        <table border="0" align="center" style="width:900px;border:none;">
            <tr>
                <th style="text-align:left"></th>
            </tr>
        </table>
        <table border="0" align="center" style="width:900px; border:none; margin-bottom:10px;">
            <tr>
                <th style="text-align:left; width: 100px">Dicetak Oleh</th>
                <th></th>
                <th style="text-align:left;">: <?php echo $this->session->userdata('ses_name');?> </th>
            </tr>
            <tr>
                <th style="text-align: left; width: 100px">Pada Tanggal</th>
                <th></th>
                <th style="text-align: left;">: <?php echo date('d-M-Y') ?> </th>
            </tr>
        </table>
        <?php 
        $b=$total->row_array();
        ?>
        <table border="1" align="center" style="width:900px;margin-bottom:20px;">
            <thead>
                <tr>
                    <th colspan="7" style="text-align:left;">Tanggal : <?php echo $awal?> - <?php echo $akhir;?>
                    </th>
                </tr>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>Tanggal</th>
                    <th>Permintaan</th>
                    <th>Persediaan</th>
                    <th>Jumlah Produksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
        $no=0;
        foreach ($data->result_array() as $i) {
        $no++;
        $nofak=$i['tanggal'];
        $tgl=$i['permintaan'];
        $barang_id=$i['persediaan'];
        $barang_nama=$i['produksi'];
        ?>
                <tr>
                    <td style="text-align:center;"><?php echo $no;?></td>
                    <td style="padding-left:5px;"><?php echo $nofak;?> Pcs</td>
                    <td style="text-align:center;"><?php echo $tgl;?> Pcs</td>
                    <td style="text-align:center;"><?php echo $barang_id;?> Pcs</td>
                    <td style="text-align:center;"><?php echo $barang_nama;?> Pcs</td>
                </tr>
                <?php }?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" style="text-align:center;"><b>Total</b></td>
                    <td style="text-align:center;"><b><?php echo $b['permintaan'] ?> Pcs</b></td>
                    <td style="text-align:center;"><b><?php echo $b['persediaan'] ?> Pcs</b></td>
                    <td style="text-align:center;"><b><?php echo $b['produksi'] ?> Pcs</b></td>

                </tr>
            </tfoot>
        </table>
        <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <td></td>
        </table>
        <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <td align="right">Yogyakarta, <?php echo date('d-M-Y')?></td>
            </tr>
            <tr>
                <td align="right"></td>
            </tr>

            <tr>
                <td><br /><br /><br /><br /></td>
            </tr>
            <tr>
                <td align="right">( Head Office )</td>
            </tr>
            <tr>
                <td align="center"></td>
            </tr>
        </table>
        <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <th><br /><br /></th>
            </tr>
            <tr>
                <th align="left"></th>
            </tr>
        </table>
    </div>
</body>

</html>_