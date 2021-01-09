@props([
    'field',
])

@if($field->action->write())
    <input
        id="{{ $field->name }}"
        type="password"
        value="{{ $field->value }}"
        @if(! $field->isEnabled()) disabled @endif
        class="{{ $attributes['class'] ??
            'form-input ' . ($field->isEnabled() ? '' : 'bg-gray-100')
        }}"
        {{ $attributes->except('class') }}
    >
@endif
