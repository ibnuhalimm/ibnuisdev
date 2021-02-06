<div>
    <form action="#" method="post" wire:submit.prevent="storePost">
        <div class="w-full px-6 mb-6">
            <x-form-label-inline text="Image" required="true" size="large">
                <div class="w-full xl:w-1/2">
                    <img src="{{ $gbr_url }}" alt="Image" class="w-full h-56 border border-solid border-gray-400">
                    <div class="mt-1">
                        <small class="text-blue-500">Recommended size : 768 x 320px</small>
                    </div>
                    <div class="mt-2">
                        <x-input-text type="file" wire:model="gbr" />
                    </div>
                </div>
                @error('gbr') <x-form-error> {{ $message }} </x-form-error> @enderror
            </x-form-label-inline>
            <x-form-label-inline text="Title" required="true" size="large">
                <x-input-text type="text" wire:model.lazy="judul" />
                @error('judul') <x-form-error> {{ $message }} </x-form-error> @enderror
            </x-form-label-inline>
            <x-form-label-inline text="Slug" required="true" size="large">
                <div class="flex items-center justify-between">
                    <div class="hidden xl:block xl:w-2/5 mr-2">
                        <x-input-text type="text" value="{{ route('blog.post.read', [ 'slug' => '' ]) . '/' }}" class="bg-gray-100" readonly />
                    </div>
                    <div class="w-full xl:w-3/5 xl:ml-2">
                        <x-input-text type="text" wire:model.lazy="slug" />
                    </div>
                </div>
                @error('slug') <x-form-error> {{ $message }} </x-form-error> @enderror
            </x-form-label-inline>
            <x-form-label-inline text="Text" required="true" size="large">
                <div wire:ignore>
                    <x-textarea id="__isiCreatePost"></x-textarea>
                </div>
                @error('isi') <x-form-error> {{ $message }} </x-form-error> @enderror
            </x-form-label-inline>
            <x-form-label-inline text="Status" required="true" size="large">
                <div class="w-full md:w-1/3">
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
            <x-button-link-primary href="{{ route('dashboard.post.index') }}" color="gray">
                Cancel
            </x-button-link-primary>
            <x-button type="submit" color="ib-three">
                Save
            </x-button>
        </div>
    </form>
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
            images_upload_base_path: '{{ url('/') }}'
        });
    </script>
@endpush