<?php
    require_once(__DIR__ . "/../src/WordRepeatCounter.php");

    class WordRepeatCounterTest extends PHPUnit_Framework_TestCase
    {
        function test_EmptyText() {
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

        function test_EmptyTerm() {
            //ARRANGE
            $term_input = "";
            $text_input = "text to Search";
            $expected_output = 0;
            $word_repeat_counter_instance = new WordRepeatCounter($term_input, $text_input);

            //ACT
            $test_result = $word_repeat_counter_instance->countRepeats();

            //ASSERT
            $this->assertEquals($expected_output, $test_result);
        }

        function test_EmptyTermEmptyText() {
            //ARRANGE
            $term_input = "";
            $text_input = "";
            $expected_output = 0;
            $word_repeat_counter_instance = new WordRepeatCounter($term_input, $text_input);

            //ACT
            $test_result = $word_repeat_counter_instance->countRepeats();

            //ASSERT
            $this->assertEquals($expected_output, $test_result);
        }

        function test_TermNotFoundInText() {
            //ARRANGE
            $term_input = "707C@1z!";
            $text_input = "I love lolcats not707C@1z!";
            $expected_output = 0;
            $word_repeat_counter_instance = new WordRepeatCounter($term_input, $text_input);

            //ACT
            $test_result = $word_repeat_counter_instance->countRepeats();

            //ASSERT
            $this->assertEquals($expected_output, $test_result);
        }

        function test_TermFoundInTextOnce() {
            //ARRANGE
            $term_input = "707C@1z!";
            $text_input = "I love 707C@1z!";
            $expected_output = 1;
            $word_repeat_counter_instance = new WordRepeatCounter($term_input, $text_input);

            //ACT
            $test_result = $word_repeat_counter_instance->countRepeats();

            //ASSERT
            $this->assertEquals($expected_output, $test_result);
        }

        function test_TermFoundInTextMultipleTimes() {
            //ARRANGE
            $term_input = "707C@1z!";
            $text_input = "I love707C@1z! 707C@1z! are the best. If I have a cat it will be named 707C@1z!";
            $expected_output = 2;
            $word_repeat_counter_instance = new WordRepeatCounter($term_input, $text_input);

            //ACT
            $test_result = $word_repeat_counter_instance->countRepeats();

            //ASSERT
            $this->assertEquals($expected_output, $test_result);
        }

    }

 ?>
