WordPress Picturefill
=====================

Picturefill plugin for WordPress that uses the [Picturefill polyfill](http://scottjehl.github.io/picturefill/) to enable responsive image handling.

## Installation

1. Clone the repo or [download the zip file](https://github.com/ractoon/wordpress-picturefill/archive/master.zip).
2. Activate the picturefill plugin through the 'Plugins' menu in WordPress.

## Usage

Basic usage with default image:

```
[picture img="/path/to/image-small.png" alt="Default Image" width="50" height="50"][/picture]
```

Basic usage with default image and high res image:

```
[picture img="/path/to/image-small.png, /path/to/image-small@2x.png 2x"][/picture]
```

Media query to use another image at 400px width:

```
[picture img="/path/to/image-small.png"]
[source srcset="/path/to/image-medium.png" media="(min-width: 400px)"]
[/picture]
```

Media query to use another image at 400px width width high res images:

```
[picture img="/path/to/image-small.png, /path/to/image-small@2x.png 2x"]
[source srcset="/path/to/image-medium.png, /path/to/image-medium@2x.png 2x" media="(min-width: 400px)"]
[/picture]
```

Using `webp` and `svg` image types with fallback:

```
[picture img="/path/to/image-default.png"]
[source srcset="/path/to/image.webp" type="image/webp"]
[source srcset="/path/to/image.svg" type="image/svg"]
[/picture]
```

### [picture] attributes

#### class
`class` adds additional classed to the default image

#### img
`img` defines the path to the default image

#### alt
`alt` defines alt text for the default image

#### themedir
`themedir` determines if the `img` path is relative to the theme directory, or the site root (default false)

#### width
`width` specifies image width

#### height
`height` specifies image height


### [source] attributes

#### srcset
`srcset` defines path to image(s) separated by commas

#### media
`media` specifies the media query to use for the `srcset`

#### type
`type` specifies the image type e.g. `image/webp`, `image/svg`

#### themedir
`themedir` determines if the `img` path is relative to the theme directory, or the site root (default false)

## Automatic Updates

Automatic updates can be enabled by installing the [Github Updater](https://github.com/afragen/github-updater)

## Development

- Source hosted at [GitHub](https://github.com/ractoon/wordpress-picturefill)
- Report issues, questions, feature requests on [GitHub Issues](https://github.com/ractoon/wordpress-picturefill/issues)

## Authors

[ractoon](http://www.ractoon.com)