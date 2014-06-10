flatout2
========

Mustache-based HTML compiler in PHP

I needed quick template-based solution for prototypes and didn't want to install anything fancy (Grunt) or learn some sort of new language (Haml, Jade). FlatOut2 uses standard Mustache/Handlerbars templates and uses light PHP to model data and handle the actual compiling of files. Nothing major, nothing fancy.

You include a PHP file on your wrapper page, then use some templates and out comes a complete, flat HTML file. Great for design prototypes and rapid testing. You don't need to know PHP but knowledge of basic variables, arrays and data structure is needed.

You need the Mustache PHP library - it is not included.

https://github.com/bobthecow/mustache.php

Just unzip the entire Mustache library into your working directory in the folder "Mustache" and everything should work. No modifications to Mustache are necessary.
