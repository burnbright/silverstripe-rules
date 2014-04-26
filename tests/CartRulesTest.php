<?php

class CartRulesTest extends SapphireTest{

	protected static $fixture_file = "rules/tests/rulesfixture.yml";

	function testRules(){

		//TODO
			//represent rules in datamodel
			//convert db conditions to Ruler form
			//pass context into builder
			//build custom Ruler rules?

		$datarule = $this->objFromFixture("Rule", "tenpcoffdrumsorcymbals");

		$builder = new SS\Rules\Builder();
		$rule = $builder->createRule($datarule);

		$context = $builder->createContext($datarule);
		$context["Item.ProductID"] = $this->objFromFixture("Product", "xx3drumkit")->ID;
		$this->assertTrue($rule->evaluate($context), "included product is present");

		$context2 = $builder->createContext($datarule);
		$context["Item.ProductID"] = $this->objFromFixture("Product", "sabian12crash")->ID;
		$this->assertFalse($rule->evaluate($context), "excluded product is not present");

		//condition types
			//boolean - true, false
			//scalar - > , < , =, <=, =>, != 
			//list - (not)contains, (not)same-as

		//example conditions
			//product id - list
			//category ids - list
			//quantity - scalar
			//price - scalar
			//dimensions - scalar
			//featured - boolean
	}


	function testRuler(){

		$rb = new Ruler\RuleBuilder;
		$rule = $rb->create(
			$rb->logicalAnd(
				$rb['minNumPeople']->lessThanOrEqualTo($rb['actualNumPeople']),
				$rb['maxNumPeople']->greaterThanOrEqualTo($rb['actualNumPeople'])
			),
			function() {
				return 'YAY!';
			}
		);

		$context = new Ruler\Context(array(
			'minNumPeople' => 5,
			'maxNumPeople' => 25,
			'actualNumPeople' => function() {
				return 6;
			},
		));

		$this->assertTrue($rule->evaluate($context));

		//lets try a different context
		$context = new Ruler\Context(array(
			'minNumPeople' => 5,
			'maxNumPeople' => 25,
			'actualNumPeople' => 4
		));

		$this->assertFalse($rule->evaluate($context));

	}

}