<?php


namespace Acikgise\Helpers;


use App\Models\PaymentGateway;
use App\Models\Util\Settings;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

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
            Image::make($request->file($imageName))->save('images/' . $directory . '/' . $fileName);

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

    public static function getTurkishTime($time)
    {
        $datetime = Carbon::parse($time);

        setlocale(LC_TIME, 'tr_TR.utf8');
        return $datetime->formatLocalized('%d %B %Y - %H:%M');
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

    /**
     * Checks whether the user is authenticated.
     *
     * @param Request $request
     * @return bool
     */
    public static function checkAuthenticated(Request $request)
    {
        if ($request->user('account')) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * Returns the authenticated User.
     *
     * @param Request $request
     * @return mixed
     */
    public static function getAuthenticatedUser(Request $request)
    {
        return $request->user('account');
    }

    public static function makeBlurredImage(Request $request, $directory, $imageName)
    {
        if ($request->hasFile($imageName)) {
            $fileString = Str::random(32);
            $file = $request->file($imageName);

            $ext = $file->guessClientExtension();
            $fileName = $fileString . '.' . $ext;
            Image::make($request->file($imageName))->crop(600, 300, 0, 0)->blur(100)->save('images/' . $directory . '/' . $fileName);

            return $fileName;

        } else {
            return false;
        }
    }

    public static function minimumUserLevel($user, $level)
    {
        if ($user->role->level === $level)
        {
            return true;
        } else {
            return false;
        }
    }

    public static function getGatewayFormUrl()
    {
        $settings = Settings::find(1);
        $gateway = PaymentGateway::find($settings->default_payment_processor_id);

        if ($gateway->is_active) {
            return $gateway->production_url;
        } else {
            return $gateway->test_url;
        }
    }

    public static function getProcessorConfig()
    {
        $settings = Settings::find(1);
        $gateway = PaymentGateway::find($settings->default_payment_processor_id);
        return json_decode($gateway->default_config, true);
    }
}