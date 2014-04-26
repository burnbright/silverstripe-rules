<?php

use \Ruler\Operator\LogicalOr;
use \Ruler\Variable;
use \Ruler\RuleBuilder;

class LogicalOrRuleCondition extends LogicalRuleCondition{
	
	public function toRulerCondition(RuleBuilder $rb, Variable $value) {
		$combinedrules = array();
		foreach($this->Conditions() as $condition){
			$combinedrules[] = $condition->toRulerCondition($rb, $rb[$condition->getContextID()]);
		}

		return new LogicalOr($combinedrules);
	}
	
}