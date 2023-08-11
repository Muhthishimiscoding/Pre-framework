<?php
class Solution
{

    /**
     * @param String $s
     * @param String[] $words
     * @return Integer[]
     */
    function findSubstring($s, $words)
    {
        $firstWordCount = strlen($words[0]);
        $wordsCount = $firstWordCount * count($words);
        sort($words);
        $result = [];
        for ($i = 0; $i < strlen($s) - $wordsCount + 1; $i++) {
            $substr = substr($s, $i, $wordsCount);
            $substrArray= str_split($substr, $firstWordCount);
            sort($substrArray);
            if($words == $substrArray){
                $result[]=$i;
            }
        }
        return $result;
    }
    function findSubstring1($s, $words)
    {
      $wordLen = strlen($words[0]);
      $maxWord = $wordLen * count($words);
      $lastCheckingIndex = strlen($s) - $maxWord;
      $wordsCountValues = array_count_values($words);
  
      $answer = [];
      for ($i = 0; $i <= $lastCheckingIndex; $i++) {
        if (empty(array_diff_assoc($wordsCountValues, array_count_values(str_split(substr($s, $i, $maxWord), $wordLen))))) {
          $answer[] = $i;
        }
      }
      return $answer;
    }
    function minWindow($s, $t) {
        $min = strlen($s)+1;
        $result="";
        for ($r=$sum=$l =0; $r < strlen($min) ; $r++) { 
            // if(i)

        }
        $result ="";
        for ($i=0; $i < strlen($t); $i++) { 
            # code...
        }
    }
}