<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class EvaluasiATChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\HorizontalBar
    {
            
        return $this->chart->horizontalBarChart()
            ->addData('Persentase Evaluasi',
            [10,20,30,40,50,60,70,80,90,100,95,75,55,35,15,25,45,65,85,97,87,77,67,57,37,27,
            10,20,30,40,50,60,70,80,90,100,95,75,55,35,15,25,45,65,85,97,87,77,67,57,37,27])
            ->setColors(['#FFC107'])
            ->setXAxis(['Andi','Bambang','Cahyo','Doni','Ema','Fani','Gio','Hari','Indah','Joko','Koko','Lily','Mina','Nano','Oni','Pandu','Qiqi','Risa','Sinta','Tuti','Umi','Via','Wawan','Xyarla','Yanti','Zamroni',
            'Andi','Bambang','Cahyo','Doni','Ema','Fani','Gio','Hari','Indah','Joko','Koko','Lily','Mina','Nano','Oni','Pandu','Qiqi','Risa','Sinta','Tuti','Umi','Via','Wawan','Xyarla','Yanti','Zamroni'])
            ;

    }
}
