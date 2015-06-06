<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use kartik\grid\GridView;
use miloschuman\highcharts\Highcharts;

//use yii\grid\GridView;

$date_m = date("Y-m");
$date_d = date("Y-m-d");
$date_my = date("m-Y");

$this->title = 'สุริยนต์ คอนกรีต';
?>



<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="alert alert-warning" role="alert">
            <div class="inner">
                <center>
                    <p class="text-warning">
                        รายรับ ประจำเดือน </br><?php echo $date_my; ?>
                    </p><hr>
                </center>
                <center>
                    <h3>
                        <?php
                        $command = Yii::$app->db->createCommand("SELECT SUM(price) as total FROM item WHERE date BETWEEN '" . $date_m . "-01' and '" . $date_m . "-31'");
                        $target = $command->queryScalar();

                        echo $target;
                        ?>
                        บาท
                    </h3>
                </center>
            </div>
            <center>
                <a href="#" class="small-box-footer">
                    รายละเอียดเพิ่มเติม <i class="fa fa-arrow-circle-right"></i>
                </a>
            </center>
        </div>
    </div><!-- ./col -->

    <div class="col-lg-3 col-xs-6">
        <div class="alert alert-success" role="alert">
            <!-- small box -->
            <div class="inner">
                <center>
                    <p class="text-success">
                        รายการสั่งปูน ประจำเดือน </br><?php echo $date_my; ?>
                    </p><hr>
                </center>
                <center>
                    <h3>
                        <?php
                        $command = Yii::$app->db->createCommand("SELECT count(customer_id) as total FROM item WHERE date BETWEEN '" . $date_m . "-01' and '" . $date_m . "-31'");
                        $target = $command->queryScalar();

                        echo $target;
                        ?>
                        รายการ</h3>
                </center>
            </div>
            <center>
                <a href="#" class="small-box-footer">
                    รายละเอียดเพิ่มเติม <i class="fa fa-arrow-circle-right"></i>
                </a>
            </center>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="alert alert-danger" role="alert">
            <div class="inner">
                <center>
                    <p class="text-danger">
                        จำนวนคิว ประจำเดือน </br><?php echo $date_my; ?>
                    </p><hr>
                </center>
                <center>
                    <h3>
                        <?php
                        $command = Yii::$app->db->createCommand("SELECT SUM(q) as total FROM item WHERE date BETWEEN '" . $date_m . "-01' and '" . $date_m . "-31'");
                        $target = $command->queryScalar();

                        echo $target;
                        ?>
                        คิว
                    </h3>
                </center>
            </div>
            <center>
                <a href="#" class="small-box-footer">
                    รายละเอียดเพิ่มเติม <i class="fa fa-arrow-circle-right"></i>
                </a>
            </center>
        </div>
    </div><!-- ./col -->

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="alert alert-info" role="alert">
            <div class="inner">
                <center>
                    <p class="text-info">
                        จำนวนลูกค้าทั้งหมด </br><?= Html::encode($this->title) ?>
                    </p><hr>
                </center>
                <h3>
                    <center>
                        <?php
                        $command = Yii::$app->db->createCommand("SELECT count(customer_name) as total FROM customer");
                        $target = $command->queryScalar();

                        echo $target;
                        ?>
                        ราย
                </h3>
                </center>
            </div>
            <center>
                <a href="#" class="small-box-footer">
                    รายละเอียดเพิ่มเติม <i class="fa fa-arrow-circle-right"></i>
                </a>
            </center>
        </div>
    </div><!-- ./col -->

</div><!-- ./div row -->



<div class="panel-body">
    <div style="display: none">
        <?php
        echo Highcharts::widget([
            'scripts' => [
                'highcharts-more', // enables supplementary chart types (gauge, arearange, columnrange, etc.)
                //'modules/exporting', // adds Exporting button/menu to chart
                //'themes/grid', // applies global 'grid' theme to all charts
                //'highcharts-3d',
                'modules/drilldown'
            ]
        ]);
        ?>
    </div>
    <div id="chart1"></div>
    <?php
    $sql = "SELECT c.customer_name,SUM(i.q) AS total FROM item i left outer join customer c on c.id=i.customer_id GROUP BY c.customer_name ORDER BY total DESC limit 5";

    $rawData = Yii::$app->db->createCommand($sql)->queryAll();
    $main_data = [];
    foreach ($rawData as $data) {
        //echo $data['icd10'];
        $main_data[] = [
            'name' => $data['customer_name'],
            'y' => $data['total'] * 1,
                //'drilldown' => $data['hospcode']
        ];
    }
    $main = json_encode($main_data);
    ?>
    <?php
    $this->registerJs("$(function () {
                        $('#chart1').highcharts({
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: '5 อันดับลูกค้า / คิว ทั้งหมด'
                            },
                            xAxis: {
                                type: 'category'
                            },
                            yAxis: {
                                title: {
                                    text: '<b>คิว</b>'
                                },
                            },
                            legend: {
                                enabled: true
                            },
                            plotOptions: {
                                series: {
                                    borderWidth: 0,
                                    dataLabels: {
                                        enabled: true
                                    }
                                }
                            },
                            series: [
                            {
                                name: 'สุริยนต์ คอนกรีต',
                                colorByPoint: true,
                                data:$main
                            }
                            ],
                        });
                    });", yii\web\View::POS_END
    );
    ?>   

</div>





<div class="site-index">
    <center>
        <div class="alert alert-success" role="alert">

            <?php
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'panel' => [
                    'heading' => '<h3 class="panel-title">10 รายการล่าสุด</H3>',
                    'before' => Html::a('<i class="glyphicon glyphicon-plus"></i>', ['item/create'], ['class' => 'btn btn-success']) . ' ' .
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['class' => 'btn btn-info']),
                ],
                    //'export' => false,
                    //'toolbar' => [
                    //  '{toggleData}']
            ]);
            ?>
        </div>
    </center>
</div>


