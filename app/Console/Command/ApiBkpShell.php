<?php
App::uses('AppShell', 'Console/Command');
App::uses('Shell', 'Console');
App::uses('CakeTime', 'Utility');

class ApiBkpShell extends AppShell
{

	public $tasks = array('ApiBkp'); // Carrega a task

	public function main()
	{
		while (true) {

			$this->out('Verificando se a task deve ser executada...');
			if (CakeTime::isWithinNext('10 minutes', 'now')) {
				$this->out('Executando a task...');
				$this->ApiBkp->execute();
			} else {
				$this->out('A task não deve ser executada neste momento.');
			}

			sleep(30);
		}
	}
}
