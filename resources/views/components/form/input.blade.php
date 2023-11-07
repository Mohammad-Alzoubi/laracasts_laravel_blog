@props(['name', 'type' => 'text'])

<x-form.field>

    <x-form.lable name="{{$name}}" />
    <input class="border border-gray-200 p-2 w-full rounded"
           type="{{$type}}"
           name="{{ $name }}"
           id="{{ $name }}"
           value="{{old($name)}}"
    >

    <x-form.error name="{{$name}}" />

</x-form.field>
