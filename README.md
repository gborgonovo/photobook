# Photobook
A framework to create photobooks

# Installation
The project is partially based on other projects: Smarty as template engine and cognitom/paper-css for the css formatting of pages.

Copy all the files in your working folder.

Download Smarty from https://www.smarty.net/ and put it in <your-folder>/include/smarty/
  
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

