<?php
namespace Application;

use \Brilliant\Log\BLog;

class Frameworks{
	use \Brilliant\BSingleton;
	public $list = array();
	/**
	 *
	 */
	public function useFramework($alias=''){
		$this->list[$alias]=$alias;
		if($alias=='jquery-ui'){
			$this->useFramework('jquery');
			}
		if($alias=='select2-finances-currencies'){
			$this->useFramework('select2');
			}
		}
	/**
	 *
	 */
	public function frameworksProcess($html){
		foreach($this->list as $framework){
			switch($framework){
				case 'jquery': 
					$html->addJS(URL_STATIC.'assets/jquery/jquery.min.js','',JS_PRIORITY_FRAMEWORK);
					break;
				case 'font-awesome':
					$html->addCSS(URL_STATIC.'assets/font-awesome/css/font-awesome.min.css','',CSS_PRIORITY_FRAMEWORK2);
					break;
				default:
					BLog::addtolog('Unknown framework "'.$framework.'"');
				}
			}
		}
	}
