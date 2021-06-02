<?php

namespace App\Http\Livewire\Dashboard\Blog\ShareButton;

use App\Models\Blog\ShareButton;
use Illuminate\Support\Str;
use Livewire\Component;

class Create extends Component
{
    /**
     * Define properties.
     *
     * @var mixed
     */
    public $nama;
    public $ikon;
    public $url;
    public $nomor_urut;

    /**
     * Form validation rules.
     *
     * @return array
     */
    protected function formValidationRules()
    {
        return [
            'nama' => 'required|string|min:2|max:30|unique:share_button,nama',
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
    public function mount()
    {
        $this->nomor_urut = 0;
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
    public function storeShareButton()
    {
        $this->validate($this->formValidationRules(), [], $this->formValidationAttributes());

        ShareButton::create([
            'nama' => Str::of($this->nama)->trim(),
            'ikon' => Str::of($this->ikon)->trim(),
            'url' => Str::of($this->url)->trim(),
            'nomor_urut' => $this->nomor_urut,
        ]);

        return redirect()->route('dashboard.share-button.index');
    }

    /**
     * Render to view.
     *
     * @return \Illuminate\Http\Response
     */
    public function render()
    {
        return view('livewire.dashboard.blog.share-button.create');
    }
}
