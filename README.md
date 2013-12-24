Silverstripe Carousel Module
============================

Image slider module for the Silverstripe CMS based on foundation theme.

## Author
This module was created by leancode(Dominic O'Brien) based on the code from the "i-lateral/silverstripe-carousel" module created by [i-lateral](http://www.i-lateral.com).

## Installation
Install this module either by downloading and adding to:

[silverstripe-root]/orbit

Then run: http://yoursiteurl.com/dev/build/

Or alternatively add to your projects composer.json

## Usage
Once installed, you must add the template variable $OrbitSlides to any template you want the slider to show on.

You can setup a slideshow by logging into the admin interface and edit the page you want to add a slideshow to.

On the "Settings" tab enable the slideshow by ticking the "Show an image slider on this page?" checkbox. Then save your page (important!). The width and height override will the show just below it allowing you to change the size of your slideshow.

Once you saved you go back to the "Content" tab and next to your "Main Content" subtab the "Orbit" tab should have appeared. There you can upload/select your images to be part of the slideshow.

In my testing I noticed that the "Orbit" tab was blank at first right after installing. I needed to click the "Pages" tab oll the way on the left again to sort of refresh the page and then the content of the "Orbit" tab showed. This seems to only ever happen the very first time. Maybe I am missing some flushing. Feel free to update these instructions on github and send me a pull request. 

## Misc
This is my first module for Silverstripe and I am just getting my feet wet. It is based on the module "i-lateral/silverstripe-carousel". Their module uses a JQuery plugin and custom CSS. Since I am using the most awesome foundation theme which is based on compass/sass and the slide show "orbit" is already included in foundation I didn't need all this. It was suprisingly easy to adapt their module to my use and only took me about 1 1/2 hours including opening a packagist account. I think I am begining to like this.... 

