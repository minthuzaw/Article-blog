@props(['name', 'important'])
<label for="{{ $name }}" class="block mb-2 mt-3 font-weight-bold text-black">
    {{ucwords($name)}} <span class="text-danger">{{ $important }}</span>
</label>
