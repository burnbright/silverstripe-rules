<?php

use \Ruler\RuleBuilder;
use \Ruler\Variable;
use \Ruler\Context;

class RuleCondition extends DataObject{
	
	private static $singular_name = "Condition";

	private static $has_one = array(
		'Parent' => 'RuleCondition' //for combining conditions
	);

	public function toRulerCondition(RuleBuilder $rb, Variable $value) {
		user_error(get_class($this)." must implement 'toRulerRule'");
	}

	/**
	 * Wrap context value call in an anonmyous function,
	 * so it only gets called when necessary.
	 * 
	 * @param  RulerContext $c [description]
	 * @return function          wrapped value
	 */
	public function updateContext(Context $c){
		if(!method_exists($this, 'getRulerContextValue')){
			return;
		}
		$c[$this->getContextID()] = function(){
			return $this->getRulerContextValue();
		};
	}

	public function getContextID(){
		return get_class($this).$this->ID;
	}

}