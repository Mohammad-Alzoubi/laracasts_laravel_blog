<x-layout>
    <section class="py-8 max-w-md mx-auto">
        <h1 class="text-lg font-bold mb-4">
            Publish New Post
        </h1>

        <x-panel>
            <form method="POST" action="/admin/posts" enctype="multipart/form-data">
                @csrf

{{--                <x-form.input name="title" required />--}}
{{--                <x-form.input name="slug" required />--}}
{{--                <x-form.input name="thumbnail" type="file" required />--}}
{{--                <x-form.textarea name="excerpt" required />--}}
{{--                <x-form.textarea name="body" required />--}}

                <div class="mt-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="title"
                    >
                        Title
                    </label>
                    <input class="border border-gray-200 p-2 w-full rounded"
                           type="text"
                           name="title"
                           id="title"
                           value="{{old('title')}}"
                           required
                    >

                    @error('title')
                    <span class="text-xs text-red-500 mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="thumbnail"
                    >
                        Thumbnail
                    </label>
                    <input class="border border-gray-200 p-2 w-full rounded"
                           type="file"
                           name="thumbnail"
                           id="thumbnail"
                           required
                    >

                    @error('thumbnail')
                    <span class="text-xs text-red-500 mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="excerpt"
                    >
                        Excerpt
                    </label>
                    <textarea class="border border-gray-400 p-2 w-full"
                           name="excerpt"
                           id="excerpt"
                           required
                    >{{old('excerpt')}}</textarea>

                    @error('excerpt')
                    <span class="text-xs text-red-500 mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="body"
                    >
                        body
                    </label>
                    <textarea class="border border-gray-400 p-2 w-full"
                              name="body"
                              id="body"
                              required
                    >{{old('body')}}</textarea>

                    @error('body')
                    <span class="text-xs text-red-500 mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4 mb-4 ">
                    <div class="mt-6 relative lg:inline-flex bg-gray-100 rounded-xl">
                        <select name="category_id" id="category_id" required>
                            @foreach (\App\Models\Category::all() as $category)
                                <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}
                                >{{ ucwords($category->name) }}</option>
                            @endforeach
                        </select>

                        @error('category')
                            <span class="text-xs text-red-500 mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <x-submit-button>Publish</x-submit-button>

            </form>
        </x-panel>
    </section>
</x-layout>
