# NoIE
**Please excuse my bad english...**
Single php file which detects IE (all versions), and if JS is enabled, website will be redirected to MS Edge. Otherwise, it will show a message.
It's my first published project ever (the rest will never be published).

## Will it affect firefox, chrome or any other modern browser?
No. It will work only on IE and the website won't load at all (on IE) because why wasting time when the browser is old and can't even work properly?

## How to Use
On Apache Httpd:

- Download as Zip, and extract the files to public_html inside a directory named "no-ie".
- Insert the following line to the top of your htaccess file: `php_value auto_prepend_file "no-ie/no-ie.php"`
- Test it on IE, with JS enabled (the page will be opened in Edge, if Edge is installed) and with JS disabled (will show a message).
- That's all.

## What is the license?
Everything is released under Public Domain License which mean it's completely free for non-commercial and commercial use. actually you can do with it whatever you want. Also, No credit is required (You can remove the "NoIE" credit at the bottom if you want, but you can leave it there if you don't mind). Even the ugly logo is for free! you can change it too if you don't like it, or replace it with your website's logo.

## How to change language?
You can do it directly through the code or you can do it using the url.
Example: `http://localhost/?lang=he` will change the language to hebrew.
If your language is not on `no-ie.json` list you can add it. I only know hebrew and english (and very bad) so that's the languages supported. but feel free to add yours (and check for others)!

## N00b, you write code really bad!
I know :( and my english is bad too :( sorry. If you want to help or contribute or if you liked it (but don't want to say it loud) contact me and i'd like to hear anything from you.
contact me here or: natanhell＠outlook․com (Replace the @ and the dot with real ones, they're fake).
