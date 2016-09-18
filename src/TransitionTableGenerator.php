<?php
    class TransitionTableGenerator
    {

        private $pattern;
        private $string;
        private $alphabet = [];


        function getPattern()
        {
            return $this->pattern;
        }

        function setPattern($pattern)
        {
            $this->pattern = $pattern;
        }

        function getString()
        {
            return $this->string;
        }

        function setString($string)
        {
            $this->string = $string;
        }

        function getAlphabet()
        {
            return $this->alphabet;
        }

        function setAlphabet($alphabet)
        {
            $this->alphabet = $alphabet;
        }



        function checkAlphabetForSymbol($symbol)
        {
            for ($alphabet_index = 0; $alphabet_index < strlen($this->alphabet); $alphabet_index++)
            {
                if ($symbol === $this->alphabet[$alphabet_index])
                {
                    return 1;
                }
            }
            return 0;
        }

        function generateAlphabet()
        {
            for ($pattern_index = 0; $pattern_index < strlen($this->pattern); $pattern_index++)
            {
                $current_symbol = $this->pattern[$pattern_index];
                if (!$this->checkAlphabetForSymbol($current_symbol))
                {
                    array_push($alphabet, $current_symbol);
                }
            }

            for ($string_index = 0; $string_index < strlen($this->string); $string_index++)
            {
                $current_symbol = $this->string[$string_index];
                if (!$this->checkAlphabetForSymbol($current_symbol))
                {
                    array_push($alphabet, $current_symbol);
                }
            }
        }

        function __construct($pattern, $string)
        {
            $this->pattern = $pattern;
            $this->string = $string;
            $this->alphabet = $this->generateAlphabet();
        }

        static function generateTransitionTable($pattern, $string)
        {

        }

    }

 ?>
