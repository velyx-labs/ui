@props([
    'title' => null,
    'description' => config('velyx-docs.site_description'),
])

<x-layout :title="$title" :description="$description">
    {{ $slot }}
</x-layout>
