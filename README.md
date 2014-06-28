yii2-html5sortable-widget
==========================
Wrapper around "HTML5 Sortable", a jQuery plugin to create sortable lists and grids using native HTML5 drag and drop API. 

Check out the  [HTML5 Sortable](http://farhadi.ir/projects/html5sortable/) for demo of the Plugin.

> Please note that this extension does not provide any aditionnal feature than the one available in the wrapped plugin. 
> It has no other dependency than the [Yii2 Framework](http://www.yiiframework.com/)


Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist raoul2000/yii2-html5sortable-widget "*"
```

or add

```
"raoul2000/yii2-html5sortable-widget": "*"
```

to the require section of your `composer.json` file.


Usage
-----
This is an example no how to use this extension once it is installed.
First, create an HTML [bootstrap list group](http://getbootstrap.com/components/#list-group) :

```html
		<ul class="list-group sortable" style="min-height: 42px;">
		  <li class="list-group-item"><span class="glyphicon glyphicon-align-justify"></span> Cras justo odio</li>
		  <li class="list-group-item disabled "><span class="glyphicon glyphicon-align-justify"></span> can't be dragged because of disabled class</li>
		  <li class="list-group-item"><span class="glyphicon glyphicon-align-justify"></span> Morbi leo risus</li>
		  <li class="list-group-item"><span class="glyphicon"></span>can't be dragged because the handle is missing !</li>
		  <li class="list-group-item"><span class="glyphicon glyphicon-align-justify"></span> Vestibulum at eros</li>
		</ul>
```

Then let's add some styling so our list items render nicely when drag and dropped :

```css
	li.list-group-item {
		height:42px;
	}
	li.sortable-placeholder {
		border: 1px dashed #CCC;
		background: #eeeeee;
		height:42px;
		list-style: none;
	}
```

Finally, make is **HTML 5 Sortable** by inserting following code :

```php
<?php 
	 		
	echo raoul2000\widget\html5sortable\Html5Sortable::widget([
		'selector' => '.sortable',
		'sortupdate' => new yii\web\JsExpression('function(){console.log("update");}'),
		'pluginOptions' => [
			'handle' => '.glyphicon-align-justify',
			'items' => ':not(.disabled)'
		]
	]);
?>
```

For more information on the plugin options and usage, please refer to [html5sortable@github](https://github.com/farhadi/html5sortable).

License
-------

**yii2-html5sortable-widget** is released under the BSD 3-Clause License. See the bundled `LICENSE.md` for details.