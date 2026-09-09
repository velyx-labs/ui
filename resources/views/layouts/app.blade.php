{{-- Livewire full-page layout (config/livewire.php → component_layout). Delegates to <x-layout>. --}}
<x-layout :title="$title ?? null">
    {{ $slot }}
</x-layout>
