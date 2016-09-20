<?php

    // require_once(__DIR__ . "/../src/TransitionTableGenerator.php");
    require_once(__DIR__ . "/../src/PartialMatchTableGenerator.php");

    class SubstringSearch
    {
        // private $transition_matrix;
        private $match_length_vector;
        private $pattern;
        private $string_to_search;

        private $match_start_indices = [];


        // function getTransitionMatrix()
        // {
        //     return $this->transitionMatrix;
        // }
        //
        // function setTransitionMatrix($transitionMatrix)
        // {
        //     $this->transitionMatrix = $transitionMatrix;
        // }

        function getMatchLengthVector()
        {
            return $this->match_length_vector;
        }

        function setMatchLengthVector($match_length_vector)
        {
            $this->match_length_vector = $match_length_vector;
        }

        function getPattern()
        {
            return $this->pattern;
        }

        function setPattern($pattern)
        {
            $this->pattern = (string) $pattern;
        }

        function getStringToSearch()
        {
            return $this->string_to_search;
        }

        function setStringToSearch($string_to_search)
        {
            $this->string_to_search = (string) $string_to_search;
        }

        function getMatchStartIndices()
        {
            return $this->match_start_indices;
        }

        function setMatchStartIndices($match_start_indices)
        {
            $this->match_start_indices = $match_start_indices;
        }

        function addMatchToList($match_location)
        {
            $new_list = $this->getMatchStartIndices();
            //Push new element;
            $new_list[] = $match_location;
            $this->setMatchStartIndices($new_list);
        }



        function generateTables()
        {
            // $transition_function = TransitionTableGenerator::generateTransitionTable($this->pattern, $this->string_to_search);
            //
            // $this->transition_matrix = $transition_function;

            $match_length_table = PartialMatchTableGenerator::generateMatchTable($this->getPattern());

            $this->setMatchLengthVector($match_length_table);
        }


        function __construct($input_pattern, $input_string)
        {
            $this->pattern = (string) $input_pattern;
            $this->string_to_search = (string) $input_string;
            $this->generateTables();
        }



        function kmpSearch() {

            $text = $this->getStringToSearch();
            $text_length = strlen($text);

            $pattern = $this->getPattern();
            $pattern_length = strlen($pattern);

            $match_table = $this->getMatchLengthVector();

            /*  NOTE:
            *   pattern_index is keeping track of how many characters are
            *   currently matched.
            */
            $pattern_index = 0;
            $char_index = 0;

            //Search through text
            while ($char_index < $text_length)
            {
                //Check if string and pattern match
                if ($text[$char_index] === $pattern[$pattern_index])
                {
                    /*For a match move to next charactrer in string and next
                     character in pattern.*/
                    $char_index++;
                    $pattern_index++;
                }

                //FULL MATCH==========================
                if ($pattern_length == $pattern_index)
                {
                    /*
                     *    match_location is the index of the first character
                     *    (within the text we are searching through) in a complete
                     *    substring match.
                     */
                    $match_location = $char_index - $pattern_index;
                    $this->addMatchToList($match_location);

                    /*  NOTE:
                     *  At the end of a full match we act as if we had in fact
                     *  failed the match. This way we reset the search in such a
                     *  way that it checks that the text characters which matched
                     *  our pattern suffix are not also the prefix of a new match.
                     *  EXAMPLE:
                     *      pattern: "ababca"
                     *      string:  "ababcababca"
                     *
                     *      first complete match: "[ababca]babca"
                     *
                     *      second match after back track to
                     *      match_table[pattern_index - 1]:
                     *      "ababc[ababca]"
                     *
                     */
                    $pattern_index = $match_table[$pattern_index - 1];
                }

                //=MATCH FAIL================================================
                else if ($char_index < $text_length && $text[$char_index] != $pattern[$pattern_index])
                {
                    //
                    if ($pattern_index != 0)
                    {
                        $pattern_index = $match_table[$pattern_index - 1];
                    }
                    else
                    {
                        $char_index = $char_index + 1;
                    }
                }

            }
            return $this->getMatchStartIndices();
        }

    }
 ?>
