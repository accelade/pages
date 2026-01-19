# CLAUDE.md

This file provides guidance to Claude Code when working with this package.

## Package Overview

**Pages** is an Accelade plugin package.

- **Namespace:** `Accelade\Pages`
- **Package:** `accelade/pages`

## Directory Structure

```
src/                    # PHP source code
config/                 # Configuration files
resources/
  views/                # Blade views
  lang/                 # Language files
  js/                   # JavaScript/TypeScript
  css/                  # Stylesheets
routes/                 # Route files
tests/                  # Pest tests
docs/                   # Documentation
```

## Commands

```bash
composer test           # Run tests
composer format         # Format code with Pint
```

## Architecture

This package follows the Accelade plugin architecture pattern with:
- Service Provider for registration
- Plugin class extending `BasePlugin`
- Concerns/Traits for reusable functionality
