@props(['action' => route('logout')])

<div x-data="{ open: false }" class="relative">
    <!-- Logout Button -->
    <button @click="open = true" {{ $attributes->class(['text-charcoal-gray hover:text-navy-blue transition-colors']) }}>
        <span class="flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            Logout
        </span>
    </button>

    <!-- Confirmation Modal -->
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-y-auto"
         style="display: none;">
        <!-- Background Overlay -->
        <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>

        <!-- Modal Panel -->
        <div class="relative min-h-screen flex items-center justify-center p-4">
            <div class="relative bg-white rounded-xl max-w-sm w-full p-8"
                 @click.away="open = false">
                <div class="text-center">
                    <!-- Icon -->
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                        <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>

                    <h3 class="text-lg font-sora font-semibold text-navy-blue mb-2">
                        Confirm Logout
                    </h3>
                    <p class="text-charcoal-gray mb-6">
                        Are you sure you want to log out? You will need to login again to access your account.
                    </p>

                    <div class="flex justify-center space-x-3">
                        <form method="POST" action="{{ $action }}">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-colors">
                                Yes, Logout
                            </button>
                        </form>
                        <button @click="open = false" class="px-4 py-2 bg-gray-100 text-charcoal-gray rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
