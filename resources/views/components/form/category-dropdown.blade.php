@props(['name', 'important'])

<label>{{ ucfirst($name) }}</label> <span class="text-danger">{{ $important ?? '' }}</span>

<select class="form-select" name="category_id">
    @foreach(App\Models\Category::all() as $item)
        <option value="{{ $item->id }}"
            {{ old('category_id') == $item->id ? 'selected' : '' }}
        >{{ ucwords($item->name) }}</option>
    @endforeach
</select>
<x-form.error name="category"/>
