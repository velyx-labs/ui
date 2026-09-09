<?php

it('renders the landing page through the shared layout', function () {
    $response = $this->get(route('home'));

    $response->assertOk()
        ->assertSee('Velyx', false)
        ->assertSee('livewire', false)
        ->assertSee('Copy the component.', false)
        ->assertSee('What ships.', false);
});

it('drops the inline style blocks and the stale repo slug from the landing', function () {
    $html = $this->get(route('home'))->assertOk()->getContent();

    expect($html)
        ->not->toContain('velyx-hero')
        ->not->toContain('velyx-showcase')
        ->not->toContain('velyx-labs/registry');
});

it('renders documentation pages through the shared layout', function () {
    $this->get(route('docs.page', 'installation'))->assertOk();
    $this->get(route('docs.components.show', 'button'))->assertOk();
    $this->get(route('docs.index'))->assertOk();
});

it('renders the component page with metadata sections and the on-this-page nav', function () {
    $html = $this->get(route('docs.components.show', 'button'))->assertOk()->getContent();

    expect($html)
        ->toContain('id="installation"')
        ->toContain('id="preview"')
        ->toContain('id="requirements"')
        ->toContain('On this page')
        ->toContain('docsToc');
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

it('renders the header and footer with the inline mark and canonical repo link', function () {
    $html = $this->get(route('home'))->assertOk()->getContent();

    expect($html)
        ->toContain('M6 3H10M3 7L8 13L13 7')
        ->toContain('https://github.com/velyx-labs/velyx');

    $this->get(route('home'))->assertDontSee('assets/img/logo', false);
});
