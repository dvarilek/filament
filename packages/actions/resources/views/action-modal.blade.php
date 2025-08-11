@php
    $actionModalAlignment = $action->getModalAlignment();
    $actionIsModalAutofocused = $action->isModalAutofocused();
    $actionHasModalCloseButton = $action->hasModalCloseButton();
    $actionIsModalClosedByClickingAway = $action->isModalClosedByClickingAway();
    $actionIsModalClosedByEscaping = $action->isModalClosedByEscaping();
    $actionModalDescription = $action->getModalDescription();
    $actionExtraModalWindowAttributeBag = $action->getExtraModalWindowAttributeBag();
    $actionModalFooterActions = $action->getVisibleModalFooterActions();
    $actionModalFooterActionsAlignment = $action->getModalFooterActionsAlignment();
    $actionModalHeading = $action->getModalHeading();
    $actionModalIcon = $action->getModalIcon();
    $actionModalIconColor = $action->getModalIconColor();
    $actionModalId = "fi-{$this->getId()}-action-{$action->getNestingIndex()}";
    $actionIsModalSlideOver = $action->isModalSlideOver();
    $actionIsModalFooterSticky = $action->isModalFooterSticky();
    $actionIsModalHeaderSticky = $action->isModalHeaderSticky();
    $actionModalWidth = $action->getModalWidth();
    $actionLivewireCallMountedActionName = $action->hasFormWrapper() ? $action->getLivewireCallMountedActionName() : null;
    $actionModalWireKey = "{$this->getId()}.actions.{$action->getName()}.modal";
@endphp

<x-filament::modal
    :alignment="$actionModalAlignment"
    :autofocus="$actionIsModalAutofocused"
    :close-button="$actionHasModalCloseButton"
    :close-by-clicking-away="$actionIsModalClosedByClickingAway"
    :close-by-escaping="$actionIsModalClosedByEscaping"
    :description="$actionModalDescription"
    :extra-modal-window-attribute-bag="$actionExtraModalWindowAttributeBag"
    :footer-actions="$actionModalFooterActions"
    :footer-actions-alignment="$actionModalFooterActionsAlignment"
    :heading="$actionModalHeading"
    :icon="$actionModalIcon"
    :icon-color="$actionModalIconColor"
    :id="$actionModalId"
    :slide-over="$actionIsModalSlideOver"
    :sticky-footer="$actionIsModalFooterSticky"
    :sticky-header="$actionIsModalHeaderSticky"
    :width="$actionModalWidth"
    :wire:key="$actionModalWireKey"
    :wire:submit.prevent="$actionLivewireCallMountedActionName"
    :x-on:modal-closed="'if ($event.detail.id === ' . \Illuminate\Support\Js::from($actionModalId) . ') $wire.unmountAction(false)'"
>
    {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\Actions\View\ActionsRenderHook::ACTION_MODAL_CONTENT_BEFORE) }}

    {{ $action->getModalContent() }}

    {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\Actions\View\ActionsRenderHook::ACTION_MODAL_CONTENT_AFTER) }}

    @if ($this->mountedActionHasSchema(mountedAction: $action))
        {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\Actions\View\ActionsRenderHook::ACTION_MODAL_SCHEMA_BEFORE) }}

        {{ $this->getMountedActionSchema(mountedAction: $action) }}

        {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\Actions\View\ActionsRenderHook::ACTION_MODAL_SCHEMA_AFTER) }}
    @endif

    {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\Actions\View\ActionsRenderHook::ACTION_MODAL_FOOTER_BEFORE) }}

    {{ $action->getModalContentFooter() }}

    {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\Actions\View\ActionsRenderHook::ACTION_MODAL_FOOTER_AFTER) }}
</x-filament::modal>
