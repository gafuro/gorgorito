<x-master>
    <div class="container mx-auto flex justify-center">
        <div class="px-12 py-8 bg-gray-200 rounded-lg border border-gray-400">
            <div class="col-md-8">
                <div class="font-bold text-lg mb-4">{{ __('Login') }}</div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-6">
                        <label for="email"
                               class="block mb-2 uppercase font-bold text-xs text-gray-700">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email"
                                   type="email"
                                   class="border border-gray-400 p-2 w-full"
                                   name="email"
                                   value="{{ old('email') }}"
                                   autocomplete="email"
                                   autofocus>

                            @error('email')
                                <span class="text-red-500 text-xs mt-2" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password"
                                   name="password"
                                   type="password"
                                   class="border border-gray-400 p-2 w-full"
                                   required
                                   autocomplete="current-password"
                            >
                            @error('password')
                                <span class="text-red-500 text-xs mt-2" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-6">
                        <div>
                            <input
                                class="mr-1"
                                type="checkbox"
                                name="remember"
                                id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="text-xs text-gray-700 font-bold uppercase" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <div class="mb-6">
                        <button type="submit"
                                class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                            {{ __('Login') }}
                        </button>

                        <a href="{{ route('password.request') }}" class="text-xs text-gray-700 hover:text-blue-700">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                </form>
                <a href="{{route('register')}}" class="text-xs text-gray-700 hover:text-blue-700">Create an account</a>
            </div>
        </div>
    </div>
</x-master>
