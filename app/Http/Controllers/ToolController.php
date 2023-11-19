<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Html2Text\Html2Text;


class ToolController extends Controller
{
    public function index() {
        //return view('tool.index');
        return view('index');
    }

    public function CalculateAndGetDensity(Request $request) {
        if ($request->isMethod('POST')) { 

            if (isset($request->keywordInput)) { // Test the parameter is set.


                if (strpos(strtolower($request->keywordInput), 'http') === 0) {
                   $rawData = file_get_contents($request->keywordInput); 
                } else {
                   $rawData = $request->keywordInput;
                }

                $html = new Html2Text($rawData); // Setup the html2text obj.
                $text = $html->getText(); // Execute the getText() function.

                $totalWordCount = str_word_count($text); // Get the total count of words in the text string
                $wordsAndOccurrence  = array_count_values(str_word_count($text, 1)); // Get each word and the occurrence count as key value array
                arsort($wordsAndOccurrence); // Sort into descending order of the array value (occurrence)

                $keywordDensityArray = [];
                // Build the array
                foreach ($wordsAndOccurrence as $key => $value) {
                    $keywordDensityArray[] = ["keyword" => $key, // keyword
                        "count" => $value, // word occurrences
                        "density" => round(($value / $totalWordCount) * 100,2)]; // Round density to two decimal places.
                }

                return $keywordDensityArray;
            }        

        }
    }    
}
