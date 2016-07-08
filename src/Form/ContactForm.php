<?php

namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

/**
* 
*/
class ContactForm extends Form
{
	
	protected function _buildSchema(Schema $schema)
	{
		return $schema->addField('name', 'string')
			->addField('email', ['type' => 'string'])
			->addField('body', ['type' => 'text']);
	}

	protected function _buildValidator(Validator $validator)
	{
		return $validator->add('name', 'length', [
				'rule' => ['minLength', 10],
				'message' => 'A name is required'
			])->add('email', 'format', [
				'rule' => 'email',
				'message' => 'A valid email is required',
			]);
	}

	protected function _execute(array $data)
	{
		debug($data);exit;
		return true;

	}

	/*public function setErrors($errors){
		$this->_errors = $errors;
	}*/
}
?>