# Photobook
A framework to create photobooks.

For long time I wished to find a straightful way to create photobooks in pdf, but I couldn't find an application to make it. Recently I came across with the great piece of code [cognitom/paper-css](https://github.com/cognitom/paper-css/) and I began to imagine a solution.

This is the (work in progress) result of this job, it is not perfect, but it works very well for my. I hope it can be usefull for you too.

## Installation
The project is based on other projects: Smarty as template engine and cognitom/paper-css for the css formatting of pages; I also used spyc for YAML management.

Copy all the files in your working folder.

Download Smarty from https://www.smarty.net/ and put it in <your-folder>/include/smarty/ and configure the template and cache folders (see [documentation](https://www.smarty.net/quick_install))
  
[cognitom/paper-css](https://github.com/cognitom/paper-css/) is used from the cdnjs, so you get it without installation, but if you prefer to have everything on your server change files accordingly.

[mustangostang/spyc](https://github.com/mustangostang/spyc) is used to manage YAML instead of php extension, so you should not have dependencies problems. Download it and put it in <your-folder>/include/spyc.

Create a YAML file in your root (keep the extension yaml) and enjoy this piece of code.

# Configuration
In the YAML file there are all the input for the system to prepare your photobook. See the photobook.yaml file as example.
- `title` : It's just a tag;
- `format` : the format of your page see [cognitom/paper-css](https://github.com/cognitom/paper-css/), available page sizes are:
  - A5, A5 landscape
  - A4, A4 landscape
  - A3, A3 landscape
  - letter, letter landscape
  - legal, legal landscape
- `format` : stylesheet for your project (in <your-folder>/css folder);
- `dsphoto_url` : sometimes it is useful to have a short path to most frequently used folder ex. http://example.com/images/, photobook will use it to link images in `dsphoto` (see below);
- `pages` : from here the list of pages;
- `class` : a custom class
- `print_pn` : true|false, if print the page number in that page or not;
- `pn` : if present photobook will use that number as page number, otherwise it will increment the previous page number;
- `frames` : the list of frames in this page;
- `type` : text|image
- `data` : link to the photo or text (accept all the html/css tags);
- `dsphoto` : short path to the photo, the full path is `dsphoto_url+dsphoto`;
- `hdim` : horizontal dimension of the frame;
- `vdim` : vertical dimension of the frame;
- `xpos` : horizontal position of the frame from left;
- `ypos` : vertical position of the frame from top;
- `align` : if the frame is text, its horizontal alignment;
- `hzoom` : auto or horizontal dimension of the picture inside the frame, so you can make it larger;
- `vzoom` : auto or vertical dimension of the picture inside the frame, so you can make it larger;
- `hpan` : horizontal position of the picture inside the frame;
- `vpan` : vertical position of the picture inside the frame;

# Use
Call the web page to see your progressing work.

`http://www.mydomain.com/photobook/index.php?pb=<your-photobook>&p=0-9`

It gets 2 parameters: 
- `pb=` : parameter is mandatory to call your YAML configuration file (it is the YAML filename with no extention);
- `p=` : optional, it is useful when the number of pages and pictures increase to limit the amount of data. It starts from 0 and it gets page range as a printer so you can do for example: `0-3,5`

# Make the PDF
Now the interesting part.

You can print the web page in several ways:
- print from the browser, as usual;
- use some shell command (for example [wkhtmltopdf](https://wkhtmltopdf.org/)
- or other...

But my best choice is using [Puppeteer](https://github.com/GoogleChrome/puppeteer), it takes a little bit to manage it, but it woth the time.

printpdf.js file is an example file to create the pdf this way.

# Warning
I'm not a professional developer, and this tool is meant for personal use, so it is imperfect, buggy and so on. Use it without any warrenty. Any contribute is welcome.
