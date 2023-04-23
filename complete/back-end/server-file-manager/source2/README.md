# php-file-manager
PHP File Manager

Advanced PHP File Manager in a single file.<br>
Fully responsive file manager with Web 2.0 support.<br>
Inspired by https://github.com/prasathmani/tinyfilemanager

<hr>
<img src="fm1.jpg">
<img src="fm2.jpg">

## Requirements

- PHP 5.2 or higher.
- [Zip extension](http://php.net/manual/en/book.zip.php) for zip and unzip actions.
- Fileinfo, iconv and mbstring extensions are strongly recommended.

## How to use

Download ZIP with latest version from master branch.

Copy all the files to your website folder and open it with web browser (e.g. http://yoursite/any_path/files.php).

Default username/password: root/12345. password has encripted with MD5.

Warning: Please set your own username and password in $auth_users before use.

To enable/disable authentication set $use_auth to true or false.

### Supported constants:

- `FM_ROOT_PATH` - default is `$_SERVER['DOCUMENT_ROOT']`
- `FM_ROOT_URL` - default is `'http(s)://site.domain/'`
- `FM_SELF_URL` - default is `'http(s)://site.domain/' . $_SERVER['PHP_SELF']`
- `FM_ICONV_INPUT_ENC` - default is `'CP1251'`
- `FM_USE_HIGHLIGHTJS` - default is `true`
- `FM_HIGHLIGHTJS_STYLE` - default is `'vs'`
- `FM_DATETIME_FORMAT` - default is `'d.m.y H:i'`
- `FM_EXTENSION` - default is `""` //upload files extensions
- `FM_TREEVIEW` - default is `false`


### :loudspeaker: Features 
<ul>
<li>:cd: Open Source, light and extremely simple</li>
<li>:information_source: Basic features likes Create, Delete, Modify, View, Download, Copy and Move files </li>
<li>:arrow_double_up: Ability to upload multiple files and file extensions filter </li>
<li>:file_folder: Ability to create folders and files</li>
<li>:gift: Ability to compress, extract files</li>
<li>:sunglasses: Support user permissions - based on session</li>
<li>:floppy_disk: Copy direct file URL</li>
<li>:pencil2: Edit text formats file using advanced editor</li>
<li>:zap: Backup files</li>
<li>:mag_right: Search - Advanced Ajax based seach</li>
<li>:palm_tree: Tree file view</li>
<li>:file_folder: Exclude folders from listing</li>
<li>:bangbang: lots more...</li>
</ul>

