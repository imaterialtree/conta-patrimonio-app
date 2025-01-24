<div class="mb-3">
    <label for="{{ $attributes->get('id') }}" class="form-label">{{ $slot }}</label>
    <select {{ $attributes->class(['form-control', 'is-invalid' => $errors?->has($attributes->get('name'))]) }}
        id="{{ $attributes->get('id') }}" name="{{ $attributes->get('name') }}">
        <option value="">Selecione uma opção</option>
        @foreach ($options as $value => $label)
            <option value="{{ $value }}" @if ($value == $selected) selected @endif>{{ $label }}
            </option>
        @endforeach
    </select>
    @error($attributes->get('name'))
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
