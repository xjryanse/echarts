<?php

namespace xjryanse\echarts\service;

use xjryanse\system\interfaces\MainModelInterface;

/**
 * 
 */
class EchartsService extends Base implements MainModelInterface {

    use \xjryanse\traits\InstTrait;
    use \xjryanse\traits\MainModelTrait;
    use \xjryanse\traits\MainModelRamTrait;
    use \xjryanse\traits\MainModelCacheTrait;
    use \xjryanse\traits\MainModelCheckTrait;
    use \xjryanse\traits\MainModelGroupTrait;
    use \xjryanse\traits\MainModelQueryTrait;


// 静态模型：配置式数据表
    use \xjryanse\traits\StaticModelTrait;

    protected static $mainModel;
    protected static $mainModelClass = '\\xjryanse\\echarts\\model\\Echarts';

    /**
     * 根据表单key取id
     * @param type $chartKey
     * @return type
     */
    public static function getIdByChartKey($chartKey) {
        $con[] = ['chart_key', '=', $chartKey];
        $info = self::staticConFind($con);
        return $info ? $info['id'] : '';
    }

    public function getCharts($param = []) {
        // $resRaw = $this->staticGet();
        $option['title'] = EchartsTitleService::getTitle($this->uuid);
        $option['xAxis'] = EchartsXaxisService::getXaxis($this->uuid, $param);
        $option['yAxis'] = EchartsYaxisService::getYaxis($this->uuid);
        $option['series'] = EchartsSeriesService::selectSeries($this->uuid, $param);
        $option['tooltip'] = EchartsTooltipService::getTooltips($this->uuid);
        $namesArr = EchartsSeriesService::namesArr($this->uuid);
        if (count($namesArr) > 1) {
            $option['legend']['data'] = $namesArr;
        }

        return $option;
    }

    /**
     * 钩子-保存前
     */
    public static function ramPreSave(&$data, $uuid) {
        
    }

    /**
     * 钩子-保存后
     */
    public static function ramAfterSave(&$data, $uuid) {
        
    }

    /**
     * 钩子-更新前
     */
    public static function ramPreUpdate(&$data, $uuid) {
        
    }

    /**
     * 钩子-更新后
     */
    public static function ramAfterUpdate(&$data, $uuid) {
        
    }

    /**
     * 钩子-删除前
     */
    public function ramPreDelete() {
        
    }

    /**
     * 钩子-删除后
     */
    public function ramAfterDelete() {
        
    }

    /**
     *
     */
    public function fId() {
        return $this->getFFieldValue(__FUNCTION__);
    }

    /**
     * 图表key
     */
    public function fChartKey() {
        return $this->getFFieldValue(__FUNCTION__);
    }

    /**
     * 图表名
     */
    public function fChartName() {
        return $this->getFFieldValue(__FUNCTION__);
    }

    /**
     * 排序
     */
    public function fSort() {
        return $this->getFFieldValue(__FUNCTION__);
    }

    /**
     * 状态(0禁用,1启用)
     */
    public function fStatus() {
        return $this->getFFieldValue(__FUNCTION__);
    }

    /**
     * 有使用(0否,1是)
     */
    public function fHasUsed() {
        return $this->getFFieldValue(__FUNCTION__);
    }

    /**
     * 锁定（0：未锁，1：已锁）
     */
    public function fIsLock() {
        return $this->getFFieldValue(__FUNCTION__);
    }

    /**
     * 锁定（0：未删，1：已删）
     */
    public function fIsDelete() {
        return $this->getFFieldValue(__FUNCTION__);
    }

    /**
     * 备注
     */
    public function fRemark() {
        return $this->getFFieldValue(__FUNCTION__);
    }

    /**
     * 创建者，user表
     */
    public function fCreater() {
        return $this->getFFieldValue(__FUNCTION__);
    }

    /**
     * 更新者，user表
     */
    public function fUpdater() {
        return $this->getFFieldValue(__FUNCTION__);
    }

    /**
     * 创建时间
     */
    public function fCreateTime() {
        return $this->getFFieldValue(__FUNCTION__);
    }

    /**
     * 更新时间
     */
    public function fUpdateTime() {
        return $this->getFFieldValue(__FUNCTION__);
    }

}
