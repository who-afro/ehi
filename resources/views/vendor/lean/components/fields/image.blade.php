@props([
    'field',
])

@if($field->action->index())
    <div class="h-8 flex items-center">
        <img src="{{ $field->getThumbnail() }}" class="max-h-8">
    </div>
@elseif($field->action->show())
    <img
        src="{{ $field->value }}"
        class="
            @if(is_string($field->width)) {{ $field->width }} @endif
            @if(is_string($field->height)) {{ $field->height }} @endif
        "
        @if(is_int($field->width)) width="{{ $field->width }}" @endif
        @if(is_int($field->height)) height="{{ $field->height }}" @endif
    >
@else
    <div
        x-data="{
            deleted: @entangle('fieldMetadata.' . $field->name . '.deleted'),
            color() {
                return this.deleted ? ' text-red-600 ' : ' text-gray-700 '
            }
        }"
    >
        <div x-show="! deleted">
            @if(! $field->deleted)
                <div>
                    <img
                        src="{{ $field->getPreview() }}"
                        class="
                            @if(is_string($field->width)) {{ $field->width }} @endif
                            @if(is_string($field->height)) {{ $field->height }} @endif
                        "
                        @if(is_int($field->width)) width="{{ $field->width }}" @endif
                        @if(is_int($field->height)) height="{{ $field->height }}" @endif
                    >
                    <input
                        id="{{ $field->name }}"
                        type="file"
                        value="{{ $field->value }}"
                        @if(! $field->isEnabled()) disabled @endif
                        class="{{ $attributes['class'] ??
                            'form-input '
                            . ($field->isEnabled() ? '' : 'bg-gray-100')
                        }}"
                        {{ $attributes->except(['class']) }}
                    >
                </div>
            @endif
        </div>
        @if($field->action->edit() && $field->hasStoredValue && $field->isEnabled())
            <label class="flex items-center mt-2">
                <span x-bind:class="color() + `
                    text-sm mr-1
                `">Delete?</span>
                <input x-model="deleted" x-bind:class="color() + 'form-checkbox'" type="checkbox">
            </label>
        @endif
    </div>
@endif
