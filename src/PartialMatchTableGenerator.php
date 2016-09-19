<?php

    //NOTE: KMP Algorithm
    class PartialMatchTableGenerator
    {

        static function generateMatchTable($pattern)
        {
            $pattern = (string) $pattern;
            $match_table = [0];
            $pattern_length = strlen($pattern);
            
            $match_length = 0;
            $suffix_index = 1;

            while ($suffix_index < $pattern_length)
            {
                if ($pattern[$suffix_index] === $pattern[$match_length])
                {
                    $match_length++;
                    $suffix_index++;
                    $match_table[] = $match_length;
                }
                else
                {
                    if ($match_length == 0)
                    {
                        $match_table[$suffix_index] = 0;
                        $suffix_index++;
                    }
                    else
                    {
                        $match_length = $match_table[$match_length - 1];
                    }
                }
            }
            return $match_table;
        }

    }

 ?>
