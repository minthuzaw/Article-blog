@props(['name', 'important'])

<label>{{ ucfirst($name) }}</label> <span class="text-danger">{{ $important ?? '' }}</span>
<textarea class="form-control"
          type="text"
          spellcheck="true" placeholder="Something ... "
          name="{{ $name }}"
          id="{{ $name }}"
>
    {{ $slot ?? old($name) }}
</textarea>
<x-form.error name="{{ $name }}"/>

