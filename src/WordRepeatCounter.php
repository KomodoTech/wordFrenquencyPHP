<?php
    class WordRepeatCounter
    {
        private $current_word_count = 0;
        private $search_term;
        private $text_to_search;

        function __construct($search_word, $search_text) {
            $this->search_term = $search_word;
            $this->text_to_search = $search_text;
        }

/*========GETTERS/SETTERS=====================================================*/
        function getCurrentWordCount() {
            return $this->current_word_count;
        }

        function setCurrentWordCount($count) {
            $this->current_word_count = $count;
        }

        function getSearchTerm() {
            return $this->search_term;
        }

        function setSearchTerm($term) {
            $this->search_term = $term;
        }

        function getTextToSearch() {
            return $this->text_to_search;
        }

        function setTextToSearch($text) {
            $this->text_to_search = $text;
        }

/*=======SEARCH FUNCTIONS=====================================================*/

        function countRepeats() {
            return;
        }

    }
 ?>
