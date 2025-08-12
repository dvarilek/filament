<form
    {{
        $attributes
            ->merge([
                'id' => $getId(),
                'wire:submit' => $getLivewireSubmitHandler(),
            ], escape: false)
            ->merge($getExtraAttributes(), escape: false)
            ->class([
                'fi-sc-form',
                'fi-dense' => $isDense(),
            ])
    }}
>
    @php
        $childSchema = $getChildSchema();
    @endphp

    {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\Schemas\View\SchemasRenderHook::FORM_HEADER_BEFORE, scopes: static::class, data: ['childSchema' => $childSchema]) }}

    {{ $getChildSchema($schemaComponent::HEADER_SCHEMA_KEY) }}

    {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\Schemas\View\SchemasRenderHook::FORM_HEADER_AFTER, scopes: static::class, data: ['childSchema' => $childSchema]) }}

    {{ $childSchema }}

    {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\Schemas\View\SchemasRenderHook::FORM_FOOTER_BEFORE, scopes: static::class, data: ['childSchema' => $childSchema]) }}

    {{ $getChildSchema($schemaComponent::FOOTER_SCHEMA_KEY) }}

    {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\Schemas\View\SchemasRenderHook::FORM_FOOTER_AFTER, scopes: static::class, data: ['childSchema' => $childSchema]) }}
</form>
