# wordFrequencyPHP

#### A website that allows users to enter a word and some text. The website will then count how many times the search word is present in the text. It will use php, silex, twig, and tests (phpunit). 09.16.16

#### By **Alexandre Leibler**


## Description

_Given a text and a search word, the app will tell the user how many times the search word appears in the text._


## Setup/Installation Requirements

* If you wish to view the source code locally on your machine please follow the following steps:

  +  1). Navigate to the directory in which you want the wordFrequencyPHP project to reside.

  +  2). Enter the following command into your terminal:
        git clone https://github.com/KomodoTech/wordFrequencyPHP.git

  +  3). Navigate to the wordFrequencyPHP directory, and execute the following command in the terminal:
          composer install

  +  4). Navigate to the web directory and start your local host by executing the following command in your terminal:
          php -S localhost:8000

  +  5). Open up the browser of your choice and go to the following url:
          http://localhost:8000/

  +  6). If you wish to look at the source code, feel free to browse through the files in the wordFrequencyPHP directory


## Specs

* 1). Text to search is empty
  + IN:  ("stringToSearch", "")
  + OUT: matches = 0 empty text!

* 2). String to search is empty
  + IN:  ("", "text to Search")
  + OUT: matches = 0 empty search term!

* 3). Both string and text to search are empty
  + IN:  ("", "")
  + OUT: matches = 0 empty search term and text!

* 4). String is not found inside of text (both non-empty)
  + IN:  ("707C@1z!", "I love lolcats not707C@1z!")
  + OUT: matches = 0

 * 5). String is found inside of text once (both non-empty)
  + IN:  ("707C@1z!", "I love 707C@1z!")
  + OUT: matches = 1

* 6). String is found inside of text multiple times (both non-empty)
  + IN:  ("707C@1z!", "I love707C@1z! 707C@1z! are the best. If I have a cat it will be named 707C@1z!")
  + OUT: matches = 2



## Known Bugs

None yet


## Support and Contact Details

Please feel free to contact me through my github account (KomodoTech) or at the following email:
    alexandre.leibler@gmail.com

## Technologies Used

* silex v~2.0
* twig v~1.0
* phpunit v5.5.*
* bootstrap v3.3.7



### License

* GPLV3

wordFrequencyPHP Copyright (c) 2016 **Alexandre Leibler**
