<?php

namespace App\Http\Livewire\Dashboard\Blog\Post;

use App\Models\Blog\Post;
use App\Traits\LivewireOptimizeImage;
use Illuminate\Support\Facades\URL;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads, LivewireOptimizeImage;

    /**
     * Define all properties
     *
     * @var mixed
     */
    public $gbr;
    public $gbr_url;
    public $judul;
    public $isi;
    public $status;
    public $tag;

    /**
     * Form validation rules
     *
     * @var array
     */
    protected $form_validation_rules = [
        'gbr' => 'required|image',
        'judul' => 'required|string|min:20|max:100',
        'isi' => 'required|string|min:300',
        'status' => 'required|numeric|in:' . Post::STATUS_DRAFT . ',' . Post::STATUS_PUBLISH,
        'tag' => 'string|nullable'
    ];

    /**
     * Form validation attributes
     *
     * @var array
     */
    protected $form_validation_attributes = [
        'gbr' => 'Image',
        'judul' => 'Title',
        'isi' => 'Text',
        'status' => 'Status',
        'tag' => 'Tag'
    ];

    /**
     * Initial properties value
     *
     * @return void
     */
    public function mount()
    {
        $this->status = '';
        $this->gbr_url = URL::asset('img/no_image.jpg');
    }

    /**
     * Event after updating `gbr` property
     *
     * @return void
     */
    public function updatedGbr()
    {
        $this->optimizeImage($this->gbr, 768, 320);
        $this->gbr_url = $this->gbr->temporaryUrl();
    }

    /**
     * Run form validation
     *
     * @param string $field_name
     * @return void
     */
    public function updated($field_name)
    {
        $this->validateOnly($field_name, $this->form_validation_rules, [], $this->form_validation_attributes);
    }

    /**
     * Store Post
     *
     * @return void
     */
    public function storePost()
    {
        $this->validate($this->form_validation_rules, [], $this->form_validation_attributes);

        $gbr = $this->gbr->store('post', 'public');

        Post::create([
            'gbr' => $gbr,
            'judul' => $this->judul,
            'isi' => $this->isi,
            'status' => $this->status,
            'tag' => $this->tag
        ]);

        return redirect()->route('dashboard.post.index');
    }

    /**
     * Render to view
     *
     * @return \Illuminate\Http\Response
     */
    public function render()
    {
        return view('livewire.dashboard.blog.post.create');
    }
}
