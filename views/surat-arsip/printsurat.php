<?php

use app\models\Surat;

$surat = new Surat();

$id = Yii::$app->request->get()['id'];

foreach ($surat -> detailSurat($id) as $item => $value) {

    ?>

    <table align="center">
        <tr>
            <td colspan="14" width="800" height="200" align="left">
                <IMG SRC="http://localhost/autocom/web/assets/images/autocom.jpg" >
            </td>
        </tr>
        <tr>
            <td colspan="14" height="30"></td>
        </tr>
        <tr>
            <td>Nomor</td>
            <td align="left"> : <?php echo $value['nomor_surat'] ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Perihal</td>
            <td align="left"> : <?php echo $value['perihal'] ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Kepada</td>
            <td align="left"> : <?php echo $value['id_pengirim'] ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="14" height="30"></td>
        </tr>
        <tr>
            <td colspan="14" align="justify">
                <?php echo wordwrap($value['isi_surat'], 100,'<br>'); ?>
            </td>
        </tr>
        <tr>
            <td colspan="14" height="30"></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td align="center"><?php echo $value['tanggal_surat'] ?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td height="100" align="center">[TTD]</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td align="center">[Pengirim]</td>
        </tr>
    </table>
    <?php
}
?>