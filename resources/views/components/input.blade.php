<div class="mb-3">
    <label for="{{ $attributes->get('id') }}" class="form-label">{{ $slot }}</label>
    <input {{ $attributes->class(['form-control', 'is-invalid' => $errors?->has($attributes->get('name'))]) }}
        @if ($attributes->has('with-old-value')) value="{{ old($attributes->get('name')) }}" @endif>
    @error($attributes->get('name'))
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
