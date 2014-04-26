<?php

class ProductPresentRuleCondition extends CartRuleCondition{
	
	private static $many_many = array(
		'Products' => 'Product'
	);

	//TODO: get cms fields

	function getRulerContextValue(){
		return $this->Products()
					->map('ID', 'ID')
					->toArray();
	}

	function toRulerCondition(\Ruler\RuleBuilder $rb, \Ruler\Variable $value){
		return $value->contains($rb['Item.ProductID'], function(){
			echo "product present!";
		});
	}

}
