@extends('layouts.admin')

@section('header')
Settings
@endsection

@section('content')
<div class="space-y-6">
    @if(session('success'))
    <div class="bg-green-50 border-l-4 border-green-400 p-4">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-sm text-green-700">
                    {{ session('success') }}
                </p>
            </div>
        </div>
    </div>
    @endif

    <form action="{{ route('settings.update') }}" method="POST" class="space-y-8">
        @csrf
        @method('PUT')

        <div class="bg-white shadow rounded-lg">
            <div class="p-6">
                <h3 class="text-lg font-medium text-[#0A192F] mb-6">General Settings</h3>
                
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="site_name" class="block text-sm font-medium text-[#0A192F]">Site Name</label>
                        <input type="text" name="site_name" id="site_name" 
                            value="{{ old('site_name', $settings['site_name'] ?? config('app.name')) }}"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring-[#3B82F6] focus:border-[#3B82F6] sm:text-sm">
                    </div>

                    <div>
                        <label for="site_description" class="block text-sm font-medium text-[#0A192F]">Site Description</label>
                        <textarea name="site_description" id="site_description" rows="3"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring-[#3B82F6] focus:border-[#3B82F6] sm:text-sm">{{ old('site_description', $settings['site_description'] ?? '') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white shadow rounded-lg">
            <div class="p-6">
                <h3 class="text-lg font-medium text-[#0A192F] mb-6">Contact Information</h3>
                
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="contact_email" class="block text-sm font-medium text-[#0A192F]">Contact Email</label>
                        <input type="email" name="contact_email" id="contact_email" 
                            value="{{ old('contact_email', $settings['contact_email'] ?? '') }}"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring-[#3B82F6] focus:border-[#3B82F6] sm:text-sm">
                    </div>

                    <div>
                        <label for="contact_phone" class="block text-sm font-medium text-[#0A192F]">Contact Phone</label>
                        <input type="text" name="contact_phone" id="contact_phone" 
                            value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring-[#3B82F6] focus:border-[#3B82F6] sm:text-sm">
                    </div>

                    <div>
                        <label for="address" class="block text-sm font-medium text-[#0A192F]">Address</label>
                        <textarea name="address" id="address" rows="3"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring-[#3B82F6] focus:border-[#3B82F6] sm:text-sm">{{ old('address', $settings['address'] ?? '') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white shadow rounded-lg">
            <div class="p-6">
                <h3 class="text-lg font-medium text-[#0A192F] mb-6">Social Media</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="social_links[twitter]" class="block text-sm font-medium text-[#0A192F]">Twitter URL</label>
                        <input type="url" name="social_links[twitter]" id="social_links[twitter]"
                            value="{{ old('social_links.twitter', $settings['social_links']['twitter'] ?? '') }}"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring-[#3B82F6] focus:border-[#3B82F6] sm:text-sm">
                    </div>

                    <div>
                        <label for="social_links[facebook]" class="block text-sm font-medium text-[#0A192F]">Facebook URL</label>
                        <input type="url" name="social_links[facebook]" id="social_links[facebook]"
                            value="{{ old('social_links.facebook', $settings['social_links']['facebook'] ?? '') }}"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring-[#3B82F6] focus:border-[#3B82F6] sm:text-sm">
                    </div>

                    <div>
                        <label for="social_links[linkedin]" class="block text-sm font-medium text-[#0A192F]">LinkedIn URL</label>
                        <input type="url" name="social_links[linkedin]" id="social_links[linkedin]"
                            value="{{ old('social_links.linkedin', $settings['social_links']['linkedin'] ?? '') }}"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring-[#3B82F6] focus:border-[#3B82F6] sm:text-sm">
                    </div>

                    <div>
                        <label for="social_links[github]" class="block text-sm font-medium text-[#0A192F]">GitHub URL</label>
                        <input type="url" name="social_links[github]" id="social_links[github]"
                            value="{{ old('social_links.github', $settings['social_links']['github'] ?? '') }}"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring-[#3B82F6] focus:border-[#3B82F6] sm:text-sm">
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#3B82F6] hover:bg-[#2563EB] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#3B82F6] transition-colors">
                Save Changes
            </button>
        </div>
    </form>
</div>
@endsection
