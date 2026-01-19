<?php

declare(strict_types=1);

use Accelade\Pages\Page;

class TestPage extends Page
{
    protected static ?string $title = 'Test Page';

    protected static ?string $navigationIcon = 'heroicon-o-document';

    protected static ?string $navigationLabel = 'Test';

    protected static ?string $slug = 'test-page';
}

class CustomSlugPage extends Page
{
    protected static ?string $title = 'Custom';

    protected static ?string $slug = 'custom-slug';
}

class AutoSlugPage extends Page
{
    protected static ?string $title = 'Auto Generated Slug';
}

it('can get the page title', function () {
    expect(TestPage::getTitle())->toBe('Test Page');
});

it('can get the navigation icon', function () {
    expect(TestPage::getNavigationIcon())->toBe('heroicon-o-document');
});

it('can get the navigation label', function () {
    expect(TestPage::getNavigationLabel())->toBe('Test');
});

it('uses title as navigation label when not set', function () {
    expect(CustomSlugPage::getNavigationLabel())->toBe('Custom');
});

it('can get the page slug', function () {
    expect(TestPage::getSlug())->toBe('test-page');
});

it('generates slug from class name when not set', function () {
    expect(AutoSlugPage::getSlug())->toBe('auto-slug-page');
});

it('can get the route name', function () {
    expect(TestPage::getRouteName())->toBe('test-page');
});

it('has default navigation sort of 0', function () {
    expect(TestPage::getNavigationSort())->toBe(0);
});

it('should register navigation by default', function () {
    expect(TestPage::shouldRegisterNavigation())->toBeTrue();
});

it('can access by default', function () {
    expect(TestPage::canAccess())->toBeTrue();
});
