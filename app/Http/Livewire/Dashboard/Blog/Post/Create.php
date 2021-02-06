<?php

namespace App\Http\Livewire\Dashboard\Blog\Post;

use App\Models\Blog\Post;
use App\Traits\LivewireOptimizeImage;
use Cviebrock\EloquentSluggable\Services\SlugService;
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
    public $slug;
    public $isi;
    public $status;
    public $tag;

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
     * Form validation rules
     *
     * @return void
     */
    private function formValidationRules()
    {
        return [
            'gbr' => [
                'required',
                'image'
            ],
            'judul' => [
                'required',
                'string',
                'min:20',
                'max:100'
            ],
            'slug' => [
                'required',
                'string',
                'min:10',
                'max:100',
                'unique:' . Post::class . ',slug'
            ],
            'isi' => [
                'required',
                'string',
                'min:300'
            ],
            'status' => [
                'required',
                'numeric',
                'in:' . Post::STATUS_DRAFT . ',' . Post::STATUS_PUBLISH
            ],
            'tag' => [
                'string',
                'nullable'
            ]
        ];
    }

    /**
     * Form validation attributes
     *
     * @return array
     */
    private function formValidationAttributes()
    {
        return [
            'gbr' => 'Image',
            'judul' => 'Title',
            'isi' => 'Text',
            'status' => 'Status',
            'tag' => 'Tag'
        ];
    }

    /**
     * Generate slug after typing title
     *
     * @param string $value
     * @return void
     */
    public function updatedJudul($value)
    {
        $this->slug = SlugService::createSlug(Post::class, 'slug', $value);
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
        $this->validateOnly($field_name, $this->formValidationRules(), [], $this->formValidationAttributes());
    }

    /**
     * Store Post
     *
     * @return void
     */
    public function storePost()
    {
        $this->validate($this->formValidationRules(), [], $this->formValidationAttributes());

        $gbr = $this->gbr->store('post', 'public');

        Post::create([
            'gbr' => $gbr,
            'judul' => $this->judul,
            'slug' => trim($this->slug),
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
