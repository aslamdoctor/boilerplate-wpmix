# Boilerplate WPMix Theme

A modern WordPress starter theme built with Laravel Mix and WordPress coding standards. This theme provides a solid foundation for WordPress development with a modern build process, PSR-4 autoloading, and object-oriented architecture.

**Version:** 3.1.0
**Author:** Aslam Doctor
**Text Domain:** wpmix

## Features

- **Laravel Mix 6** for asset compilation and build process
- **SASS/SCSS** support with organized structure
- **jQuery** integration
- **Hamburger CSS** for animated menu icons
- **PostCSS Autoprefixer** for vendor prefixes
- **BrowserSync** for live reloading during development
- **ACF Pro** support with JSON field synchronization
- **WordPress Coding Standards** integration
- **PHPStan** for static analysis
- **PHPCS** for code formatting and standards
- **PSR-4 Autoloading** for custom classes
- **Object-Oriented Architecture**
- **Static Helper Methods** for common utility functions
- **Google Fonts Integration**

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

#### Build All Files
```bash
# Development build with source maps (all files)
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

#### Build Specific Files (Faster Development)
```bash
# Build only main files (JS + main CSS)
npm run dev:main
npm run watch:main
npm run prod:main

# Build only custom editor styles
npm run dev:custom-editor
npm run watch:custom-editor
npm run prod:custom-editor

# Build only block editor styles
npm run dev:block-editor
npm run watch:block-editor
npm run prod:block-editor
```

### Watching Files

For active development, choose the appropriate watch command based on what you're working on:

#### Watch All Files (Full Development)
```bash
npm run watch
```

This will:
- Compile all SCSS files to CSS
- Bundle JavaScript files
- Generate source maps
- Start BrowserSync for live reloading
- Watch for changes in PHP, SCSS, JS, and HTML files

#### Watch Specific Files (Faster Development)
When working on specific areas, use targeted watch commands for faster compilation:

```bash
# Main theme development (JS + main CSS + BrowserSync)
npm run watch:main

# Only custom editor styles (faster for editor-specific changes)
npm run watch:custom-editor

# Only block editor styles (faster for Gutenberg-specific changes)
npm run watch:block-editor
```

**Benefits of Specific Builds:**
- ⚡ **Faster compilation** - Only builds what you're working on
- 🎯 **Focused development** - Clear separation of concerns
- 💻 **Reduced resource usage** - Less CPU and memory consumption
- 🔄 **Quicker iteration** - Faster feedback loop during development

## File Structure

```
boilerplate-wpmix/
├── src/                          # Source files (SCSS & JS)
│   ├── js/
│   │   └── main.js              # Main JavaScript entry point
│   └── scss/
│       ├── main.scss            # Main SCSS entry point
│       ├── custom-editor-style.scss # Classic editor styles
│       ├── block-editor-style.scss # Block editor (Gutenberg) styles
│       ├── _variables.scss      # SCSS variables
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
│   │   ├── main.css
│   │   ├── custom-editor-style.min.css
│   │   └── block-editor-style.min.css
│   └── js/
│       └── main.js
├── classes/                     # PSR-4 autoloaded classes
│   ├── Setup.php               # Theme setup and configuration
│   ├── Enqueue.php             # Asset enqueuing with cache busting
│   ├── Hooks.php               # WordPress hooks and filters
│   ├── Helper.php              # Static utility and helper methods
│   ├── ClassicEditor.php       # Classic editor enhancements
│   └── BlockEditor.php         # Gutenberg block registration
├── blocks/                      # Custom Gutenberg blocks (optional)
│   └── purple-cta-band/
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
- `functions.php` - Main functions file with class initialization
- `classes/Setup.php` - Theme setup, menus, image sizes, widget areas
- `classes/Enqueue.php` - Asset enqueuing with cache busting
- `classes/Hooks.php` - WordPress hooks and filters
- `classes/Helper.php` - Static utility and helper methods
- `classes/ClassicEditor.php` - Classic editor enhancements
- `classes/BlockEditor.php` - Gutenberg block registration

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

### Code Quality Status

**WordPress Coding Standards Compliant**
- All PHP files include proper documentation headers
- PSR-4 autoloading with filename exceptions for classes
- Template parts support underscore naming conventions
- Zero PHPCS errors across the codebase

**Modern Architecture**
- Constructor-based initialization
- Static utility methods
- Proper separation of concerns
- PSR-4 autoloading for custom functionality

## Customization

### SCSS Variables

Customize the theme by modifying variables in:
- `src/scss/_variables.scss` - Theme variables

### Adding Custom Styles

1. Create new SCSS files in `src/scss/partials/` for component-specific styles
2. Import them in `src/scss/main.scss`
3. Run `npm run watch` to compile

### Custom JavaScript

Add your JavaScript to `src/js/main.js` or create new JS files and import them.

### PHP Classes

The theme uses object-oriented architecture with PSR-4 autoloading. All classes are located in the `classes/` directory and use the `WPMix\` namespace.

**Available Classes:**
- `WPMix\Setup` - Theme setup, features, menus, and widget areas
- `WPMix\Enqueue` - CSS and JavaScript asset enqueuing
- `WPMix\Hooks` - WordPress hooks, filters, and ACF integration
- `WPMix\Helper` - Static utility methods for common operations
- `WPMix\ClassicEditor` - Classic editor enhancements
- `WPMix\BlockEditor` - Gutenberg block registration

**Initialization:**
Classes automatically register WordPress hooks when instantiated:

```php
// In functions.php
new \WPMix\Setup();
new \WPMix\Enqueue();
new \WPMix\Hooks();
```

**Helper Methods:**
- `\WPMix\Helper::get_thumb($size, $css_class, $placeholder)`
- `\WPMix\Helper::crop_text($text, $length)`
- `\WPMix\Helper::get_excerpt($limit)`
- `\WPMix\Helper::get_css_classes($classes)`
- `\WPMix\Helper::is_post_type($post_type)`

**Usage:**
```php
<?php \WPMix\Helper::get_thumb('large', 'featured-image', '/path/to/placeholder.jpg'); ?>
```

### Migration from Procedural to OOP

**Before:**
```php
// Old functions.php with manual includes and init calls
require get_template_directory() . '/inc/setup.php';
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/custom_functions.php';

$setup = new \WPMix\Setup();
$setup->init();
```

**After:**
```php
// New functions.php - clean and simple
require_once get_template_directory() . '/vendor/autoload.php';

new \WPMix\Setup();
new \WPMix\Enqueue();
new \WPMix\Hooks();
new \WPMix\Helper();
```

**Benefits:**
- Less code in functions.php
- Automatic initialization
- Better organization
- Static utilities
- PSR-4 compliant

### Classic Editor Enhancements

The `ClassicEditor` class provides several enhancements to the WordPress classic editor:

**TinyMCE Style Formats:**
- Lead Paragraph - Applies `.lead` class to paragraphs
- Small - Inline small text element
- Cite - Citation inline element

**Editor Features:**
- Custom editor stylesheet support (`dist/css/custom-editor-style.min.css`)
- Style dropdown in TinyMCE toolbar
- ACF WYSIWYG toolbar with only bold formatting ("Only Bold" toolbar option)
- Consistent styling for editor content
- Typography matching frontend styles

### Block Editor (Gutenberg) Enhancements

The `BlockEditor` class provides enhancements for the Gutenberg block editor:

**Custom Block Types:**
The theme supports registration of custom Gutenberg blocks from the `blocks/` directory:
- Purple CTA Band - Call-to-action banner block

**Custom Block Styles:**
- Introduction Paragraph - Special styling for introduction paragraphs

**Features:**
- Automatic block registration from `blocks/` directory
- Safe registration with file existence checking
- Custom block styles for core WordPress blocks
- Scoped editor styles that don't affect admin UI
- Consistent styling for Gutenberg blocks
- Extensible architecture for adding new blocks

**Block Editor Stylesheet:**
The theme includes `dist/css/block-editor-style.min.css` that is properly scoped under `.editor-styles-wrapper` to ensure styles only affect the block editor content area and not the WordPress admin interface. This provides a consistent editing experience that matches your frontend styling.

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
- **Footer Widgets** - Three-column footer widget area

### Template Structure

**Removed Components:**
- Comments system
- Legacy include files

**Enhanced Components:**
- Google Fonts integration
- Static helper methods
- Constructor initialization
- Clean template parts

## Advanced Custom Fields (ACF)

The theme includes support for ACF Pro with JSON field synchronization:
- Field groups are stored in `acf-json/` directory
- Automatically synced between environments
- Version controlled field definitions

## Recommended Plugins

The following plugins work well with this theme:

1. **[Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields/)** - Custom fields management
2. **[Classic Editor](https://wordpress.org/plugins/classic-editor/)** - If you don't want block support
3. **[Query Monitor](https://wordpress.org/plugins/query-monitor/)** - Debug and performance monitoring

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

The theme supports modern browsers with automatic vendor prefixing via PostCSS Autoprefixer.

## Contributing

1. Follow WordPress Coding Standards (enforced by PHPCS)
2. Run code quality checks before committing
3. Test with `npm run watch` during development
4. Ensure production build works with `npm run prod`

## License

This theme is licensed under GPL-3.0, same as WordPress.

## Support

For issues and questions, please check the code comments and WordPress documentation. This is a starter theme meant to be customized for your specific project needs.
