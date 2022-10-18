@props(['name', 'label', 'important'])

<x-form.label name="{{ $label }}" for="{{ $name }}" important="{{ $important }}"/>

<input class="border p-2 rounded w-100 password" type="password"
       name="{{ $name }}"
       id="{{ $name }}" placeholder="{{ $label }}">
