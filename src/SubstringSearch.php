<?php

    require_once(__DIR__ . "/../src/TransitionTableGenerator.php");
    require_once(__DIR__ . "/../src/PartialMatchTableGenerator.php");

    class SubstringSearch
    {
        private $transition_matrix;
        private $match_length_vector;
        private $pattern;
        private $string_to_search;

        private $match_start_indices = [];


        function getTransitionMatrix()
        {
            return $this->transitionMatrix;
        }

        function setTransitionMatrix($transitionMatrix)
        {
            $this->transitionMatrix = $transitionMatrix;
        }

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
            $this->pattern = $pattern;
        }

        function getStringToSearch()
        {
            return $this->string_to_search;
        }

        function setStringToSearch($string_to_search)
        {
            $this->string_to_search = $string_to_search;
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
            array_push($this->match_start_indices, $match_location);
        }



        function generateTables()
        {
            $transition_function = TransitionTableGenerator::generateTransitionTable($this->pattern, $this->string_to_search);

            $this->transition_matrix = $transition_function;

            $match_length_table = PartialMatchTableGenerator::generateMatchTable($this->pattern);

            $this->match_length_vector = $match_length_table;
        }


        function __construct($input_pattern, $input_string)
        {
            $this->pattern = (string) $input_pattern;
            $this->string_to_search = (string) $input_string;
            $this->generateTables($this->pattern, $this->string_to_search);
        }



        function kmpSearch() {

            return $this->matchStartIndices;
        }

    }
 ?>
