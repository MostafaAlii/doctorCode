<?php
namespace App\Http\Controllers\Api\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Traits\ApiResponseTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\{DB, Hash,Validator};
class AdminAuthController extends Controller {
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {

            return $this->errorResponse($validator->errors(), 422);
        }
        if (!$token = auth('admin')->attempt($validator->validated(), ['exp' => Carbon::now()->addDays(7300)->timestamp])) {
            return $this->errorResponse('Unauthorized', 422);
        }

        if (isset($request->fcm_token)) {
            $information = Admin::where('email', $request->email)->first();
            $information->update([
                'fcm_token' => $request->fcm_token,
            ]);
        }


        $information = Admin::where('email', $request->email)->first();
        $information->update([
            'fcm_token' => $request->fcm_token,
        ]);

        DB::table('personal_access_tokens')->updateOrInsert([
            'tokenable_id' => $information2->id,
            'tokenable_type' => 'App\Models\Captain',
        ], [
            'tokenable_type' => 'App\Models\Captain',
            'tokenable_id' => $information2->id,
            'name' => $information2->name,
            'token' => $token,
            'expires_at' => auth('captain-api')->factory()->getTTL() * 60000,
        ]);

        return $this->createNewToken($token);
    }
}
