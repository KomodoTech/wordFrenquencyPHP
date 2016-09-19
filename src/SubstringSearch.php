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

            // var_dump($this->getMatchLengthVector());
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

            $pattern_index = 0;
            $char_index = 0;

            while ($char_index < $text_length)
            {
                // print("\nmatch_length: " . $match_length . "\n");
                // print("\nchar_index: " . $char_index . " text[char_index]: " . $text[$char_index] . "\n");
                //
                // print("pattern_index: " . $pattern_index . " pattern[pattern_index]: " . $pattern[$pattern_index] . "\n" . "============================\n");

                if ($text[$char_index] === $pattern[$pattern_index])
                {
                    $char_index++;
                    $pattern_index++;
                }

                //FULL MATCH==========================
                if ($pattern_length == $pattern_index)
                {
                    $match_location = $char_index - $pattern_index;
                    $this->addMatchToList($match_location);
                    $pattern_index = $match_table[$pattern_index - 1];
                }

                //
                else if ($char_index < $text_length && $text[$char_index] != $pattern[$pattern_index])
                {
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
