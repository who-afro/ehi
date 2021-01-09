@props([
    'field',
])

@if($field->action->read())
    <span {{ $attributes }}>
        {{ $field->value }}
    </span>
@elseif($field->action->write())
    <select id="{{ $field->name }}" class="form-select" value="{{ $field->value }}" {{ $attributes }}>
        @if ($placeholder = $field->placeholder)
            <option
                @if(! $placeholder['enabled'])
                    disabled
                @endif
                value="{{ $placeholder['value'] }}"
            >{{ $placeholder['text'] }}</option>
        @endif

        @foreach($field->options as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select>
@endif
