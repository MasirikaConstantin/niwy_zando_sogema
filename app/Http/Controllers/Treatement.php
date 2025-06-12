<?php

namespace App\Http\Controllers;

use App\Models\PasswordResets;
use App\Models\User;

use function PHPUnit\Framework\isEmpty;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use Kreait\Firebase\Factory;
use voku\helper\ASCII;

class Treatement {



    public static function getVerificationKey()
    {
        $passer = true;
        $list = User::get();
        $key = '';
        do {
            $passer = true;
            $key = Str::random(120);
            $rep = $list->where('private_key', $key);
            if (!isEmpty($rep)) {
                $passer = false;
            }
        } while (!$passer);

        return $key;
    }

    // public static function getToken()
    // {
    //     $passer = true;
    //     $list = PasswordResets::get();
    //     $key = '';
    //     do {
    //         $passer = true;
    //         $key = Str::random(120);
    //         $rep = $list->where('token', $key);
    //         if (!isEmpty($rep)) {
    //             $passer = false;
    //         }
    //     } while (!$passer);

    //     return $key;
    // }
    public static function getImageKey()
    {
        $key = Str::random(60);
        return $key;
    }
    public static function getPassword()
    {
        $key = Str::random(8);
        return $key;
    }

    public static function setCorrectAppUrl()
    {
        $url = "";
        if (isset($_SERVER['HTTP_HOST'])) {
            $host     = $_SERVER['HTTP_HOST'];
            $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443 ?
                "https://" : "http://";
            $url = $protocol . $host;
        }
        return $url;
    }

    /**
     * @return array
     */
    public static function getFillableData(Request $request, Model $model): array
    {
        $data = [];
        $fillable = $model->getFillable();
        $items = $request->all();
        foreach ($items as $key => $value) {
            if (in_array($key, $fillable)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }

    public static function getValidationResponse(Validator $validation)
    {
        return response()->json($validation->getMessageBag(), 400);
    }

    // public static function setFirebase(User $sender, User $receiver, $message = "", $type, $title = "")
    // {
    //     $factory = (new Factory)->withServiceAccount(__DIR__ . '/firebase.json');
    //     $database = $factory->createDatabase();
    //     $id = $receiver->id;
    //     $database->getReference("users/$id")
    //         ->set([
    //             'message' => $message,
    //             'status'  => false,
    //             'title'   => $title,
    //             'type'    => $type,
    //         ]);
    // }


    public static function slug_title($title)
    {
        return static::slug_($title, '-');
    }

    public static function slug_($title, $separator = '-', $language = 'eng')
    {
        $title = $language ? static::ascii($title, $language) : $title;

        // Convert all dashes/underscores into separator
        $flip = $separator === '-' ? '_' : '-';

        $title = preg_replace('![' . preg_quote($flip) . ']+!u', $separator, $title);

        // Replace @ with the word 'at'
        $title = str_replace('@', $separator . 'at' . $separator, $title);

        // Remove all characters that are not the separator, letters, numbers, or whitespace.
        $title = preg_replace('![^' . preg_quote($separator) . '\pL\pN\s]+!u', '', $title);

        // Replace all separator characters and whitespace by a single separator
        $title = preg_replace('![' . preg_quote($separator) . '\s]+!u', $separator, $title);

        return trim($title, $separator);
    }

    public static function ascii($value, $language = 'eng')
    {
        return ASCII::to_ascii((string) $value, $language);
    }
}
