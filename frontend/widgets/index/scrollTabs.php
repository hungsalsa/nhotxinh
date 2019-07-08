<?php
namespace frontend\widgets\index;

use yii\base\Widget;
use frontend\models\product\FProduct;
use frontend\models\setting\FSettingTabs;
class scrollTabs extends Widget
{
    public function init()
    {
        parent::init();
    }
    public function run()
    {
    	$product = new FProduct();
    	$dataNew = $product->getNewProduct();
        $model = new FSettingTabs();
        $dataTabs = $model->getAllTabs();
        foreach ($dataTabs as $key => $value) {
            $dataTabs[$key]['product'] = $product->getProductByCateID(json_decode($value['child_cate']));
            // $dataTabs[$key]['tabpane'] = 'tabpane'.$key;
        }
    	$data = [
            'all'=>$dataNew,
            'tabs'=>$dataTabs,
        ];
        // pr(count($data['tabs']));
        // dbg($data);
         return $this->render('scrollTabs',['data'=>$data]);
    }
}