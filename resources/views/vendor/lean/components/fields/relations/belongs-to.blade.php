@props([
    'field',
])

@if($field->action->read())
    <x-lean::link href="{{ $field->getLink() }}">
        {{ $field->linkText }}
    </x-lean::link>
@else
    <select id="{{ $field->name }}" class="form-select" value="{{ $field->value }}" {{ $attributes }}>
        @if ($placeholder = $field->placeholder)
            <option
                @if(! $placeholder['enabled'])
                    disabled
                @endif
                value="{{ $placeholder['value'] }}"
            >{{ $placeholder['text'] }}</option>
        @endif
        @foreach($field->getValues() as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select>
@endif
