# ![](./templates/classic2017/img/favicon/favicon-32x32.png) MyLocal 
>    MyLocal is a responsive dashboard for your web development environment.  
>    Try it if you are bored of your localhost home page!  

![](./templates/classic2017/img/screen.png)
## Why I should use this crap?
1. Include a directory listing *(like every dashboard)*
2. Automatic detection of GitHub repository link
3. Automatic detection of Bitbucket repository link
4. Automatic detection of SVN repository link
5. No database requirement
6. Work with [a lot](#build-status-) of OS, development environment and PHP version. 
7. Custom CSS & JS area
8. It's easy to make your own myLocal template.
9. New  feature [in comming!](./roadmap.md)
10. Is made with  :green_heart: && :coffee: under a [public license](./license.md)

## Requirements

* PHP 5.0+ (php7.1 ready)
* [xampp](https://www.apachefriends.org/index.html) || [wamp](http://www.wampserver.com/en/) || [mamp](https://www.mamp.info/en/)

## How to install?

Clone or paste myLocal folder in your web development environment (xampp, wamp or mamp) root folder (htdocs or www).

   **How to load it in my localhost homepage?**   
   If you want to load myLocal dashboard instead of your classic environment's 
   dashboard you can paste `myLocal/include.php` in your root folder and renamed it to `index.php`.

   **How to load it in a sub-folder?**   
   In your sub-folder create a `index.php` file with a myLocal include inside    

	<?php
		include "YourPath/myLocal/index.php";
	?>

## For Developers

Required [Gulp](https://www.npmjs.com/package/gulp-install) for any update.
MyLocal use [gulp-oyana](https://github.com/Oyana/gulp-oyana) for asset compiling.


## Build status ![v 0.6.0](https://img.shields.io/badge/version-0.6.0_alpha-blue.svg)

| Linux | Windows | Mac | PHP |
|:------:|:----------:|:----:|:----:|
| ![xampp ok](https://img.shields.io/badge/XAMPP_Build-passing-brightgreen.svg) | ![xampp ok](https://img.shields.io/badge/XAMPP_Build-passing-brightgreen.svg) |  ![xampp ok](https://img.shields.io/badge/XAMPP_Build-passing-brightgreen.svg) | ![PHP 5.3 ok](https://img.shields.io/badge/5.3-passing-brightgreen.svg) |
| | ![wampp ok](https://img.shields.io/badge/WAMPP_Build-passing-brightgreen.svg) | ![mampp ok](https://img.shields.io/badge/MAMPP_Build-passing-brightgreen.svg) | ![PHP 5.4 ok](https://img.shields.io/badge/5.4-passing-brightgreen.svg) |
|| | | ![PHP 5.5 ok](https://img.shields.io/badge/5.5-passing-brightgreen.svg) |
|| | | ![PHP 5.6 ok](https://img.shields.io/badge/5.6-passing-brightgreen.svg) |
|| | | ![PHP 6.0 unknow](https://img.shields.io/badge/6.0-unkow-silver.svg) |
|| | | ![PHP 7.0 ok](https://img.shields.io/badge/7.0-passing-brightgreen.svg) 
|| | | ![PHP 7.1 ok](https://img.shields.io/badge/7.1-passing-brightgreen.svg) |

## License

This software is distributed under the [GNU 3.0](./license.md) license.
