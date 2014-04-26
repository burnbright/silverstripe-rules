<?php

class Rule extends DataObject{
	
	private static $db = array(
		'Title' => 'Varchar',
		'Description' => 'Text',
		'ConditionsData' => 'Text',
		'Sort' => 'Int',
		'Active' => 'Boolean',
		'StartDate' => 'Date',
		'EndDate' => 'Date'
	);

	private static $has_one = array(
		'Condition' => 'RuleCondition'
	);

	//action(s)

	function getCMSFields(){
		$fields = parent::getCMSFields();
		//main info & conditions
		//conditions builder
		//actions
		return $fields;
	}

}