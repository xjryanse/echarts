<?php
namespace xjryanse\echarts\charts;

use xjryanse\echarts\interfaces\ChartsInterface;
/**
 * 折线图堆叠
 */
class LineStack extends Base implements ChartsInterface
{
    
    protected $option = [
        'title'     =>['text'=>'默认标题'],
        'tooltip'   =>['trigger'=>'axis'],
        'grid'      =>[
            'left'          => '3%',
            'right'         => '4%',
            'bottom'        => '3%',
            'containLabel'  => true,
        ],
        'toolbox'      =>[
            'feature'          => ['saveAsImage'=>[]],
        ],
        'yAxis'=>['type'=>'value'],
    ]; 

    /*
     * 获取选项
     */
    public function getOption()
    {
        return $this->option;
    }
    
    /**
     * 
     * @param string $title 标题
     * @param array $data   数据
     */
    public function setData(string $title, array $data )
    {
        $this->setTitle( $title );
        $keys = array_keys( current($data) );
        $this->setLegend( $keys );
        //x轴
        $this->setXAxis(array_keys($data) );
        foreach($keys as $name){
            $this->addSeries($name, array_column($data,$name));
        }
    }
    
    protected function setTitle( $title )
    {
        $this->option['title'] = ["text"=>$title];
    }
    
    /**
     * 类别行
     * @param type $data
     */
    protected function setLegend( $data )
    {
        $this->option['legend'] = ['data'=>$data];
    }
    /**
     * 横轴
     * @param array $data
     * @param type $type
     * @param type $boundaryGap
     * @param type $extra
     */
    protected function setXAxis(array $data, $type="category", $boundaryGap = false , $extra = [])
    {
        $this->option['xAxis']['type']          = $type;
        $this->option['xAxis']['boundaryGap']   = $boundaryGap;
        $this->option['xAxis']['data']          = $data;
    }
    /**
     * 添加系列
     * @param string $name
     * @param array $data
     * @param type $type
     * @param type $stack
     * @param type $smooth
     * @param type $extra
     */
    protected function addSeries(string $name, array $data, $type='line', $stack="", $smooth=true, $extra = [])
    {
        $series = [
            'name'  =>  $name,
            'type'  =>  $type,
            'smooth'=>  $smooth,
            'stack' =>  $stack,
            'data'  =>  $data,
        ];
        $this->option['series'][]   = $series;
    }
    

    

}
