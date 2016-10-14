<?php

/**
 * Пример паттерна Decorator
 */
abstract class Component {

	abstract public function Operation();
}

class ConcreteComponent extends Component {
	/**
	 * @return current date and time string
	 */
	public function Operation() {
		return date("Y-m-d H:i:s");
	}

}

abstract class Decorator extends Component {

	protected
			$_component = null;

	public function __construct(Component $component) {
		$this->_component = $component;
	}

	protected function getComponent() {
		return $this->_component;
	}

	public function Operation() {
		return $this->getComponent()->Operation();
	}

}

class ConcreteDecoratorA extends Decorator {
	
	public function Operation() {
		return date("F j, Y, g:i a", strtotime(parent::Operation()));
	}

}

class ConcreteDecoratorB extends Decorator {

	public function Operation() {
		return "Today is <strong>" . parent::Operation() . "</strong>";
	}

}

//usage

$element = new ConcreteComponent();
$extendedElement = new ConcreteDecoratorA($element);
$anotherExtendedElement = new ConcreteDecoratorB($element);

print $element->Operation() . "<br/>";
print $extendedElement->Operation() . "<br/>";
print $anotherExtendedElement->Operation() . "<br/>";

$superExtendedElement = new ConcreteDecoratorB($extendedElement);

print $superExtendedElement->Operation() . "<br/>";





