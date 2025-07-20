@extends('layouts.admin')

@section('header')
Notifications
@endsection

@section('content')
<div class="bg-white shadow rounded-lg">
    <div class="p-6">
        @if($notifications->count() > 0)
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-medium text-[#0A192F]">Unread Notifications</h3>
                <form action="{{ route('notifications.markAllAsRead') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-sm text-[#3B82F6] hover:text-[#2563EB] transition-colors">
                        Mark all as read
                    </button>
                </form>
            </div>

            <div class="flow-root">
                <ul class="-my-5 divide-y divide-gray-200">
                    @foreach($notifications as $notification)
                    <li class="py-5">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-blue-100">
                                    <svg class="h-5 w-5 text-[#3B82F6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                                    </svg>
                                </span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm text-gray-900">
                                    {{ $notification->data['message'] ?? 'No message available' }}
                                </p>
                                <p class="mt-1 text-sm text-gray-500">
                                    {{ $notification->created_at->diffForHumans() }}
                                </p>
                            </div>
                            <div class="flex-shrink-0">
                                <button type="button" 
                                    data-notification-id="{{ $notification->id }}"
                                    class="text-sm font-medium text-[#3B82F6] hover:text-[#2563EB] transition-colors mark-as-read">
                                    Mark as read
                                </button>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        @else
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No unread notifications</h3>
                <p class="mt-1 text-sm text-gray-500">
                    You're all caught up!
                </p>
            </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
document.querySelectorAll('.mark-as-read').forEach(button => {
    button.addEventListener('click', async () => {
        const notificationId = button.dataset.notificationId;
        try {
            const response = await fetch(`/notifications/${notificationId}/mark-as-read`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            });
            
            if (response.ok) {
                button.closest('li').remove();
                
                // If no more notifications, show empty state
                const remainingNotifications = document.querySelectorAll('.notifications-list li').length;
                if (remainingNotifications === 0) {
                    location.reload();
                }
            }
        } catch (error) {
            console.error('Error marking notification as read:', error);
        }
    });
});
</script>
@endpush
@endsection
