<?php
namespace xjryanse\echarts\charts;

use xjryanse\echarts\interfaces\ChartsInterface;
/**
 * graph-simple
 */
class GraphSimple extends Base implements ChartsInterface
{
    protected $option = [
        'title'     =>['text'=>'Graph 简单示例'],
        'tooltip'   =>[],
        'animationDurationUpdate'   =>1500,
        'animationEasingUpdate'   =>'quinticInOut',
        'series'=>[
            [
                'type'  =>'graph',
                'layout'=>'none',
                'symbolSize'=>50,
                'roam'=>true,
                'label'=>['show'=>true],
                'edgeSymbol'=>['circle','arrow'],
                'edgeSymbolSize'=>[4,10],
                'edgeLabel'=>['fontSize'=>20],
                //'data','links'         
//                'links'=>[
//                    'source'=>0,
//                    'target'=>1,
//                    'symbolSize'=>[5,20],
//                    'label'=>['show'=>true],
//                    'lineStyle'=>[
//                        'width'     => 5,
//                        'curveness' => 0.2,                    
//                    ]
//                ],
                'lineStyle'=>[
                    'opacity'   => 0.9,
                    'width'     => 2,
                    'curveness' => 0,                    
                ]
            ],
        ],
    ]; 

    /*
     * 获取选项
     */
    public function getOption()
    {
        return $this->option;
    }
    
    /**
     * 添加点
     * @param type $name
     * @param type $x
     * @param type $y
     */
    public function addData($name,$x,$y)
    {
        $this->option['series'][0]['data'][] = ['name'=>$name,'x'=>$x,'y'=>$y];
    }

    /**
     * 添加点
     * @param type $name
     * @param type $x
     * @param type $y
     */
    public function addLink( $source, $target )
    {
        $this->option['series'][0]['links'][] = ['source'=>$source,'target'=>$target];
    }
}
