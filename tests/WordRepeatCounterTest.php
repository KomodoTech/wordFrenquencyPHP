<?php
    require_once(__DIR__ . "/../src/WordRepeatCounter.php");

    class WordRepeatCounterTest extends PHPUnit_Framework_TestCase
    {
        function test_EmptyTermEmptyText() {
            //ARRANGE
            $term_input = "stringToSearch";
            $text_input = "";
            $expected_output = 0;
            $word_repeat_counter_instance = new WordRepeatCounter($term_input, $text_input);

            //ACT
            $test_result = $word_repeat_counter_instance->countRepeats();

            //ASSERT
            $this->assertEquals($expected_output, $test_result);
        }

    }

 ?>
