<?php 

	namespace App\Controller;

	use App\Controller\AppController;
	use App\Form\ContactForm;
	use Cake\Event\Event;

	/**
	* 
	*/
	class ContactController extends AppController
	{
		
		public function index()
		{
			$contact = new ContactForm();
			if ($this->request->is('post')) {
				if ($contact->execute($this->request->data)) {
						$contact = $this->Contact->newEntity();
						$contact = $this->Contact->patchEntity($contact, $this->request->data);
			            if ($this->Contact->save($contact)) {
			            	$this->Flash->success('Success !!! We will get back to you soon');
			            }else{
							$this->Flash->error('Could not save.');
						}
											
				}else{
					$this->Flash->error('There was a problem.');
				}
			}

			/*if ($this->request->is('get')) {
				$this->request->data['name'] = 'gaurav';
				$this->request->data['email'] = 'gauravu@sanisoft.com';
			}*/
			$this->set('contact', $contact);
			//$contact->setErrors(["email" => ["_required" => "Your email is required"]]);
		}
	}
?>