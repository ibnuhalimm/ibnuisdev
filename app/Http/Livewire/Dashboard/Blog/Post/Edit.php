<?php

namespace App\Http\Livewire\Dashboard\Blog\Post;

use App\Models\Blog\Post;
use App\Traits\LivewireOptimizeImage;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads, LivewireOptimizeImage;

    /**
     * Define all properties
     *
     * @var mixed
     */
    public $post_id;
    public $gbr;
    public $gbr_field;
    public $gbr_url;
    public $judul;
    public $slug;
    public $isi;
    public $status;
    public $tag;

    public $is_delete_modal_open = 0;

    /**
     * Initial properties value
     *
     * @return void
     */
    public function mount($post)
    {
        $this->post_id = $post->id;
        $this->judul = $post->judul;
        $this->slug = $post->slug;
        $this->gbr_url = $post->gbr_url;
        $this->gbr_field = $post->gbr;
        $this->isi = $post->isi;
        $this->status = $post->status;
        $this->tag = $post->tag;
    }

    /**
     * Form validation rules
     *
     * @return array
     */
    private function formValidationRules()
    {
        return [
            'gbr' => [
                'image',
                'nullable'
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
                'unique:' . Post::class . ',slug,' . $this->post_id
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
     * Generate slug if slug is being blank
     *
     * @param string $value
     * @return void
     */
    public function updatedJudul($value)
    {
        if (!empty($value) && empty($this->slug)) {
            $this->slug = SlugService::createSlug(Post::class, 'slug', $value);
            $this->resetErrorBag('slug');
        }
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
     * @return \Illuminate\Http\Response
     */
    public function updatePost()
    {
        $this->validate($this->formValidationRules(), [], $this->formValidationAttributes());

        if (!empty($this->gbr)) {
            if (Storage::disk('public')->exists($this->gbr_field)) {
                Storage::disk('public')->delete($this->gbr_field);
            }

            $this->gbr_field = $this->gbr->store('post', 'public');
        }

        Post::where('id', $this->post_id)
            ->update([
                    'gbr' => $this->gbr_field,
                    'judul' => $this->judul,
                    'slug' => trim($this->slug),
                    'isi' => Str::of($this->isi)->replace('../../../', '../../'),
                    'status' => $this->status,
                    'tag' => $this->tag,
                    'user_update' => Auth::user()->username
                ]);

        return redirect()->route('dashboard.post.index');
    }

    /**
     * Action when click `delete` button
     *
     * @return void
     */
    public function deletePost()
    {
        $this->is_delete_modal_open = 1;
    }

    /**
     * Cancel delete post / close delete modal
     *
     * @return void
     */
    public function cancelDestroyPost()
    {
        $this->is_delete_modal_open = 0;
    }

    /**
     * Action to delete postingan
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyPost()
    {
        Post::destroy($this->post_id);

        return redirect()->route('dashboard.post.index');
    }

    /**
     * Render to view
     *
     * @return \Illuminate\Http\Response
     */
    public function render()
    {
        return view('livewire.dashboard.blog.post.edit');
    }
}
