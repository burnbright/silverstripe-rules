<?php

use \Ruler\Context;

class LogicalRuleCondition extends RuleCondition{
	
	private static $has_many = array(
		'Conditions' => 'RuleCondition'
	);

	public function updateContext(Context $c){
		parent::updateContext($c);
		foreach($this->Conditions() as $condition){
			$condition->updateContext($c);
		}
	}

}