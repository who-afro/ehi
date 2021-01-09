@props([
    'field',
])

@if($field->action->read())
    <span {{ $attributes }}>
        {{ $field->value }}
    </span>
@elseif($field->action->write())
    <input
        id="{{ $field->name }}"
        type="{{ $field->type }}"
        value="{{ $field->value }}"
        placeholder="{{ $field->placeholder }}"
        @if(! $field->isEnabled()) disabled @endif
        class="{{ $attributes['class'] ??
            'form-input ' . ($field->isEnabled() ? '' : 'bg-gray-100')
        }}"
        {{ $attributes->except(['class']) }}
    >
@endif
