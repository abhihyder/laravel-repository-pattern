<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Kreait\Firebase\JWT\Error\IdTokenVerificationFailed;
use Kreait\Firebase\JWT\IdTokenVerifier;
use JWTAuth;

class LoginController extends Controller
{
    public function checkToken(Request $request){
        $token = $request->bearerToken();
        $jwt_token = null;
        $verifier = IdTokenVerifier::createWithProjectId(env('FIREBASE_PROJECT'));
        try {
            $v_token = $verifier->verifyIdToken($token);
            $payload = $v_token->payload();
            $user = User::firstOrCreate(['firebase_user_id' => $payload['user_id']],$this->formatUser($payload));
            $jwt_token = JWTAuth::fromUser($user);
            return $jwt_token;
//            echo json_encode($v_token->payload(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        } catch (IdTokenVerificationFailed $e) {
            echo $e->getMessage();
            exit;
        }
    }

    protected function formatUser($raw){
        $user = [];
        array_key_exists('name', $raw) ? $user['name'] = $raw['name'] : $user['name'] = null;
        array_key_exists('email', $raw) ? $user['email'] = $raw['email'] : $user['email'] = null;
        array_key_exists('phone_number', $raw) ? $user['contact_number'] = $raw['phone_number'] : $user['contact_number'] = null;
        array_key_exists('picture', $raw) ? $user['profile_image_url'] = $raw['picture'] : $user['profile_image_url'] = null;

        return array_filter($user);
    }
}
