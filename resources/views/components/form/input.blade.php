@props(['name'])

<x-form.field>

    <x-form.lable name="{{$name}}" />
    <input class="border border-gray-200 p-2 w-full rounded"
           name="{{ $name }}"
           id="{{ $name }}"
           value="{{old($name)}}"
           {{ $attributes }}
    >

    <x-form.error name="{{$name}}" />

</x-form.field>
