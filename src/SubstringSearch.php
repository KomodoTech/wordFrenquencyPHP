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

        function getMatchLengthAtIndex($table_index)
        {
            if ($table_index == 0)
            {
                return -1;
            }
            else
            {
                $match_table = $this->getMatchLengthVector();
                return ($match_table[$table_index]);
            }
        }

        function kmpSearch() {

            $text = $this->getStringToSearch();
            $pattern = $this->getPattern();

            $match_length = 0;
            $pattern_index = 0;
            $char_index = 0;

            while ($char_index < strlen($text))
            {
                // print("\nmatch_length: " . $match_length . "\n");
                // print("\nchar_index: " . $char_index . " text[char_index]: " . $text[$char_index] . "\n");
                //
                // print("pattern_index: " . $pattern_index . " pattern[pattern_index]: " . $pattern[$pattern_index] . "\n" . "============================\n");

                if ($text[$char_index] === $pattern[$pattern_index])
                {
                    $match_length++;
                    $char_index++;
                    $pattern_index++;

                    if ($match_length == strlen($pattern))
                    {
                        $match_location = $char_index - $match_length;
                        $this->addMatchToList($match_location);
                        $pattern_index = 0;

                        //TODO: don't go back all the way to 0 if there is a suffix equal to the prefix (e.g: "ababcab")
                        $match_length = 0;
                    }
                }
                else
                {
                    $char_index += $match_length - $this->getMatchLengthAtIndex($match_length);
                    $pattern_index = 0;
                }
            }
            return $this->getMatchStartIndices();
        }

    }
 ?>
