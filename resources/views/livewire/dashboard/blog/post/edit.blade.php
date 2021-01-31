<div x-data="{
    is_delete_modal_open: {{ $is_delete_modal_open }}
}">
    <form action="#" method="post" wire:submit.prevent="updatePost">
        <div class="w-full px-6 mb-6">
            <x-form-label-inline text="Gambar" required="true" size="large">
                <div class="w-full xl:w-1/2">
                    <img src="{{ $gbr_url }}" alt="Gambar" class="w-full h-56 border border-solid border-gray-400">
                    <div class="mt-1">
                        <small class="text-blue-500">Recommended size : 768 x 320px</small>
                    </div>
                    <div class="mt-2">
                        <x-input-text type="file" wire:model="gbr" />
                    </div>
                </div>
                @error('gbr') <x-form-error> {{ $message }} </x-form-error> @enderror
            </x-form-label-inline>
            <x-form-label-inline text="Judul" required="true" size="large">
                <x-input-text type="text" wire:model.lazy="judul" />
                @error('judul') <x-form-error> {{ $message }} </x-form-error> @enderror
            </x-form-label-inline>
            <x-form-label-inline text="Isi Postingan" required="true" size="large">
                <div wire:ignore>
                    <x-textarea id="__isiCreatePost">{!! Str::of($isi)->replace(' src="../..', ' src="' . url('/') . '') !!}</x-textarea>
                    {{-- <x-textarea id="__isiCreatePost">{!! $isi !!}</x-textarea> --}}
                </div>
                @error('isi') <x-form-error> {{ $message }} </x-form-error> @enderror
            </x-form-label-inline>
            <x-form-label-inline text="Status" required="true" size="large">
                <div class="w-full xl:w-1/6">
                    <x-select wire:model.lazy="status">
                        <option value="" disabled selected>- Choose Status -</option>
                        <option value="1">Draft</option>
                        <option value="2">Publish</option>
                    </x-select>
                    @error('status') <x-form-error> {{ $message }} </x-form-error> @enderror
                </div>
            </x-form-label-inline>
            <x-form-label-inline text="Tag" required="false" size="large">
                <x-input-text type="text" placeholder="Separated with comma (,)" wire:model.lazy="tag" />
                @error('tag') <x-form-error> {{ $message }} </x-form-error> @enderror
            </x-form-label-inline>
        </div>
        <div class="w-full px-6 text-center pb-10">
            <x-button type="button" color="red" wire:click="deletePost()" wire:loading.attr="disabled" wire:loading.class="bg-opacity-75 cursor-not-allowed">
                Delete
            </x-button>
            <x-button-link-primary href="{{ route('dashboard.post.index') }}" color="gray" wire:loading.attr="disabled" wire:loading.class="bg-opacity-75 cursor-not-allowed">
                Cancel
            </x-button-link-primary>
            <x-button type="submit" color="ib-three" wire:loading.attr="disabled" wire:loading.class="bg-opacity-75 cursor-not-allowed">
                Save
            </x-button>
        </div>
    </form>


    <x-modal-backdrop x-show.transition.opacity="is_delete_modal_open === 1" x-cloak>
        <x-modal-content size="medium" x-show.transition.5000ms="is_delete_modal_open === 1" x-cloak>
            <x-modal-title>
                Delete Post
            </x-modal-title>
            <x-modal-body>
                <form method="post" wire:submit.prevent="destroyPost">
                    <div class="mb-6 text-center">
                        Are you sure to delete this post?
                    </div>
                    <div class="text-center">
                        <x-button type="button" color="gray" class="mx-1" wire:click="cancelDestroyPost" wire:loading.attr="disabled" wire:loading.class="bg-opacity-75 cursor-not-allowed" wire:target="cancelDelete, destroyPostingan">
                            No
                        </x-button>
                        <x-button type="submit" color="red" class="mx-1" wire:loading.attr="disabled" wire:loading.class="bg-opacity-75 cursor-not-allowed" wire.target="cancelDelete, destroyPostingan">
                            Yes, Delete
                        </x-button>
                    </div>
                </form>
            </x-modal-body>
        </x-modal-content>
    </x-modal-backdrop>

</div>

@push('bottom-js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.21.0/themes/prism.min.css">
@endpush

@push('bottom_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.21.0/prism.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.4.2/tinymce.min.js"></script>
    <script>
        function delay(callback, ms) {
            var timer = 0;
            return function() {
                var context = this, args = arguments;
                clearTimeout(timer);
                timer = setTimeout(function () {
                callback.apply(context, args);
                }, ms || 0);
            };
        }

        tinymce.init({
            selector: '#__isiCreatePost',
            setup: function(editor) {
                editor.on('change', delay(function(e) {
                    @this.set('isi', tinymce.activeEditor.getContent());
                }, 1000));
            },
            height: 600,
            content_css: '{{ URL::asset('css/tinymce-content.css?_=' . rand()) }}',
            menubar: false,
            plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'table emoticons template paste help',
                'codesample'
            ],
            toolbar: 'insertfile undo redo | styleselect | codesample | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',
            images_upload_url: '{{ route('dashboard.post.upload-image') }}',
            images_upload_base_path: '{{ url('/') }}',
            // codesample_global_prismjs: true
        });
    </script>
@endpush