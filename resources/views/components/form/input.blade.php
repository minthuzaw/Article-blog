@props(['name', 'important'])

<label>{{ ucfirst($name) }}</label> <span class="text-danger">{{ $important ?? '' }}</span>

<input class="border border-gray-200 w-full rounded form-control"
       name="{{ $name }}"
       id="{{ $name }}"
    {{ $attributes(['value' => old($name)]) }}>

<x-form.error name="{{ $name }}"/>
