<?php
	
	
	require('ww.php_classes/Page.php') ;
	
	//Common variables and functions
	include_once('ww.incs/common.php');
	
	
	if(isset($_REQUEST['page']))
		$page = $_REQUEST['page'];
	else 
		$page =' ';
	if(isset($_REQUEST['id']))
		$id = (int)$_REQUEST['id'];
	else 
		$id =0;
	//.....
	
	
	//Getting the page id
	if(!$id){
		if($page){ 	//=> Load by Page name
			$r = Page::getInstanceByName($page);
			if($r && isset($r->id))
				$id = $r->id;
			unset($r);
		}
		if(!$id){ // else load by special
			$special=1;
			if(!$page){
				$r=Page::getInstanceBySpecial($special);
				if($r && isset($r->id))$id=$r->id;
				unset($r);
			}
		}
	}
	//......
	
	
	if($id)
		$PAGEDATA=(isset($r) && $r)? $r : Page::getInstance($id);
	else{
		echo '404 thing goes here';
		exit;
	}
	
	echo $PAGEDATA->body ;
?>