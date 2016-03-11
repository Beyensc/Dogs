<?php

class VExemple extends VBase {

    function __construct($appli, $model) {
        parent::__construct($appli, $model);
    }

    public function test(){
    	$html='';
    	$html.='<table>

    			<tr><td><input type="file" name="test"></td></tr>

    			</table>';

    	$this->appli->content=$html;


    }
	
}
?>