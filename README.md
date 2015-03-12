# PHPTailMonitor
A very humble, __lightweight__ GUI way to monitor your access.log. With ajax, password and fseek() to just get the new lines of the file.

#### Features:
* PHP fseek/append. Will not re-print the entire file every time the ajax refresh the content
* File deletion detection
* Truncated file detection
* Autoscroll
* Control buttons (AutoScroll, Start/Stop, clear)


#### Install and Use:
Simply copy the files to your webserver and then edit the config.php to your password and path to your access.log.  


#### TODOs:
- [ ] Password protection (no DB)
- [ ] Simple keyword-based, json configured, line highlight
- [ ] Statistics
- [ ] Support for 2GB+ files
- [ ] Support multiple files
- [ ] Support multiple instances (session bug)
- [ ] Support filters
- [ ] Light/Dark Theme
- [ ] Smart filters for common requests (like images and etc.)
- [ ] Possibly email report for keywords found?
- [ ] Possibly parsing for the log?


#### Known Issues:
For log files bigger than 2GB will cause problems with *filesize()*, *fseek()*, *ftell()*, and possibly other php functions.


#### Security:
PHPTailMonitor can be used to monitor logs for security purposes. The sessions save path is separated from the default one.  
Consider enhancing the security by adding two factor authentication.

## Author

[VexGuard](http://www.vexguard.com) - André Tabarra

#### Inspired In & Thanks To:
[deizel / tail.php](https://gist.github.com/deizel/3846335) - Chris Burke  
[ThomasDepole/Easy-PHP-Tail-](https://github.com/ThomasDepole/Easy-PHP-Tail-) - Thomas Depole
[php-tail](https://github.com/taktos/php-tail) - Toshio Takiguchi

## License

[MIT License](http://www.opensource.org/licenses/mit-license.php)

The MIT License (MIT)
Copyright (c) 2015 André Tabarra

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
