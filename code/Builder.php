<?php

namespace SS\Rules;

use \Ruler\RuleBuilder;
use \Ruler\Context;

class Builder{
	
	public function createRule(\Rule $rule){
		$rb = new RuleBuilder;
		$condition = $rule->Condition();
		$rule = $rb->create(
			$condition->toRulerCondition($rb, $rb[$condition->getContextID()])
		);
		
		return $rule;
	}

	public function createContext(\Rule $rule){
		$context = new Context();
		$rule->Condition()->updateContext($context);
		return $context;
	}

}