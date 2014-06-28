<?php

namespace raoul2000\widget\html5sortable;

use Yii;
use yii\base\Widget;
use yii\base\InvalidConfigException;
use yii\helpers\Json;
use yii\web\JsExpression;
/**
 * Html5Sortable is a wrapper for the [HTML5 Sortable](http://farhadi.ir/projects/html5sortable/).
 * For documentation on plugin option, please refer to https://github.com/farhadi/html5sortable
 *
 */
class Html5Sortable extends Widget
{
	public $selector;
	public $sortupdate=null;
	/**
	 *
	 * @var array options for the Html5Sortable plugin (see https://github.com/farhadi/html5sortable)
	 */
	public $pluginOptions = [];
	
	/**
	 * Initializes the widget.
	 * @throws InvalidConfigException if the "selector" property is not set.
	 */
	public function init()
	{
		parent::init();
		if (empty($this->selector)) {
			throw new InvalidConfigException('The "selector" property must be set.');
		}
	}
	/**
	 * (non-PHPdoc)
	 * @see \yii\base\Widget::run()
	 */
    public function run()
    {
        $this->registerClientScript();
    }
    /**
     * Registers the needed JavaScript and inject the JS initialization code
     */
    public function registerClientScript()
    {
    	$view = $this->getView();
    	Html5SortableAsset::register($view);

    	$options = empty($this->pluginOptions) ? '' : Json::encode($this->pluginOptions);
    	$js = "jQuery(\"{$this->selector}\").sortable(".$options.")";
		if( isset($this->sortupdate)) {
			$js .= ".bind('sortupdate',".$this->sortupdate.")";
		}
		$js .= ";";
    	$view->registerJs($js);
    }
}
