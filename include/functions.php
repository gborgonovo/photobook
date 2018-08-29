<?php

function parsenumbers($input)
{
    /*
     * This routine parses a string containing sets of numbers such as:
     * 3
     * 1,3,5
     * 2-4
     * 1-5,7,15-17
     * spaces are ignored
     * 
     * routine returns a sorted array containing all the numbers
     * duplicates are removed - e.g. '5,4-7' returns 4,5,6,7
     */
    $input = str_replace(' ', '', $input); // strip out spaces
    $output = array();
    foreach (explode(',', $input) as $nums)
    {
        if (strpos($nums, '-') !== false)
        {
            list($from, $to) = explode('-', $nums);
            $output = array_merge($output, range($from, $to));
        }
        else
        {
            $output[] = $nums + 0;
        }
    }

    $output = array_unique($output, SORT_NUMERIC); // remove duplicates
    sort($output);

    return $output;
}
 
