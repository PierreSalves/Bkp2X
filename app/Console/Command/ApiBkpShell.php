<?php
App::uses('AppShell', 'Console/Command');
App::uses('Shell', 'Console');
App::uses('CakeTime', 'Utility');

class ApiBkpShell extends AppShell
{

	public $tasks = array('ApiBkp');

	public function main()
	{
		$count = 1;
		while (true) {

			$this->out('IniciandoExecucao - Ação : ' . $count . ' - Data : ' . date('Y-m-d H:i:s'));

			$this->ApiBkp->execute();

			$this->out('FimExecucao' . '- Data : ' . date('Y-m-d H:i:s'));
			$this->out('||||||||||||||||||');

			sleep(600);
			$count++;
		}
	}
}
