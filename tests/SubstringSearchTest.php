<?php
    require_once(__DIR__ . "/../src/SubstringSearch.php");

    class SubstringSearchTest extends PHPUnit_Framework_TestCase
    {

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

        function test_kmp_MultipleMatchesNoSuffixPrefixEqual() {
            //ARRANGE
            $pattern = "abcb";
            $text = "abcbxxxabcb";
            $expected_output = [0, 7];
            $substring_search_instance = new SubstringSearch($pattern, $text);

            //ACT
            $test_result = $substring_search_instance->kmpSearch();

            //ASSERT
            $this->assertEquals($expected_output, $test_result);
        }
    }
?>
