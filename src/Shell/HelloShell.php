<?php
	namespace App\Shell;

	use Cake\Console\Shell;

	/**
	* 
	*/
	class HelloShell extends Shell
	{
		
		public function main(){
			$this->out('Hello World !!!!!11');
		}

		public function heyThere($name = 'Anonymous'){
			$this->out('hey there '. $name);
		}
	}

?>