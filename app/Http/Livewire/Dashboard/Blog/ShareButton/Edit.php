<?php

namespace App\Http\Livewire\Dashboard\Blog\ShareButton;

use App\Models\Blog\ShareButton;
use Illuminate\Support\Str;
use Livewire\Component;

class Edit extends Component
{
    /**
     * Define properties.
     *
     * @var mixed
     */
    public $share_button_id;
    public $nama;
    public $ikon;
    public $url;
    public $nomor_urut;

    public $is_delete_modal_open = 0;

    /**
     * Form validation rules.
     *
     * @return array
     */
    protected function formValidationRules()
    {
        return [
            'nama' => 'required|string|min:2|max:30|unique:share_button,nama,'.$this->share_button_id,
            'ikon' => 'required|string|max:30',
            'url' => 'required|url',
            'nomor_urut' => 'required|integer|min:0',
        ];
    }

    /**
     * Form validation attributes.
     *
     * @return array
     */
    protected function formValidationAttributes()
    {
        return [
            'nama' => 'Name',
            'ikon' => 'Icon',
            'url' => 'URL',
            'nomor_urut' => 'Order Number',
        ];
    }

    /**
     * Initialize properties value.
     *
     * @return void
     */
    public function mount($share_button)
    {
        $this->share_button_id = $share_button->id;
        $this->nama = $share_button->nama;
        $this->ikon = $share_button->ikon;
        $this->url = $share_button->url;
        $this->nomor_urut = $share_button->nomor_urut;
    }

    /**
     * Run form validation after updating properties.
     *
     * @param string $field_name
     * @return void
     */
    public function updated($field_name)
    {
        $this->validateOnly($field_name, $this->formValidationRules(), [], $this->formValidationAttributes());
    }

    /**
     * Storing data.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateShareButton()
    {
        $this->validate($this->formValidationRules(), [], $this->formValidationAttributes());

        ShareButton::where('id', $this->share_button_id)
                    ->update([
                        'nama' => Str::of($this->nama)->trim(),
                        'ikon' => Str::of($this->ikon)->trim(),
                        'url' => Str::of($this->url)->trim(),
                        'nomor_urut' => $this->nomor_urut,
                    ]);

        return redirect()->route('dashboard.share-button.index');
    }

    /**
     * Action delete share button.
     *
     * @return void
     */
    public function deleteShareButton()
    {
        $this->is_delete_modal_open = 1;
    }

    /**
     * Cancel delete share button.
     *
     * @return void
     */
    public function cancelDestroyShareButton()
    {
        $this->is_delete_modal_open = 0;
    }

    /**
     * Action destroy / delete share button from database.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyShareButton()
    {
        ShareButton::destroy($this->share_button_id);

        return redirect()->route('dashboard.share-button.index');
    }

    /**
     * Render to view.
     *
     * @return \Illuminate\Http\Response
     */
    public function render()
    {
        return view('livewire.dashboard.blog.share-button.edit');
    }
}
