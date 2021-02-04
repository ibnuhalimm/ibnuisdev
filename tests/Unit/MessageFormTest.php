<?php

namespace Tests\Unit;

use App\Http\Livewire\FrontEnd\MessageForm;
use Illuminate\Support\Str;
use Livewire\Livewire;
use Tests\TestCase;

class MessageFormTest extends TestCase
{
    /**
     * Message form component should has following attributes
     * - name
     * - email
     * - body
     *
     * @return void
     */
    public function testComponentHasFollowingAttributes()
    {
        Livewire::test(MessageForm::class)
            ->assertSet('name', null)
            ->assertSet('email', null)
            ->assertSet('body', null);
    }

    /**
     * Should success if sending valid data
     *
     * @return void
     */
    public function testSuccessSendingIfProvidedValidData()
    {
        Livewire::test(MessageForm::class)
            ->set('name', $this->faker->name())
            ->set('email', $this->faker->safeEmail)
            ->set('body', $this->faker->text())
            ->call('sendMessage')
            ->assertSeeHtml('Success');
    }

    /**
     * Should failed if all fields not filled
     *
     * @return void
     */
    public function testGetErrorsIfAllFieldsNotFilled()
    {
        Livewire::test(MessageForm::class)
            ->set('name', null)
            ->set('email', null)
            ->set('body', null)
            ->call('sendMessage')
            ->assertHasErrors([
                'name' => 'required',
                'email' => 'required',
                'body' => 'required'
                ]);
    }

    /**
     * Should failed if name not provided
     *
     * @return void
     */
    public function testGetRequiredErrorIfNameNotProvided()
    {
        Livewire::test(MessageForm::class)
            ->set('name', null)
            ->set('email', $this->faker->safeEmail)
            ->set('body', $this->faker->text())
            ->call('sendMessage')
            ->assertHasErrors(['name' => 'required']);
    }

    /**
     * Should failed if name less than 3 characters
     *
     * @return void
     */
    public function testGetMinErrorIfNameLessThanThreeChars()
    {
        Livewire::test(MessageForm::class)
            ->set('name', substr($this->faker->name, 0, 2))
            ->set('email', $this->faker->safeEmail)
            ->set('body', $this->faker->text())
            ->call('sendMessage')
            ->assertHasErrors(['name' => 'min']);
    }

    /**
     * Should failed if name more than 40 characters
     *
     * @return void
     */
    public function testGetMaxErrorIfNameMoreThanFourtyChars()
    {
        Livewire::test(MessageForm::class)
            ->set('name', substr($this->faker->text(), 0, 41))
            ->set('email', $this->faker->safeEmail)
            ->set('body', $this->faker->text())
            ->call('sendMessage')
            ->assertHasErrors(['name' => 'max']);
    }

    /**
     * Should failed if `email` not provided
     *
     * @return void
     */
    public function testGetRequiredErrorIfEmailNotProvided()
    {
        Livewire::test(MessageForm::class)
            ->set('name', $this->faker->name)
            ->set('email', null)
            ->set('body', $this->faker->text())
            ->call('sendMessage')
            ->assertHasErrors(['email' => 'required']);
    }

    /**
     * Should failed if `email` is not valid
     *
     * @return void
     */
    public function testGetInValidErrorIfEmailNotValid()
    {
        Livewire::test(MessageForm::class)
            ->set('name', $this->faker->name)
            ->set('email', $this->faker->name)
            ->set('body', $this->faker->text())
            ->call('sendMessage')
            ->assertHasErrors(['email' => 'email']);
    }

    /**
     * Should failed if `email` is more than one hundred
     *
     * @return void
     */
    public function testGetMaxErrorIfEmailMoreThanOneHundredChars()
    {
        $long_fake_email = Str::random(100) . '@' . $this->faker->freeEmailDomain;

        Livewire::test(MessageForm::class)
            ->set('name', $this->faker->name)
            ->set('email', $long_fake_email)
            ->set('body', $this->faker->text())
            ->call('sendMessage')
            ->assertHasErrors(['email' => 'max']);
    }

    /**
     * Should failed if `body` not provided
     *
     * @return void
     */
    public function testGetRequiredErrorIfBodyMessageNotProvided()
    {
        Livewire::test(MessageForm::class)
            ->set('name', $this->faker->name)
            ->set('email', $this->faker->safeEmail)
            ->set('body', null)
            ->call('sendMessage')
            ->assertHasErrors(['body' => 'required']);
    }

    /**
     * Should failed if `body` less than 10 chars
     *
     * @return void
     */
    public function testGetMinErrorIfBodyMessageLessThanTenChars()
    {
        Livewire::test(MessageForm::class)
            ->set('name', $this->faker->name)
            ->set('email', $this->faker->safeEmail)
            ->set('body', substr($this->faker->text, 0, 9))
            ->call('sendMessage')
            ->assertHasErrors(['body' => 'min']);
    }
}
