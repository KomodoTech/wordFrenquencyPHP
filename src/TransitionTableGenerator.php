<?php
    class TransitionTableGenerator
    {

        static function checkAlphabetForSymbol($alphabet, $symbol)
        {
            for ($alphabet_index = 0; $alphabet_index < strlen($alphabet); $alphabet_index++)
            {
                if ($symbol === $alphabet[$alphabet_index])
                {
                    return 1;
                }
            }
            return 0;
        }



        static function generateAlphabet($pattern, $string)
        {
            $alphabet = [];

            for ($pattern_index = 0; $pattern_index < strlen($pattern); $pattern_index++)
            {
                $current_symbol = $pattern[$pattern_index];
                if (!TransitionTableGenerator::checkAlphabetForSymbol($alphabet, $current_symbol))
                {
                    array_push($alphabet, $current_symbol);
                }
            }

            for ($string_index = 0; $string_index < strlen($string); $string_index++)
            {
                $current_symbol = $string[$string_index];
                if (!TransitionTableGenerator::checkAlphabetForSymbol($alphabet, $current_symbol))
                {
                    array_push($alphabet, $current_symbol);
                }
            }

            return $alphabet;
        }



        static function generateTransitionTable($pattern, $string)
        {
            $transitionTable = [];

            $pattern = (string) $pattern;
            $string = (string) $string;

            $new_alphabet = TransitionTableGenerator::generateAlphabet($pattern, $string);

            $number_of_states = strlen($pattern);
            $number_of_symbols = count($new_alphabet);

            for ($state_index = 0; $state_index <= $number_of_states; $state_index++)
            {
                for ($symbol_index = 0; $symbol_index < $number_of_symbols; $symbol_index++)
                {
                    //aacaaab {a, b, c}
                    if ()
                    {

                    }
                }
            }


        }

    }

 ?>
