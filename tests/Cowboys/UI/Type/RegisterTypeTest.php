<?php

namespace Tests\Cowboys\UI\Form\Type;

use Cowboys\Application\Command\RegisterCommand;
use Cowboys\UI\Form\RegisterType;
use Symfony\Component\Form\Test\TypeTestCase;

/**
 * Tests for RegisterType
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class RegisterTypeTest extends TypeTestCase
{
    public function testSubmitValidData()
    {
        $formData = [
            'name'     => 'Gillou',
            'email'    => 'contact@gb-prod.fr',
            'password' => 'secret'
        ];

        $form = $this->factory->create(RegisterType::class);

        $command = new RegisterCommand();
        $command->name = 'Gillou';
        $command->email = 'contact@gb-prod.fr';
        $command->password = 'secret';

        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());
        $this->assertEquals($command, $form->getData());

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }
}