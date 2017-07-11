<?php


namespace Acikgise\Helpers;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Helpers
{
    /**
     * Creates a slug based on given text.
     *
     * @param $string
     * @return mixed
     */
    public static function sluggify($string)
    {
        $text = preg_replace('~[^\pL\d]+~u', '-', $string);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    /**
     * Uploads the given Image.
     *
     * @param Request $request
     * @param $directory
     * @param $imageName
     * @return bool|string
     */
    public static function uploadImage(Request $request, $directory, $imageName)
    {
        if ($request->hasFile($imageName)) {
            $fileString = Str::random(32);
            $file = $request->file($imageName);

            $ext = $file->guessClientExtension();
            $fileName = $fileString . '.' . $ext;
            $file->move('images/' . $directory, $fileName);

            return $fileName;

        } else {
            return false;
        }
    }

    /**
     * Parses the given string
     *
     * @param $time
     * @return Carbon
     */
    public static function getDateTimeFormat($time)
    {
        return Carbon::parse($time);
    }

    /**
     * Returns the countries list.
     *
     * @param string $format
     * @return mixed
     */
    public static function getCountriesList($format = 'array')
    {
        $countriesJson = Storage::read('/public/countries.json');

        if ($format === 'array')
        {
            return json_decode($countriesJson, true);
        } else {
            return $countriesJson;
        }
    }
}