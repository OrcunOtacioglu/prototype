<?php


namespace Acikgise\Helpers;


use Carbon\Carbon;
use Illuminate\Http\Request;
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
     * Uploads the given image.
     *
     * @param Request $request
     * @param $imageName
     * @return bool|string
     */
    public static function uploadImage(Request $request, $imageName)
    {
        if ($request->hasFile($imageName)) {
            $fileString = Str::random(32);
            $file = $request->file($imageName);

            $ext = $file->guessClientExtension();
            $fileName = $fileString . '.' . $ext;
            $file->move('images/cover-images', $fileName);

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
}