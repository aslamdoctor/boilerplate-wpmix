# 1. Compile SASS & JS files using Laravel Mix

`cd html`

`npm install`

`npx mix watch` - To watch all files changes

`npx mix` - To build all files in development mode

`npx mix --production` - To build all files in production mode

## Files explained

**/src** - This folder contains all the source JS and CSS files

**/dist** - This folder contains all the compiled JS and CSS files

**/node_modules** - Do not upload this folder to server 🙂

## What's included

1. Bootstrap
2. jQuery
3. Slick Carousel
4. Hamburger CSS
5. PostCSS Autoprefixer
6. SASS Support

## Notes

1. Make sure you create "img" and "fonts" folders in project root so they can be shared with both "src" and "dist"

# 2. Install WordPress using WP-CLI

```
mkdir myproject

cd myproject

wp core download

wp config create --dbname="myproject" --dbuser="admin" --dbpass="admin" --dbhost="localhost"

wp core install --url="myproject.local" --title="My Project" --admin_user="admin" --admin_password="admin" --admin_email="aslam.doctor@gmail.com"
```
