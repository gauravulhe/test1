<?php
    echo $this->Html->charset();
    echo $this->Html->css('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css');
    echo $this->Html->css('base.css');
    echo $this->Html->css('cake.css');

    echo $this->Html->scriptBlock("
    	var APP = APP || {};
    	APP.data = ".json_encode($jsVars)."
    ", ['inline' => true]);

    
    echo $this->Html->script('jquery.js');
    echo $this->Html->script('jquery-3.0.0.min.js');
    echo $this->Html->script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js');
    echo $this->Html->script('custom.js');
?>
<title>Cake PHP 3 Tutorial</title>