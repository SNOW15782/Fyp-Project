<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Profile Information
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            Update your account's profile information and email address.
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="grid grid-cols-2 gap-10">
            <div class="left">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input id="name" name="name" type="text" class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('name') border-red-500 @enderror" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('email') border-red-500 @enderror" value="{{ old('email', $user->email) }}" required autocomplete="username">
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div>
                            <p class="text-sm mt-2 text-gray-800">
                                Your email address is unverified.
                                <a href="{{ route('verification.send') }}" class="underline hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Click here to re-send the verification email.
                                </a>
                            </p>
                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-green-600">
                                    A new verification link has been sent to your email address.
                                </p>
                            @endif
                        </div>
                    @endif
                </div>

                <div>
                    <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
                    <input id="age" name="age" type="number" class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('age', $user->age) }}">
                </div>

                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                    <input id="gender" name="gender" type="text" class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('gender', $user->gender) }}">
                </div>

                <div>
                    <label for="language" class="block text-sm font-medium text-gray-700">Language</label>
                    <input id="language" name="language" type="text" class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('language', $user->language) }}">
                </div>

                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                    <input id="location" name="location" type="text" class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('location', $user->location) }}">
                </div>

                <div>
                    <label for="user_status" class="block text-sm font-medium text-gray-700">User Status</label>
                    <select id="user_status" name="user_status" class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('user_status') border-red-500 @enderror">
                        <option value="looking" {{ old('user_status', $user->user_status) === 'looking' ? 'selected' : '' }}>Looking</option>
                        <option value="not looking" {{ old('user_status', $user->user_status) === 'not looking' ? 'selected' : '' }}>Not Looking</option>
                    </select>
                    @error('user_status')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="right">
                <div id="user_profile_preview">
                    @if ($user->user_profile)
                        <label class="block text-sm font-medium text-gray-700">Current Profile Picture:</label>
                        <img src="{{ asset($user->user_profile) }}" alt="Current Profile Picture" class="mt-1 rounded-extraLarge h-32 w-32">
                    @endif
                </div>

                <div>
                    <label for="user_profile" class="block text-sm font-medium text-gray-700">Profile Picture</label>
                    <input id="user_profile" name="user_profile" type="file" class="mt-1 block w-full rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('user_profile') border-red-500 @enderror">
                    @error('user_profile')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >Saved.</p>
            @endif
        </div>
    </form>


<script>
    // JavaScript code for profile picture preview and removal
    const profilePictureInput = document.getElementById('user_profile');
    const profilePicturePreview = document.getElementById('user_profile_preview');

    // Function to show the current profile picture (if it exists)
    function showCurrentProfilePicture() {
        const currentProfilePictureSrc = "{{ $user->user_profile }}";
        if (currentProfilePictureSrc) {
            profilePicturePreview.innerHTML = `
                <label class="block text-sm font-medium text-gray-700">Current Profile Picture:</label>
                <img src="${currentProfilePictureSrc}" alt="Current Profile Picture" class="border border-black mt-1 rounded-extraLarge h-32 w-32">
            `;
        }
    }

    // Call the function to show the current profile picture when the page loads
    showCurrentProfilePicture();

    // Function to handle profile picture input change event
    profilePictureInput.addEventListener('change', function (event) {
        const files = event.target.files;
        if (files && files.length > 0) {
            const reader = new FileReader();
            reader.onload = function (e) {
                profilePicturePreview.innerHTML = `
                    <label class="block text-sm font-medium text-gray-700">Current Profile Picture:</label>
                    <img src="${e.target.result}" alt="Profile Picture Preview" class="border border-black mt-1 rounded-extraLarge h-32 w-32">
                `;
            };
            reader.readAsDataURL(files[0]);
        }
    });
</script>
</section>


