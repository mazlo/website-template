# website-template

A template for a website, written in php (with Laravel Framework), __initially implemented for a sports club__.

I created this website for my table tennis club. You can see the online version of it at [ttc-benrath.de](http://ttc-benrath.de)


## What you need to run it

Running this website shouldn't be a problem. When you have finished configuration you should copy the contents of this repository into the *document root* folder of your webserver, or let the webserver point its *document root* folder to this repository.

### Laravel

It was omitted to include the *vendor specific code directory* into this repository, since it contains lots of vendor specific files from Laravel and does not contain *any* of the actual website-template code.

You need to download the [Laravel PHP Framework](http://laravel.com/) and copy the */vendor* directory into this cloned repository. That's it.

### Apache

You should download and install an [Apache](http://httpd.apache.org/) or __any other webserver you feel comfortable with__. On my Mac I used [MAMP](http://www.mamp.info/de/) for local development.

### Configuration

Everything you need to know about configuration is very well described in the [Laravel docs about configuration](http://laravel.com/docs/configuration).

Usually you just need to touch */app/config/app.php* and */app/config/database.php*. That's it.

## What you will get

The whole page is actually just one page with different tabs implemented with jQuery. Since this website is not very dynamic, it contains (almost) just static content. Regarding the HTML structure it should be well designed and easy to unterstand. Each tab has its own file where the content is included from.

You should go to [ttc-benrath.de](http://ttc-benrath.de) and see what it looks like.

Feel free to contribute.

Apache License, Version 2.0 http://www.apache.org/licenses/LICENSE-2.0.html

