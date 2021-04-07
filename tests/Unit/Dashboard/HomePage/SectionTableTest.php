<?php

namespace Tests\Unit\Dashboard\HomePage;

use App\Http\Livewire\Dashboard\Section\Table;
use App\Models\Section;
use Livewire\Livewire;
use Tests\TestCase;

class SectionTableTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_show_edit_section_modal()
    {
        $section = factory(Section::class)->create();

        Livewire::test(Table::class)
            ->call('editSection', $section->id)
            ->assertSet('edit_section_id', $section->id)
            ->assertSet('edit_section', $section->section)
            ->assertSet('edit_description', $section->description)
            ->assertSet('is_edit_modal_open', 1);
    }

    /**
     * Test cancel edit the section, close modal
     *
     * @return void
     */
    public function test_cancel_edit_close_edit_modal()
    {
        Livewire::test(Table::class)
            ->call('cancelEditSection')
            ->assertSet('edit_section_id', null)
            ->assertSet('edit_section', null)
            ->assertSet('edit_description', null)
            ->assertSet('is_edit_modal_open', 0);
    }

    /**
     * Can update section description
     *
     * @return void
     */
    public function test_can_update_section_description()
    {
        $section = factory(Section::class)->create();

        Livewire::test(Table::class)
            ->set('edit_section_id', $section->id)
            ->set('edit_section', $section->section)
            ->set('edit_description', 'New description here!')
            ->call('submitEditSection')
            ->assertSet('is_edit_modal_open', 0)
            ->assertSeeHtml('success');
    }

    /**
     * Get error if section field is blank
     * when trying to update section
     *
     * @return void
     */
    public function test_can_not_update_section_if_section_field_is_blank()
    {
        $section = factory(Section::class)->create();

        Livewire::test(Table::class)
            ->set('edit_section_id', $section->id)
            ->set('edit_section', null)
            ->set('edit_description', 'This is new description!')
            ->call('submitEditSection')
            ->assertHasErrors([
                'edit_section' => 'required'
            ]);
    }

    /**
     * Get error if section field is invalid
     * when trying to update section
     *
     * @return void
     */
    public function test_can_not_update_section_if_section_field_is_invalid()
    {
        $section = factory(Section::class)->create();

        Livewire::test(Table::class)
            ->set('edit_section_id', $section->id)
            ->set('edit_section', 'INVALID_VALUE!!!')
            ->set('edit_description', 'This is new description!')
            ->call('submitEditSection')
            ->assertHasErrors([
                'edit_section' => 'in'
            ]);
    }

    /**
     * Get error if description is blank
     * when trying to update section
     *
     * @return void
     */
    public function test_can_not_update_section_if_description_field_is_blank()
    {
        $section = factory(Section::class)->create();

        Livewire::test(Table::class)
            ->set('edit_section_id', $section->id)
            ->set('edit_section', $section->section)
            ->set('edit_description', null)
            ->call('submitEditSection')
            ->assertHasErrors([
                'edit_description' => 'required'
            ]);
    }

    /**
     * Get error if description is less than 10 characters
     *
     * @return void
     */
    public function test_can_not_update_section_if_description_less_than_ten_chars()
    {
        $section = factory(Section::class)->create();

        Livewire::test(Table::class)
            ->set('edit_section_id', $section->id)
            ->set('edit_section', $section->section)
            ->set('edit_description', 'One Two')
            ->call('submitEditSection')
            ->assertHasErrors([
                'edit_description' => 'min'
            ]);
    }
}
