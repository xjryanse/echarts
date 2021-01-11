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
        'legend'    =>['','','',''],
    ]; 

    /*
     * 获取选项
     */
    public function getOption()
    {
        return json_encode($this->option,JSON_UNESCAPED_UNICODE);
    }

}
