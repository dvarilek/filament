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

    {{
        \Filament\Support\Facades\FilamentView::renderHook(\Filament\Schemas\View\SchemasRenderHook::FORM_HEADER_BEFORE, data: [
            'childSchema' => $childSchema,
        ])
    }}

    {{ $getChildSchema($schemaComponent::HEADER_SCHEMA_KEY) }}

    {{
        \Filament\Support\Facades\FilamentView::renderHook(\Filament\Schemas\View\SchemasRenderHook::FORM_HEADER_AFTER, data: [
            'childSchema' => $childSchema,
        ])
    }}

    {{ $childSchema }}

    {{
        \Filament\Support\Facades\FilamentView::renderHook(\Filament\Schemas\View\SchemasRenderHook::FORM_FOOTER_BEFORE, data: [
            'childSchema' => $childSchema,
        ])
    }}

    {{ $getChildSchema($schemaComponent::FOOTER_SCHEMA_KEY) }}

    {{
        \Filament\Support\Facades\FilamentView::renderHook(\Filament\Schemas\View\SchemasRenderHook::FORM_FOOTER_AFTER, data: [
            'childSchema' => $childSchema,
        ])
    }}
</form>
