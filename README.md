# CodeIgniter sFTP Library

A CodeIgniter sFTP Library - Allows communication to a sFTP server via the CodeIgniter framework.


## Contributors

Many thanks to;

[Jlil](https://github.com/jlil)

[tunelko](https://github.com/tunelko)

[AchrafSoltani](https://github.com/AchrafSoltani)

[lavluda](https://github.com/lavluda)

[kjj1](https://github.com/kjj1)

Ian Grice



## Requirements

1. PHP 5+
2. CodeIgniter for 2.x
3. ssh2 extension for PHP (which in turn needs libssh2)



## Usage

Have a look at `application/controllers/sftp_test.php` for an example of how to connect
to a remote sFTP server, as well as a few demo commands you can run.



## libssh2 & ssh2 installation on OSX 10.9

Here's an updated guide to installing this extension on OSX 10.9 (Mavericks).

I'm using the default OSX PHP install (5.4.24) that comes pre-installed. This guide also assumes you're using [Homebrew](http://brew.sh/) as a package manager, and have wget installed.

This is very similar to the process on this [gist](https://gist.github.com/brennanneoh/1403250).

1) Install libssh2;

`brew install libssh2`

2) Install ssh2;

`wget http://pecl.php.net/get/ssh2-0.11.3.tgz`

`tar -zxvf ssh2-0.11.3.tgz`

`cd ssh2-0.11.3`

`phpize`

`./configure`
 
`make`

3) Copy your newly compiled extension (ssh2.so) into your PHP extensions directory.

`sudo cp modules/ssh2.so /usr/lib/php/extensions/no-debug-non-zts-20100525`

4) Add the extension to the php.ini. Just add the following text to the php.ini file;

`extension=ssh2.so`

6) Restart apache and run php info to see if the extension has been loaded;

`php -i | grep ssh2`


You should be good to go from here!

The main thing is that libssh2, ssh2 and php are all the same architecture (32 or 64bit).