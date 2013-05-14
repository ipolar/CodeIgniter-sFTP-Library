# CodeIgniter sFTP Library

A CodeIgniter sFTP Library - Allows communication to a sFTP server via the CodeIgniter framework.


## Contributors

Many thanks to Carlo Giordano [kjj1](https://github.com/kjj1 "kjj1") on GitHub for adding public key functionality!

## Todo
A more up to date guide to installing ssh2


## Requirements

1. PHP 5+
2. CodeIgniter for 1.7.x
3. ssh2 extension for PHP (which in turn needs libssh2)


## Usage

Have a look at application/controllers/sftp_test.php for an example of how to connect
to a remote sFTP server, as well as a few demo commands you can run.


## SSH2 & libssh2 installation on OSX 10.5.8

After a lot of faffing around, here is the process I got to work on my OSX 10.5.8 install.

A few things to note;

1) I've already got Marc Liyanage's PHP 5.2.9 (http://www.entropy.ch/software/macosx/php/) installed rather than the stock version of PHP that comes with OSX.
This means some of the inital commands below will be different than with the stock version of PHP.


Ok, so first off, if you're using Marc Liyanage's PHP you'll need to make sure you've got the correct paths to the correct versions of PHP etc.
This is so that phpize will use the correct PHP version to build our extension.



1) Setup correct paths;

$ cd /usr/bin
$ sudo mv /usr/bin/php /usr/bin/php-back
$ sudo ln -s /usr/local/php5/bin/php .
$ sudo mv /usr/bin/php /usr/bin/phpize-back
$ sudo ln -s /usr/local/php5/bin/phpize .
$ sudo mv /usr/bin/php /usr/bin/php-config-back
$ sudo ln -s /usr/local/php5/bin/php-config .

This step backs up the current php, phpize, php-config and then adds in a symbolic link to the Marc Liyanage's installed bins.



2) Install libssh2! The version I used was the latest on their site (http://www.libssh2.org/). At the time of writing this (17th December 2010) That was v1.2.7.

$ ./configure CFLAGS="-arch x86_64 -g -Os -pipe -no-cpp-precomp" CXXFLAGS="-arch x86_64 -g -Os -pipe" CCFLAGS="-arch x86_64 -g -Os -pipe" LDFLAGS="-arch x86_64 -bind_at_load"
$ sudo make
$ sudo make install

This step assumes you've un-tared and cd'd into the download source directory. The flags you set are for compiling this to an x86_64 binary (64bit) this is so due to the fact that PHP is 64bit.



3) Install ssh2! The version I used was the latest on their site (http://pecl.php.net/package/ssh2). At the time of writing this (17th December 2010) That was v0.11.2;

$ sudo phpize
$ ./configure --with-ssh2 CFLAGS="-arch x86_64 -g -Os -pipe -no-cpp-precomp" CXXFLAGS="-arch x86_64 -g -Os -pipe" CCFLAGS="-arch x86_64 -g -Os -pipe" LDFLAGS="-arch x86_64 -bind_at_load"
$ sudo make

This step also assumes you've un-tared and cd'd into the download source directory. Again there are the 64bit flags

To confirm you've compiled a 64bit extension, you can run this command...

$ file modules/ssh2.so

This should return something along the lines of x86_64.



4) Copy your newly compiled extension (ssh2.so) into your PHP extensions directory.

$ sudo cp modules/ssh2.so /usr/local/php5/lib/php/extensions/no-debug-non-zts-20060613/



5) Add the extension to the php.ini. This will also give you a chance to check the above extension diretory for your install of PHP (/usr/local/php5/lib/php/extensions/no-debug-non-zts-20060613/)
So just add the following text to the php.ini file.

extension=ssh2.so



6) Restart apache and run php info to see if the extension has been loaded!

$ php -i | grep ssh2




You should be good to go from here!

Here are some of the links that have helped me through this process and maybe good to refer back to.

http://www.3thirty.net/blog/?p=52
http://www.entropy.ch/phpbb2/viewtopic.php?t=2877
http://php.net/manual/en/install.pecl.phpize.php
http://iparrizar.mnstate.edu/~juan/urania/2008/12/11/activating-ssh-support-in-macports-php/
http://discussions.apple.com/thread.jspa?threadID=2174107&tstart=52
http://kevin.vanzonneveld.net/techblog/article/make_ssh_connections_with_php/
