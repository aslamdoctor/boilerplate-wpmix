# Boilerplate WPMix Theme

A modern WordPress starter theme built with Laravel Mix, Bootstrap 5, and WordPress coding standards. This theme provides a solid foundation for WordPress development with a modern build process and development tools.

**Version:** 3.0.0
**Author:** Aslam Doctor
**Text Domain:** wpmix

## Features

- **Laravel Mix 6** for asset compilation and build process
- **Bootstrap 5.1** for responsive design and components
- **SASS/SCSS** support with organized structure
- **jQuery** integration (external dependency)
- **Hamburger CSS** for animated menu icons
- **PostCSS Autoprefixer** for vendor prefixes
- **BrowserSync** for live reloading during development
- **ACF Pro** support with JSON field synchronization
- **WordPress Coding Standards** (WPCS) integration
- **PHPStan** for static analysis
- **PHPCS** for code formatting and standards
- **PSR-4 Autoloading** for custom classes

## Requirements

- **PHP** 7.4+ or 8.0+
- **Node.js** and **npm**
- **Composer**
- **WordPress** 5.0+

## Installation

### 1. Theme Setup

```bash
# Navigate to your WordPress themes directory
cd wp-content/themes/

# Clone or download this theme
# Then navigate to the theme directory
cd boilerplate-wpmix
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### 3. Configure BrowserSync (Optional)

Edit the proxy URL in `webpack.mix.js` to match your local development URL:

```javascript
mix.browserSync({
  proxy: "boilerplatewpmix.local", // Change this to your local URL
  // ... other options
});
```

## Development Workflow

### Build Commands

```bash
# Development build with source maps
npm run dev

# Watch for file changes (recommended for development)
npm run watch

# Watch with polling (for Docker/Virtual machines)
npm run watch-poll

# Hot module replacement (advanced)
npm run hot

# Production build (minified, optimized)
npm run prod
```

### Watching Files

For active development, use the watch command:

```bash
npm run watch
```

This will:
- Compile SCSS to CSS
- Bundle JavaScript files
- Generate source maps
- Start BrowserSync for live reloading
- Watch for changes in PHP, SCSS, JS, and HTML files

## File Structure

```
boilerplate-wpmix/
├── src/                          # Source files (SCSS & JS)
│   ├── js/
│   │   └── main.js              # Main JavaScript entry point
│   └── scss/
│       ├── main.scss            # Main SCSS entry point
│       ├── _variables.scss      # SCSS variables
│       ├── _bootstrap-variables.scss # Bootstrap customization
│       ├── _mixins.scss         # SCSS mixins
│       ├── _global.scss         # Global styles
│       ├── _typography.scss     # Typography styles
│       ├── _form-elements.scss  # Form styling
│       ├── _helpers.scss        # Utility classes
│       ├── _fonts.scss          # Font definitions
│       ├── lib/                 # Third-party libraries
│       │   └── hamburgers/      # Hamburger menu animations
│       └── partials/            # Component-specific styles
│           ├── _header.scss
│           ├── _footer.scss
│           └── _skip-navigation.scss
├── dist/                        # Compiled assets (auto-generated)
│   ├── css/
│   │   └── main.css
│   └── js/
│       └── main.js
├── classes/                     # PSR-4 autoloaded classes (WPMix namespace)
│   ├── Setup.php               # Theme setup and configuration
│   ├── Enqueue.php             # Asset enqueuing with cache busting
│   ├── Hooks.php               # WordPress hooks and filters
│   └── Helper.php              # Utility and helper functions
├── template-parts/              # Reusable template parts
│   ├── _loop_posts.php
│   ├── _nav.php
│   └── _the_post.php
├── acf-json/                    # ACF field group JSON files
├── img/                         # Static images
└── vendor/                      # Composer dependencies
```

## Theme Files

### Main WordPress Template Files
- `index.php` - Main template file
- `front-page.php` - Front page template
- `page.php` - Single page template
- `single.php` - Single post template
- `archive.php` - Archive template
- `search.php` - Search results template
- `404.php` - 404 error template
- `header.php` - Site header
- `footer.php` - Site footer

### Key PHP Files
- `functions.php` - Main functions file (loads autoloader and initializes classes)
- `classes/Setup.php` - Theme setup, menus, image sizes, widget areas
- `classes/Enqueue.php` - Asset enqueuing with cache busting
- `classes/Hooks.php` - WordPress hooks and filters
- `classes/Helper.php` - Static utility and helper functions

## Development Tools

### Code Quality & Standards

```bash
# PHP Code Sniffer (check coding standards)
composer run phpcs

# PHP Code Beautifier (fix coding standards)
composer run phpcs-fix

# PHP Lint (syntax checking)
composer run php-lint

# PHPStan (static analysis)
composer run phpstan

# PHPMD (mess detection)
composer run phpmd
```

### VSCode Integration

Recommended VSCode extensions:
- [PHP Sniffer & Beautifier](https://marketplace.visualstudio.com/items?itemName=ValeryanM.vscode-phpsab)

The theme includes VSCode settings for proper integration with PHPCS and WordPress Coding Standards.

## Customization

### SCSS Variables

Customize the theme by modifying variables in:
- `src/scss/_variables.scss` - Theme-specific variables
- `src/scss/_bootstrap-variables.scss` - Bootstrap customization

### Adding Custom Styles

1. Create new SCSS files in `src/scss/partials/` for component-specific styles
2. Import them in `src/scss/main.scss`
3. Run `npm run watch` to compile

### Custom JavaScript

Add your JavaScript to `src/js/main.js` or create new JS files and import them.

### PHP Classes

The theme uses a modern object-oriented approach with PSR-4 autoloading. All classes are located in the `classes/` directory and use the `WPMix\` namespace.

**Available Classes:**
- `WPMix\Setup` - Handles theme setup, features, menus, and widget areas
- `WPMix\Enqueue` - Manages CSS and JavaScript asset enqueuing
- `WPMix\Hooks` - Contains WordPress hooks, filters, and ACF integration
- `WPMix\Helper` - Provides static utility methods for common operations

**Helper Class Methods:**
- `Helper::get_thumb($size, $css_class, $placeholder)` - Get post thumbnail with fallback
- `Helper::crop_text($text, $length)` - Crop text to specified length
- `Helper::get_excerpt($limit)` - Get custom excerpt with word limit
- `Helper::get_css_classes($classes)` - Get sanitized CSS class string
- `Helper::is_post_type($post_type)` - Check if current page is specific post type

Add custom PHP classes to the `classes/` directory. They will be automatically autoloaded using PSR-4 standard with the namespace `WPMix\`.

### Custom Image Sizes

The theme defines several custom image sizes for flexibility:
- `header-logo` - 200x200px (not cropped)
- `thumb-360x240` - 360x240px (cropped)
- `featured-1200x400` - 1200x400px (cropped)

### Navigation Menus

The theme registers the following navigation menus:
- **Top Menu** - Primary navigation menu

### Widget Areas

The theme includes the following widget areas:
- **Footer Widgets** - Three-column footer widget area with Bootstrap grid classes

## Advanced Custom Fields (ACF)

The theme includes support for ACF Pro with JSON field synchronization:
- Field groups are stored in `acf-json/` directory
- Automatically synced between environments
- Version controlled field definitions

## Production Deployment

1. Run production build:
   ```bash
   npm run prod
   ```

2. Upload these directories to your server:
   - All PHP files
   - `dist/` directory (compiled assets)
   - `acf-json/` directory (if using ACF)
   - `img/` directory (static images)

3. **Do NOT upload:**
   - `node_modules/` directory
   - `src/` directory (source files)
   - `vendor/` directory (if not needed in production)
   - Development files (package.json, webpack.mix.js, etc.)

## Browser Support

The theme supports modern browsers with automatic vendor prefixing via PostCSS Autoprefixer. Bootstrap 5 browser support applies.

## Contributing

1. Follow WordPress Coding Standards (enforced by PHPCS)
2. Run code quality checks before committing
3. Test with `npm run watch` during development
4. Ensure production build works with `npm run prod`

## License

This theme is licensed under GPL-3.0, same as WordPress.

## Support

For issues and questions, please check the code comments and WordPress documentation. This is a starter theme meant to be customized for your specific project needs.
