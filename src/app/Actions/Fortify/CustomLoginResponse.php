namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class CustomLoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = $request->user();

        if (!$user->is_profile_set) {
            return redirect()->route('profile.edit');
        }

        return redirect()->intended(config('fortify.home'));
    }
}
