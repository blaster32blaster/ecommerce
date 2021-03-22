<?php

namespace App\Traits;

/**
 * handle files that have csvs that need conversion
 */
Trait HasCsv
{
    /**
     * @param $filename  the file name to convert
     * @param string $delimiter  the delimiter to use
     * @return array     the array of converted data
     */
    function convert($filename = '', string $delimiter = ',') : array
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }
}
