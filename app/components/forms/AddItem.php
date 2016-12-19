<?php

namespace App\Components;

use App\Queries,
	Nette\Application\UI,
	Nette\Forms\Controls\SubmitButton;
use Tracy\Debugger;

class AddItem extends UI\Control
{

	/** @var Queries\EventQuery */
	private $eventQuery;

	/** @var Queries\WordQuery */
	private $wordQuery;

	/** @var Queries\WordEventQuery */
	private $wordEventQuery;


	public function __construct(
		Queries\EventQuery $eventQuery,
		Queries\WordQuery $wordQuery,
		Queries\WordEventQuery $wordEventQuery)
	{
		parent::__construct();
		$this->eventQuery = $eventQuery;
		$this->wordQuery = $wordQuery;
		$this->wordEventQuery = $wordEventQuery;
	}


	public function render()
	{
		$this->template->setFile(__DIR__ . '/templates/addItem.latte');
		$this->template->render();
	}


	public function createComponentForm()
	{
		$form = new UI\Form();

		$form->addTextArea('text', 'Text:');
		$form->addCheckbox('is_sentence', 'Jedná se o větu');

		$form->addSubmit('submit', 'Uložit')->onClick[] = [$this, 'formSuccess'];
		$form->addSubmit('cancel', 'Zrušit')->onClick[] = [$this, 'formCancel'];

		return $form;
	}


	public function formSuccess(SubmitButton $button)
	{
		$values = $button->getForm()->getValues(TRUE);
		Debugger::log($this->getParameter('eventId'));
		$redirect = 'default';
		if ($eventId = $this->getParameter('eventId')) {
			if ($event = $this->eventQuery->findBy(['id' => $eventId])) {
				$redirect = $event->code;
				$word = $this->wordQuery->create([
					'text' => $values['text'],
					'isSentence' => $values['is_sentence'],
				]);
				$this->wordEventQuery->create([
					'word' => $word,
					'event' => $event,
				]);
				$this->wordEventQuery->flush();
			}
		}
		$this->getPresenter()->redirect($redirect);
	}


	public function formCancel(SubmitButton $button)
	{
		$redirect = 'default';
		if ($eventId = $this->getParameter('eventId')) {
			if ($event = $this->eventQuery->findBy(['id' => $eventId])) {
				$redirect = $event->code;
			}
		}
		$this->getPresenter()->redirect($redirect);
	}

}
