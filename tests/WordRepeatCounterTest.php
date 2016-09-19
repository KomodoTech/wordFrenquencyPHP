<?php
    require_once(__DIR__ . "/../src/WordRepeatCounter.php");
    require_once(__DIR__ . "/../src/SubstringSearch.php");

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


        function test_kmp_OneMatch() {
            //ARRANGE
            $pattern = "ab";
            $text = "ab";
            $expected_output = [0];
            $substring_search_instance = new SubstringSearch($pattern, $text);

            //ACT
            $test_result = $substring_search_instance->kmpSearch();

            //ASSERT
            $this->assertEquals($expected_output, $test_result);
        }

        function test_kmp_NoMatch() {
            //ARRANGE
            $pattern = "abc";
            $text = "ab";
            $expected_output = [];
            $substring_search_instance = new SubstringSearch($pattern, $text);

            //ACT
            $test_result = $substring_search_instance->kmpSearch();

            //ASSERT
            $this->assertEquals($expected_output, $test_result);
        }

        function test_kmp_MultipleMatches() {
            //ARRANGE
            $pattern = "abab";
            $text = "cabababaaabc";
            $expected_output = [1, 3];
            $substring_search_instance = new SubstringSearch($pattern, $text);

            //ACT
            $test_result = $substring_search_instance->kmpSearch();

            //ASSERT
            $this->assertEquals($expected_output, $test_result);
        }

    }

 ?>
