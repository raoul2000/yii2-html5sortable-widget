<?php
namespace raoul2000\widget\html5sortable;

use yii\web\AssetBundle;

/**
 * @author Raoul <raoul.boulard@gmail.com>
 */
class Html5SortableAsset extends AssetBundle
{
	public $js = [
		'js/jquery.sortable.js'
	];
	public $depends = [
		'yii\web\JqueryAsset',
	];
	public function init()
	{
		$this->sourcePath = __DIR__.'/assets';
		return parent::init();
	}
}
