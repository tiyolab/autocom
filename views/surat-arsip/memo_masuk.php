<?php
use yii\helpers\Html;
use app\models\Memo;

$dataMemo = new Memo();

$session = Yii::$app->session;
$session->open();
$user_session = $session['session.user'];
$session->close();

$id = $user_session['id'];
?>

<div class="widget widget-blue">
    <div class="widget-title">
        Memo Masuk
    </div>
    <div class="widget-content">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Pengirim</th>
                        <th>Isi</th>
                        <th>Waktu</th>
                    </tr>
                    <?php
                    $no = 0;
                    foreach( $dataMemo -> showmemoin($id) as $item => $value){
                        $no++;
                        echo "<tr>";
                        echo "<td>".$no."</td>";
                        echo "<td>".$value['pengirim']."</td>";
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
