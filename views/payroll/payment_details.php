<?php

$isReceivedSal = ($details['status_persetujuan'] == 1 && $details['status_penerimaan'] == 1) ? true : false;

?>
<style type="text/css">
.order-info-list li {
  border-bottom: 0;
}
.order-info-list li i {
    font-size: 0.8em;
}
</style>
<div class="merchant-info">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="widget-title">
        <h2 class="page-title page-title-hard-bordered">
            <i class="fa fa-pencil-square-o"></i> Detail Payment ID#<?= $details['id_payment']?>
        </h2>
    </div>
    <div class="widget-content" style="min-height:450px">
        <div class="col-md-6">
            <ul class="order-info-list" style="margin-left:-30px;margin-top:0;margin-bottom:20px;">
                <li><strong>ID Pegawai : </strong> <?= $details['id_pegawai']?></li>
                <li><strong>NIP : </strong> <?= $details['nip']?></li>
                <li><strong>Nama : </strong> <?= $details['gelar_dpn']." ".$details['nama_lengkap']." ".$details['gelar_blk']?></li>
                <li><strong>Departemen : </strong> <?= $details['nama_departement']?></li>
                <li><strong>Jabatan : </strong> <?= $details['nama_jabatan']?></li>
                <li><strong>Tingkatan : </strong> <?= $details['tingkatan']?></li>
                <li><strong>Tanggal dibuat : </strong> <?= $details['tgl_terima']?></li>
            </ul>
            <div class="alert alert-warning alert-dismissable bottom-margin">
                <i class="fa fa-exclamation-circle"></i>
                <strong>
                     Status <?= ($details['status_persetujuan'] == 1) ? 'sudah' : 'belum'; ?> disetujui 
                    <?= ($isReceivedSal) ? 'dan dicairkan' : ''; ?>
                </strong> <?= ($isReceivedSal) ? ' pada tanggal '.$details['tgl_cair'] : ''; ?>
            </div>
        </div>
        <div class="col-md-4">
            <ul class="order-info-list" style="margin-left:-30px;margin-top:0;">
                <li><label>Gaji Pokok</label></li>
                <li><label>Total Tunjangan</label></li>
                <li><label>Total Lembur</label></li>
                <li>
                    <strong>(<i class="fa fa-plus"></i>) Uang Transportasi</strong>
                </li>
                <li><strong>(<i class="fa fa-plus"></i>) Uang Makan</strong></li>
                <li>
                    <strong>(<i class="fa fa-minus"></i>) Peminjaman</strong>
                </li>
                <li>
                    <strong>(<i class="fa fa-minus"></i>) BPJS</strong>
                </li>
                <li>
                    <strong>(<i class="fa fa-minus"></i>) Jamsostek</strong>
                </li>
                <li>
                    <strong>(<i class="fa fa-minus"></i>) Pajak (<?= $details['pajak']."% x Rp ".$details['gaji_pokok']?>)</strong>
                </li>
                <li><label>Total Penerimaan</label></li>
            </ul>
        </div>
        <div class="col-md-2">
            <ul class="order-info-list" style="margin-left:-30px;margin-top:0;text-align:right;">
                <li><label>Rp <?= number_format($details['gaji_pokok'],2,",",".")?></label></li>
                <li><label>Rp <?= number_format($details['jumlah_tunjangan'],2,",",".")?></label></li>
                <li><label>Rp <?= number_format($details['lembur'],2,",",".")?></label></li>
                <li>Rp <?= number_format($details['transportasi'],2,",",".")?></li>
                <li>Rp <?= number_format($details['makan'],2,",",".")?></li>
                <li>Rp <?= number_format($details['peminjaman'],2,",",".")?></li>
                <li>Rp <?= number_format($details['bpjs'],2,",",".")?></li>
                <li>Rp <?= number_format($details['jamsostek'],2,",",".")?></li>
                <li>Rp <?= number_format($details['total_pajak'],2,",",".")?></li>
                <li style="border-top:1px solid #ddd;"><label>Rp <?= number_format($details['total'],2,",",".")?></label></li>
            </ul>
        </div>
    </div>
</div>