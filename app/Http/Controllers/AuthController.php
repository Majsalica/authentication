<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Services\AuthService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(
        private AuthService $authService,
    ) {
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5',
            'email' => 'required|string|unique:users|email:rfc',
            'password' => 'required|string|min:5',
        ]);

        $this->authService->registerUser($request);
    }

    public function showRegisterForm(): Factory|View|Application
    {
        return view('Auth.registration');
    }
}
