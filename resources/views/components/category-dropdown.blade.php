<x-dropdown>

    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
            {{isset($currentCategory) ? ucwords($currentCategory->name) : 'Category'}}
            <x-icon name="down-arrow" class=" absolute pointer-events-none" style="right: 12px;"/>
        </button>
    </x-slot>


    <x-dropdown-item href="/?{{ http_build_query(request()->except('category', 'page')) }}" :active="request()->routeIs('home')"> All</x-dropdown-item>

    @foreach($categories as $category)
        <x-dropdown-item
{{--    http_build_query() : this mean ['name' => 'mohammad']  // name=mohammad --}}
            href="/?category={{$category->slug}}&{{ http_build_query(request()->except('category', 'page')) }}"
            :active="isset($currentCategory) && $currentCategory->is($category)"
            another
            :active="request()->is('categories/' . $category->slug)"
        >
            {{ucwords($category->name)}}
        </x-dropdown-item>
    @endforeach

</x-dropdown>
