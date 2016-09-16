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
            $this->current_word_count = (int) $count;
        }

        function getSearchTerm() {
            return $this->search_term;
        }

        function setSearchTerm($term) {
            $this->search_term = (string) $term;
        }

        function getTextToSearch() {
            return $this->text_to_search;
        }

        function setTextToSearch($text) {
            $this->text_to_search = (string) $text;
        }

/*=======SEARCH FUNCTIONS=====================================================*/

    //TODO: CHECK IF SINGLE CHAR INPUT WORD OR TEXT BREAKS ANYTHING

        function countRepeats() {

            $this->setCurrentWordCount(0);

            $split_text = explode(" ", $this->getTextToSearch());

            if ($this->getSearchTerm() && $this->getTextToSearch()) {
                for ($word_index = 0; $word_index < count($split_text); $word_index++) {
                    if ($split_text[$word_index] === $this->getSearchTerm()) {
                        $this->setCurrentWordCount($this->getCurrentWordCount() + 1);
                    }
                }
            }

            return $this->getCurrentWordCount();
        }

    }
 ?>
