<?php

    namespace App\Http\Controllers;

    use App\Models\User;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Redirect;

    class LoginRegisterController extends Controller
    {
        
        /**
         * Instantiate a new LoginRegisterController instance.
         */
        public function __construct()
        {
            $this->middleware('guest')->except('logout');
        }

        /**
         * Display a registration form.
         *
         * @return \Illuminate\Http\Response
         */
        public function register()
        {
            return response()->view('auth.register');
        }

        /**
         * Store a new user.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'phone' => 'required|min:10',
            'password' => 'required|min:8'
        ]);

        $hashedPassword = Hash::make($request->password);

        User::create([
            'name' => $request->name,
            'password' => $hashedPassword,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('login')->withSuccess('You have successfully registered!');
    }

        /**
         * Display a login form.
         *
         * @return \Illuminate\Http\Response
         */
        public function login()
        {
            return response()->view('auth.login');
        }

        /**
         * Authenticate the user.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function authenticate(Request $request)
        {
            
            $data = $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);
        
            if (Auth::attempt($data)) {
                // $request->session()->regenerate();
                return redirect()->route('indexwelcome')->withSuccess('You have successfully logged in!');
            }
        
            return redirect()->back()->withErrors([
                'email' => 'Invalid credentials.',
            ]);
        }
        
        /**
         * Display a dashboard to authenticated users.
         *
         * @return \Illuminate\Http\Response
         */
        public function dashboard()
        {
            if(Auth::check())
            {
                return response()->view('indexwelcome');
            }
            
            return response()->view('login')
                ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
        } 
        
        /**
         * Log out the user from application.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function logout(Request $request)
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return response()->view('login')
                ->isSuccessful('You have logged out successfully!');
        }    

    
    }
