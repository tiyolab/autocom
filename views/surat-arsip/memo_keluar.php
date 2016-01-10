<?php
use yii\helpers\Html;
use app\models\Memo;

$dataMemo = new Memo();

$session = Yii::$app->session;
$session->open();
$user_session = $session['session.user'];
$session->close();

$id = $user_session['login'];
?>

<div class="widget widget-blue">
    <div class="widget-title">
        Memo Keluar
    </div>
    <div class="widget-content">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Pengirim</th>
                        <th>Penerima</th>
                        <th>Isi</th>
                        <th>Waktu</th>
                    </tr>
                    <?php
                    foreach( $dataMemo -> showmemoout($id) as $item => $value){
                        echo "<tr>";
                        echo "<td>".$value['id_memo']."</td>";
                        echo "<td>".$value['id_pengirim']."</td>";
                        echo "<td>".$value['id_penerima']."</td>";
                        echo "<td>".$value['isi']."</td>";
                        echo "<td>".$value['waktu_memo']."</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
