<?php

it('renders the landing page through the shared layout', function () {
    $response = $this->get(route('home'));

    $response->assertOk()
        ->assertSee('Velyx', false)
        ->assertSee('livewire', false);
});

it('renders documentation pages through the shared layout', function () {
    $this->get(route('docs.page', 'installation'))->assertOk();
    $this->get(route('docs.components.show', 'button'))->assertOk();
    $this->get(route('docs.index'))->assertOk();
});

it('serves llms.txt as plain text', function () {
    $this->get(route('llms.txt'))
        ->assertOk()
        ->assertHeader('Content-Type', 'text/plain; charset=utf-8');
});

it('resolves the theme from system preference with no forced default', function () {
    $html = $this->get(route('home'))->assertOk()->getContent();

    expect($html)
        ->toContain('prefers-color-scheme: dark')
        ->not->toContain('default to dark');
});

it('exposes the Open Graph image and web manifest in the head', function () {
    $this->get(route('home'))
        ->assertOk()
        ->assertSee('brand/og-image.png', false)
        ->assertSee('site.webmanifest', false);
});
