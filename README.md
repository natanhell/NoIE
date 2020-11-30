# NoIE
My first project ever. Single php file which detects IE, and if JS is enabled, website will be redirected to MS Edge. Otherwise, it will show a message. License: Public Domain, no credit required.

## How to Use
On Apache Httpd:

- Download as Zip, and extract the files in public_html inside a directory named "no-ie".
- Insert the following line to the first line of your htaccess file, `php_value auto_prepend_file "no-ie/no-ie.php"`.
- Test it on IE, with JS enabled (the page will be opened in Edge, if Edge is installed) and with JS disabled (will show a message).
- That's all.
