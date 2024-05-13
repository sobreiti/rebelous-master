=== Rebelous WordPress Theme ===

Contributors: automattic

Tags: translation-ready, custom-background, custom-menu, post-formats, threaded-comments, custom-logo
Requires at least: 4.8
Tested up to: 5.0.3
Stable tag: 2.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html



== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Search for 'Rebelous'. Click Install.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

= Does this theme support any plugins? =
Rebelous includes support for Infinite Scroll, content options, and social menu in Jetpack. It also supports all default Gutenberg blocks

= How to set the circular image in the header? =
It will pull in the admin's gravatar by default. For a custom image, go to customizer and add a custom logo under 'Site Identity'.

= I set a custom logo, and it's not round anymore.
That's intentional, because you might want a different shaped logo. If your image is square, add this css code.
    .custom-logo { 
        border-radius: 50%; 
    }

= I don't want your link in my footer/I want my own copyright information =
That's okay. I don't have a way of changing this in settings, but you can use some css code like this:
    .author-credit {
        font-size: 0;
    }

    .author-credit::after {
        content: "© 2019 YourAwesomeName";
        font-size: 0.875rem;
    }



== Credits ==

* Based on Underscores http://underscores.me/, (C) 2012-2015 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* normalize.css http://necolas.github.io/normalize.css/, (C) 2012-2015 Nicolas Gallagher and Jonathan Neal, [MIT](http://opensource.org/licenses/MIT)
* Image in demo under CC0 https://pixabay.com/en/typewriter-retro-vintage-old-498204/
* Cat image in screenshot under CC-by http://flickr.com/photos/titrans/, (C) Quatre Mains
