<?php

    //NOTE: KMP Algorithm
    class PartialMatchTableGenerator
    {

        static function generateMatchTable($pattern)
        {
            $pattern = (string) $pattern;
            $match_table = [0];

            //TODO: check if pattern is at least two chars long
            $prefix_index = 0;

            for ($suffix_index = 1; $suffix_index < strlen($pattern); $suffix_index++)
            {
                if ($pattern[$suffix_index] === $pattern[$prefix_index])
                {
                    $prefix_index++;
                }
                else
                {
                    while ($prefix_index > 0 && $pattern[$suffix_index] != $pattern[$prefix_index]) {
                        $prefix_index = $match_table[$prefix_index];
                    }
                }

                array_push($match_table, $prefix_index);
            }
            return $match_table;
        }

    }

 ?>
