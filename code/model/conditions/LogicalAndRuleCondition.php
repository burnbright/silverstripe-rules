<?php

use \Ruler\Operator\LogicalAnd;
use \Ruler\Variable;
use \Ruler\RuleBuilder;

class LogicalAndRuleCondition extends LogicalRuleCondition{
	
	public function toRulerCondition(RuleBuilder $rb, Variable $value) {
		$combinedrules = array();
		foreach($this->Conditions() as $condition){
			$combinedrules[] = $condition->toRulerCondition($rb, $rb[$condition->getContextID()]);
		}

		return new LogicalAnd($combinedrules);
	}

}